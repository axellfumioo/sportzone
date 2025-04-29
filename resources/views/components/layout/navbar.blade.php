<nav class="bg-gray-50 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <!-- Logo -->
        <div class="flex items-center">
          <a href="/" class="text-xl font-bold text-[#1E4067] hover:text-[#16314e] transition">
            SportZone 🏁
          </a>
        </div>

        <!-- Menu Desktop -->
        <div class="hidden md:flex space-x-8">
          <a href="#home" class="text-gray-700 hover:text-[#1E4067] transition font-medium">Home</a>
          <a href="#booking" class="text-gray-700 hover:text-[#1E4067] transition font-medium">Booking</a>
          <a href="#lapangan" class="text-gray-700 hover:text-[#1E4067] transition font-medium">Lapangan</a>
          <a href="#promo" class="text-gray-700 hover:text-[#1E4067] transition font-medium">Promo</a>
          <a href="#tentang" class="text-gray-700 hover:text-[#1E4067] transition font-medium">Tentang Kami</a>
        </div>

        <!-- Auth Button -->
        <div class="hidden md:flex items-center space-x-4">
          <a href="/login" class="text-sm font-medium text-gray-700 hover:text-[#1E4067] transition">Login</a>
          <a href="/register" class="bg-[#1E4067] text-white px-4 py-2 rounded-xl hover:bg-[#16314e] transition text-sm font-semibold shadow-sm">
            Daftar
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
          <button id="mobile-menu-button" class="text-gray-600 hover:text-[#1E4067] focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
      <a href="#home" class="block py-2 text-gray-700 hover:text-[#1E4067]">Home</a>
      <a href="#booking" class="block py-2 text-gray-700 hover:text-[#1E4067]">Booking</a>
      <a href="#lapangan" class="block py-2 text-gray-700 hover:text-[#1E4067]">Lapangan</a>
      <a href="#promo" class="block py-2 text-gray-700 hover:text-[#1E4067]">Promo</a>
      <a href="#tentang" class="block py-2 text-gray-700 hover:text-[#1E4067]">Tentang Kami</a>
      <a href="/login" class="block py-2 text-gray-700 hover:text-[#1E4067]">Login</a>
      <a href="/register" class="block py-2 text-[#1E4067] font-bold">Daftar</a>
    </div>
  </nav>

  <script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
