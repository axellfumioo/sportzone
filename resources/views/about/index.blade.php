@extends('components.layout')

@section('content')

<!-- Halaman Tentang Kami SportZone -->
<div class="bg-white mt-12">
    <!-- Hero Section -->
    <section class="relative bg-[#8B1E1E] text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang SportZone</h1>
                <p class="text-xl opacity-90">Destinasi terbaik untuk pengalaman olahraga rekreasi premium di kota Anda.</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="fill-white">
                <path d="M0,32L60,48C120,64,240,96,360,96C480,96,600,64,720,48C840,32,960,32,1080,37.3C1200,43,1320,53,1380,58.7L1440,64L1440,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Cerita Kami Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Cerita Kami</h2>
                        <div class="h-1 w-20 bg-[#8B1E1E] mb-6"></div>
                        <p class="text-gray-600 mb-4">Didirikan pada tahun 2015, SportZone lahir dari kecintaan kami terhadap olahraga rekreasi dan keinginan untuk menciptakan tempat di mana semua orang dapat menikmati fasilitas olahraga premium dengan akses yang mudah.</p>
                        <p class="text-gray-600 mb-4">Dimulai dengan satu arena gokart kecil, SportZone kini telah berkembang menjadi pusat rekreasi olahraga terkemuka dengan fasilitas modern yang mencakup arena gokart, biliard profesional, dan bowling yang dirancang untuk memberikan pengalaman bermain terbaik.</p>
                        <p class="text-gray-600">Dengan lebih dari 10 tahun pengalaman, kami berkomitmen untuk terus berinovasi dan meningkatkan layanan kami agar setiap pengunjung dapat merasakan keseruan dan kegembiraan bermain di SportZone.</p>
                    </div>
                    <div class="md:w-1/2">
                        <div class="relative h-80 overflow-hidden rounded-lg shadow-xl">
                            <img src="https://images.unsplash.com/photo-1560990817-aaa93354ea9c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="SportZone Facility" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-[#8B1E1E] opacity-20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Fasilitas Kami</h2>
                <div class="h-1 w-20 bg-[#8B1E1E] mx-auto mb-12"></div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Gokart -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="h-48 relative">
                            <img src="https://plus.unsplash.com/premium_photo-1661373126081-62a7c99ee70e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Gokart Track" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-[#8B1E1E] opacity-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Arena Gokart</h3>
                            <p class="text-gray-600 mb-4">Track gokart modern dengan panjang 500m yang dirancang untuk pemula hingga profesional. Dilengkapi dengan sistem penghitung waktu digital dan kendaraan gokart berperforma tinggi.</p>
                        </div>
                    </div>

                    <!-- Biliard -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="h-48 relative">
                            <img src="https://images.unsplash.com/photo-1544281153-6603be88b354?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Billiard Tables" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-[#8B1E1E] opacity-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Ruang Biliard</h3>
                            <p class="text-gray-600 mb-4">Area biliard dengan meja standar internasional dan perlengkapan premium. Suasana nyaman dengan pencahayaan yang dirancang khusus untuk permainan biliard.</p>
                        </div>
                    </div>

                    <!-- Bowling -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="h-48 relative">
                            <img src="https://images.unsplash.com/photo-1545056453-f0359c3df6db?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Bowling Alley" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-[#8B1E1E] opacity-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Arena Bowling</h3>
                            <p class="text-gray-600 mb-4">Jalur bowling otomatis dengan sistem penilaian digital terbaru. Tersedia berbagai ukuran bola untuk anak-anak hingga dewasa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-16 bg-[#8B1E1E] text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Siap untuk Pengalaman Bermain Terbaik?</h2>
                <p class="text-lg opacity-90 mb-8">Pesan lapangan favorit Anda sekarang dan nikmati fasilitas olahraga premium kami.</p>
                <a href="/" class="bg-white text-[#8B1E1E] px-8 py-3 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 transition-colors duration-300">Pesan Sekarang</a>
            </div>
        </div>
    </section>
</div>
@endsection
