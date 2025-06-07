<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c1cbeb7f83.js" crossorigin="anonymous"></script>
    <title>Sportzone - Book your own field</title>
    <!-- Styles / Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <script>
        async function getChatToken() {
            const res = await fetch('/api/chat-token', {
                credentials: 'include',
            });
            const data = await res.json();
            return data.token;
        }

    </script>
</body>
