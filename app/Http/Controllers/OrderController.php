<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use App\Models\OrderHistory;
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
        $user = "axel";
        $email = "axel@gmail.com";
        $phone = "081386271505";
        $name = "axel";
        $address = "perum";

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

            // $this->whatsAppNotificationCheckOut(
            //     $validated['orderId'],
            //     $validated['name'],
            //     $validated['phone'],
            //     $validated['address'],
            //     $validated['totalItems'],
            //     $validated['cartTotal'],
            //     $validated['paymentMethod'],
            //     json_decode($validated['Items']),
            //     $snapToken->redirect_url
            // );
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
        $order = OrderHistory::where('orderId', $id)->first();

        if (!$order) {
            return redirect('/')->with('error', 'Order tidak ditemukan.');
        }

        $order->items = json_decode($order->items);
        return view('payment.details', compact('order'));
    }

    public function callback(Request $request)
    {
        $json = json_decode($request->getContent(), true);
        Log::info('Callback received: ', $json);

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
                        // $this->whatsAppNotificationPaid(
                        //     $order->name,
                        //     $orderId,
                        //     $order->cartTotal,
                        //     $order->phone
                        // );
                        $order->update(['payment_status' => 'paid']);
                    }
                }
                break;

            case 'settlement':
                // $this->whatsAppNotificationPaid(
                //     $order->name,
                //     $orderId,
                //     $order->cartTotal,
                //     $order->phone
                // );
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

        return redirect("/order/{$orderId}")->with('success', 'Pembayaran berhasil!')->with('order', $order);
    }


    public function whatsAppNotificationCheckOut($orderId, $name, $phone, $address, $totalItems, $cartTotal, $paymentMethod, $items, $url)
    {

        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        $itemDetails = "";
        foreach ($items as $item) {
            if (is_object($item) && isset($item->name) && isset($item->quantity)) {
                $itemDetails .= "- {$item->name} (Qty: {$item->quantity})\n";
            } elseif (is_array($item) && isset($item['name']) && isset($item['quantity'])) {
                $itemDetails .= "- {$item['name']} (Qty: {$item['quantity']})\n";
            }
        }

        $formattedTotal = 'Rp ' . number_format($cartTotal, 0, ',', '.');

        $message = "Hai *{$name}*, terima kasih telah melakukan pemesanan di _Barakatih Kitchen_. Berikut adalah detail pesanan Anda:\n\n" .
            "Order ID: *{$orderId}*\n" .
            "Nama: *{$name}*\n" .
            "Telepon: +*{$phone}*\n" .
            "Alamat: *" . preg_replace('/\s+/', ' ', $address) . "*\n" .
            "Total Item: *{$totalItems}*\n" .
            "Total Pembayaran: *{$formattedTotal}*\n" .
            "Metode Pembayaran: *" . strtoupper($paymentMethod) . "*\n\n" .
            "Detail Item:\n" .
            $itemDetails .
            "\nSilakan lakukan pembayaran sesuai dengan metode yang Anda pilih. Link Pembayaran: *{$url}*";

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


            Log::info('Fonnte API call executed', [
                'phone' => $phone,
                'response' => $response,
                'http_code' => $httpcode
            ]);

            if ($error) {
                Log::error('Fonnte cURL Error: ' . $error);
                return response()->json(['error' => 'Failed to send notification: ' . $error], 500);
            }

            $responseData = json_decode($response, true);

            if (isset($responseData['status']) && $responseData['status'] === true) {
                Log::error('Fonnte API Error: ' . $responseData['reason'], ['response' => $responseData]);
                return response()->json(['message' => 'WhatsApp notification sent', 'details' => $responseData]);
            } else {
                $errorMsg = isset($responseData['reason']) ? $responseData['reason'] : 'Unknown error';
                Log::error('Fonnte API Error: ' . $errorMsg, ['response' => $responseData]);
                return response()->json(['error' => 'Failed to send notification: ' . $errorMsg], 500);
            }
        } catch (\Exception $e) {
            Log::error('Fonnte exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function whatsAppNotificationPaid($name, $orderId, $cartTotal, $phone)
    {

        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        $formattedTotal = 'Rp ' . number_format($cartTotal, 0, ',', '.');
        $message = "Hai *{$name}*, terima kasih telah melakukan pembayaran untuk pesanan Anda dengan ID *{$orderId}*.\n\n" .
            "Total Pembayaran: *{$formattedTotal}*\n\n" .
            "Jika ada pertanyaan, silakan hubungi kami.";
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


            Log::info('Fonnte API call executed', [
                'phone' => $phone,
                'response' => $response,
                'http_code' => $httpcode
            ]);

            if ($error) {
                Log::error('Fonnte cURL Error: ' . $error);
                return response()->json(['error' => 'Failed to send notification: ' . $error], 500);
            }

            $responseData = json_decode($response, true);

            if (isset($responseData['status']) && $responseData['status'] === true) {
                Log::error('Fonnte API Error: ' . $responseData['reason'], ['response' => $responseData]);
                return response()->json(['message' => 'WhatsApp notification sent', 'details' => $responseData]);
            } else {
                $errorMsg = isset($responseData['reason']) ? $responseData['reason'] : 'Unknown error';
                Log::error('Fonnte API Error: ' . $errorMsg, ['response' => $responseData]);
                return response()->json(['error' => 'Failed to send notification: ' . $errorMsg], 500);
            }
        } catch (\Exception $e) {
            Log::error('Fonnte exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
