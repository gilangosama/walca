<style>
    html {
        overflow-x: hidden;
    }
    body.sidebar-open {
        overflow: hidden;
    }
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 290px;
        height: 100%;
        background-color: #0a0a0a;
        z-index: 101;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
        overflow-y: auto;
        box-shadow: 0 0 15px rgba(0,0,0,0.35);
    }
    .sidebar.open {
        transform: translateX(0);
    }
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 20px;
        border-bottom: 1px solid #222222;
    }
    .sidebar-header .search-icon {
        color: #ffffff;
        transition: color 0.2s;
    }
    .sidebar-header .search-icon:hover {
        color: #999;
    }
    .sidebar-header .close-btn {
        font-size: 18px;
        color: #ffffff;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .sidebar-header .close-btn:hover {
        transform: rotate(90deg);
        color: #999;
    }
    .sidebar-menu {
        padding: 20px 0;
        display: flex;
        flex-direction: column;
    }
    .nav-item {
        padding: 14px 25px;
        transition: all 0.25s ease;
        position: relative;
        font-weight: 400;
        letter-spacing: 1px;
        display: block;
        color: #ffffff;
        text-decoration: none;
    }
    .nav-item:hover, .nav-item.active {
        background-color: #1a1a1a;
    }
    .nav-item:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 0;
        background-color: #ffffff;
        transition: width 0.25s;
    }
    .nav-item:hover:after, .nav-item.active:after {
        width: 3px;
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
        display: none;
        backdrop-filter: blur(3px);
    }
    .overlay.active {
        display: block;
    }
    .hamburger-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        height: 36px;
        width: 40px;
        margin-left: 15px;
        position: relative;
    }
    
    .hamburger-line {
        width: 25px;
        height: 2px;
        background-color: #ffffff;
        display: block;
        transition: all 0.3s ease-in-out;
        margin: 3px 0;
        border-radius: 1px;
    }
    
    .hamburger-btn:hover .hamburger-line {
        background-color: #cccccc;
    }
    
    /* Mencegah konten bergeser ke kiri */
    body, html {
        width: 100%;
        position: relative;
    }
    
    /* Fix untuk mencegah pergeseran saat hamburger diklik */
    body.sidebar-open {
        padding-right: 0 !important;
    }
    
    /* Memperbaiki main content positioning */
    #main-content {
        position: relative;
        width: 100%;
        transition: none !important;
    }

    /* Navbar with black background */
    .main-navbar {
        background-color: #000000 !important;
        border-bottom: none !important;
        box-shadow: 0 1px 10px rgba(0,0,0,0.1);
    }

    .nav-icon {
        color: #ffffff;
        transition: color 0.2s, transform 0.2s;
    }
    
    .nav-icon:hover {
        color: #cccccc;
        transform: scale(1.1);
    }

    /* Logo area styling */
    .logo-container {
        position: relative;
    }

    .logo-container::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 2px;
        background-color: #ffffff;
        transition: width 0.3s;
    }

    .logo-container:hover::after {
        width: 50px;
    }

    /* Style for navbar buttons */
    .navbar-button {
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
    }

    .navbar-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.3s, height 0.3s;
        z-index: -1;
    }

    .navbar-button:hover::before {
        width: 200%;
        height: 200%;
    }
</style>

<!-- Overlay for sidebar -->
<div id="overlay" class="overlay"></div>

<!-- Sidebar Navigation -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span class="close-btn" id="closeSidebar">✕</span>
    </div>
    <nav class="sidebar-menu">
        <a href="/" class="nav-item text-sm uppercase {{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ route('shops') }}" class="nav-item text-sm uppercase {{ request()->routeIs('shops') ? 'active' : '' }}">Shops</a>
        <a href="{{ route('about') }}" class="nav-item text-sm uppercase {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
        <a href="{{ route('lookbook') }}" class="nav-item text-sm uppercase {{ request()->routeIs('lookbook') ? 'active' : '' }}">Look Book</a>
        <span class="nav-item text-sm text-gray-400 uppercase">Archives - under maintenance</span>
        
        @auth
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="nav-item text-sm w-full text-left flex items-center">
                <span class="uppercase">Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </form>
        @endauth
    </nav>
</div>

