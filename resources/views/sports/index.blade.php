@extends('components.layout')

@section('content')
<section class="bg-gray-50 pt-32 pb-20 px-4 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Enhanced Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-4 py-2 bg-[#8B1E1E]/10 rounded-full mb-6">
                <i class="fas fa-trophy text-[#8B1E1E] mr-2"></i>
                <span class="text-[#8B1E1E] font-medium text-sm">Premium Arena Collection</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-[#8B1E1E] mb-4">
                Temukan Arena <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#8B1E1E] to-[#a12c2c]">{{ $sport->sports_name }}</span> Terbaik
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Pilih dari koleksi arena premium kami dengan fasilitas terbaik dan pengalaman yang tak terlupakan
            </p>

            <div class="mt-8 mb-12">
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">

                        <!-- Search Input -->
                        <div class="flex w-full md:flex-1 items-center bg-gray-50 border border-gray-200 rounded-xl px-4 py-2">
                            <i class="fas fa-search text-gray-400 mr-2"></i>
                            <input type="text" placeholder="Cari arena gokart..." id="searchInput" class="w-full bg-transparent focus:outline-none placeholder:text-gray-400" />
                        </div>

                        <!-- Filter Kota -->
                        <div class="relative w-full md:w-48">
                            <button id="dropdownCityBtn" type="button" class="flex justify-between items-center w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                                <span id="dropdownCityLabel" class="text-gray-500">Pilih Kota</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul id="dropdownCityMenu" class="absolute z-20 hidden w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-md text-sm">
                                <li data-value="" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Semua Kota</li>
                                <li data-value="jakarta" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Jakarta</li>
                                <li data-value="bandung" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Bandung</li>
                                <li data-value="surabaya" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Surabaya</li>
                            </ul>
                            <input type="hidden" id="selectedCityInput" name="selectedCity" />
                        </div>

                        <!-- Filter Harga -->
                        <div class="relative w-full md:w-48">
                            <button id="dropdownPriceBtn" type="button" class="flex justify-between items-center w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                                <span id="dropdownPriceLabel" class="text-gray-500">Pilih Harga</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul id="dropdownPriceMenu" class="absolute z-20 hidden w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-md text-sm">
                                <li data-value="" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Semua Harga</li>
                                <li data-value="low" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Di bawah Rp 100k</li>
                                <li data-value="mid" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Rp 100k - Rp 250k</li>
                                <li data-value="high" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Di atas Rp 250k</li>
                            </ul>
                            <input type="hidden" id="selectedPriceInput" name="selectedPrice" />
                        </div>

                        <!-- 🎯 Tombol Cari -->
                        <button id="searchBtn" class="w-full md:w-auto px-6 py-2 bg-gradient-to-tr from-[#9E1D1D] to-[#C82828] text-white rounded-xl hover:opacity-90 transition text-sm font-semibold shadow-md">
                            Cari Arena
                        </button>

                    </div>
                </div>
            </div>

            <!-- JS for Dropdowns and Search -->
            <script>
                const handleDropdown = (btnId, menuId, labelId, inputId) => {
                    const btn = document.getElementById(btnId);
                    const menu = document.getElementById(menuId);
                    const label = document.getElementById(labelId);
                    const input = document.getElementById(inputId);

                    btn.addEventListener("click", () => {
                        menu.classList.toggle("hidden");
                    });

                    menu.querySelectorAll("li").forEach((item) => {
                        item.addEventListener("click", () => {
                            const value = item.getAttribute("data-value");
                            const text = item.textContent;

                            label.textContent = text;
                            input.value = value;
                            menu.classList.add("hidden");
                        });
                    });

                    document.addEventListener("click", (e) => {
                        if (!btn.contains(e.target) && !menu.contains(e.target)) {
                            menu.classList.add("hidden");
                        }
                    });
                };

                handleDropdown("dropdownCityBtn", "dropdownCityMenu", "dropdownCityLabel", "selectedCityInput");
                handleDropdown("dropdownPriceBtn", "dropdownPriceMenu", "dropdownPriceLabel", "selectedPriceInput");

                // Search Button Action
                document.getElementById("searchBtn").addEventListener("click", () => {
                    const keyword = document.getElementById("searchInput").value;
                    const city = document.getElementById("selectedCityInput").value;
                    const price = document.getElementById("selectedPriceInput").value;

                    console.log("Search Keyword:", keyword);
                    console.log("Selected City:", city);
                    console.log("Selected Price:", price);

                    // TODO: Lanjutkan dengan filtering data atau kirim ke backend
                });

            </script>

            <!-- Grid Arena -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($arenas as $arena)
                <div class="group rounded-3xl overflow-hidden shadow-xl transition-all duration-500 transform hover:-translate-y-1 bg-white border border-gray-200">
                    <!-- Gambar Arena -->
                    <div class="relative">
                        <img src="/storage/{{ $arena->arena_background }}" alt="{{ $arena->arena_name }}" loading="lazy" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-white text-[#8B1E1E] text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                {{ $arena->arena_track }}
                            </span>
                        </div>
                        <div class="absolute bottom-0 p-4 z-10 text-white text-xs flex flex-wrap gap-2">
                            @if($arena->sports_list_id == 2)
                            <div class="bg-white/20 px-2 py-1 rounded-full backdrop-blur-sm flex items-center">
                                <i class="fas fa-user mr-1"></i> 14-17 Tahun
                            </div>
                            <div class="bg-white/20 px-2 py-1 rounded-full backdrop-blur-sm flex items-center">
                                <i class="fas fa-tachometer-alt mr-1"></i> >60km/h
                            </div>
                            @endif
                            <div class="bg-white/20 px-2 py-1 rounded-full backdrop-blur-sm flex items-center">
                                <i class="fas fa-clock mr-1"></i> {{ $arena->arena_opening_hours }} - {{ $arena->arena_closing_hours }}
                            </div>
                        </div>
                    </div>

                    <!-- Konten -->
                    <div class="p-6 space-y-4">
                        <!-- Rating & Favorite -->
                        <div class="space-y-4">
                            <!-- Arena Info - Moved to top -->
                            <div class="space-y-2">
                                <h2 class="text-xl font-bold text-left text-[#8B1E1E] transition-colors duration-200">
                                    {{ $arena->arena_name }}
                                </h2>
                                <p class="flex items-start text-sm text-gray-600">
                                    <i class="fas fa-map-marker-alt text-[#8B1E1E] mt-1 mr-2"></i>
                                    <span class="line-clamp-2">{{ $arena->arena_address }}</span>
                                </p>
                            </div>

                            <!-- Rating & Reviews -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($arena->arena_rating >= $i)
                                                <i class="fas fa-star"></i>
                                            @elseif($arena->arena_rating > $i - 1)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-sm font-medium text-gray-600">
                                        {{ number_format($arena->arena_rating, 1) }} ({{ $arena->arena_reviews }})
                                    </span>
                                </div>
                                <button class="w-10 h-10 rounded-full hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                                    <i class="far fa-heart text-gray-400 hover:text-red-500 transition-colors duration-200"></i>
                                </button>
                            </div>

                            <!-- Pricing -->
                            <div class="bg-gray-50 rounded-xl p-4 flex justify-between items-center">
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-[#8B1E1E] mr-2"></i>
                                    <span class="font-semibold text-gray-800">
                                        {{ $arena->arena_price_range ?? 'Rp85.000 - Rp150.000' }}
                                    </span>
                                </div>
                                <span class="text-xs text-gray-500 bg-white px-2 py-1 rounded-full">per jam</span>
                            </div>
                        </div>

                        <!-- Tombol Booking -->
                        <a href="/book/{{ $arena->arena_slugs }}" class="block w-full bg-[#8B1E1E] text-white text-center py-3 rounded-xl font-semibold hover:bg-[#a12c2c] transition-all">
                            <i class="fas fa-cart-shopping mr-2"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fa-solid fa-heart-crack text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">Belum Ada Arena Tersedia</h3>
                        <p class="text-gray-500 mb-6">Mungkin belum ada arena dengan kriteria yang kamu cari. Coba ubah filter atau nanti lagi ya.</p>
                        <button class="bg-[#8B1E1E] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#a12c2c] transition-colors duration-200 transform hover:scale-105">
                            <i class="fas fa-bell mr-2 animate-pulse"></i>
                            Beritahu Saya
                        </button>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Additional Features Section -->
        <div class="mt-16 text-center">
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                <h3 class="text-2xl font-bold text-[#8B1E1E] mb-4">Kenapa Memilih Arena Kami?</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-[#8B1E1E]/10 rounded-full flex items-center justify-center py-1 px-5 mb-4">
                            <i class="fas fa-shield-alt text-[#8B1E1E] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Keamanan Terjamin</h4>
                        <p class="text-gray-600 text-sm">Fasilitas dengan standar keamanan internasional</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-[#8B1E1E]/10 rounded-full flex items-center justify-center py-1 px-5 mb-4">
                            <i class="fas fa-star text-[#8B1E1E] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Kualitas Premium</h4>
                        <p class="text-gray-600 text-sm">Arena dengan peralatan dan fasilitas terbaik</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-[#8B1E1E]/10 rounded-full flex items-center justify-center py-1 px-5 mb-4">
                            <i class="fas fa-headset text-[#8B1E1E] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Support 24/7</h4>
                        <p class="text-gray-600 text-sm">Layanan pelanggan siap membantu kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
