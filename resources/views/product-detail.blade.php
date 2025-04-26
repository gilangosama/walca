<x-app-layout>
    <style>
        .category-badge {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .size-btn {
            width: 100%;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 0;
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 0.9rem;
            background-color: white;
        }
        .size-btn:hover:not(.disabled) {
            border-color: #000;
            background-color: #f0f0f0;
        }
        .size-btn.disabled {
            color: #999;
            cursor: not-allowed;
            background-color: white;
        }
        .size-btn.disabled::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top left, transparent calc(50% - 1px), #ddd, transparent calc(50% + 1px));
        }
        .quantity-input {
            display: flex;
            align-items: center;
            max-width: 120px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .quantity-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e5e5e5;
            background-color: #f5f5f5;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .quantity-btn:hover {
            background-color: #e9e9e9;
        }
        .quantity-display {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
            font-weight: 500;
        }
        .notify-btn {
            width: 100%;
            background-color: #c0c0c0;
            color: white;
            padding: 14px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            letter-spacing: 0.5px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .notify-btn:hover {
            background-color: #a0a0a0;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .product-image-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.2s;
            border-radius: 4px;
        }
        .product-image-thumbnail:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .product-image-thumbnail.active {
            border-color: black;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .product-title {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }
        .product-price {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .info-section {
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .info-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        .spec-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .spec-item i {
            margin-right: 8px;
            color: #555;
        }
        .size-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        .shipping-box {
            border: 1px solid #eaeaea;
            border-radius: 6px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background-color: #fdfdfd;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .cs-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s;
            background-color: white;
        }
        .cs-button:hover {
            border-color: #aaa;
            background-color: #f9f9f9;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .related-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #eaeaea;
        }
        .stok-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: black;
            color: white;
            padding: 4px 8px;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 3px;
            z-index: 5;
        }
        .related-product {
            transition: all 0.3s;
            border-radius: 6px;
            padding: 0.75rem;
        }
        .related-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        .related-image {
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 0.75rem;
        }
        .fas, .far {
            font-size: 0.9rem;
        }
        .spec-item i {
            font-size: 0.8rem;
        }
    </style>

    <!-- Product Detail Section -->
    <div class="pt-28 pb-16">
        <div class="container mx-auto max-w-7xl px-4 md:px-6">
            <!-- Back Button -->
            <a href="{{ route('shops') }}" class="inline-flex items-center text-gray-600 hover:text-black mb-6 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back
            </a>
            
            <div class="flex flex-col md:flex-row gap-10 lg:gap-16">
                <!-- Product Images Section -->
                <div class="w-full md:w-1/2">
                    <!-- Main Product Image -->
                    <div class="mb-4 product-image-container">
                        <img id="mainImage" src="{{ asset('img/1.jpg') }}" alt="BOXY HOODIE" class="w-full h-auto object-cover">
                    </div>
                    
                    <!-- Thumbnails -->
                    <div class="flex gap-3 justify-center mt-6">
                        <img src="{{ asset('img/1.jpg') }}" alt="BOXY HOODIE Thumbnail 1" class="product-image-thumbnail active" onclick="changeImage('{{ asset('img/1.jpg') }}', this)">
                        <img src="{{ asset('img/2.jpg') }}" alt="BOXY HOODIE Thumbnail 2" class="product-image-thumbnail" onclick="changeImage('{{ asset('img/2.jpg') }}', this)">
                        <img src="{{ asset('img/3.jpg') }}" alt="BOXY HOODIE Thumbnail 3" class="product-image-thumbnail" onclick="changeImage('{{ asset('img/3.jpg') }}', this)">
                    </div>
                </div>
                
                <!-- Product Information Section -->
                <div class="w-full md:w-1/2">
                    <!-- Product Categories -->
                    <div class="mb-4">
                        <span class="category-badge">OUT OF STOCK</span>
                        <span class="category-badge">RELEASE TODAY</span>
                        <span class="category-badge">ZIP HOODIE/HOODIE/CREWNECK</span>
                    </div>
                    
                    <!-- Product Title -->
                    <h1 class="product-title mb-3">BOXY HOODIE CHAMBREDELAVAIN - SULLY BLACK</h1>
                    
                    <!-- Product Price -->
                    <p class="product-price mb-6">Rp 465,000</p>
                    
                    <!-- Quantity Information -->
                    <div class="info-section">
                        <h3 class="info-title">Quantity Information</h3>
                        <div class="flex items-center mb-1">
                            <span class="text-sm font-medium">Maximum Quantity:</span>
                            <span class="ml-auto font-bold">1</span>
                        </div>
                    </div>
                    
                    <!-- Size Selection -->
                    <div class="info-section">
                        <h3 class="info-title">Size</h3>
                        <div class="grid grid-cols-3 gap-2 mb-4 max-w-xs">
                            <div class="size-btn disabled text-center py-2 text-sm">M</div>
                            <div class="size-btn disabled text-center py-2 text-sm">L</div>
                            <div class="size-btn disabled text-center py-2 text-sm">XL</div>
                        </div>
                    </div>
                    
                    <!-- Quantity Selection -->
                    <div class="info-section">
                        <div class="flex justify-between items-center">
                            <div class="quantity-input">
                                <button class="quantity-btn" onclick="decrementQuantity()">-</button>
                                <div id="quantity" class="quantity-display">1</div>
                                <button class="quantity-btn" onclick="incrementQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notify Button -->
                    <div class="mb-8">
                        <button class="notify-btn">
                            <i class="fas fa-bell"></i> Notify me when the product is available again
                        </button>
                    </div>
                    
                    <!-- Product Description -->
                    <div class="mb-8">
                        <h3 class="info-title">Boxy Hoodie</h3>
                        <div class="mb-6">
                            <div class="spec-item">
                                <i class="fas fa-check text-sm"></i>
                                <p>Cotton Fleece 330 gsm</p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-check text-sm"></i>
                                <p>Plastisol</p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-check text-sm"></i>
                                <p>Cutting Boxy</p>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <div class="size-info">
                                <span class="font-medium">M</span>
                                <span>63cm x 59cm</span>
                            </div>
                            <div class="size-info">
                                <span class="font-medium">L</span>
                                <span>65cm x 61cm</span>
                            </div>
                            <div class="size-info">
                                <span class="font-medium">XL</span>
                                <span>67cm x 63cm</span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-md mb-6 border-l-4 border-gray-500">
                            <p class="text-sm font-bold">REFUND WILL BE APPLIED IF THERE IS A VIDEO PROOF OF UNBOXING AND IF THERE IS AN ERROR OR DAMAGED ITEM FROM US, THANK YOU FOR YOUR ATTENTION</p>
                        </div>
                        
                        <!-- Shipping Information -->
                        <div class="shipping-box">
                            <h3 class="info-title border-b border-gray-200 pb-3 mb-4">Shipping</h3>
                            <div class="flex justify-between items-center mb-4">
                                <span class="font-medium">Shipped to:</span>
                                <div class="relative w-1/2">
                                    <select class="w-full border border-gray-300 rounded p-2 pr-8 appearance-none bg-white focus:border-gray-500 focus:outline-none">
                                        <option>Choose Area</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="font-medium">Weight:</span>
                                <span>900g</span>
                            </div>
                            <div class="flex items-start bg-gray-50 p-3 rounded-md">
                                <i class="fas fa-info-circle text-gray-500 mt-1 mr-2"></i>
                                <span class="text-sm text-gray-600">Shipped within 24 hours<br>(After payment confirmation)</span>
                            </div>
                        </div>
                        
                        <!-- Customer Service Button -->
                        <button class="cs-button">
                            <i class="far fa-comment-dots text-lg"></i>
                            <span>Send a message to ChambredelaVain?</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Related Products Section -->
            <div class="mt-16">
                <h2 class="related-title">Related Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Related Product 1 -->
                    <a href="{{ route('product.detail', 'hat-chambredelavain-font-bk') }}" class="related-product group">
                        <div class="relative related-image">
                            <div class="stok-badge">OUT OF STOCK</div>
                            <img src="{{ asset('img/1.jpg') }}" alt="Hat" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="text-sm font-medium mb-1">Hat Chambredelavain - Font BK</h3>
                        <p class="text-base font-bold mb-1">Rp 180,000</p>
                    </a>
                    
                    <!-- Related Product 2 -->
                    <a href="{{ route('product.detail', 'boxy-tee-chambredelavain-logo-type-gr') }}" class="related-product group">
                        <div class="relative related-image">
                            <div class="stok-badge">OUT OF STOCK</div>
                            <img src="{{ asset('img/3.jpg') }}" alt="Tee" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="text-sm font-medium mb-1">BOXY TEE CHAMBREDELAVAIN -LOGO TYPE GR</h3>
                        <p class="text-base font-bold mb-1">Rp 240,000</p>
                    </a>
                    
                    <!-- Related Product 3 -->
                    <a href="{{ route('product.detail', 'boxy-tee-chambredelavain-logo-type-bk') }}" class="related-product group">
                        <div class="relative related-image">
                            <div class="stok-badge">OUT OF STOCK</div>
                            <img src="{{ asset('img/2.jpg') }}" alt="Product" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="text-sm font-medium mb-1">BOXY TEE CHAMBREDELAVAIN -LOGO TYPE BK</h3>
                        <p class="text-base font-bold mb-1">Rp 240,000</p>
                    </a>
                    
                    <!-- Related Product 4 -->
                    <a href="{{ route('product.detail', 'cardigan-chambredelavain-basic-black') }}" class="related-product group">
                        <div class="relative related-image">
                            <div class="stok-badge">OUT OF STOCK</div>
                            <img src="{{ asset('img/1.jpg') }}" alt="Product" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h3 class="text-sm font-medium mb-1">CARDIGAN CHAMBREDELAVAIN - BASIC BLACK</h3>
                        <p class="text-base font-bold mb-1">Rp 385,000</p>
                    </a>
                </div>
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

    <script>
        // Product image gallery
        function changeImage(src, thumbnail) {
            const mainImage = document.getElementById('mainImage');
            
            // Add fade out effect
            mainImage.style.opacity = '0';
            
            setTimeout(() => {
                mainImage.src = src;
                mainImage.style.opacity = '1';
            }, 300);
            
            // Update active thumbnail
            document.querySelectorAll('.product-image-thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            thumbnail.classList.add('active');
        }

        // Quantity controls
        function incrementQuantity() {
            const quantityElement = document.getElementById('quantity');
            let quantity = parseInt(quantityElement.innerText);
            if (quantity < 1) { // Maximum quantity is 1 as shown in the design
                quantityElement.innerText = quantity + 1;
            }
        }

        function decrementQuantity() {
            const quantityElement = document.getElementById('quantity');
            let quantity = parseInt(quantityElement.innerText);
            if (quantity > 1) {
                quantityElement.innerText = quantity - 1;
            }
        }
    </script>
</x-app-layout> 