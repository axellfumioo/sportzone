@extends('components.layout')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-[#f8f6f1]">
    <!-- Left Side -->
    <div class="md:w-1/2 hidden md:flex items-center justify-center bg-[#0a0a0a] relative">
        <img src="https://images.unsplash.com/photo-1544824158-f13eb5211474?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3" class="absolute w-full h-full object-cover opacity-40" alt="background">
        <div class="relative z-10 text-center px-10 text-white">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-xl">Yuk Gabung!</h1>
            <p class="text-lg text-gray-200">Gabung untuk menikmati promo yang tersedia 🎳</p>
        </div>
    </div>

    <!-- Right Form Section -->
    <div class="w-full md:w-1/2 flex items-center justify-center pb-10 pt-16 px-6 bg-[#f8f6f1]">
        <form action="/auth/register" method="POST" class="w-full max-w-xl space-y-6">
            @csrf

            <h2 class="text-4xl font-extrabold text-[#8B1E1E] text-center">Buat Akun 🚀</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-1 text-sm font-semibold text-[#1E4067]">Nama Depan</label>
                    <input type="text" id="name" name="name" placeholder="Axel Zuckerberg" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" />
                </div>
                <div>
                    <label for="phone" class="block mb-1 text-sm font-semibold text-[#1E4067]">Nomor Telepon</label>
                    <input type="number" id="phone" name="phone" placeholder="081323232879" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" />
                </div>
            </div>

            <div>
                <label for="email" class="block mb-1 text-sm font-semibold text-[#1E4067]">Email</label>
                <input type="email" id="email" name="email" placeholder="kamu@email.com" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block mb-1 text-sm font-semibold text-[#1E4067]">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" />
                </div>
                <div>
                    <label for="confirm_password" class="block mb-1 text-sm font-semibold text-[#1E4067]">Konfirmasi</label>
                    <input type="password" id="confirm_password" name="password_confirmation" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" />
                </div>
            </div>

            <button type="submit" class="w-full bg-[#8B1E1E] text-white font-semibold py-3 rounded-lg hover:bg-[#C5383C] transition duration-300">
                Daftar Sekarang
            </button>

            <p class="text-center text-sm text-gray-600">
                Sudah punya akun? <a href="/auth/login" class="text-[#C5383C] hover:underline font-medium">Login di sini</a>
            </p>
        </form>
    </div>
</div>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
@endsection
