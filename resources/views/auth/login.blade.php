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
    <div class="">
        @include('components.layout.navbar')
        <div class="h-[95vh] flex justify-center items-center bg-no-repeat bg-cover bg-center relative overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1544824158-f13eb5211474?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

            <!-- Overlay dan blur -->
            <div class="absolute inset-0 blur-xs backdrop-blur-xs z-0"></div>

            <!-- Card login -->
            <div class="w-full max-w-md p-8 rounded-2xl shadow-lg border border-gray-200 bg-[#F4F4F5] z-10">
                <h2 class="text-3xl font-bold text-[#1E4067] mb-6 text-center">Login ke Akunmu</h2>

                <form class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" placeholder="kamu@email.com" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1E4067]" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" placeholder="••••••••" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1E4067]" />
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2 rounded" />
                            Ingat saya
                        </label>
                        <a href="#" class="text-[#1E4067] hover:underline">Lupa password?</a>
                    </div>

                    <button type="submit" class="w-full bg-[#1E4067] text-white py-2 rounded-xl hover:bg-[#16314f] transition">Login</button>
                </form>

                <p class="mt-6 text-sm text-center text-gray-600">
                    Belum punya akun? <a href="#" class="text-[#1E4067] font-medium hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </div>

        @include('components.layout.footer')

    </div>
    <script src="https://kit.fontawesome.com/c1cbeb7f83.js" crossorigin="anonymous"></script>
</body>
</html>
