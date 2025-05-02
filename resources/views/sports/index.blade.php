@extends('components.layout')

@section('content')
<section class="bg-[#f8f6f1] pb-16 pt-32 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#8B1E1E] text-center mb-12">Temukan Arena {{$sport->sports_name}} Terbaik</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Card Start -->
            @forelse ($arenas as $arena)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <!-- Gambar -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1560990817-aaa93354ea9c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="{{ $arena->name ?? 'Go-Kart Arena' }}" class="w-full h-56 object-cover" />

                    <!-- Overlay gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

                    <!-- Badge -->
                    <div class="absolute top-3 right-2 z-10 flex gap-2 justify-end">
                        <span class="bg-white text-[#8B1E1E] text-xs font-semibold px-2 py-1 rounded-md">Indoor</span>
                    </div>

                    <!-- Info Bar -->
                    <div class="absolute bottom-0 left-0 right-0 text-white text-sm font-medium p-4 z-10">
                        <div class="flex justify-between items-center">
                            <span><i class="fas fa-user mr-1"></i>Usia 14-17</span>
                            <span><i class="fas fa-tachometer-alt mr-1"></i>>60km/h</span>
                            <span><i class="fas fa-clock mr-1"></i>{{ $arena->arena_opening_hours }} - {{ $arena->arena_closing_hours }}</span>
                        </div>
                    </div>
                </div>

                <!-- Konten -->
                <div class="p-5 space-y-2">
                    <!-- Rating -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-sm">
                            <div class="text-yellow-500">
                                @for($i = 1; $i <= 5; $i++) @if($arena->arena_rating >= $i)
                                    <i class="fas fa-star"></i>
                                    @elseif($arena->arena_rating > $i - 1)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </div>
                            <span class="text-gray-600 font-medium">{{ $arena->arena_rating }} ({{ $arena->arena_reviews }} Review)</span>
                        </div>
                        <div class="text-xs text-gray-500">{{ $arena->hashtag ?? '#GoKart' }}</div>
                    </div>

                    <!-- Nama dan Lokasi -->
                    <h3 class="text-lg font-bold text-[#8B1E1E]">{{ $arena->arena_name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $arena->arena_address }}</p>

                    <!-- Harga -->
                    <p class="text-base text-[#8B1E1E] font-bold">{{ $arena->arena_price_range ?? 'Rp85.000 - Rp150.000' }}</p>

                    <!-- Tombol -->
                    <div class="mt-4 flex gap-3">
                        <a href="/book/{{ $arena->arena_slugs }}"
                           class="flex-1 flex items-center justify-center bg-[#8B1E1E] text-white py-2 rounded-lg hover:bg-[#a12c2c] transition-colors duration-200 cursor-pointer font-semibold shadow">
                            <i class="fa-solid fa-cart-shopping text-sm mr-2"></i> Booking
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
