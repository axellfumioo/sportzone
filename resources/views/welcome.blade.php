@extends('components.layout')

@section('content')
<section class="relative bg-gray-50 overflow-hidden pt-24">
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
        <div class="absolute top-24 left-1/2 transform -translate-x-1/2 w-[90%] max-w-6xl flex justify-center gap-8 z-20">
            <!-- Gokart Card -->
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 shadow-md flex flex-col items-center w-1/3 hover:scale-105 transition-transform cursor-pointer">
            <i class="fas fa-car-side text-[#8B1E1E] text-6xl mb-4"></i>
            <h3 class="text-2xl font-bold text-[#8B1E1E] mb-2">Gokart</h3>
            <p class="text-[#2B3C59] text-center mb-4">Experience the thrill of racing on our professional track</p>
            <a href="/sports/gokart" class="bg-[#8B1E1E] text-white px-6 py-2 rounded-md shadow hover:bg-[#751818]">
                Select Gokart
            </a>
            </div>

            <!-- Billiard Card -->
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 shadow-md flex flex-col items-center w-1/3 hover:scale-105 transition-transform cursor-pointer">
            <i class="fas fa-tablets text-[#8B1E1E] text-6xl mb-4"></i>
            <h3 class="text-2xl font-bold text-[#8B1E1E] mb-2">Billiard</h3>
            <p class="text-[#2B3C59] text-center mb-4">Play on premium tables in our elegant billiard hall</p>
            <a href="/sports/billiard" class="bg-[#8B1E1E] text-white px-6 py-2 rounded-md shadow hover:bg-[#751818]">
                Select Billiard
            </a>
            </div>

            <!-- Bowling Card -->
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 shadow-md flex flex-col items-center w-1/3 hover:scale-105 transition-transform cursor-pointer">
            <i class="fas fa-bowling-ball text-[#8B1E1E] text-6xl mb-4"></i>
            <h3 class="text-2xl font-bold text-[#8B1E1E] mb-2">Bowling</h3>
            <p class="text-[#2B3C59] text-center mb-4">Strike your way through our modern bowling lanes</p>
            <a href="/sports/bowling" class="bg-[#8B1E1E] text-white px-6 py-2 rounded-md shadow hover:bg-[#751818]">
                Select Bowling
            </a>
            </div>
        </div>

    </div>
</section>

@endsection
