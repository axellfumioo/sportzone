@extends('components.layout')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-[#f8f6f1]">

    <!-- Left Side -->
    <div class="md:w-1/2 hidden md:flex items-center justify-center bg-[#0a0a0a] relative">
        <img src="https://images.unsplash.com/photo-1544824158-f13eb5211474?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3"
             class="absolute w-full h-full object-cover opacity-40" alt="background">
        <div class="relative z-10 text-center px-10 text-white">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-xl">Selamat Datang Kembali!</h1>
            <p class="text-lg text-gray-200">Masuk untuk memesan tiket 🏎️</p>
        </div>
    </div>

    <!-- Right Form Section -->
    <div class="w-full md:w-1/2 flex items-center justify-center pb-10 pt-6 px-6 bg-[#f8f6f1]">
        <form action="/auth/login" method="POST" class="w-full max-w-md space-y-6">
            @csrf
            <h2 class="text-4xl font-extrabold text-[#8B1E1E] text-center">Login 🛸</h2>

            <div>
                <label for="email" class="block mb-1 text-sm font-semibold text-[#1E4067]">Email</label>
                <input type="email" id="email" name="email" placeholder="zuckerberg@email.com"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" required />
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-semibold text-[#1E4067]">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C5383C] focus:outline-none placeholder:text-gray-400" required />
            </div>

            <button type="submit"
                class="w-full bg-[#8B1E1E] text-white font-semibold py-3 rounded-lg hover:bg-[#C5383C] transition duration-300">
                Masuk Sekarang
            </button>

            <p class="text-center text-sm text-gray-600">
                Belum punya akun? <a href="/auth/register" class="text-[#C5383C] hover:underline font-medium">Daftar di sini</a>
            </p>
        </form>
    </div>
</div>
@endsection
