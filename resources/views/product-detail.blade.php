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
        .size-btn.bg-black {
            background-color: black;
            color: white;
            border-color: black;
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
        /* Custom Alert Modal Styles */
        .custom-alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .custom-alert-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .custom-alert {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 400px;
            padding: 0;
            overflow: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        .custom-alert-overlay.active .custom-alert {
            transform: translateY(0);
        }
        .custom-alert-header {
            background-color: black;
            padding: 15px 20px;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .custom-alert-header i {
            margin-right: 10px;
        }
        .custom-alert-content {
            padding: 20px;
            font-size: 14px;
            color: #333;
        }
        .custom-alert-footer {
            padding: 15px 20px;
            background-color: #f8f8f8;
            text-align: right;
        }
        .custom-alert-button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }
        .custom-alert-button:hover {
            background-color: #333;
            transform: translateY(-2px);
        }
        /* Efek Glassmorphism dan Animasi */
        .product-container {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .product-image-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
        }
        .product-image-container:hover {
            transform: scale(1.02);
        }
        .product-image-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .product-image-thumbnail:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .product-image-thumbnail.active {
            border-color: #ffffff;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }
        .size-btn {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
        }
        .size-btn:hover:not(.disabled) {
            background: rgba(255, 255, 255, 0.9);
            color: black;
            transform: translateY(-2px);
        }
        .size-btn.bg-black {
            background: white;
            color: black;
            border-color: white;
        }
        .quantity-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 8px;
            overflow: hidden;
        }
        .quantity-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        .quantity-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .quantity-display {
            background: transparent;
            color: white;
            border: none;
        }
        .category-badge {
            background: linear-gradient(45deg, #000, #333);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #fff, #ccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        .spec-item {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }
        .spec-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }
        .related-product {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .related-product:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .related-image {
            position: relative;
            overflow: hidden;
        }
        .related-image img {
            transition: transform 0.5s ease;
        }
        .related-product:hover .related-image img {
            transform: scale(1.1);
        }
        body {
            background: linear-gradient(45deg, #000, #111);
            color: white;
        }
        /* Payment Methods Section */
        .payment-methods {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            margin-top: 3rem;
        }
        .payment-methods img {
            transition: all 0.3s ease;
            filter: grayscale(100%);
            opacity: 0.7;
        }
        .payment-methods img:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: translateY(-5px);
        }
        /* Custom Alert Styling */
        .custom-alert {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .custom-alert-header {
            background: linear-gradient(45deg, #000, #333);
        }
        .custom-alert-button {
            background: white;
            color: black;
            transition: all 0.3s ease;
        }
        .custom-alert-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }
        /* Animasi Loading */
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }
        .loading {
            background: linear-gradient(90deg, 
                rgba(255,255,255,0.1) 25%, 
                rgba(255,255,255,0.2) 50%, 
                rgba(255,255,255,0.1) 75%
            );
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }
        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }
        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
        }
        .back-button svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        .back-button:hover svg {
            transform: translateX(-5px);
        }
        .refund-notice {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border-left: 4px solid #FFD700;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            color: white;
        }
        .refund-notice p {
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
            letter-spacing: 0.5px;
        }
        .action-button {
            width: 100%;
            padding: 15px 25px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: black;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 15px 0;
            text-transform: uppercase;
        }
        .action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }
        .action-button i {
            font-size: 1.2rem;
        }
    </style>

    <!-- Product Detail Section -->
    <div class="pt-28 pb-16">
        <div class="container mx-auto max-w-7xl px-4 md:px-6">
            <!-- Back Button -->
            <a href="{{ route('shops') }}" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Toko
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
                    <h1 class="product-title mb-3">{{ $product->name }}</h1>
                    
                    <!-- Product Price -->
                    <p class="product-price mb-6">{{ $product->price }}</p>
                    
                    <!-- Quantity Information -->
                    <div class="info-section">
                        <h3 class="info-title">Quantity Information</h3>
                        <div class="flex items-center mb-1">
                            <span class="text-sm font-medium">Maximum Quantity:</span>
                            <span class="ml-auto font-bold">{{ $product->stock }}</span>
                        </div>
                    </div>
                    
                    <!-- Size Selection -->
                    <div class="info-section">
                        <h3 class="info-title">Size</h3>
                        <div class="grid grid-cols-3 gap-2 mb-4 max-w-xs">
                            @if(is_array($product->size) || is_object($product->size))
                                @foreach ($product->size as $item)
                                    <button type="button" class="size-btn text-center py-2 text-sm" onclick="selectSize(this, '{{ $item }}')">
                                        {{ $item }}
                                    </button>
                                @endforeach
                            @else
                                <p class="text-sm text-red-500">Size information is not available.</p>
                            @endif
                        </div>
                        <input type="hidden" id="selectedSize" name="size" value="">
                    </div>
                    
                    <!-- Quantity Selection -->
                    <div class="info-section">
                        <div class="flex justify-between items-center">
                            <div class="quantity-input">
                                <button type="button" class="quantity-btn" onclick="decrementQuantity()">-</button>
                                <div id="quantity" class="quantity-display">1</div>
                                <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notify Button or Order Button -->
                    <div class="mb-8">
                        @if($product->stock > 0)
                            <button id="orderButton" class="action-button" onclick="orderProduct()">
                                <i class="fas fa-shopping-cart"></i>
                                Pesan Sekarang
                            </button>
                        @else
                            <button class="action-button" style="background: linear-gradient(135deg, #808080, #A9A9A9);">
                                <i class="fas fa-bell"></i>
                                Beritahu Saya Ketika Tersedia
                            </button>
                        @endif
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
                        
                        <div class="refund-notice">
                            <p class="font-medium">PENGEMBALIAN AKAN DIPROSES JIKA ADA BUKTI VIDEO UNBOXING DAN JIKA ADA KESALAHAN ATAU BARANG RUSAK DARI KAMI, TERIMA KASIH ATAS PERHATIANNYA</p>
                        </div>
                        
                        <!-- Customer Service Button -->
                        {{-- <button class="action-button" style="background: linear-gradient(135deg, #000000, #333333);">
                            <i class="far fa-comment-dots"></i>
                            Hubungi ChambredelaVain
                        </button> --}}
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

    <!-- Custom Alert Modal -->
    <div id="customAlertOverlay" class="custom-alert-overlay">
        <div class="custom-alert">
            <div class="custom-alert-header">
                <div><i class="fas fa-exclamation-circle"></i> Peringatan</div>
                <button onclick="closeCustomAlert()" style="background: none; border: none; color: white; cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="customAlertContent" class="custom-alert-content">
                <!-- Alert Message Here -->
            </div>
            <div class="custom-alert-footer">
                <button class="custom-alert-button" onclick="closeCustomAlert()">OK</button>
            </div>
        </div>
    </div>

    <script>
        // Check for pending order after login
        document.addEventListener('DOMContentLoaded', function() {
            // Periksa apakah ada pending order di session storage
            const pendingOrder = sessionStorage.getItem('pendingOrder');
            if (pendingOrder) {
                const orderData = JSON.parse(pendingOrder);
                
                // Jika ini adalah halaman produk yang sama dengan yang disimpan
                if (orderData.productSlug === '{{ $product->slug }}') {
                    // Set ukuran yang dipilih sebelumnya
                    if (orderData.size) {
                        document.querySelectorAll('.size-btn').forEach(btn => {
                            if (btn.innerText.trim() === orderData.size) {
                                selectSize(btn, orderData.size);
                            }
                        });
                    }
                    
                    // Set jumlah yang dipilih sebelumnya
                    if (orderData.quantity && document.getElementById('quantity')) {
                        document.getElementById('quantity').innerText = orderData.quantity;
                    }
                    
                    // Hapus pending order dari session storage
                    sessionStorage.removeItem('pendingOrder');
                }
            }
        });

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

        // Size selection
        function selectSize(button, size) {
            // Remove active class from all size buttons
            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.classList.remove('bg-black', 'text-white');
            });
            
            // Add active class to selected button
            button.classList.add('bg-black', 'text-white');
            
            // Update hidden input with selected size
            document.getElementById('selectedSize').value = size;
        }

        // Quantity controls
        function incrementQuantity() {
            const quantityElement = document.getElementById('quantity');
            let quantity = parseInt(quantityElement.innerText);
            const maxQuantity = {{ $product->stock > 0 ? $product->stock : 0 }};
            
            if (quantity < maxQuantity) {
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
        
        // Show custom alert function
        function showCustomAlert(message) {
            const overlay = document.getElementById('customAlertOverlay');
            const content = document.getElementById('customAlertContent');
            
            content.textContent = message;
            overlay.classList.add('active');
            
            // Add event listener to close when clicking outside
            overlay.addEventListener('click', function(event) {
                if (event.target === overlay) {
                    closeCustomAlert();
                }
            });
        }
        
        // Close custom alert function
        function closeCustomAlert() {
            const overlay = document.getElementById('customAlertOverlay');
            overlay.classList.remove('active');
        }
        
        // Order product
        function orderProduct() {
            const selectedSize = document.getElementById('selectedSize').value;
            const quantity = parseInt(document.getElementById('quantity').innerText);
            
            if (!selectedSize) {
                showCustomAlert('Silahkan pilih ukuran terlebih dahulu');
                return;
            }
            
            @auth
                // Simpan data ke localStorage untuk sementara (dalam proyek nyata, ini akan dikirim ke server)
                const orderData = {
                    productId: {{ $product->id }},
                    productName: "{{ $product->name }}",
                    price: {{ intval(str_replace(',', '', str_replace('Rp ', '', $product->price))) }},
                    size: selectedSize,
                    quantity: quantity
                };
                
                // Simpan data pesanan ke localStorage
                localStorage.setItem('currentOrder', JSON.stringify(orderData));
                
                // Redirect ke halaman cart atau checkout
                window.location.href = "{{ route('cart') }}";
            @else
                // Simpan data produk ke sessionStorage agar bisa diambil setelah login
                const productData = {
                    productId: {{ $product->id }},
                    productSlug: "{{ $product->slug }}",
                    size: selectedSize,
                    quantity: quantity
                };
                
                // Simpan data untuk digunakan setelah login
                sessionStorage.setItem('pendingOrder', JSON.stringify(productData));
                
                // Redirect ke halaman login dengan intended URL kembali ke halaman produk ini
                window.location.href = "{{ route('login') }}?redirect={{ url()->current() }}";
            @endauth
        }
    </script>
</x-app-layout> 