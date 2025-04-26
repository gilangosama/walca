<x-app-layout>
<div class="pt-20">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center mb-8">LOOK BOOK</h1>
        
        <!-- Bagian Hero - Gambar Besar -->
        <div class="mb-10">
            <div class="relative">
                <img src="{{ asset('img/lookbook/hero.jpg') }}" alt="Lookbook Hero" class="w-full h-[70vh] object-cover">
                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/70 to-transparent text-white">
                    <h2 class="text-2xl font-bold">Koleksi Musim Terbaru</h2>
                    <p class="text-sm mt-2">Temukan gaya yang menginspirasi dari koleksi terkini kami</p>
                </div>
            </div>
        </div>
        
        <!-- Grid Utama Lookbook -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            <!-- Item Lookbook 1 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/1.jpg') }}" alt="Lookbook 1" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Urban Style</h3>
                        <p class="text-sm mt-1">Boxy Tee & Cargo Pants</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 2 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/2.jpg') }}" alt="Lookbook 2" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Essentials</h3>
                        <p class="text-sm mt-1">Oversized Tee & Shorts</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 3 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/3.jpg') }}" alt="Lookbook 3" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Street Casual</h3>
                        <p class="text-sm mt-1">Hoodie & Jogger Pants</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 4 -->
            <div class="lookbook-item group md:col-span-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/lookbook/wide.jpg') }}" alt="Lookbook 4" class="w-full aspect-video object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-2xl font-bold">Kolaborasi Eksklusif</h3>
                        <p class="text-sm mt-1">Seri terbatas hasil kolaborasi dengan seniman lokal</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 5 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/2.jpg') }}" alt="Lookbook 5" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Monochrome</h3>
                        <p class="text-sm mt-1">Basic Tee & Jeans</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 6 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/1.jpg') }}" alt="Lookbook 6" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Weekend Vibes</h3>
                        <p class="text-sm mt-1">Graphic Tee & Cargo Shorts</p>
                    </div>
                </div>
            </div>
            
            <!-- Item Lookbook 7 -->
            <div class="lookbook-item group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/3.jpg') }}" alt="Lookbook 7" class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Modern Formal</h3>
                        <p class="text-sm mt-1">Oversized Shirt & Slim Pants</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Banner CTA -->
        <div class="relative mb-16">
            <img src="{{ asset('img/lookbook/banner.jpg') }}" alt="Collection Banner" class="w-full h-[40vh] object-cover">
            <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black/40">
                <h2 class="text-3xl font-bold mb-4">Temukan Koleksi Musim Ini</h2>
                <a href="{{ route('shops') }}" class="px-8 py-3 bg-white text-black hover:bg-black hover:text-white transition-colors duration-300 font-medium">Belanja Sekarang</a>
            </div>
        </div>
        
        <!-- Bagian Koleksi -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-center mb-8">KOLEKSI TERBARU</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Produk 1 -->
                <div class="group relative">
                    <div class="relative overflow-hidden rounded-lg">
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
                
                <!-- Produk 2 -->
                <div class="group relative">
                    <div class="relative overflow-hidden rounded-lg">
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
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">OVERSIZED TEE CHAMBREDELAVAIN</h3>
                        <p class="text-sm font-semibold mt-1 text-gray-900">Rp 199,000</p>
                    </div>
                </div>
                
                <!-- Produk 3 -->
                <div class="group relative">
                    <div class="relative overflow-hidden rounded-lg">
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
                
                <!-- Produk 4 -->
                <div class="group relative">
                    <div class="relative overflow-hidden rounded-lg">
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
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-black transition-colors">HAT CHAMBREDELAVAIN</h3>
                        <p class="text-sm font-semibold mt-1 text-gray-900">Rp 180,000</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('shops') }}" class="inline-block px-8 py-3 border border-black hover:bg-black hover:text-white transition-colors duration-300">Lihat Semua Produk</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout> 