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
        background-color: #fff;
        z-index: 101;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
        overflow-y: auto;
        box-shadow: 0 0 15px rgba(0,0,0,0.15);
    }
    .sidebar.open {
        transform: translateX(0);
    }
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #f1f1f1;
    }
    .sidebar-header .search-icon {
        color: #333;
        transition: color 0.2s;
    }
    .sidebar-header .search-icon:hover {
        color: #666;
    }
    .sidebar-header .close-btn {
        font-size: 18px;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .sidebar-header .close-btn:hover {
        transform: rotate(90deg);
    }
    .sidebar-menu {
        padding: 15px 0;
        display: flex;
        flex-direction: column;
    }
    .nav-item {
        padding: 12px 20px;
        transition: all 0.2s ease;
        position: relative;
        font-weight: 500;
        letter-spacing: 0.5px;
        display: block;
    }
    .nav-item:hover, .nav-item.active {
        background-color: #f7f7f7;
        padding-left: 25px;
    }
    .nav-item:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 0;
        background-color: #000;
        transition: width 0.2s;
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
        background-color: rgba(0, 0, 0, 0.25);
        z-index: 100;
        display: none;
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
        height: 3px;
        background-color: #000;
        display: block;
        transition: all 0.3s ease-in-out;
        margin: 3px 0;
        border-radius: 1px;
    }
    
    .hamburger-btn:hover .hamburger-line {
        background-color: #666;
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
        <a href="/" class="nav-item text-sm {{ request()->is('/') ? 'active' : '' }}">HOME</a>
        <a href="{{ route('shops') }}" class="nav-item text-sm {{ request()->routeIs('shops') ? 'active' : '' }}">SHOPS</a>
        <a href="{{ route('about') }}" class="nav-item text-sm {{ request()->routeIs('about') ? 'active' : '' }}">ABOUT US</a>
        <a href="{{ route('lookbook') }}" class="nav-item text-sm {{ request()->routeIs('lookbook') ? 'active' : '' }}">LOOK BOOK</a>
        <span class="nav-item text-sm text-gray-400">ARCHIVES - under maintenance</span>
        
        @auth
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="nav-item text-sm w-full text-left flex items-center">
                <span>LOGOUT</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </form>
        @endauth
    </nav>
</div>

<nav x-data="{ open: false, languageOpen: false, searchOpen: false }" class="fixed top-0 left-0 right-0 bg-white border-b border-gray-100 z-50">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-2">
        <div class="flex justify-between h-16">
            <!-- Left Side - Hamburger Menu -->
            <div class="flex items-center">
                <button id="openSidebar" class="hamburger-btn">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <!-- Logo (Centered) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
                <a href="/">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Right Side Navigation Items -->
            <div class="flex items-center space-x-3">
                <!-- IDR Currency -->
                <div class="hidden sm:flex items-center">
                    <button @click="languageOpen = !languageOpen" class="flex items-center">
                        <span class="text-sm font-medium">
                            <img src="{{ asset('img/indo-flag.jpg') }}" alt="ID Flag" class="inline-block h-4 w-6 mr-1 border border-gray-500"> IDR
                        </span>
                    </button>
                </div>

                <!-- Search Icon -->
                <div class="flex items-center">
                    <button @click="searchOpen = !searchOpen" class="p-1 focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Cart Icon -->
                <div class="flex items-center">
                    <a href="{{ route('cart') }}" class="p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
                </div>

                <!-- User Icon -->
                <div class="flex items-center">
                    @auth
                    <a href="{{ route('profile.edit') }}" class="p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Language and Currency Dropdown Menu -->
    <div x-show="languageOpen" 
         @click.away="languageOpen = false" 
         class="fixed top-16 right-0 bg-white shadow-lg p-6 rounded-bl-md z-60 w-72 border border-gray-100">
        
        <div class="mb-5">
            <label class="block text-sm font-medium mb-2 text-gray-700">Sent to:</label>
            <div x-data="{ open: false, selected: 'Indonesia' }">
                <div 
                    @click="open = !open" 
                    class="relative w-full border border-gray-300 rounded-md py-3 px-4 bg-white focus:outline-none focus:ring-2 focus:ring-black focus:border-black text-sm cursor-pointer flex justify-between items-center"
                >
                    <span x-text="selected"></span>
                    <svg class="h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 text-sm"
                >
                    <a @click="selected = 'Indonesia'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Indonesia</a>
                    <a @click="selected = 'Malaysia'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Malaysia</a>
                    <a @click="selected = 'Singapore'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Singapore</a>
                </div>
            </div>
        </div>
        
        <div class="mb-5">
            <label class="block text-sm font-medium mb-2 text-gray-700">Language:</label>
            <div x-data="{ open: false, selected: 'Indonesia' }">
                <div 
                    @click="open = !open" 
                    class="relative w-full border border-gray-300 rounded-md py-3 px-4 bg-white focus:outline-none focus:ring-2 focus:ring-black focus:border-black text-sm cursor-pointer flex justify-between items-center"
                >
                    <span x-text="selected"></span>
                    <svg class="h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 text-sm"
                >
                    <a @click="selected = 'Indonesia'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Indonesia</a>
                    <a @click="selected = 'English'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">English</a>
                </div>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2 text-gray-700">Currency:</label>
            <div x-data="{ open: false, selected: 'IDR' }">
                <div 
                    @click="open = !open" 
                    class="relative w-full border border-gray-300 rounded-md py-3 px-4 bg-white focus:outline-none focus:ring-2 focus:ring-black focus:border-black text-sm cursor-pointer flex justify-between items-center"
                >
                    <span x-text="selected"></span>
                    <svg class="h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 text-sm"
                >
                    <a @click="selected = 'IDR'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">IDR</a>
                    <a @click="selected = 'USD'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">USD</a>
                    <a @click="selected = 'SGD'; open = false" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">SGD</a>
                </div>
            </div>
        </div>
        
        <button class="w-full bg-black text-white py-3 px-4 rounded-md hover:bg-gray-900 transition duration-150 ease-in-out text-sm font-medium">
            Save
        </button>
    </div>

    <!-- Search Popup -->
    <div x-show="searchOpen" 
         @click.away="searchOpen = false" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex flex-col items-center backdrop-blur-sm bg-black/40">
        
        <div class="bg-white w-full max-w-4xl shadow-2xl overflow-hidden transform transition-all" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-10"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-10">
            
            <div class="relative p-5 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="relative flex-grow">
                        <input 
                            type="text" 
                            placeholder="Cari Produk Kami" 
                            class="w-full pl-5 pr-10 py-4 text-base border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all duration-200 shadow-sm hover:shadow-md"
                            @keydown.escape="searchOpen = false"
                        >
                        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-black transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    <button @click="searchOpen = false" class="ml-4 p-2 text-gray-400 hover:text-black transition-colors focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-base font-medium mb-4">Pencarian Populer</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">hoodie</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">sully</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">basic</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">half</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">boxy</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">bedstar</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">work</a>
                        <a href="#" class="px-5 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-all duration-200 shadow-sm hover:shadow transform hover:-translate-y-0.5">pants</a>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="text-base font-medium mb-4">Baru Dilihat</h3>
                    <div class="relative px-4">
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                            <!-- Product 1 -->
                            <div class="group relative">
                                <div class="relative overflow-hidden rounded-lg">
                                    <span class="absolute top-2 left-2 z-10 bg-white px-2 py-1 text-xs font-bold">Stok Habis</span>
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('img/1.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </div>
                                    <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-gray-500 hover:text-red-500 transition-all duration-300 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">BOXY TEE CHAMBREDELAVAIN</h3>
                                    <p class="text-sm font-semibold mt-1 text-gray-900">Rp 240,000</p>
                                </div>
                            </div>
                            
                            <!-- Product 2 -->
                            <div class="group relative">
                                <div class="relative overflow-hidden rounded-lg">
                                    <span class="absolute top-2 left-2 z-10 bg-white px-2 py-1 text-xs font-bold">Stok Habis</span>
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('img/2.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </div>
                                    <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-gray-500 hover:text-red-500 transition-all duration-300 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">Oversized tee Chambredelavain</h3>
                                    <p class="text-sm font-semibold mt-1 text-gray-900">Rp 199,000</p>
                                </div>
                            </div>
                            
                            <!-- Product 3 -->
                            <div class="group relative">
                                <div class="relative overflow-hidden rounded-lg">
                                    <span class="absolute top-2 left-2 z-10 bg-white px-2 py-1 text-xs font-bold">Stok Habis</span>
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('img/3.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </div>
                                    <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-gray-500 hover:text-red-500 transition-all duration-300 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">BOXY HOODIE CHAMBREDELAVAIN</h3>
                                    <p class="text-sm font-semibold mt-1 text-gray-900">Rp 465,000</p>
                                </div>
                            </div>
                            
                            <!-- Product 4 -->
                            <div class="group relative hidden md:block">
                                <div class="relative overflow-hidden rounded-lg">
                                    <span class="absolute top-2 left-2 z-10 bg-white px-2 py-1 text-xs font-bold">Stok Habis</span>
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('img/1.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </div>
                                    <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-gray-500 hover:text-red-500 transition-all duration-300 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">Hat Chambredelavain</h3>
                                    <p class="text-sm font-semibold mt-1 text-gray-900">Rp 180,000</p>
                                </div>
                            </div>
                            
                            <!-- Product 5 -->
                            <div class="group relative hidden md:block">
                                <div class="relative overflow-hidden rounded-lg">
                                    <span class="absolute top-2 left-2 z-10 bg-white px-2 py-1 text-xs font-bold">Stok Habis</span>
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('img/2.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </div>
                                    <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-gray-500 hover:text-red-500 transition-all duration-300 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">Oversized tee Chambredelavain</h3>
                                    <p class="text-sm font-semibold mt-1 text-gray-900">Rp 199,000</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Navigation Arrows -->
                        <button class="absolute -left-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2.5 shadow-md hover:shadow-lg z-10 transition-all duration-200 hover:bg-gray-50 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button class="absolute -right-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2.5 shadow-md hover:shadow-lg z-10 transition-all duration-200 hover:bg-gray-50 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                {{ __('Orders') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');
        
        // Track saat sidebar terbuka/tutup
        let isSidebarOpen = false;
        
        openSidebar.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Catat lebar scrollbar
            const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
            document.documentElement.style.setProperty('--scrollbar-width', scrollbarWidth + 'px');
            
            sidebar.classList.add('open');
            overlay.classList.add('active');
            document.body.classList.add('sidebar-open');
            
            // Tandai sidebar sedang terbuka
            isSidebarOpen = true;
        });

        function closeSidebarHandler(e) {
            if (e) {
                e.stopPropagation();
            }
            
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            document.body.classList.remove('sidebar-open');
            
            // Reset scrollbar compensation
            document.body.style.paddingRight = '';
            
            // Tandai sidebar sudah tertutup
            isSidebarOpen = false;
        }

        closeSidebar.addEventListener('click', closeSidebarHandler);
        overlay.addEventListener('click', closeSidebarHandler);
        
        // Tutup sidebar ketika item menu diklik
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', closeSidebarHandler);
        });
        
        // Mencegah pergeseran konten saat resize window
        window.addEventListener('resize', function() {
            if (isSidebarOpen) {
                const newScrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                document.documentElement.style.setProperty('--scrollbar-width', newScrollbarWidth + 'px');
            }
        });
    });
</script>
