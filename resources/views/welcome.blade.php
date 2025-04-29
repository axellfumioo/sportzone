<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c1cbeb7f83.js" crossorigin="anonymous"></script>
    <title>Sportzone - Book your own field</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <div class="bg-gray-300">
        @include('components.layout.navbar')
        <section class="bg-[#F4F4F5]">
            <!-- Slideshow -->
            <div class="grid grid-cols-3 overflow-hidden">
                <div class="h-64">
                    <img src="https://images.unsplash.com/photo-1692153142537-58f4e9d00cfa?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Gokart" class="w-full h-full object-cover">
                </div>
                <div class="h-64">
                    <img src="https://plus.unsplash.com/premium_photo-1679321795564-f73ec1c21fcd?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Golf" class="w-full h-full object-cover">
                </div>
                <div class="h-64">
                    <img src="https://images.unsplash.com/photo-1640084347692-e8f6b84caa7c?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Futsal" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Hero Card -->
            <div class="bg-[#ffffff] relative text-white rounded-t-[50px] px-6 py-8 space-y-6 w-full mx-auto mt-[-100px]">

                <!-- Greeting -->
                <div class="text-center">
                    <p class="text-4xl font-bold text-gray-900">Welcome to SportZone</p>
                    <p class="text-xl text-gray-800">Ayo mulai reservasi sekarang!</p>
                </div>
                <div class="max-w-6xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-3 items-center">
                        <!-- Search Input -->
                        <div class="flex-1 w-full md:w-auto">
                            <div class="relative rounded-lg border border-gray-300 bg-white flex items-center p-2">
                                <svg class="h-5 w-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" placeholder="Venue" class="w-full p-2 outline-none text-gray-700 placeholder-gray-500">
                            </div>
                        </div>

                        <!-- City Selector -->
                        <div class="flex-1 w-full md:w-auto">
                            <div class="relative rounded-lg border border-gray-300 bg-white flex items-center p-2">
                                <svg class="h-5 w-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input type="text" placeholder="Pilih Kota" class="w-full p-2 outline-none text-gray-700 placeholder-gray-500">
                            </div>
                        </div>

                        <!-- Sport Type Selector -->
                        <div class="flex-1 w-full md:w-auto">
                            <div class="relative rounded-lg border border-gray-300 bg-white flex items-center p-2">
                                <svg class="h-5 w-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                                <input type="text" placeholder="Pilih Cabang Olahraga" class="w-full p-2 outline-none text-gray-700 placeholder-gray-500">
                            </div>
                        </div>

                        <!-- Filter Button -->
                        <div class="w-full md:w-auto">
                            <button class="w-full md:w-auto p-3 border border-gray-300 bg-gray-100 text-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Search Button -->
                        <div class="w-full md:w-auto">
                            <button class="w-full md:w-auto bg-slate-900 hover:bg-slate-700 text-white font-medium py-3 px-6 rounded-lg transition duration-200">
                                Cari venue
                            </button>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto px-4 py-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        <!-- Venue 1 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="ASATU ARENA CIKINI" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">ASATU ARENA CIKINI</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Jakarta Pusat</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">1 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 1,500,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 2 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="ALA.PANG.AN Permata Hijau" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">ALA.PANG.AN Permata Hijau</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Jakarta Selatan</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">1 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 1,050,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 3 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="T Arena" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">T Arena</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Jakarta Selatan</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">1 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 1,100,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 4 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="BAIS Soccer Field" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">BAIS Soccer Field</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Bandung</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">3 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 600,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 5 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="Bandung Elektrik Cigereleng Tennis Court" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">Bandung Elektrik Cigereleng Tennis Court</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Bandung</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">2 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 125,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 6 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="Arsa Sport Mini Soccer" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">Arsa Sport Mini Soccer</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Tangerang Selatan</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">1 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 1,000,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 7 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="Respect Basketball Arena" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">Respect Basketball Arena</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Tangerang Selatan</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">1 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 550,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue 8 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <div class="relative h-48">
                                <img src="/api/placeholder/280/200" alt="Skyline Court" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800">Skyline Court</h3>
                                <div class="flex items-center text-sm text-gray-600 mt-1">
                                    <span>Tangerang Selatan</span>
                                    <span class="mx-1">•</span>
                                    <span class="text-orange-500">3 Lapangan</span>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Harga mulai </span>
                                    <span class="font-medium text-gray-800">Rp 200,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sport Category Selection Section -->
                <div class="py-12 bg-white">
                    <div class="container mx-auto px-4">
                        <!-- Section Heading -->
                        <div class="text-center mb-10">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Mengapa memilih kami?</h2>
                            <p class="text-gray-600">Statistik lapangan kami</p>
                        </div>

                        <!-- Category Cards -->
                        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-4">
                            <!-- Football Category -->
                            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 640 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path d="M5.1 9.2C13.3-1.2 28.4-3.1 38.8 5.1l592 464c10.4 8.2 12.3 23.3 4.1 33.7s-23.3 12.3-33.7 4.1L9.2 42.9C-1.2 34.7-3.1 19.6 5.1 9.2z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-800">Billiard</h3>
                                <p class="text-gray-600">100+ Tempat</p>
                            </div>
                            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM240 80a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM208 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm-64-64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-800">Bowling</h3>
                                <p class="text-gray-600">200+ Arena</p>
                            </div>
                            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 640 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path d="M176 8c-6.6 0-12.4 4-14.9 10.1l-29.4 74L55.6 68.9c-6.3-1.9-13.1 .2-17.2 5.3s-4.6 12.2-1.4 17.9l39.5 69.1L10.9 206.4c-5.4 3.7-8 10.3-6.5 16.7s6.7 11.2 13.1 12.2l78.7 12.2L90.6 327c-.5 6.5 3.1 12.7 9 15.5s12.9 1.8 17.8-2.6l35.3-32.5 9.5-35.4 10.4-38.6c8-29.9 30.5-52.1 57.9-60.9l41-59.2c11.3-16.3 26.4-28.9 43.5-37.2c-.4-.6-.8-1.2-1.3-1.8c-4.1-5.1-10.9-7.2-17.2-5.3L220.3 92.1l-29.4-74C188.4 12 182.6 8 176 8zM367.7 161.5l135.6 36.3c6.5 1.8 11.3 7.4 11.8 14.2l4.6 56.5-201.5-54 32.2-46.6c3.8-5.6 10.8-8.1 17.3-6.4zm-69.9-30l-47.9 69.3c-21.6 3-40.3 18.6-46.3 41l-10.4 38.6-16.6 61.8-8.3 30.9c-4.6 17.1 5.6 34.6 22.6 39.2l15.5 4.1c17.1 4.6 34.6-5.6 39.2-22.6l8.3-30.9 247.3 66.3-8.3 30.9c-4.6 17.1 5.6 34.6 22.6 39.2l15.5 4.1c17.1 4.6 34.6-5.6 39.2-22.6l8.3-30.9L595 388l10.4-38.6c6-22.4-2.5-45.2-19.6-58.7l-6.8-84c-2.7-33.7-26.4-62-59-70.8L384.2 99.7c-32.7-8.8-67.3 4-86.5 31.8zm-17 131a24 24 0 1 1 -12.4 46.4 24 24 0 1 1 12.4-46.4zm217.9 83.2A24 24 0 1 1 545 358.1a24 24 0 1 1 -46.4-12.4z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-800">Go-Kart</h3>
                                <p class="text-gray-600">25+ Sirkuit</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-24 py-8">
                    <div class="w-full rounded-3xl bg-gradient-to-r from-slate-900 to-slate-700 text-white p-6 md:p-8 shadow-xl relative overflow-hidden">
                        <!-- Background decorative elements -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mt-10 -mr-10"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -mb-8 -ml-8"></div>

                        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between">
                            <!-- Left content -->
                            <div class="mb-6 md:mb-0">
                                <h2 class="text-xl md:text-3xl font-bold mb-2">
                                    <span>Undang Teman</span>
                                    <span class="font-normal"> untuk bergabung dengan</span>
                                </h2>
                                <h1 class="text-2xl md:text-4xl font-extrabold mb-4">SportZone</h1>

                                <div class="flex items-baseline items-end">
                                    <div>
                                        <span class="text-xl md:text-2xl font-bold">Dapatkan</span>
                                        <br>
                                        <span class="text-base md:text-lg">Keuntungan Hingga</span>
                                    </div>
                                    <div class="ml-3 md:ml-4">
                                        <span class="text-5xl md:text-7xl font-extrabold">75</span>
                                        <span class="text-xl">ribu</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right content (CTA) -->
                            <div class="flex flex-col items-start md:items-center">
                                <button class="bg-white text-slate-900 hover:bg-slate-100 transition-colors duration-300 font-bold py-3 px-6 rounded-full shadow-lg transform hover:-translate-y-1 hover:shadow-xl">
                                    Ajak Sekarang
                                </button>
                                <span class="text-slate-300 mt-2 text-sm">*Syarat & ketentuan berlaku</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('components.layout.footer')

    </div>
    <script src="https://kit.fontawesome.com/c1cbeb7f83.js" crossorigin="anonymous"></script>
</body>
</html>
