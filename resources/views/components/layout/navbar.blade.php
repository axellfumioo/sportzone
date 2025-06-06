<style>
    /* Glass morphism effect */
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

</style>


<!-- Responsive navbar with mobile menu -->
<nav id="main-navbar" class="bg-white py-4 md:py-4 px-4 md:px-8 flex justify-between items-center fixed top-0 left-0 w-full z-50 border-b border-gray-200/50 transition-all duration-300 shadow-sm">
    <!-- Mobile menu button -->
    <button id="mobile-menu-button" class="md:hidden text-[#2b3c59] focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Logo - centered on desktop, left-aligned after menu button on mobile -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('img/sportzone_notext.png') }}" alt="Sportzone Logo" class="h-10 md:h-12" />
        <span class="text-xl font-bold text-text-primary hidden sm:block text-[#2b3c59]">SportZone</span>
    </div>

    <!-- Left menu (hidden on mobile) -->
    <ul class="hidden md:flex space-x-4 lg:space-x-6 text-sm font-medium  items-center justify-center">
        <li><a href="/" class="{{ request()->is('/') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} py-2 px-3">Home</a></li>
        <li class="relative group">
            <button class="{{ request()->is('sports/*') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 py-2 px-3 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} py-2 px-3 flex items-center justify-center " id="bookingDropdownBtn" aria-haspopup="true" aria-expanded="false" aria-label="Toggle booking menu">
                Booking
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="booking-dropdown" class="absolute top-full left-0 mt-2 w-56 glass-effect rounded-xl shadow-xl border bg-gray-200/20 border-gray-200/20 invisible  transform scale-95 group-hover:scale-100 transition-all duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                <div class="p-2">
                    <a href="/sports/gokart" class="flex items-center px-4 py-3 text-sm text-text-secondary hover:text-text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-red-600">🏎️</span>
                        </div>
                        <div>
                            <div class="font-medium">Go-Kart</div>
                            <div class="text-xs text-text-secondary">Racing experience</div>
                        </div>
                    </a>
                    <a href="/sports/billiard" class="flex items-center px-4 py-3 text-sm text-text-secondary hover:text-text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-green-600">🎱</span>
                        </div>
                        <div>
                            <div class="font-medium">Billiard</div>
                            <div class="text-xs text-text-secondary">Classic pool games</div>
                        </div>
                    </a>
                    <a href="/sports/bowling" class="flex items-center px-4 py-3 text-sm text-text-secondary hover:text-text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-blue-600">🎳</span>
                        </div>
                        <div>
                            <div class="font-medium">Bowling</div>
                            <div class="text-xs text-text-secondary">Strike & spare fun</div>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li><a href="/promotion" class="{{ request()->is('promotion') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 py-2 px-3 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} py-2 px-3">Best Deals</a></li>
        <li><a href="/about" class="{{ request()->is('about') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 py-2 px-3 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} py-2 px-3">About Us</a></li>
    </ul>


    <!-- Auth Buttons - hidden on mobile -->
    <div class="hidden md:flex space-x-2 lg:space-x-4 items-center justify-center">
        @auth
        <div class="relative">
            <button id="userDropdownBtn" class="flex items-center space-x-2 bg-gray-200 text-[#2b3c59] px-3 py-1 lg:px-5 lg:py-2 rounded-lg shadow text-sm">
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="userDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md hidden transition-all duration-200">
                <a href="/profile" class="block px-4 py-2 text-[#2b3c59] hover:bg-gray-100">Profile</a>
                <form method="GET" action="/auth/logout">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-[#8B1E1E] hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
        @else
        <a href="/auth/login" class="text-[#2b3c59] lg:px-5 lg:py-2 text-sm  hover:bg-gray-100 py-2 px-3 rounded-lg">Sign In</a>
        <a href="/auth/register" class="bg-gradient-to-tr from-[#9E1D1D] to-[#C82828] text-white px-3 py-1 lg:px-5 lg:py-2 rounded-lg shadow text-sm">Get Started</a>
        @endauth
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
        <div class="p-5 border-b border-gray-200 flex items-center">
            <img src="{{ asset('img/sportzone_notext.png') }}" alt="Sportzone Logo" class="h-10 md:h-12 mr-2" />
            <span class="text-xl font-bold text-text-primary block text-[#2b3c59]">SportZone</span>
            <button id="close-mobile-menu" class="ml-auto text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="p-4" x-data="{ open: false }">
            <ul class="space-y-4">
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 block rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 block rounded-lg' }} py-2 px-3 w-full block">Home</a>
                </li>

                <li>
                    <button @click="open = !open" class="{{ request()->is('sports/*') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20' : 'text-[#2b3c59] hover:bg-gray-100' }} py-2 px-3 w-full flex items-center justify-between rounded-lg transition-colors duration-200">
                        Booking
                        <svg class="w-4 h-4 ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="mt-2 w-full max-w-[250px] border-gray-100 bg-white" @click.outside="open = false">
                        <div class="p-2 space-y-2">
                            <a href="/sports/gokart" class="flex items-center px-4 py-3 text-sm hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <div class="w-9 h-9 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-red-600 text-lg">🏎️</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-[#2b3c59]">Go-Kart</div>
                                    <div class="text-xs text-gray-500">Racing experience</div>
                                </div>
                            </a>

                            <a href="/sports/billiard" class="flex items-center px-4 py-3 text-sm hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-green-600 text-lg">🎱</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-[#2b3c59]">Billiard</div>
                                    <div class="text-xs text-gray-500">Classic pool games</div>
                                </div>
                            </a>

                            <a href="/sports/bowling" class="flex items-center px-4 py-3 text-sm hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-blue-600 text-lg">🎳</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-[#2b3c59]">Bowling</div>
                                    <div class="text-xs text-gray-500">Strike & spare fun</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="/promotion" class="{{ request()->is('promotion') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 py-2 px-3 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} w-full py-2 px-3 block">Best Deals</a>
                </li>
                <li>
                    <a href="/about" class="{{ request()->is('about') ? 'text-[#8B1E1E] bg-[#8B1E1E]/20 py-2 px-3 rounded-lg' : 'text-[#2b3c59] hover:bg-gray-100 rounded-lg' }} w-full py-2 px-3 block">About Us</a>
                </li>

                <!-- Mobile auth buttons -->
                <li class="pt-4 border-t border-gray-200 mt-4">
                    <div class="flex flex-col space-y-2">
                        <a href="/auth/login" class="bg-gray-200 text-[#2b3c59] px-4 py-2 rounded-lg shadow text-center">Sign In</a>
                        <a href="/auth/register" class="bg-gradient-to-tr from-[#9E1D1D] to-[#C82828] text-white px-4 py-2 rounded-lg shadow text-center">Get Started</a>
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
    const userDropdownBtn = document.getElementById('userDropdownBtn');
    const userDropdownMenu = document.getElementById('userDropdownMenu');

    if (userDropdownBtn && userDropdownMenu) {
        userDropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            userDropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdownBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                userDropdownMenu.classList.add('hidden');
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
