<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
            <span class="text-sm bg-black text-white px-3 py-1 rounded-full">Member Silver</span>
        </div>
    </x-slot>

    <!-- Hero Section with Profile Picture -->
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="relative">
                    <div class="h-28 w-28 rounded-full bg-white border-4 border-white shadow-md overflow-hidden">
                        <img src="{{ asset('img/avatar-placeholder.jpg') }}" alt="Profile" class="h-full w-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=000&color=fff'">
                    </div>
                    <button class="absolute bottom-1 right-1 bg-black text-white p-1.5 rounded-full shadow hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold">{{ auth()->user()->name }}</h3>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                    <p class="text-sm text-gray-500 mt-1">Bergabung sejak: {{ auth()->user()->created_at->format('d F Y') }}</p>
                </div>
                <div class="md:ml-auto grid grid-cols-3 gap-6 text-center bg-white rounded-lg shadow-sm p-4">
                    <div class="border-r border-gray-200 pr-6">
                        <p class="text-3xl font-bold">0</p>
                        <p class="text-gray-500">Pesanan</p>
                    </div>
                    <div class="border-r border-gray-200 pr-6">
                        <p class="text-3xl font-bold">2</p>
                        <p class="text-gray-500">Wishlist</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">0</p>
                        <p class="text-gray-500">Ulasan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tab Navigation -->
            <div class="mb-8 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="profileTabs" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg border-black text-black hover:bg-gray-50 transition-colors" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profil
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300 hover:text-gray-600 hover:bg-gray-50 transition-colors" id="wishlist-tab" data-tabs-target="#wishlist" type="button" role="tab" aria-controls="wishlist" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            Wishlist
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300 hover:text-gray-600 hover:bg-gray-50 transition-colors" id="orders-tab" data-tabs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Order Saya
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300 hover:text-gray-600 hover:bg-gray-50 transition-colors" id="chat-tab" data-tabs-target="#chat" type="button" role="tab" aria-controls="chat" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Chat
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div id="tabContent">
                <!-- Profile Tab Panel -->
                <div class="block space-y-6" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

                <!-- Wishlist Tab Panel -->
                <div class="hidden" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Wishlist Saya
                            </h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                <!-- Wishlist Item 1 -->
                                <div class="group relative bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="relative overflow-hidden rounded-t-lg">
                                        <span class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-2 py-1 z-10">SALE</span>
                                        <div class="aspect-square bg-gray-100 overflow-hidden">
                                            <img src="{{ asset('img/1.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                        <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-red-500 hover:text-red-700 transition-all duration-300 hover:bg-white hover:scale-110 shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">BOXY TEE CHAMBREDELAVAIN</h3>
                                        <div class="flex justify-between items-center mt-1">
                                            <p class="text-sm font-semibold text-gray-900">Rp 240,000</p>
                                            <div class="flex items-center text-yellow-400 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span class="ml-1">4.5</span>
                                            </div>
                                        </div>
                                        <button class="mt-3 w-full bg-black text-white py-2.5 rounded text-sm font-medium hover:bg-gray-800 transition-colors transform hover:scale-[1.02] active:scale-[0.98]">Tambah ke Keranjang</button>
                                    </div>
                                </div>

                                <!-- Wishlist Item 2 -->
                                <div class="group relative bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="relative overflow-hidden rounded-t-lg">
                                        <div class="aspect-square bg-gray-100 overflow-hidden">
                                            <img src="{{ asset('img/2.jpg') }}" alt="Product" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                        <button class="absolute top-2 right-2 z-10 p-1.5 bg-white/80 backdrop-blur-sm rounded-full text-red-500 hover:text-red-700 transition-all duration-300 hover:bg-white hover:scale-110 shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">OVERSIZED TEE CHAMBREDELAVAIN</h3>
                                        <div class="flex justify-between items-center mt-1">
                                            <p class="text-sm font-semibold text-gray-900">Rp 199,000</p>
                                            <div class="flex items-center text-yellow-400 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span class="ml-1">4.2</span>
                                            </div>
                                        </div>
                                        <button class="mt-3 w-full bg-black text-white py-2.5 rounded text-sm font-medium hover:bg-gray-800 transition-colors transform hover:scale-[1.02] active:scale-[0.98]">Tambah ke Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Tab Panel -->
                <div class="hidden" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Order Saya
                            </h2>
                            
                            <div class="space-y-6">
                                <!-- Order 1 -->
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                                        <div>
                                            <span class="text-xs text-gray-500">Order ID: #ORD12345</span>
                                            <p class="text-sm font-medium">1 Juli 2023</p>
                                        </div>
                                        <div class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full shadow-sm border border-green-200">Selesai</div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-start space-x-4">
                                            <img src="{{ asset('img/1.jpg') }}" alt="Product" class="h-20 w-20 object-cover rounded-md shadow-sm">
                                            <div class="flex-1">
                                                <h3 class="text-sm font-bold">BOXY TEE CHAMBREDELAVAIN</h3>
                                                <div class="flex flex-wrap gap-2 mt-1">
                                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Size: L</span>
                                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Qty: 1</span>
                                                </div>
                                                <p class="text-sm font-semibold mt-2">Rp 240,000</p>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                            <div>
                                                <p class="text-sm text-gray-500">Total Pembayaran</p>
                                                <p class="text-base font-semibold">Rp 240,000</p>
                                            </div>
                                            <div class="space-x-2">
                                                <button class="px-3 py-1.5 text-xs border border-black text-black rounded hover:bg-black hover:text-white transition-colors">Detail</button>
                                                <button class="px-3 py-1.5 text-xs bg-black text-white rounded hover:bg-gray-800 transition-colors">Beli Lagi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Order 2 -->
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                                        <div>
                                            <span class="text-xs text-gray-500">Order ID: #ORD12346</span>
                                            <p class="text-sm font-medium">15 Juni 2023</p>
                                        </div>
                                        <div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full shadow-sm border border-blue-200">Sedang Dikirim</div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-start space-x-4">
                                            <img src="{{ asset('img/2.jpg') }}" alt="Product" class="h-20 w-20 object-cover rounded-md shadow-sm">
                                            <div class="flex-1">
                                                <h3 class="text-sm font-bold">OVERSIZED TEE CHAMBREDELAVAIN</h3>
                                                <div class="flex flex-wrap gap-2 mt-1">
                                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Size: M</span>
                                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Qty: 2</span>
                                                </div>
                                                <p class="text-sm font-semibold mt-2">Rp 398,000</p>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                            <div>
                                                <p class="text-sm text-gray-500">Total Pembayaran</p>
                                                <p class="text-base font-semibold">Rp 398,000</p>
                                            </div>
                                            <div class="space-x-2">
                                                <button class="px-3 py-1.5 text-xs border border-black text-black rounded hover:bg-black hover:text-white transition-colors">Detail</button>
                                                <button class="px-3 py-1.5 text-xs bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">Lacak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Tab Panel -->
                <div class="hidden" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Pesan Saya
                            </h2>
                            
                            <div class="border border-gray-200 rounded-lg h-[500px] flex flex-col shadow-sm overflow-hidden">
                                <!-- Chat Header -->
                                <div class="bg-gradient-to-r from-gray-100 to-gray-50 px-4 py-3 border-b border-gray-200 shadow-sm">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative">
                                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium">Customer Service</p>
                                            <p class="text-xs text-green-500">Online</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chat Messages -->
                                <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
                                    <!-- Message - CS -->
                                    <div class="flex items-start">
                                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="bg-white rounded-lg px-4 py-2 max-w-[75%] shadow-sm">
                                            <p class="text-sm">Halo, ada yang bisa saya bantu?</p>
                                            <span class="text-xs text-gray-500 mt-1">10:30</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Message - User -->
                                    <div class="flex items-start justify-end">
                                        <div class="bg-black text-white rounded-lg px-4 py-2 max-w-[75%] shadow-sm">
                                            <p class="text-sm">Saya ingin menanyakan tentang pesanan saya yang belum sampai.</p>
                                            <span class="text-xs text-gray-300 mt-1">10:32</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Message - CS -->
                                    <div class="flex items-start">
                                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="bg-white rounded-lg px-4 py-2 max-w-[75%] shadow-sm">
                                            <p class="text-sm">Tentu, bisa saya bantu. Mohon berikan nomor pesanan Anda.</p>
                                            <span class="text-xs text-gray-500 mt-1">10:33</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chat Input -->
                                <div class="border-t border-gray-200 p-4 bg-white">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                </svg>
                                            </button>
                                        </div>
                                        <input type="text" placeholder="Ketik pesan..." class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                        <div class="ml-2">
                                            <button class="bg-black text-white rounded-full p-2.5 hover:bg-gray-800 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[role="tab"]');
            const tabPanels = document.querySelectorAll('[role="tabpanel"]');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Deactivate all tabs
                    tabs.forEach(t => {
                        t.classList.remove('border-black', 'text-black');
                        t.classList.add('border-transparent', 'hover:border-gray-300', 'hover:text-gray-600');
                        t.setAttribute('aria-selected', false);
                    });
                    
                    // Activate clicked tab
                    tab.classList.remove('border-transparent', 'hover:border-gray-300', 'hover:text-gray-600');
                    tab.classList.add('border-black', 'text-black');
                    tab.setAttribute('aria-selected', true);
                    
                    // Hide all tab panels
                    tabPanels.forEach(panel => {
                        panel.classList.add('hidden');
                    });
                    
                    // Show corresponding panel
                    const panelId = tab.getAttribute('data-tabs-target').substring(1);
                    document.getElementById(panelId).classList.remove('hidden');
                });
            });
        });
    </script>
</x-app-layout>
