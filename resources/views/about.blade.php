<x-app-layout>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: #000;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .parallax-container {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }
        .parallax-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }
        .social-icon {
            transition: transform 0.3s ease;
        }
        .social-icon:hover {
            transform: scale(1.2);
        }
    </style>

    <!-- Hero Section with Parallax -->
    <div class="parallax-container mb-16" style="background-image: url('{{ asset('img/1.jpg') }}');">
        <div class="parallax-overlay"></div>
        <div class="container relative z-10">
            <h1 class="text-5xl font-bold mb-4 tracking-wider">ABOUT US</h1>
            <div class="w-20 h-1 bg-white mx-auto mb-4"></div>
            <p class="text-xl max-w-xl mx-auto">Telling the story of local Indonesian fashion since 2025</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white pb-16">
        <div class="container mx-auto max-w-5xl px-4">
            
            <!-- Brand Story -->
            <div class="mb-16 fade-in">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2 order-2 lg:order-1">
                        <h2 class="text-2xl font-bold mb-2">Our Brand Story</h2>
                        <div class="w-16 h-1 bg-black mb-6"></div>
                        
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            Walca is a local Indonesian fashion brand founded in 2025. We focus on creating high-quality products with unique and exclusive designs.
                        </p>
                        
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            Our philosophy is to combine contemporary style with local touches to create products that are not only fashionable but also have a unique story and character.
                        </p>
                        
                        <p class="text-gray-700 leading-relaxed">
                            Each Walca product is made with attention to detail and quality. We are committed to using the best quality materials and responsible production techniques.
                        </p>
                    </div>
                    <div class="lg:w-1/2 order-1 lg:order-2">
                        <img src="{{ asset('img/1.jpg') }}" alt="About Us" class="w-full h-auto object-cover rounded-lg shadow-lg transform hover:scale-[1.02] transition-transform duration-300">
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="mb-16 fade-in">
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/2">
                            <h2 class="text-2xl font-bold section-title">Our Vision</h2>
                            <p class="text-gray-700 leading-relaxed">
                                To become a leading fashion brand that inspires people to express their personality through fashion in a unique and authentic way.
                            </p>
                        </div>
                        
                        <div class="md:w-1/2">
                            <h2 class="text-2xl font-bold section-title">Our Mission</h2>
                            <ul class="space-y-3 text-gray-700 leading-relaxed mt-4">
                                <li class="flex items-start">
                                    <span class="text-black mr-2">•</span>
                                    <span>Creating high-quality products with unique designs</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2">•</span>
                                    <span>Empowering local talent and creativity</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2">•</span>
                                    <span>Applying sustainable business practices and responsible production</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2">•</span>
                                    <span>Providing a fun and personal shopping experience for customers</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products -->
            <div class="mb-16 fade-in">
                <h2 class="text-2xl font-bold text-center mb-10">Our Products</h2>
                
                <p class="mb-8 text-gray-700 leading-relaxed text-center max-w-3xl mx-auto">
                    Walca offers a variety of high-quality products, including hats, clothing, and accessories. Each collection has a unique theme and concept that reflects our values and inspiration.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="group">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('img/2.jpg') }}" alt="Product" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="mt-4 text-lg font-medium">Latest Collection</h3>
                        <p class="text-gray-600">Exploring the latest trends</p>
                    </div>
                    
                    <div class="group">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('img/3.jpg') }}" alt="Product" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="mt-4 text-lg font-medium">Exclusive Design</h3>
                        <p class="text-gray-600">Uniqueness in every detail</p>
                    </div>
                    
                    <div class="group">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('img/1.jpg') }}" alt="Product" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="mt-4 text-lg font-medium">Premium Quality</h3>
                        <p class="text-gray-600">Best craftsmanship</p>
                    </div>
                </div>
            </div>
            
            <!-- Contact -->
            <div class="fade-in">
                <div class="bg-black text-white p-10 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-bold mb-6">Contact Us</h2>
                    
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/2">
                            <div class="mb-4">
                                <p class="mb-1 font-medium">Email:</p>
                                <p class="text-gray-300">info@walca.id</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="mb-1 font-medium">Instagram:</p>
                                <p class="text-gray-300">@walca.official</p>
                            </div>
                            
                            <div class="mb-6">
                                <p class="mb-1 font-medium">Address:</p>
                                <p class="text-gray-300">Jakarta, Indonesia</p>
                            </div>
                            
                            <div class="flex gap-6 mt-4">
                                <a href="#" class="text-white hover:text-gray-300 social-icon">
                                    <i class="fab fa-instagram text-3xl"></i>
                                </a>
                                <a href="#" class="text-white hover:text-gray-300 social-icon">
                                    <i class="fab fa-tiktok text-3xl"></i>
                                </a>
                                <a href="#" class="text-white hover:text-gray-300 social-icon">
                                    <i class="fab fa-whatsapp text-3xl"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="md:w-1/2">
                            <form>
                                <div class="mb-4">
                                    <input type="text" placeholder="Name" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:border-white transition-colors">
                                </div>
                                <div class="mb-4">
                                    <input type="email" placeholder="Email" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:border-white transition-colors">
                                </div>
                                <div class="mb-4">
                                    <textarea placeholder="Message" rows="4" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:border-white transition-colors"></textarea>
                                </div>
                                <button type="button" class="px-6 py-2 bg-white text-black font-medium rounded hover:bg-gray-200 transition-colors">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Testimonials carousel
            const testimonialContainer = document.querySelector('.testimonial-container');
            const testimonials = document.querySelectorAll('.testimonial');
            const prevBtn = document.getElementById('testimonialPrev');
            const nextBtn = document.getElementById('testimonialNext');
            
            let currentIndex = 0;
            const testimonialCount = testimonials.length;
            
            function showTestimonial(index) {
                currentIndex = index;
                
                if (window.innerWidth >= 768) {
                    // On desktop, show 3 testimonials at once
                    testimonialContainer.style.transform = `translateX(-${Math.floor(currentIndex / 3) * 100}%)`;
                } else {
                    // On mobile, show 1 testimonial at once
                    testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                }
            }
            
            prevBtn.addEventListener('click', function() {
                if (window.innerWidth >= 768) {
                    // On desktop, move by groups of 3
                    const newIndex = Math.max(0, Math.floor(currentIndex / 3) - 1) * 3;
                    showTestimonial(newIndex);
                } else {
                    // On mobile, move one by one
                    const newIndex = (currentIndex - 1 + testimonialCount) % testimonialCount;
                    showTestimonial(newIndex);
                }
            });
            
            nextBtn.addEventListener('click', function() {
                if (window.innerWidth >= 768) {
                    // On desktop, move by groups of 3
                    const newIndex = Math.min(Math.floor((testimonialCount - 1) / 3), Math.floor(currentIndex / 3) + 1) * 3;
                    showTestimonial(newIndex);
                } else {
                    // On mobile, move one by one
                    const newIndex = (currentIndex + 1) % testimonialCount;
                    showTestimonial(newIndex);
                }
            });
            
            // Responsive adjustment
            window.addEventListener('resize', function() {
                showTestimonial(currentIndex);
            });
        });
    </script>
</x-app-layout> 