<nav x-data="{ open: false, languageOpen: false, searchOpen: false }" class="fixed top-0 left-0 right-0 main-navbar z-50">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-2">
        <div class="flex justify-between h-16">
            <!-- Left Side - Hamburger Menu -->
            <div class="flex items-center">
                <button id="openSidebar" class="hamburger-btn navbar-button">
                    <span class="hamburger-line bg-white"></span>
                    <span class="hamburger-line bg-white"></span>
                    <span class="hamburger-line bg-white"></span>
                </button>
            </div>

            <!-- Logo (Centered) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
                <a href="/" class="logo-container">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
            </div>

            <!-- Right Side Navigation Items -->
            <div class="flex items-center space-x-4">
                <!-- IDR Currency -->
                <div class="hidden sm:flex items-center">
                    <button @click="languageOpen = !languageOpen" class="flex items-center navbar-button p-1">
                        <span class="text-sm font-medium text-white">
                            <img src="{{ asset('img/indo-flag.jpg') }}" alt="ID Flag" class="inline-block h-4 w-6 mr-1 border border-gray-500"> IDR
                        </span>
                    </button>
                </div>

                <!-- Search Icon -->
                <div class="flex items-center">
                    <button @click="searchOpen = !searchOpen" class="p-1 focus:outline-none focus:ring-0 navbar-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Cart Icon -->
                <div class="flex items-center relative">
                    <a href="{{ route('cart') }}" class="p-1 navbar-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
                    <span id="cart-counter" class="absolute -top-2 -right-2 bg-yellow-500 text-black text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center" style="display: none;">0</span>
                </div>

                <!-- User Icon -->
                <div class="flex items-center mr-2">
                    @auth
                    <a href="{{ route('profile.edit') }}" class="p-1 navbar-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="p-1 navbar-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Language and Currency Dropdown Menu -->
    <div x-show="languageOpen" 
         @click.away="languageOpen = false" 
         class="fixed top-16 right-0 bg-black shadow-lg p-6 rounded-bl-md z-60 w-72 border border-gray-800 text-white">
        
        <div class="mb-5">
            <label class="block text-sm font-medium mb-2">Sent to:</label>
            <div x-data="{ open: false, selected: 'Indonesia' }">
                <div 
                    @click="open = !open" 
                    class="relative w-full border border-gray-700 rounded-md py-3 px-4 bg-black focus:outline-none focus:ring-2 focus:ring-white focus:border-gray-500 text-sm cursor-pointer flex justify-between items-center"
                >
                    <span x-text="selected"></span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute mt-1 w-full bg-black border border-gray-700 rounded-md shadow-lg z-10 max-h-60 overflow-auto"
                >
                    <div @click="selected = 'Indonesia'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">Indonesia</div>
                    <div @click="selected = 'Singapore'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">Singapore</div>
                    <div @click="selected = 'Malaysia'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">Malaysia</div>
                </div>
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Currency:</label>
            <div x-data="{ open: false, selected: 'IDR' }">
                <div 
                    @click="open = !open" 
                    class="relative w-full border border-gray-700 rounded-md py-3 px-4 bg-black focus:outline-none focus:ring-2 focus:ring-white focus:border-gray-500 text-sm cursor-pointer flex justify-between items-center"
                >
                    <span x-text="selected"></span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute mt-1 w-full bg-black border border-gray-700 rounded-md shadow-lg z-10 max-h-60 overflow-auto"
                >
                    <div @click="selected = 'IDR'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">IDR</div>
                    <div @click="selected = 'USD'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">USD</div>
                    <div @click="selected = 'SGD'; open = false" class="px-4 py-2 cursor-pointer hover:bg-gray-800">SGD</div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Search Panel -->
    <div x-show="searchOpen" 
         @click.away="searchOpen = false" 
         class="fixed top-16 left-0 right-0 bg-black shadow-lg p-6 z-60 border-b border-gray-800">
        <div class="container mx-auto max-w-4xl">
            <div class="flex items-center mb-4">
                <h2 class="text-xl font-medium text-white">Search</h2>
                <button @click="searchOpen = false" class="ml-auto text-gray-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
            <form action="{{ route('shops') }}" method="GET">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search for products..." class="w-full bg-transparent border-b border-gray-600 py-3 text-white placeholder-gray-400 focus:outline-none focus:border-white">
                    <button type="submit" class="absolute right-0 top-0 h-full px-4 text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </form>
            <div class="mt-6">
                <h3 class="text-sm text-gray-400 uppercase mb-2">Popular Searches:</h3>
                    <div class="flex flex-wrap gap-2">
                    <a href="{{ route('shops', ['category' => 'tshirt']) }}" class="px-3 py-1 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">T-Shirts</a>
                    <a href="{{ route('shops', ['category' => 'hoodie']) }}" class="px-3 py-1 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">Hoodies</a>
                    <a href="{{ route('shops', ['category' => 'jacket']) }}" class="px-3 py-1 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">Jackets</a>
                    <a href="{{ route('shops', ['category' => 'accessories']) }}" class="px-3 py-1 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">Accessories</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');
        const body = document.body;

        if (openBtn) {
            openBtn.addEventListener('click', () => {
            sidebar.classList.add('open');
            overlay.classList.add('active');
                body.classList.add('sidebar-open');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                body.classList.remove('sidebar-open');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
                body.classList.remove('sidebar-open');
            });
        }

        // Tambahkan efek smooth scroll untuk logo
        const logoContainer = document.querySelector('.logo-container');
        if (logoContainer) {
            logoContainer.addEventListener('click', (e) => {
                if (e.currentTarget.getAttribute('href') === '/') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });
        }
    });
</script>
