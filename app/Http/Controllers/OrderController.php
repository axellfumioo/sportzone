<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use App\Models\OrderHistory;
use App\Models\ticket;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'arena_id'      => 'required|integer',
            'difficulty'    => 'nullable|string',
            'selected_date' => 'required|date',
            'selected_time' => 'required|string',
            'jumlah_tiket'  => 'required|integer',
        ]);

        $validated['difficulty'] = $request->input('difficulty', '1');

        $orderId = uniqid("SZ_");
        $userId = Auth::id();
        $user = Auth::user();
        $email = $user->email;
        $phone = $user->phone;
        $name = $user->name;
        $address = "Jalan raya purwokerto purwokerto";

        $arena = Arena::where('id', $validated['arena_id'])->first();

        if (!$arena) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Arena not found'
            ], 404);
        }
        $cartTotal = $arena->arena_price * $validated['jumlah_tiket'];
        // dd($cartTotal);
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $cartTotal,
            ],
            'customer_details' => [
                'first_name' => $name,
                'last_name' => "Customer",
                'email' => $email,
                'phone' => $phone,
            ],
            'callbacks' => [
                'finish' => url('/') . '/transaction/success',
            ],
            'enabled_payments' => [
                'credit_card',
                'mandiri_clickpay',
                'cimb_clicks',
                'bca_klikbca',
                'bca_klikpay',
                'bri_epay',
                'echannel',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'other_va',
                'gopay',
                'indomaret',
                'alfamart',
                'danamon_online',
                'akulaku',
                'shopeepay',
                'qris'
            ]
        ];

        $snapToken = Snap::createTransaction($params);

        try {
            DB::table('order_histories')->insert([
                'orderId'             => $orderId,
                'name'               => $name,
                'email'              => $email,
                'phone'              => $phone,
                'address'            => $address,
                'totalPrice'         => $cartTotal,
                'totalItems'         => $validated['jumlah_tiket'],
                'item'         => "Tiket " . $arena->arena_name,
                'paymentMethod'      => "ewallet",
                'midtrans_snap_token' => $snapToken->token,
                'payment_status'     => 'unpaid',
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
            $item = "Tiket " . $arena->arena_name;
            $ewallet = "ewallet";
            $this->whatsAppNotificationCheckOut(
                $orderId,
                $name,
                $email,
                $phone,
                $address,
                $cartTotal,
                $validated['jumlah_tiket'],
                $item,
                $ewallet,
                $snapToken->redirect_url
            );
            DB::table('tickets')->insert([
                'user_id'               => $userId,
                'sports_id'              => $arena->sports_list_id,
                'selections'              => "ga ada",
                'qty'              => $validated['jumlah_tiket'],
                'time'              => $validated['selected_time'],
                'validuntil'              => $validated['selected_date'],
                'is_used'              => "unused",
                'orderId'              => $orderId,
            ]);
            return redirect("/order/{$orderId}")->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal simpan order: ' . $e->getMessage()
            ], 500);
        }
    }
    public function viewOrder($id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $order = OrderHistory::where('orderId', $id)->first();
        if (!$order) {
            return redirect('/')->with('error', 'Order tidak ditemukan.');
        }
        $ticket = ticket::where('orderId', $order->orderId)->first();

        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $qrCode = 'https://api.qrserver.com/v1/create-qr-code/?size=512x512&data=' . url('/') . "/" . $order->orderId;

        $order->items = json_decode($order->items);
        return view('payment.details', compact('order', 'qrCode', 'ticket'));
    }

    public function callback(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $orderId = $json['order_id'];
        $statusCode = $json['status_code'];
        $grossAmount = $json['gross_amount'];
        $signatureKey = $json['signature_key'];

        $serverKey = config('midtrans.server_key');
        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $calculatedSignatureKey = hash('sha512', $input);

        if ($signatureKey !== $calculatedSignatureKey) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $order = OrderHistory::where('orderId', $orderId)->first();

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $transactionStatus = $json['transaction_status'];
        $paymentType = $json['payment_type'];
        $fraudStatus = $json['fraud_status'];

        switch ($transactionStatus) {
            case 'capture':
                if ($paymentType == 'credit_card') {
                    if ($fraudStatus == 'challenge') {
                        $order->update(['payment_status' => 'unpaid']);
                    } else {
                        $this->whatsAppNotificationPaid(
                            $order->name,
                            $orderId,
                            $order->totalPrice,
                            $order->phone
                        );
                        $order->update(['payment_status' => 'paid']);
                    }
                }
                break;

            case 'settlement':
                $this->whatsAppNotificationPaid(
                    $order->name,
                    $orderId,
                    $order->totalPrice,
                    $order->phone
                );
                $order->update(['payment_status' => 'paid']);
                break;

            case 'pending':
                $order->update(['payment_status' => 'unpaid']);
                break;

            case 'deny':
            case 'cancel':
            case 'expire':
                $order->update(['payment_status' => 'unpaid']);
                break;

            default:
                $order->update(['payment_status' => 'unpaid']);
                break;
        }

        return response()->json(['message' => 'Callback received successfully']);
    }

    public function success(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = OrderHistory::where('orderId', $orderId)->first();
        if (!$order) {
            return redirect('/')->with('error', 'Order tidak ditemukan.');
        }

        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($orderId, $generator::TYPE_CODE_128);
        return redirect("/order/{$orderId}")->with('success', 'Pembayaran berhasil!')->with('order', $order, 'barcode', $barcode);
    }


    public function whatsAppNotificationCheckOut($orderId, $name, $email, $phone, $address, $cartTotal, $jumlahtiket, $item, $ewallet, $url)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        $formattedTotal = 'Rp ' . number_format($cartTotal, 0, ',', '.');

        $message = "🎮 *SPORTZONE ORDER CONFIRMATION* 🎮\n\n" .
            "Hello *{$name}*! Thank you for choosing SportZone.\n\n" .
            "📋 *ORDER DETAILS*\n" .
            "━━━━━━━━━━━━━━━━\n" .
            "🔹 Order ID: *{$orderId}*\n" .
            "🔹 Name: *{$name}*\n" .
            "🔹 Email: *{$email}*\n" .
            "🔹 Phone: +*{$phone}*\n\n" .
            "🎫 *TICKET INFORMATION*\n" .
            "━━━━━━━━━━━━━━━━\n" .
            "🔸 Quantity: *{$jumlahtiket}x*\n" .
            "🔸 Item: *{$item}*\n\n" .
            "💳 *PAYMENT DETAILS*\n" .
            "━━━━━━━━━━━━━━━━\n" .
            "💰 Amount: *{$formattedTotal}*\n" .
            "🏧 Method: *" . strtoupper($ewallet) . "*\n\n" .
            "🔵 *Payment Link*\n" .
            "{$url}\n\n" .
            "Please complete your payment using the link above.\n" .
            "Need help? Chat with us through our website! 😊";

        try {
            $token = config('services.fonnte.token');

            $response = Http::withHeaders([
                'Authorization' => $token
            ])->post('https://api.fonnte.com/send', [
                'target' => $phone,
                'message' => $message,
                'countryCode' => '62'
            ]);

            $httpcode = $response->status();
            $error = !$response->successful();

            if ($error) {
                return response()->json(['error' => 'Failed to send notification: ' . $error], 500);
            }

            $responseData = json_decode($response, true);

            if (isset($responseData['status']) && $responseData['status'] === true) {
                return response()->json(['message' => 'WhatsApp notification sent', 'details' => $responseData]);
            } else {
                $errorMsg = isset($responseData['reason']) ? $responseData['reason'] : 'Unknown error';
                return response()->json(['error' => 'Failed to send notification: ' . $errorMsg], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function whatsAppNotificationPaid($name, $orderId, $totalPrice, $phone)
    {

        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        $formattedTotal = 'Rp ' . number_format($totalPrice, 0, ',', '.');
        $message = "🎉 Selamat *{$name}*! 🎉\n\n" .
            "Pembayaran Anda untuk Order ID: *{$orderId}* telah berhasil kami terima.\n\n" .
            "💰 Total Pembayaran: *{$formattedTotal}*\n\n" .
            "🎫 E-ticket Anda sudah dapat digunakan.\n" .
            "Silakan tunjukkan e-ticket saat memasuki arena.\n\n" .
            "📞 Butuh bantuan? Chat Jamal pada website kami :)\n" .
            "Terima kasih telah memilih SportZone! 🙏";
        try {
            $token = config('services.fonnte.token');

            $response = Http::withHeaders([
                'Authorization' => $token
            ])->post('https://api.fonnte.com/send', [
                'target' => $phone,
                'message' => $message,
                'countryCode' => '62'
            ]);

            $httpcode = $response->status();
            $responseBody = $response->body();
            $error = !$response->successful();

            if ($error) {
                return response()->json(['error' => 'Failed to send notification: ' . $error], 500);
            }

            $responseData = json_decode($response, true);

            if (isset($responseData['status']) && $responseData['status'] === true) {
                return response()->json(['message' => 'WhatsApp notification sent', 'details' => $responseData]);
            } else {
                $errorMsg = isset($responseData['reason']) ? $responseData['reason'] : 'Unknown error';
                return response()->json(['error' => 'Failed to send notification: ' . $errorMsg], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function demoExample($orderId) {
        try {
            $order = OrderHistory::where('orderId', $orderId)->first();

            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }

            $order->update(['payment_status' => 'paid']);

            return response()->json(['message' => 'Payment status updated to paid'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
