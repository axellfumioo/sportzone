@extends('components.layout')

@section('content')
<section class="bg-gradient-to-b from-white to-[#f8f6f1] py-16 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Banner Section with Image Background -->
        <div class="relative w-full rounded-2xl overflow-hidden shadow-xl bg-[#8B1E1E] my-10">
            <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
            <div class="absolute top-0 right-0 m-4 z-20">
                <span class="bg-white text-[#8B1E1E] px-3 py-1 rounded-full text-sm font-bold flex items-center">
                    <i class="fas fa-clock mr-1 my-auto"></i>
                    {{$arenas->arena_opening_hours}} - {{$arenas->arena_closing_hours}}
                </span>
            </div>
            <img src="/storage/{{$arenas->arena_background}}" alt="Go-kart track" class="w-full h-64 object-cover" />
            <div class="absolute bottom-0 left-0 right-0 p-8 z-20">
                <div class="max-w-5xl mx-auto">
                    <div class="flex items-center mb-2">
                        @if($arenas->arena_reviews > 10)
                        <span class="bg-yellow-400 text-yellow-800 text-xs font-bold px-2 py-1 rounded mr-2">BESTSELLER</span>
                        @endif
                        <div class="flex items-center text-yellow-400">
                            @for($i = 1; $i <= 5; $i++) @if($arenas->arena_rating >= $i)
                                <i class="fas fa-star"></i>
                                @elseif($arenas->arena_rating > $i - 1)
                                <i class="fas fa-star-half-alt"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor
                                <span class="ml-1 text-white font-medium">{{$arenas->arena_rating}}</span>
                                <span class="ml-1 text-white opacity-80">({{$arenas->arena_reviews}} Reviews)</span>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">{{$arenas->arena_name}}</h1>
                    <p class="text-lg text-white opacity-90 mb-3">{{$arenas->arena_description}}</p>
                    <div class="flex flex-wrap items-center gap-4 text-white">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>{{$arenas->arena_address}}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($arenas->sports_list_id == "1")
                            <span>Durasi: 1 jam</span>
                            @elseif($arenas->sports_list_id == "2")
                            <span>Durasi: 15 menit</span>
                            @else
                            <span>Durasi: 30 menit</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Info Box -->
                <div class="bg-white p-6 rounded-2xl shadow-md space-y-4">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center">
                        <i class="fas fa-info-circle text-[#8B1E1E] w-5 h-5 mr-2 my-auto"></i>
                        Informasi Tiket
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl">
                            <svg class="w-8 h-8 text-[#8B1E1E] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                            <p class="text-center text-sm font-medium">Tidak bisa refund</p>
                        </div>
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl">
                            <svg class="w-8 h-8 text-[#8B1E1E] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-center text-sm font-medium">Tidak dapat reschedule</p>
                        </div>
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl">
                            <svg class="w-8 h-8 text-[#8B1E1E] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-center text-sm font-medium">Berlaku sesuai tanggal & jam</p>
                        </div>
                    </div>

                    <div class="flex items-center bg-yellow-50 border border-yellow-200 p-4 rounded-xl">
                        <svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-700 font-bold">Masa berlaku pada tanggal yang dipilih</span></p>
                            <p class="text-xs text-gray-500 mt-1">Tiket harus digunakan pada tanggal yang telah ditentukan.</p>
                        </div>
                    </div>
                </div>
                <form action="/order/save" method="POST">
                        @csrf
                        <input required type="hidden" name="arena_id" id="arena_id" value="{{$arenas->id}}">
                    @if($arenas->sports_list_id == 2)
                    <!-- Difficulty Box -->
                    <div class="bg-white p-6 rounded-2xl shadow-md mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center mb-5">
                            <i class="fa-solid fa-shield-halved w-5 h-5 mr-2 text-[#8B1E1E]"></i>
                            Pilih Difficulty
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="relative">
                                <input type="radio" id="easy" name="difficulty" value="easy" class="sr-only peer" checked>
                                <label for="easy" class="flex flex-col items-center p-5 rounded-xl border-2 border-gray-200 cursor-pointer hover:border-[#8B1E1E] peer-checked:border-[#8B1E1E] peer-checked:bg-[#fef2f2] transition">
                                    <div class="rounded-full bg-green-100 p-2 mb-2">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Easy</span>
                                    <span class="text-xs text-gray-500 mt-1">Pemula</span>
                                </label>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition">
                                    <svg class="w-5 h-5 text-[#8B1E1E]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="radio" id="medium" name="difficulty" value="medium" class="sr-only peer">
                                <label for="medium" class="flex flex-col items-center p-5 rounded-xl border-2 border-gray-200 cursor-pointer hover:border-[#8B1E1E] peer-checked:border-[#8B1E1E] peer-checked:bg-[#fef2f2] transition">
                                    <div class="rounded-full bg-yellow-100 p-2 mb-2">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Medium</span>
                                    <span class="text-xs text-gray-500 mt-1">Menengah</span>
                                </label>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition">
                                    <svg class="w-5 h-5 text-[#8B1E1E]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="radio" id="hard" name="difficulty" value="hard" class="sr-only peer">
                                <label for="hard" class="flex flex-col items-center p-5 rounded-xl border-2 border-gray-200 cursor-pointer hover:border-[#8B1E1E] peer-checked:border-[#8B1E1E] peer-checked:bg-[#fef2f2] transition">
                                    <div class="rounded-full bg-red-100 p-2 mb-2">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Hard</span>
                                    <span class="text-xs text-gray-500 mt-1">Profesional</span>
                                </label>
                                <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition">
                                    <svg class="w-5 h-5 text-[#8B1E1E]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Features Box -->
                    <div class="bg-white p-6 rounded-2xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center mb-5">
                            <i class="fas fa-check w-5 h-5 mr-2 text-[#8B1E1E]"></i>
                            Yang Kamu Dapatkan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($arenas->sports_list_id == 1)
                            <!-- Billiard Features -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Meja billiard standar internasional</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Set peralatan billiard lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Ruangan ber-AC</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Area duduk nyaman</p>
                                </div>
                            </div>

                            @elseif($arenas->sports_list_id == 2)
                            <!-- Go-Kart Features -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Go-kart bertenaga listrik/bensin</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Peralatan keselamatan lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Instruktur profesional</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Foto digital laptime</p>
                                </div>
                            </div>

                            @else
                            <!-- Bowling Features -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Jalur bowling standar</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Sepatu bowling</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Bola bowling berbagai ukuran</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-5 w-5 relative mt-1">
                                    <i class="fas fa-check-circle absolute w-5 h-5 mr-2 text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">Sistem skor otomatis</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>

            <!-- Right Column - Booking Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-2xl shadow-md sticky top-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-5">Ringkasan Pesanan</h3>

                    <!-- Date Picker -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Tanggal</label>
                        <div class="relative">
                            <input required type="date" name="selected_date"
                                class="block w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-700 focus:border-[#8B1E1E] focus:ring-[#8B1E1E] focus:outline-none appearance-none"
                                style="-webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                min="<?php echo date('Y-m-d'); ?>"
                            >
                        </div>
                    </div>

                    <!-- Session Time -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Sesi</label>
                        <div class="grid grid-cols-3 gap-2" id="session-time-group">
                            <input required type="hidden" id="selected_time" name="selected_time" value="">
                            @php
                                $currentTime = \Carbon\Carbon::now('Asia/Jakarta');
                            @endphp

                            @php
                                $opening = \Carbon\Carbon::createFromFormat('H:i', $arenas->arena_opening_hours);
                                $closing = \Carbon\Carbon::createFromFormat('H:i', $arenas->arena_closing_hours);
                                $times = [];
                                while ($opening <= $closing) {
                                    $times[] = $opening->format('H:i');
                                    $opening->addHour();
                                }
                            @endphp
                            @foreach($times as $time)
                                @php
                                    $buttonTime = \Carbon\Carbon::createFromFormat('H:i', $time);
                                    $isDisabled = $currentTime->format('H:i') > $time;
                                @endphp
                                <button type="button"
                                        data-time="{{ $time }}"
                                        class="session-button py-2 px-1 border rounded-lg text-xs font-medium
                                               {{ $isDisabled ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'border-gray-200 text-gray-800 hover:border-[#8B1E1E] hover:bg-[#fef2f2]' }}
                                               focus:outline-none focus:ring-2 focus:ring-[#8B1E1E] focus:border-[#8B1E1E]"
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                    {{ $time }}
                                </button>
                            @endforeach
                        </div>

                        <!-- Ticket Counter -->
                        <div class="mb-6 mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Tiket</label>
                            <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg">
                                <div>
                                    <p class="font-semibold">Per Pax</p>
                                    <p class="text-sm text-gray-500">IDR <span id="harga-satuan">{{number_format($arenas->arena_price, 0, ',', '.')}}</span>/pax</p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <button type="button" id="kurangi" class="w-8 h-8 flex justify-center items-center rounded-full border border-[#8B1E1E] text-[#8B1E1E]
               transition duration-200 ease-in-out transform hover:scale-110 hover:shadow-md active:scale-95 active:shadow-inner">
                                        -
                                    </button>

                                    <span id="jumlah" class="text-lg font-semibold">1</span>

                                    <button type="button" id="tambah" class="w-8 h-8 flex justify-center items-center rounded-full border border-[#8B1E1E] text-[#8B1E1E]
               transition duration-200 ease-in-out transform hover:scale-110 hover:shadow-md active:scale-95 active:shadow-inner">
                                        +
                                    </button>
                                </div>

                            </div>

                            <!-- Ringkasan Harga -->
                            <div class="space-y-3 mb-6 text-sm mt-4">
                                <div class="flex justify-between">
                                    <span>Harga Tiket (x)</span>
                                    <span>IDR <span id="harga-tiket">{{number_format($arenas->arena_price, 0, ',', '.')}}</span></span>
                                </div>
                                <div class="border-t border-gray-200 pt-3 mt-3 flex justify-between font-semibold">
                                    <span>Total Pembayaran</span>
                                    <span class="text-[#8B1E1E] font-bold">IDR <span id="total-price">{{number_format($arenas->arena_price, 0, ',', '.')}}</span></span>
                                </div>
                            </div>

                            <!-- Input hidden jika ingin dikirim ke backend -->
                            <input required type="hidden" name="jumlah_tiket" id="input-jumlah" value="1">

                            <!-- Promo Code -->
                            {{-- <div class="mb-6">
                                <div class="flex">
                                    <input type="text" placeholder="Kode Promo" class="flex-grow rounded-l-lg border border-gray-300 px-4 py-3 text-gray-700 focus:border-[#8B1E1E] focus:ring-[#8B1E1E] focus:outline-none">
                                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-r-lg border border-gray-300 border-l-0 transition">
                                        Pakai
                                    </button>
                                </div>
                            </div> --}}

                            <!-- Submit Button -->
                            @auth
                                <button type="submit" class="w-full bg-[#8B1E1E] hover:bg-[#701515] text-white py-4 px-6 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    Lanjut ke Pembayaran
                                </button>
                            @else
                                <a href="/auth/login" class="w-full bg-[#8B1E1E] hover:bg-[#701515] text-white py-4 px-6 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    Login untuk Melanjutkan
                                </a>
                            @endauth
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const sessionButtons = document.querySelectorAll('.session-button');
                    const selectedTimeInput = document.getElementById('selected_time');

                    if (!selectedTimeInput) {
                        console.warn('Element with id "selected_time" not found');
                        return;
                    }

                    sessionButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();

                            // Remove active state from all buttons
                            sessionButtons.forEach(btn => {
                                btn.classList.remove('border-[#8B1E1E]', 'bg-[#fef2f2]', 'text-[#8B1E1E]');
                                btn.classList.add('border-gray-200', 'text-gray-800');
                            });

                            // Add active state to clicked button
                            this.classList.remove('border-gray-200', 'text-gray-800');
                            this.classList.add('border-[#8B1E1E]', 'bg-[#fef2f2]', 'text-[#8B1E1E]');

                            // Set the selected time to hidden input
                            const selectedTime = this.getAttribute('data-time');
                            selectedTimeInput.value = selectedTime;
                        });
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // === Highlight Session Time ===
                    const buttons = document.querySelectorAll('.session-button');
                    const hiddenInput = document.getElementById('selected-time') || document.createElement('input');

                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            buttons.forEach(b => {
                                b.classList.remove('border-[#8B1E1E]', 'bg-[#fef2f2]', 'text-[#8B1E1E]');
                                b.classList.add('border-gray-200', 'text-gray-800');
                            });

                            button.classList.remove('border-gray-200', 'text-gray-800');
                            button.classList.add('border-[#8B1E1E]', 'bg-[#fef2f2]', 'text-[#8B1E1E]');

                            hiddenInput.value = button.getAttribute('data-time');
                        });
                    });

                    // === Hitung Total Harga Dinamis ===
                    const hargaSatuan = {{$arenas->arena_price}};

                    const btnTambah = document.getElementById('tambah');
                    const btnKurangi = document.getElementById('kurangi');
                    const jumlahTiketEl = document.getElementById('jumlah');
                    const hargaTiketEl = document.getElementById('harga-tiket');
                    const pajakEl = document.getElementById('pajak');
                    const totalEl = document.getElementById('total-price');

                    const inputJumlah = document.getElementById('input-jumlah');
                    const inputTotal = document.getElementById('input-total');

                    let jumlah = parseInt(inputJumlah.value) || 1;

                    function updateHarga() {
                        const hargaTiket = hargaSatuan * jumlah;
                        const total = hargaTiket;

                        jumlahTiketEl.textContent = jumlah;
                        hargaTiketEl.textContent = new Intl.NumberFormat('id-ID').format(hargaTiket);
                        totalEl.textContent = new Intl.NumberFormat('id-ID').format(total);

                        inputJumlah.value = jumlah;
                    }

                    btnTambah.addEventListener('click', () => {
                        jumlah++;
                        updateHarga();
                    });

                    btnKurangi.addEventListener('click', () => {
                        if (jumlah > 1) {
                            jumlah--;
                            updateHarga();
                        }
                    });

                    updateHarga(); // inisialisasi
                });

            </script>

</section>
