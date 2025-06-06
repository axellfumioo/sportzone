@extends('components.layout')

@section('content')
<section class="bg-gradient-to-br from-gray-50 to-gray-100 pt-32 pb-16 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header with improved typography -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-[#8B1E1E] mb-3">Temukan Promo</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Dapatkan penawaran terbaik dan hemat lebih banyak dengan kode promo eksklusif kami</p>
        </div>

        <div class="space-y-6">
            @foreach ($promos as $promo)
            <div class="group bg-white flex flex-col md:flex-row items-center justify-between p-6 rounded-xl shadow-md hover:shadow-xl border-l-4 border-[#8B1E1E] transition-all duration-300 hover:translate-y-[-2px] relative overflow-hidden">
                <!-- Subtle background pattern -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#8B1E1E]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="mb-4 md:mb-0 relative z-10">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-tag text-[#8B1E1E] text-sm"></i>
                        <h3 class="text-xl font-semibold text-[#8B1E1E] group-hover:text-[#A52525] transition-colors duration-200">{{ $promo->name }}</h3>
                    </div>
                    <p class="text-[#8B1E1E]/80 mb-2 leading-relaxed">{{ $promo->description }}</p>
                    <div class="flex items-center gap-1 text-sm text-[#8B1E1E]/60">
                        <i class="fa-regular fa-clock text-xs"></i>
                        <span>Berlaku sampai {{ $promo->validuntil }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-3 relative z-10">
                    <!-- Enhanced promo code display -->
                    <div class="bg-gradient-to-r from-[#8B1E1E]/10 to-[#8B1E1E]/5 text-[#8B1E1E] font-mono px-4 py-2 rounded-lg text-sm font-bold border border-[#8B1E1E]/20 select-all">
                        {{ $promo->code }}
                    </div>

                    <!-- Enhanced copy button -->
                    <button
                        onclick="copyPromoCode(this, '{{ $promo->code }}')"
                        class="bg-[#8B1E1E] text-white text-sm px-6 py-2 rounded-lg hover:bg-[#A52525] transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg active:scale-95 font-medium"
                        data-original-text="Salin Kode">
                        <i class="fa-regular fa-copy text-xs"></i>
                        <span>Salin Kode</span>
                    </button>
                </div>
            </div>
            @endforeach

            @if($promos->isEmpty())
            <div class="flex flex-col items-center justify-center py-32">
                <div class="bg-white rounded-full p-6 shadow-lg mb-4">
                    <i class="fa-solid fa-heart-crack text-4xl text-red-400"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-800 mb-2">TIDAK ADA PROMO YANG TERSEDIA</h1>
                <p class="text-gray-500 text-center max-w-md">Promo menarik akan segera hadir. Pantau terus halaman ini untuk penawaran terbaru!</p>
            </div>
            @endif
        </div>
    </div>
</section>

<script>
function copyPromoCode(button, code) {
    const originalContent = button.innerHTML;

    navigator.clipboard.writeText(code).then(() => {
        // Update button state
        button.innerHTML = '<i class="fa-solid fa-check text-xs"></i><span>Berhasil!</span>';
        button.classList.add('bg-green-500', 'hover:bg-green-600');
        button.classList.remove('bg-[#8B1E1E]', 'hover:bg-[#A52525]');
        // Reset after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalContent;
            button.classList.remove('bg-green-500', 'hover:bg-green-600');
            button.classList.add('bg-[#8B1E1E]', 'hover:bg-[#A52525]');
        }, 2000);
    }).catch(() => {
        // Fallback for older browsers
        button.textContent = 'Error';
        setTimeout(() => {
            button.innerHTML = originalContent;
        }, 1500);
    });
}
</script>

@endsection
