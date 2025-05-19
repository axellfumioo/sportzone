@extends('components.layout')

@section('content')
<section class="pb-16 pt-32 px-4 bg-[#f8f6f1] min-h-screen font-sans">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-[1.2fr_2.8fr] gap-10 px-4 md:px-6 lg:px-0">

        <!-- Sidebar Info Akun -->
        <aside class="bg-gradient-to-br from-[#fffaf0] via-white to-[#ffeaea] rounded-3xl shadow-2xl px-10 py-12 lg:py-14 space-y-6 w-full">
            <!-- Avatar + Info -->
            <div class="flex flex-col items-center gap-4 text-center">
                <div class="relative w-24 h-24">
                    <div class="absolute inset-0 bg-[#8B1E1E] rounded-full blur-lg opacity-50"></div>
                    <div class="relative w-24 h-24 rounded-full bg-[#8B1E1E] flex items-center justify-center ring-4 ring-[#8B1E1E] shadow-md transition hover:shadow-[0_0_20px_#8B1E1E]">
                        <span class="text-4xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-[#8B1E1E] tracking-wide">{{$user->name}}</h2>
                    <p class="text-sm text-gray-500">{{$user->email}}</p>
                </div>
            </div>

            <!-- Info Card -->
            <div class="grid grid-cols-1 gap-4 text-gray-700 text-sm">
                <p><span class="font-semibold text-[#8B1E1E]">📞 Nomor HP:</span> {{$user->phone}}</p>
                <p><span class="font-semibold text-[#8B1E1E]">📅 Bergabung:</span>
                    <span class="text-gray-600">{{ $user->created_at->locale('id')->format('d F Y') }}</span>
                </p>
                <h3 class="text-sm font-semibold text-[#8B1E1E] mb-2">✨ Koleksi Badge</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <div class="w-10 h-10 rounded-full border-2 border-white shadow-md hover:scale-110 transition flex items-center justify-center bg-yellow-100 text-2xl">
                        🎯
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-white shadow-md hover:scale-110 transition flex items-center justify-center bg-blue-100 text-2xl">
                        🏆
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-white shadow-md hover:scale-110 transition flex items-center justify-center bg-green-100 text-2xl">
                        ⭐
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            {{-- <button
                class="w-full bg-[#8B1E1E] text-white py-3 text-sm font-semibold rounded-xl hover:bg-[#6a1616] shadow hover:shadow-lg transition duration-200">
                ✏️ Edit Profil
            </button> --}}
        </aside>

        <!-- Main Content -->
        <main class="space-y-10">
            <!-- Kartu Ringkasan Tiket -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white p-7 rounded-3xl shadow-lg hover:shadow-xl transition-all group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base text-gray-500">Tiket Gokart</p>
                            <h3 class="text-4xl font-bold text-[#8B1E1E]">{{ $ticket->where('sports_id', '2')->count() }}</h3>
                        </div>
                        <span class="text-5xl transition-transform group-hover:scale-110">🏎️</span>
                    </div>
                </div>
                <div
                    class="bg-white p-7 rounded-3xl shadow-lg hover:shadow-xl transition-all group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base text-gray-500">Tiket Billiard</p>
                            <h3 class="text-4xl font-bold text-[#8B1E1E]">{{ $ticket->where('sports_id', '1')->count() }}</h3>
                        </div>
                        <span class="text-5xl transition-transform group-hover:scale-110">🎱</span>
                    </div>
                </div>
                <div
                    class="bg-white p-7 rounded-3xl shadow-lg hover:shadow-xl transition-all group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base text-gray-500">Tiket Bowling</p>
                            <h3 class="text-4xl font-bold text-[#8B1E1E]">{{ $ticket->where('sports_id', '3')->count() }}</h3>
                        </div>
                        <span class="text-5xl transition-transform group-hover:scale-110">🎳</span>
                    </div>
                </div>
            </div>

            <!-- Riwayat Transaksi -->
            <div class="bg-white p-8 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-semibold text-[#8B1E1E] mb-6">Riwayat Transaksi</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-base text-left">
                        <thead class="bg-[#8B1E1E] text-white rounded-xl">
                            <tr>
                                <th class="px-6 py-4 rounded-l-xl">Tanggal</th>
                                <th class="px-6 py-4">Jenis Tiket</th>
                                <th class="px-6 py-4">Jumlah</th>
                                <th class="px-6 py-4">Total</th>
                                <th class="px-6 py-4 rounded-r-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse($orders as $order)
                            <tr class="border-b hover:bg-gray-50 cursor-pointer" onclick="window.location.href='/order/{{ $order->orderId }}'">
                                <td class="px-6 py-4">{{ $order->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $order->item }}</td>
                                <td class="px-6 py-4">{{ $order->totalItems }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($order->totalPrice, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 {{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-red-500' }} font-medium uppercase">
                                    {{ $order->payment_status }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada riwayat transaksi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</section>
@endsection
