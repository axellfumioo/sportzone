<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c1cbeb7f83.js" crossorigin="anonymous"></script>
    <title>Sportzone - Book your own field</title>
    <!-- Styles / Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="bg-gray-50">
        @include('components.layout.navbar')
        @yield('content')
        @include('components.layout.footer')
        @include('components.bubblechat')
    </div>
    @livewireScripts
</body>
