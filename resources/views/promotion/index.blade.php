@extends('components.layout')

@section('content')
<section class="bg-[#f8f6f1] pt-32 pb-16 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#8B1E1E] text-center mb-12">Temukan Promo</h2>

        <div class="space-y-6">
            @foreach ($promos as $promo)
            <div class="bg-white flex flex-col md:flex-row items-center justify-between p-6 rounded-xl shadow-md border-l-4 border-[#8B1E1E]">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-semibold text-[#8B1E1E]">{{ $promo->name }}</h3>
                    <p class="text-[#8B1E1E]/80">{{ $promo->description }}</p>
                    <p class="text-sm text-[#8B1E1E]/60 mt-1">Berlaku sampai {{ $promo->validuntil }}</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="bg-[#8B1E1E]/10 text-[#8B1E1E] font-mono px-4 py-1 rounded-md text-sm font-bold">{{ $promo->code }}</span>
                    <button onclick="this.textContent='Berhasil disalin'; navigator.clipboard.writeText('{{ $promo->code }}'); setTimeout(() => this.textContent='Salin Kode', 1500)" class="bg-[#8B1E1E] text-white text-sm px-4 py-2 rounded hover:opacity-90 transition-all duration-200">Salin Kode</button>
                </div>
            </div>
            @endforeach

            @if($promos->isEmpty())
            <div class="flex flex-col items-center justify-center py-32">
                <i class="fa-solid fa-heart-crack text-4xl text-red-600 mb-2"></i>
                <h1 class="text-lg font-bold text-gray-800">TIDAK ADA PROMO YANG TERSEDIA</h1>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
