@extends('components.layout')

@section('content')
<section class="relative bg-[#f8f6f1] overflow-hidden pt-24">
    <!-- Heading -->
    <div class="pt-8 pb-8 text-center">
        <h1 class="text-5xl font-extrabold text-[#8B1E1E] leading-tight tracking-wide">
            Luxury Sports<br />Spaces Reserved
        </h1>
    </div>

    <!-- Teks 'anjay' di batas putih dan gambar -->
    <div class="w-full flex justify-center z-20 relative">
        <div class="bg-[#2B3C59] border-2 border-[#f8f6f1] text-white font-bold px-6 py-1 rounded-full shadow text-base -mb-5 z-30">
            Let's performance battle!
        </div>
    </div>

    <!-- Hero Gambar -->
    <div class="relative h-[450px] mt-[px] z-10">
        <img src="{{asset('img/bg.png')}}" alt="Hero" class="absolute bottom-0 w-full h-full object-cover object-bottom" />

        <!-- Glass Panel -->
        <div class="absolute top-38 left-1/2 transform -translate-x-1/2 w-[90%] max-w-6xl bg-white/70 backdrop-blur-md rounded-2xl p-8 shadow-md z-20">
            <!-- Tabs -->
            <div class="flex space-x-6 mb-6 text-base font-semibold">
                <button class="px-6 py-2 border rounded-full border-[#8B1E1E] text-[#8B1E1E] bg-white shadow-sm">Gokart</button>
                <button class="px-6 py-2 text-[#2B3C59]">Billiard</button>
                <button class="px-6 py-2 text-[#2B3C59]">Bowling</button>
            </div>

            <!-- Input -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="relative">
                    <input type="hidden" name="selected_gokart" id="selected_gokart" value="">
                    <button onclick="toggleDropdown()" class="px-6 py-3 rounded-md border border-gray-400 w-full text-lg text-left flex justify-between items-center">
                        <span id="gokart_display">Select Gokart</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown" class="hidden absolute z-50 w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg">
                        <a href="#" onclick="selectGokart('Gokart Type A')" class="block px-6 py-2 hover:bg-gray-100">Gokart Type A</a>
                        <a href="#" onclick="selectGokart('Gokart Type B')" class="block px-6 py-2 hover:bg-gray-100">Gokart Type B</a>
                        <a href="#" onclick="selectGokart('Gokart Type C')" class="block px-6 py-2 hover:bg-gray-100">Gokart Type C</a>
                    </div>
                </div>
                <input type="text" class="px-6 py-3 rounded-md border border-gray-400 w-full text-lg" />
                <input type="text" class="px-6 py-3 rounded-md border border-gray-400 w-full text-lg" />
            </div>

            <!-- Tombol -->
            <div class="text-right">
                <button class="bg-[#8B1E1E] text-white px-8 py-3 rounded-md shadow hover:bg-[#751818]">
                    Continue <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

    </div>
</section>
<script>
    function toggleDropdown() {
        document.getElementById('dropdown').classList.toggle('hidden');
    }

    function selectGokart(type) {
        document.getElementById('selected_gokart').value = type;
        document.getElementById('gokart_display').textContent = type;
        document.getElementById('dropdown').classList.add('hidden');
    }

    window.onclick = function(event) {
        if (!event.target.closest('button')) {
            document.getElementById('dropdown').classList.add('hidden');
        }
    }

</script>

@endsection
