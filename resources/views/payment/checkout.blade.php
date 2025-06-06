@extends('components.layout')

@section('content')
<section class="relative bg-gray-50 pb-12 pt-32 px-4 overflow-hidden" x-data="{ isGift: false }">
    <!-- Background image -->
    <img src="https://images.unsplash.com/photo-1544824158-f13eb5211474?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3" class="absolute inset-0 w-full h-full object-cover opacity-40 z-0" alt="background">

    <!-- Konten Utama -->
    <div class="relative z-10 max-w-4xl mx-auto bg-white/90 shadow-lg rounded-xl p-8 space-y-10 backdrop-blur-sm">

        <!-- Metode Pembayaran -->
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-[#8B1E1E]">Metode Pembayaran</h3>
            <p class="text-gray-700 mt-1">Silahkan pilih metode pembayaran.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- ... sama seperti sebelumnya ... -->
                <label class="flex items-center gap-4 p-4 border rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition peer-checked:ring-2 peer-checked:ring-[#8B1E1E]">
                    <input type="radio" name="payment" value="qris" class="peer hidden" />
                    <i class="fas fa-qrcode text-xl text-[#8B1E1E]"></i>
                    <span class="text-gray-800 font-medium">QRIS (Scan QR)</span>
                </label>
                <label class="flex items-center gap-4 p-4 border rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition peer-checked:ring-2 peer-checked:ring-[#8B1E1E]">
                    <input type="radio" name="payment" value="bank" class="peer hidden" />
                    <i class="fas fa-university text-xl text-[#8B1E1E]"></i>
                    <span class="text-gray-800 font-medium">Transfer Bank</span>
                </label>
                <label class="flex items-center gap-4 p-4 border rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition peer-checked:ring-2 peer-checked:ring-[#8B1E1E]">
                    <input type="radio" name="payment" value="ewallet" class="peer hidden" />
                    <i class="fas fa-wallet text-xl text-[#8B1E1E]"></i>
                    <span class="text-gray-800 font-medium">E-Wallet</span>
                </label>
                <label class="flex items-center gap-4 p-4 border rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition peer-checked:ring-2 peer-checked:ring-[#8B1E1E]">
                    <input type="radio" name="payment" value="card" class="peer hidden" />
                    <i class="fas fa-credit-card text-xl text-[#8B1E1E]"></i>
                    <span class="text-gray-800 font-medium">Kartu Kredit</span>
                </label>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-[#8B1E1E]">Ringkasan Pesanan</h3>
            <div class="bg-gray-50 p-4 rounded-lg space-y-2">
                <div class="flex justify-between text-gray-700">
                    <span>Tiket Gokart (1 Jam)</span>
                    <span>Rp150.000</span>
                </div>
                <div class="flex justify-between text-gray-700">
                    <span>Biaya Admin</span>
                    <span>Rp5.000</span>
                </div>
                <hr>
                <div class="flex justify-between font-bold text-[#8B1E1E] text-lg">
                    <span>Total Bayar</span>
                    <span>Rp155.000</span>
                </div>
            </div>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-right">
            <button class="bg-[#8B1E1E] hover:bg-[#a32929] text-white px-6 py-3 rounded-lg transition">
                Bayar Sekarang <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</section>
@endsection
