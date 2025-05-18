<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background-color: #111111;
            color: #ffffff;
        }
        .custom-logo {
            font-family: 'Roboto Condensed', sans-serif;
            /* font-weight: bold; */
            letter-spacing: -1px;
        }
        .carousel-container {
            position: relative;
            overflow: hidden;
            margin-top: 0;
        }
        .carousel-indicator.active {
            background-color: #ffffff;
            width: 12px;
        }
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50%;
            height: 2px;
            background-color: #ffffff;
        }
        .nav-button {
            transition: all 0.3s ease;
            opacity: 0.7;
        }
        .nav-button:hover {
            opacity: 1;
            transform: scale(1.1);
        }
        .payment-method-container, .shipping-method-container {
            background-color: #000000;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            border: 1px solid #222222;
        }
        
        /* Styling untuk gambar metode pembayaran dan pengiriman */
        .payment-img, .shipping-img {
            filter: invert(1) brightness(0.9);
            transition: all 0.3s ease;
        }
        
        .payment-img:hover, .shipping-img:hover {
            transform: scale(1.05);
            filter: invert(1) brightness(1);
        }
    </style>

    <!-- Content Container with padding for fixed header -->
    <div class="bg-black text-white pt-0">
        <!-- Carousel Section -->
        <div class="carousel-container">
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
            <button id="prevBtn" class="nav-button absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-70 p-3 rounded-full hover:bg-opacity-90">
                <i class="fas fa-chevron-left text-white text-xl"></i>
            </button>
            <button id="nextBtn" class="nav-button absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-70 p-3 rounded-full hover:bg-opacity-90">
                <i class="fas fa-chevron-right text-white text-xl"></i>
            </button>
            
            <!-- Indicators -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3">
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="0"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="1"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="2"></button>
            </div>
        </div>

        <!-- Border Line with Gradient -->
        <div class="w-full h-1 bg-gradient-to-r from-gray-800 via-white to-gray-800 my-4"></div>

        <!-- Shop Now Section -->
        <div class="container mx-auto max-w-7xl py-16">
            <div class="flex flex-col md:flex-row items-center justify-between gap-16 px-4 md:px-8">
                <div class="text-4xl font-bold text-left">
                    <h2 class="section-title">SHOP NOW</h2>
                    <p class="text-sm text-gray-400 mt-4 max-w-md">Temukan koleksi terbaru kami dengan desain yang modern dan kualitas premium.</p>
                    <a href="{{ route('shops') }}" class="inline-block mt-6 px-8 py-3 bg-white text-black font-semibold hover:bg-gray-200 transition duration-300">EXPLORE</a>
                </div>
                <div class="flex flex-wrap justify-center transform hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset('img/topi.png') }}" alt="Caps Collection" class="max-w-full">
                </div>
            </div>
        </div>

        <!-- Border Line with Gradient -->
        <div class="w-full h-px bg-gradient-to-r from-black via-gray-600 to-black mb-12"></div>

        <!-- Payment Methods Section -->
        <div class="container mx-auto max-w-7xl py-8">
            <h2 class="text-xl font-semibold text-center mb-6">PAYMENT METHOD</h2>
            <div class="payment-method-container">
                <div class="flex flex-wrap justify-center items-center gap-6 px-4 md:px-8">
                    <img src="{{ asset('img/bayar/SVG.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-1.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-2.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-3.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-4.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-5.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-6.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-7.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-8.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-9.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-10.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-11.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-12.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-13.png') }}" alt="Payment Method" class="h-12 payment-img">
                    <img src="{{ asset('img/bayar/SVG-14.png') }}" alt="Payment Method" class="h-12 payment-img">
                </div>
            </div>
        </div>

        <!-- Shipping Methods Section -->
        <div class="container mx-auto max-w-7xl py-12">
            <h2 class="text-xl font-semibold text-center mb-6">SHIPPING METHOD</h2>
            <div class="shipping-method-container">
                <div class="flex flex-wrap justify-center items-center gap-8 px-4 md:px-8">
                    <img src="{{ asset('img/ekspedisi/janio.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/gosend.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/anteraja.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/kotak.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/rasn.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/dhl.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                    <img src="{{ asset('img/ekspedisi/lion.png') }}" alt="Shipping Method" class="h-12 shipping-img">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                        indicator.classList.add('bg-opacity-100', 'active');
                        indicator.classList.remove('bg-opacity-50');
                    } else {
                        indicator.classList.remove('bg-opacity-100', 'active');
                        indicator.classList.add('bg-opacity-50');
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

            // Initially set the first indicator as active
            indicators[0].classList.add('bg-opacity-100', 'active');
        });
    </script>
</x-app-layout>