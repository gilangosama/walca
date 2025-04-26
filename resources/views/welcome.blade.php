<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        .custom-logo {
            font-family: 'Roboto Condensed', sans-serif;
            /* font-weight: bold; */
            letter-spacing: -1px;
        }
    </style>

    <!-- Content Container with padding for fixed header -->
    <div class="bg-white pt-16">
        <!-- Carousel Section -->
        <div class="relative w-full overflow-hidden">
            <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                <div class="w-full flex-shrink-0">
                    <img src="{{ asset('img/1.jpg') }}" alt="Image 1" class="w-full h-auto object-cover">
                </div>
                <div class="w-full flex-shrink-0">
                    <img src="{{ asset('img/2.jpg') }}" alt="Image 2" class="w-full h-auto object-cover">
                </div>
                <div class="w-full flex-shrink-0">
                    <img src="{{ asset('img/3.jpg') }}" alt="Image 3" class="w-full h-auto object-cover">
                </div>
            </div>
            
            <!-- Navigation Arrows -->
            <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-r-md hover:bg-opacity-75">
                <i class="fas fa-chevron-left text-xl"></i>
            </button>
            <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-l-md hover:bg-opacity-75">
                <i class="fas fa-chevron-right text-xl"></i>
            </button>
            
            <!-- Indicators -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" data-slide="0"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" data-slide="1"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" data-slide="2"></button>
            </div>
        </div>

        <!-- Black Border Line -->
        <div class="w-full h-2 bg-black"></div>

        <!-- Shop Now Section -->
        <div class="container mx-auto max-w-7xl py-16">
            <div class="flex flex-col md:flex-row items-center justify-center gap-16 px-4 md:px-8">
                <div class="text-3xl text-left">
                    SHOP NOW
                </div>
                <div class="flex flex-wrap justify-center">
                    <img src="{{ asset('img/topi.png') }}" alt="Caps Collection" class="max-w-full">
                </div>
            </div>
        </div>

        <!-- Payment Methods Section -->
        <div class="container mx-auto max-w-7xl py-3">
            <h2 class="text-l text-center mb-3">Payment Method</h2>
            <div class="flex flex-wrap justify-center items-center gap-3 px-4 md:px-8">
                <img src="{{ asset('img/bayar/SVG.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-1.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-2.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-3.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-4.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-5.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-6.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-7.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-8.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-9.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-10.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-11.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-12.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-13.png') }}" alt="Payment Method" class="h-12">
                <img src="{{ asset('img/bayar/SVG-14.png') }}" alt="Payment Method" class="h-12">
            </div>
        </div>

        <!-- Shipping Methods Section -->
        <div class="container mx-auto max-w-7xl py-12">
            <h2 class="text-l text-center mb-3">Shipping Method</h2>
            <div class="flex flex-wrap justify-center items-center gap-3 px-4 md:px-8">
                <img src="{{ asset('img/ekspedisi/janio.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/gosend.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/anteraja.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/kotak.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/rasn.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/dhl.png') }}" alt="Shipping Method" class="h-12">
                <img src="{{ asset('img/ekspedisi/lion.png') }}" alt="Shipping Method" class="h-12">
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div id="backToTop" class="fixed bottom-8 right-8 hidden opacity-0 transition-opacity duration-300">
        <a href="#" class="bg-black text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition flex items-center justify-center" style="width: 60px; height: 60px;">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById('backToTop');

            // Back to Top functionality
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('hidden');
                    setTimeout(() => {
                        backToTopBtn.classList.remove('opacity-0');
                    }, 50);
                } else {
                    backToTopBtn.classList.add('opacity-0');
                    setTimeout(() => {
                        backToTopBtn.classList.add('hidden');
                    }, 300);
                }
            });

            // Smooth scroll to top
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Carousel functionality
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const indicators = document.querySelectorAll('.carousel-indicator');
            
            let currentSlide = 0;
            const slideCount = 3;
            
            function updateCarousel() {
                carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
                        indicator.classList.add('bg-opacity-100');
                    } else {
                        indicator.classList.remove('bg-opacity-100');
                    }
                });
            }
            
            prevBtn.addEventListener('click', function() {
                currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                updateCarousel();
            });
            
            nextBtn.addEventListener('click', function() {
                currentSlide = (currentSlide + 1) % slideCount;
                updateCarousel();
            });
            
            // Add click event for indicators
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    currentSlide = index;
                    updateCarousel();
                });
            });
            
            // Auto slide
            setInterval(function() {
                currentSlide = (currentSlide + 1) % slideCount;
                updateCarousel();
            }, 5000);
        });
    </script>
</x-app-layout>