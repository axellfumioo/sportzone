<!-- Responsive navbar with mobile menu -->
<nav id="main-navbar" class="bg-[#FAF8F4] py-4 md:py-1 px-4 md:px-8 flex justify-between items-center fixed top-0 left-0 w-full z-50">
    <!-- Mobile menu button -->
    <button id="mobile-menu-button" class="md:hidden text-[#2b3c59] focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Left menu (hidden on mobile) -->
    <ul class="hidden md:flex space-x-4 lg:space-x-6 text-sm font-medium">
        <li><a href="/" class="text-[#8B1E1E]">Home</a></li>
        <li class="relative group">
            <button class="text-[#2b3c59] flex items-center justify-center" id="bookingDropdownBtn">
                Booking
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <ul id="bookingDropdownMenu" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 invisible transition-all duration-200 z-50" role="menu" aria-labelledby="bookingDropdownButton">
                <li role="none">
                    <a href="/sports/gokart" role="menuitem" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100 rounded-t-md">Go-Kart</a>
                </li>
                <li role="none">
                    <a href="/sports/billiard" role="menuitem" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100">Billiard</a>
                </li>
                <li role="none">
                    <a href="/sports/bowling" role="menuitem" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100 rounded-b-md">Bowling</a>
                </li>
            </ul>
        </li>
        <li><a href="/promotion" class="text-[#2b3c59]">Promo</a></li>
        <li><a href="/ai" class="text-[#2b3c59]">Tanya AI</a></li>
    </ul>

    <!-- Logo - centered on desktop, left-aligned after menu button on mobile -->
    <div class="flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 md:static md:left-auto md:transform-none md:mx-auto">
        <img src="{{ asset('img/sportzone.png') }}" alt="Sportzone Logo" class="h-10 md:h-16" />
    </div>

    <!-- Auth Buttons - hidden on mobile -->
    <div class="hidden md:flex space-x-2 lg:space-x-4">
        <a href="/auth/login" class="bg-gray-200 text-[#2b3c59] px-3 py-1 lg:px-5 lg:py-2 rounded-lg shadow text-sm">Login</a>
        <a href="/auth/register" class="bg-[#8B1E1E] text-white px-3 py-1 lg:px-5 lg:py-2 rounded-lg shadow text-sm">Register</a>
    </div>

    <!-- Mobile account icon (visible only on mobile) -->
    <button id="mobile-account-button" class="md:hidden text-[#2b3c59] focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
    </button>
</nav>

<!-- Mobile menu (off-canvas) -->
<div id="mobile-menu" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white h-full w-64 shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center">
            <h2 class="font-semibold text-lg text-[#2b3c59]">Menu</h2>
            <button id="close-mobile-menu" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
                <li><a href="/" class="block py-2 text-[#8B1E1E] font-medium">Home</a></li>
                <li class="py-2">
                    <button id="mobile-booking-dropdown" class="flex items-center justify-between w-full text-[#2b3c59] font-medium">
                        Booking
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="mobile-booking-submenu" class="pl-4 mt-2 hidden space-y-2">
                        <li><a href="/sports/gokart" class="block py-1 text-[#2b3c59]">Go-Kart</a></li>
                        <li><a href="/sports/billiard" class="block py-1 text-[#2b3c59]">Billiard</a></li>
                        <li><a href="/sports/bowling" class="block py-1 text-[#2b3c59]">Bowling</a></li>
                    </ul>
                </li>
                <li><a href="/promotion" class="block py-2 text-[#2b3c59] font-medium">Promo</a></li>
                <li><a href="/ai" class="block py-2 text-[#2b3c59] font-medium">Tanya AI</a></li>

                <!-- Mobile auth buttons -->
                <li class="pt-4 border-t border-gray-200 mt-4">
                    <div class="flex flex-col space-y-2">
                        <a href="/auth/login" class="bg-gray-200 text-[#2b3c59] px-4 py-2 rounded-lg shadow text-center">Login</a>
                        <a href="/auth/register" class="bg-[#8B1E1E] text-white px-4 py-2 rounded-lg shadow text-center">Register</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Mobile account menu -->
<div id="mobile-account-menu" class="fixed right-0 top-16 mt-1 bg-white border border-gray-200 shadow-lg rounded-md w-48 z-50 hidden">
    <div class="py-2">
        <a href="/auth/login" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100">Login</a>
        <a href="/auth/register" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100">Register</a>
    </div>
</div>

<script>
    // Dropdown menu functionality
    const bookingDropdownBtn = document.getElementById('bookingDropdownBtn');
    const bookingDropdownMenu = document.getElementById('bookingDropdownMenu');

    // Toggle desktop booking dropdown
    if (bookingDropdownBtn && bookingDropdownMenu) {
        bookingDropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            bookingDropdownMenu.classList.toggle('opacity-0');
            bookingDropdownMenu.classList.toggle('invisible');
            bookingDropdownMenu.classList.toggle('opacity-100');
            bookingDropdownMenu.classList.toggle('visible');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (bookingDropdownBtn && bookingDropdownMenu && !bookingDropdownBtn.contains(e.target) && !bookingDropdownMenu.contains(e.target)) {
                bookingDropdownMenu.classList.add('opacity-0', 'invisible');
                bookingDropdownMenu.classList.remove('opacity-100', 'visible');
            }
        });
    }

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenu = document.getElementById('close-mobile-menu');
    const mobileMenuContent = mobileMenu ?.querySelector('div');

    // Open mobile menu
    if (mobileMenuButton && mobileMenu && mobileMenuContent) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenuContent.classList.remove('-translate-x-full');
            }, 10);
        });

        // Close mobile menu
        closeMobileMenu.addEventListener('click', function() {
            mobileMenuContent.classList.add('-translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        });

        // Close when clicking backdrop
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                mobileMenuContent.classList.add('-translate-x-full');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });
    }

    // Mobile booking submenu toggle
    const mobileBookingDropdown = document.getElementById('mobile-booking-dropdown');
    const mobileBookingSubmenu = document.getElementById('mobile-booking-submenu');

    if (mobileBookingDropdown && mobileBookingSubmenu) {
        mobileBookingDropdown.addEventListener('click', function() {
            mobileBookingSubmenu.classList.toggle('hidden');
        });
    }

    // Mobile account menu
    const mobileAccountButton = document.getElementById('mobile-account-button');
    const mobileAccountMenu = document.getElementById('mobile-account-menu');

    if (mobileAccountButton && mobileAccountMenu) {
        mobileAccountButton.addEventListener('click', function() {
            mobileAccountMenu.classList.toggle('hidden');
        });

        // Close account menu when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileAccountButton && mobileAccountMenu && !mobileAccountButton.contains(e.target) && !mobileAccountMenu.contains(e.target)) {
                mobileAccountMenu.classList.add('hidden');
            }
        });
    }

    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('shadow-lg');
        } else {
            navbar.classList.remove('shadow-lg');
        }
    });

</script>
