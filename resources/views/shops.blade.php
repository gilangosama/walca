<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Roboto Condensed"', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .custom-logo {
            font-family: 'Roboto Condensed', sans-serif;
            letter-spacing: -1px;
        }

        .nav-item {
            padding: 10px 15px;
            transition: background-color 0.1s;
            border-radius: 4px;
        }

        .nav-item:hover,
        .nav-item.active {
            background-color: #f0f0f0;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            appearance: none;
            border: 1px solid #ddd;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
        }

        .custom-checkbox:checked {
            background-color: #000;
            border-color: #000;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .filter-section {
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }

        .filter-title {
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            padding: 0.5rem 0;
        }

        .filter-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .filter-content.active {
            max-height: 500px;
        }

        .dropdown-sort {
            position: relative;
        }

        .dropdown-sort-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown-sort:hover .dropdown-sort-content {
            display: block;
        }

        .stok-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: black;
            color: white;
            padding: 2px 6px;
            font-size: 0.75rem;
            z-index: 2;
        }

        .product-item {
            transition: all 0.3s ease;
            background-color: transparent;
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .product-item:hover {
            transform: translateY(-5px);
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 1;
            position: relative;
        }

        .product-image-container {
            overflow: hidden;
            position: relative;
        }

        .product-image {
            transition: transform 0.3s ease;
        }

        .product-item:hover .product-image {
            transform: scale(1.05);
        }

        .product-image-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-item:hover .product-image-hover {
            opacity: 1;
        }
    </style>
    </head>

    <body class="bg-white">
        <!-- Main Content with necessary top padding to prevent overlapping with fixed header -->
        <div class="pt-28 pb-16 bg-gray-50">
            <div class="container mx-auto max-w-7xl px-4">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Sidebar Filters -->
                    <div class="w-full md:w-1/4 lg:w-1/5 bg-white p-4 rounded-lg shadow-sm">
                        <!-- Search -->
                        <div class="mb-6 relative">
                            <input type="text" placeholder="Cari"
                                class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Categories -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('category')">
                                <h3 class="text-lg">Category</h3>
                                <i id="category-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="category-content" class="filter-content active space-y-2 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat1" class="custom-checkbox">
                                    <label for="cat1" class="text-sm cursor-pointer">RELEASE TODAY</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat2" class="custom-checkbox">
                                    <label for="cat2" class="text-sm cursor-pointer">OVERSIZED TEE</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat3" class="custom-checkbox">
                                    <label for="cat3" class="text-sm cursor-pointer">ZIP
                                        HOODIE/HOODIE/CREWNECK</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat4" class="custom-checkbox">
                                    <label for="cat4" class="text-sm cursor-pointer">KNITWEAR/CARDIGAN</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat5" class="custom-checkbox">
                                    <label for="cat5" class="text-sm cursor-pointer">CROPTOP/TANKTOP</label>
                                </div>
                                <div class="mt-3">
                                    <button class="flex items-center text-sm text-gray-600 hover:text-black transition">
                                        Lihat lainnya <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Type -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('productType')">
                                <h3 class="text-lg">Product Type</h3>
                                <i id="productType-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="productType-content" class="filter-content active space-y-2 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="pt1" class="custom-checkbox" checked>
                                    <label for="pt1" class="text-sm cursor-pointer">All Products</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="pt2" class="custom-checkbox">
                                    <label for="pt2" class="text-sm cursor-pointer">Featured Products</label>
                                </div>
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('availability')">
                                <h3 class="text-lg">Availability</h3>
                                <i id="availability-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="availability-content" class="filter-content active space-y-2 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="a1" class="custom-checkbox">
                                    <label for="a1" class="text-sm cursor-pointer">All</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="a2" class="custom-checkbox">
                                    <label for="a2" class="text-sm cursor-pointer">Available</label>
                                </div>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('priceRange')">
                                <h3 class="text-lg">Price</h3>
                                <i id="priceRange-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="priceRange-content" class="filter-content active space-y-4 mt-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-full">
                                        <input type="range" min="0" max="1000000" value="500000"
                                            class="w-full">
                                        <div class="flex justify-between mt-2">
                                            <span class="text-xs">Rp 0</span>
                                            <span class="text-xs">Rp 1.000.000</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Min"
                                            class="w-full border border-gray-300 rounded py-1 px-2 text-sm">
                                    </div>
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Max"
                                            class="w-full border border-gray-300 rounded py-1 px-2 text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('colors')">
                                <h3 class="text-lg">Color</h3>
                                <i id="colors-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="colors-content" class="filter-content active space-y-2 mt-3">
                                <div class="grid grid-cols-5 gap-2">
                                    <div class="w-6 h-6 rounded-full bg-black border border-gray-300 cursor-pointer">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-white border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-gray-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-blue-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-red-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-green-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-yellow-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-pink-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-purple-500 border border-gray-300 cursor-pointer">
                                    </div>
                                    <div
                                        class="w-6 h-6 rounded-full bg-brown-500 border border-gray-300 cursor-pointer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Size -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('size')">
                                <h3 class="text-lg">Size</h3>
                                <i id="size-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="size-content" class="filter-content active space-y-2 mt-3">
                                <div class="grid grid-cols-3 gap-2">
                                    <div
                                        class="w-full h-9 flex items-center justify-center border border-gray-300 cursor-pointer text-sm">
                                        S</div>
                                    <div
                                        class="w-full h-9 flex items-center justify-center border border-gray-300 cursor-pointer text-sm">
                                        M</div>
                                    <div
                                        class="w-full h-9 flex items-center justify-center border border-gray-300 cursor-pointer text-sm">
                                        L</div>
                                    <div
                                        class="w-full h-9 flex items-center justify-center border border-gray-300 cursor-pointer text-sm">
                                        XL</div>
                                    <div
                                        class="w-full h-9 flex items-center justify-center border border-gray-300 cursor-pointer text-sm">
                                        XXL</div>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filter Button -->
                        <div class="mt-6">
                            <button
                                class="w-full bg-black text-white py-2 rounded-md text-sm hover:bg-gray-800 transition">
                                Apply Filter
                            </button>
                        </div>
                    </div>

                    <!-- Main Products Display -->
                    <div class="w-full md:w-3/4 lg:w-4/5">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl">All Products</h1>
                            <div class="dropdown-sort">
                                <button class="flex items-center text-sm">
                                    Order: Best Seller <i class="fas fa-chevron-down ml-1"></i>
                                </button>
                                <div class="dropdown-sort-content">
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Newest</a>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Price: High to Low</a>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Price: Low to High</a>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Best Seller</a>
                                </div>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Product 1 -->
                            @foreach ($products as $product)
                                <a href="{{ route('product.detail', {{ $product->slug }}) }}"
                                    class="product-item p-2">
                                    <div class="relative product-image-container">
                                        <div class="stok-badge">OUT OF STOCK</div>
                                        <img src="{{ asset('img/1.jpg') }}" alt="Hat"
                                            class="w-full h-80 object-cover mb-3 product-image">
                                        <img src="{{ asset('img/2.jpg') }}" alt="Hat Alternate View"
                                            class="w-full h-80 object-cover mb-3 product-image-hover">
                                    </div>
                                    <h3 class="text-sm mb-1">{{ $product->name }}</h3>
                                    <p class="text-base mb-1">{{ $product->price }}</p>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                        <span class="text-xs ml-1">4.5</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <div id="backToTop" class="fixed bottom-8 right-8 hidden opacity-0 transition-opacity duration-300">
            <a href="#"
                class="bg-black text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition flex items-center justify-center"
                style="width: 60px; height: 60px;">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
</x-app-layout>

<script>
    // Functions for filter toggles
    function toggleFilter(id) {
        const content = document.getElementById(`${id}-content`);
        const icon = document.getElementById(`${id}-icon`);

        content.classList.toggle('active');

        if (content.classList.contains('active')) {
            icon.style.transform = 'rotate(180deg)';
        } else {
            icon.style.transform = 'rotate(0)';
        }
    }

    // Initialize with first filter open
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize filter sections
        const filterContents = document.querySelectorAll('.filter-content');
        const filterIcons = document.querySelectorAll('.filter-title i');

        filterContents[0].classList.add('active');
        filterIcons[0].style.transform = 'rotate(180deg)';

        /*
        // Sidebar Toggle - Removed to prevent conflict with navigation.blade.php
        const openSidebar = document.querySelector('.mobile-menu-btn');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        if (openSidebar) {
            openSidebar.addEventListener('click', function() {
                sidebar.classList.add('open');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (closeSidebar) {
            closeSidebar.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        */
    });
</script>
</body>

</html>
