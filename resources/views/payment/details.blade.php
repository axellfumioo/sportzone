@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8 mt-16">
    <div class="bg-white rounded-xl shadow-xl p-6 max-w-4xl mx-auto">
        <!-- Header with Status Badge -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-gray-200 pb-6 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Transaction Details</h1>
                <p class="text-gray-500 mt-1">Order ID: <span class="font-medium">{{ $order->orderId }}</span></p>
            </div>
            <div class="mt-4 md:mt-0">
                @php
                $statusClass = match($order->payment_status) {
                'pending' => 'bg-yellow-100 text-yellow-800',
                'paid' => 'bg-green-100 text-green-800',
                'failed' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-800'
                };
                @endphp
                <span class="px-4 py-2 rounded-full text-sm font-medium {{ $statusClass }}">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>
        </div>

        <!-- Order Progress Tracker -->
        <div class="mb-8">
            @php
            $progressStep = match($order->payment_status) {
            'pending' => 1,
            'paid' => 2,
            'completed' => 3,
            default => 1
            };
            @endphp

        </div>

        <!-- Order Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Customer Information -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Customer Information</h2>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Name:</span>
                        <span class="font-medium text-gray-800">{{ $order->name }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Email:</span>
                        <span class="font-medium text-gray-800">{{ $order->email }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Phone:</span>
                        <span class="font-medium text-gray-800">{{ $order->phone }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Address:</span>
                        <span class="font-medium text-gray-800">{{ $order->address }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Payment Information</h2>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Created At:</span>
                        <span class="font-medium text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Method:</span>
                        <span class="font-medium text-gray-800 uppercase">{{ $order->paymentMethod }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Status:</span>
                        @php
                        $statusClass = match($order->payment_status) {
                        'unpaid' => 'bg-yellow-400 text-white',
                        'paid' => 'bg-green-400 text-white',
                        default => 'bg-gray-100 text-gray-800'
                        };
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 w-24 flex-shrink-0">Total:</span>
                        <span class="font-bold text-gray-800">Rp. {{ number_format($order->totalPrice, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Order Items</h2>
            </div>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <i class="text-gray-500 fa-ticket fas rotate-45 "></i>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->item }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp. {{ number_format($order->totalPrice) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->totalItems }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp. {{ number_format($order->totalPrice * $order->totalItems, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50">
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-right text-gray-800">Total</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800">Rp. {{ number_format($order->totalPrice * $order->totalItems, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Payment Actions -->
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 bg-gray-50 rounded-lg p-6 border border-gray-100">
            @if($order->payment_status === 'unpaid')
            <div>
                <p class="text-sm text-gray-500 mb-1">Payment Reference:</p>
                <div class="flex items-center">
                    <p class="font-mono text-xs bg-gray-100 p-2 rounded-l border border-gray-200">{{ $order->midtrans_snap_token }}</p>
                    <button id="copyBtn" class="bg-gray-200 hover:bg-gray-300 p-2 rounded-r border-r border-t border-b border-gray-200 transition-colors duration-150" onclick="copyToClipboard('{{ $order->midtrans_snap_token }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex space-x-4">
                @php
                $isExpired = now()->diffInHours($order->created_at) > 23;
                @endphp
                <button id="payBtn" {{ $isExpired ? 'disabled' : '' }} class="{{ $isExpired
        ? 'bg-gray-400 cursor-not-allowed text-white font-medium py-2 px-6 rounded-lg flex items-center transition-colors duration-150 shadow-md'
        : 'bg-red-800 cursor-pointer text-white font-medium py-2 px-6 rounded-lg flex items-center transition-colors duration-150 shadow-md hover:shadow-lg'
    }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    {{ $isExpired ? 'Order Expired' : 'Pay Now' }}
                </button>
            </div>
            @elseif($order->payment_status === 'paid')
            <div>
                <p class="text-sm text-gray-500">This order has been paid successfully.</p>
            </div>
            @else
            <div>
                <p class="text-sm text-gray-500">Payment failed. Please try again or contact support.</p>
            </div>
            <div class="flex space-x-4">
                <button id="retryBtn" class="bg-red-800 text-white font-medium py-2 px-6 rounded-lg flex items-center transition-colors duration-150 shadow-md hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Try Again
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Add JavaScript to handle copy-to-clipboard functionality --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success tooltip
            const copyBtn = document.getElementById('copyBtn');
            const originalInnerHTML = copyBtn.innerHTML;

            copyBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        `;

            setTimeout(function() {
                copyBtn.innerHTML = originalInnerHTML;
            }, 2000);
        }).catch(function(error) {
            console.error('Error copying text: ', error);
        });
    }


    @if($order -> payment_status === 'unpaid')
    document.getElementById('payBtn').addEventListener('click', function() {
        window.snap.pay('{{ $order->midtrans_snap_token }}', {
            onSuccess: function(result) {
                window.location.reload(); // reload jika berhasil
            }
            , onPending: function(result) {
                console.log("Pending: ", result);
            }
            , onError: function(result) {
                alert("Gagal melakukan pembayaran. Silakan coba lagi.");
            }
            , onClose: function() {
                console.log("Pembayaran ditutup oleh pengguna.");
            }
        });
    });

    @endif

    @if($order -> payment_status === 'failed')
    document.getElementById('payBtn').addEventListener('click', function() {
        window.snap.pay('{{ $order->midtrans_snap_token }}', {
            onSuccess: function(result) {
                window.location.reload(); // reload jika berhasil
            }
            , onPending: function(result) {
                console.log("Pending: ", result);
            }
            , onError: function(result) {
                alert("Gagal melakukan pembayaran. Silakan coba lagi.");
            }
            , onClose: function() {
                console.log("Pembayaran ditutup oleh pengguna.");
            }
        });
    });
    @endif

</script>
@endsection
