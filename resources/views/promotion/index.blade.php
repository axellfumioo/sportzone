@extends('components.layout')

@section('content')
<section class="bg-[#f8f6f1] pb-16 pt-32 px-4">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-[#8B1E1E] text-center mb-12">Temukan Arena Go-Kart Terbaik</h2>

        <div class="space-y-6">
            <!-- Promo Row -->
            <div class="flex flex-col md:flex-row items-center justify-between bg-white rounded-xl shadow-md p-5 border-l-4 border-[#8B1E1E]">
                <div class="text-left mb-4 md:mb-0">
                    <h3 class="text-xl font-semibold text-[#8B1E1E]">🎳 Diskon Bowling 20%</h3>
                    <p class="text-[#8B1E1E]/80">Main bowling makin seru dengan potongan harga khusus hari kerja!</p>
                    <p class="text-sm text-[#8B1E1E]/60 mt-1">Berlaku sampai 15 Mei 2025</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="bg-[#8B1E1E]/10 text-[#8B1E1E] font-mono px-4 py-1 rounded-md text-sm font-bold">BOWLING20</span>
                    <button onclick="navigator.clipboard.writeText('BOWLING20')" class="bg-[#8B1E1E] text-white text-sm px-4 py-2 rounded hover:opacity-90">Salin Kode</button>
                </div>
            </div>

            <!-- Promo Row -->
            <div class="flex flex-col md:flex-row items-center justify-between bg-white rounded-xl shadow-md p-5 border-l-4 border-[#8B1E1E]">
                <div class="text-left mb-4 md:mb-0">
                    <h3 class="text-xl font-semibold text-[#8B1E1E]">🎱 Billiard Seru 1 Jam Gratis</h3>
                    <p class="text-[#8B1E1E]/80">Pesan minimal 2 jam, dapetin bonus 1 jam free buat nambah match 🔥</p>
                    <p class="text-sm text-[#8B1E1E]/60 mt-1">Berlaku sampai 20 Mei 2025</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="bg-[#8B1E1E]/10 text-[#8B1E1E] font-mono px-4 py-1 rounded-md text-sm font-bold">FREEBILI</span>
                    <button onclick="navigator.clipboard.writeText('FREEBILI')" class="bg-[#8B1E1E] text-white text-sm px-4 py-2 rounded hover:opacity-90">Salin Kode</button>
                </div>
            </div>

            <!-- Promo Row -->
            <div class="flex flex-col md:flex-row items-center justify-between bg-white rounded-xl shadow-md p-5 border-l-4 border-[#8B1E1E]">
                <div class="text-left mb-4 md:mb-0">
                    <h3 class="text-xl font-semibold text-[#8B1E1E]">🏎️ Cashback Gokart 25%</h3>
                    <p class="text-[#8B1E1E]/80">Balapan di akhir pekan? Dapetin cashback langsung ke dompet kamu!</p>
                    <p class="text-sm text-[#8B1E1E]/60 mt-1">Berlaku sampai 31 Mei 2025</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="bg-[#8B1E1E]/10 text-[#8B1E1E] font-mono px-4 py-1 rounded-md text-sm font-bold">GOKART25</span>
                    <button onclick="navigator.clipboard.writeText('GOKART25')" class="bg-[#8B1E1E] text-white text-sm px-4 py-2 rounded hover:opacity-90">Salin Kode</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
