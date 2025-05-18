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
            background-color: #111111;
            color: #ffffff;
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
            transition: all 0.2s;
            border-radius: 4px;
        }

        .nav-item:hover,
        .nav-item.active {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            appearance: none;
            border: 1px solid #555;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
        }

        .custom-checkbox:checked {
            background-color: #ffffff;
            border-color: #ffffff;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            color: #000000;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .filter-section {
            border-bottom: 1px solid #333;
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
            background-color: rgba(26, 26, 26, 0.9);
            backdrop-filter: blur(10px);
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.3);
            z-index: 50;
            border: 1px solid #333;
            border-radius: 4px;
        }

        .dropdown-sort:hover .dropdown-sort-content {
            display: block;
        }

        .stok-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: white;
            color: black;
            padding: 4px 8px;
            font-size: 0.7rem;
            z-index: 2;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 3px;
        }

        .product-item {
            transition: all 0.4s ease;
            background-color: rgba(17, 17, 17, 0.5);
            display: block;
            text-decoration: none;
            color: inherit;
            border: 1px solid transparent;
            backdrop-filter: blur(5px);
            overflow: hidden;
        }

        .product-item:hover {
            transform: translateY(-8px);
            background-color: rgba(26, 26, 26, 0.8);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.08);
            z-index: 1;
            position: relative;
            border: 1px solid #333;
        }

        .product-image-container {
            overflow: hidden;
            position: relative;
        }

        .product-image {
            transition: transform 0.6s ease;
        }

        .product-item:hover .product-image {
            transform: scale(1.08);
        }

        .product-image-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .product-item:hover .product-image-hover {
            opacity: 1;
        }
        
        .search-input {
            background-color: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(5px);
            border: 1px solid #444;
            color: #ffffff;
            transition: all 0.3s ease;
        }
        
        .search-input::placeholder {
            color: #777;
        }
        
        .search-input:focus {
            border-color: #ffffff;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.15);
            background-color: rgba(30, 30, 30, 0.9);
        }
        
        .pagination-link {
            background-color: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(5px);
            border: 1px solid #333;
            color: #ffffff;
        }
        
        .pagination-link:hover, .pagination-link.active {
            background-color: #ffffff;
            color: #000000;
        }
        
        .sort-button {
            background-color: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(5px);
            border: 1px solid #444;
            color: #ffffff;
            transition: all 0.2s;
            font-weight: 500;
        }
        
        .sort-button:hover {
            background-color: rgba(40, 40, 40, 0.9);
            border-color: #666;
        }
        
        .sort-option {
            padding: 10px 16px;
            transition: all 0.2s;
            border-bottom: 1px solid #333;
        }
        
        .sort-option:last-child {
            border-bottom: none;
        }
        
        .sort-option:hover {
            background-color: rgba(60, 60, 60, 0.9);
        }
        
        .sidebar-container {
            background-color: rgba(17, 17, 17, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid #333;
            border-radius: 8px;
        }

        .filter-icon {
            display: inline-block;
            margin-right: 8px;
            color: #aaa;
        }

        .button-primary {
            background: linear-gradient(to right, #ffffff, #cccccc);
            color: black;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            overflow: hidden;
            position: relative;
        }
        
        .button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.15);
        }
        
        .button-primary:after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.3s ease;
        }
        
        .button-primary:hover:after {
            left: 100%;
        }
        
        .price-tag {
            position: relative;
            display: inline-block;
            font-weight: bold;
            color: white;
        }
        
        .category-label {
            font-size: 0.75rem;
            color: #ccc;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        
        .product-name {
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.2s;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .product-item:hover .product-name {
            color: #ffffff;
        }
        
        .rating-stars {
            display: flex;
            align-items: center;
            margin-top: 4px;
        }
        
        .size-button {
            transition: all 0.2s ease;
        }
        
        .size-button:hover {
            background-color: white;
            color: black;
        }
        
        .size-button.selected {
            background-color: white;
            color: black;
            font-weight: 500;
        }
        
        .color-circle {
            transition: transform 0.2s;
        }
        
        .color-circle:hover {
            transform: scale(1.2);
            border-color: white;
        }
        
        .apply-filters-bar {
            position: sticky;
            bottom: 0;
            background-color: rgba(20, 20, 20, 0.9);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-top: 1px solid #333;
            margin-top: 20px;
            margin-left: -16px;
            margin-right: -16px;
            margin-bottom: -16px;
            border-radius: 0 0 8px 8px;
        }
        
        .glassmorphism {
            background-color: rgba(30, 30, 30, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
    </head>

    <body class="bg-black">
        <!-- Main Content with necessary top padding to prevent overlapping with fixed header -->
        <div class="pt-28 pb-16 bg-black">
            <div class="container mx-auto max-w-7xl px-4">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Sidebar Filters -->
                    <div class="w-full md:w-1/4 lg:w-1/5 sidebar-container p-4 shadow-lg">
                        <!-- Search -->
                        <div class="mb-6 relative">
                            <input type="text" placeholder="Cari produk..."
                                class="w-full search-input rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-gray-600">
                            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <h2 class="text-xl font-bold mb-4 border-b border-gray-700 pb-2">Filter</h2>

                        <!-- Categories -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('category')">
                                <h3 class="text-lg"><i class="fas fa-tags filter-icon"></i>Category</h3>
                                <i id="category-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="category-content" class="filter-content active space-y-3 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat1" class="custom-checkbox">
                                    <label for="cat1" class="text-sm cursor-pointer hover:text-white transition-colors">RELEASE TODAY</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat2" class="custom-checkbox">
                                    <label for="cat2" class="text-sm cursor-pointer hover:text-white transition-colors">OVERSIZED TEE</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat3" class="custom-checkbox">
                                    <label for="cat3" class="text-sm cursor-pointer hover:text-white transition-colors">ZIP HOODIE/HOODIE/CREWNECK</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat4" class="custom-checkbox">
                                    <label for="cat4" class="text-sm cursor-pointer hover:text-white transition-colors">KNITWEAR/CARDIGAN</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="cat5" class="custom-checkbox">
                                    <label for="cat5" class="text-sm cursor-pointer hover:text-white transition-colors">CROPTOP/TANKTOP</label>
                                </div>
                                <div class="mt-3">
                                    <button class="flex items-center text-sm text-gray-400 hover:text-white transition">
                                        Lihat lainnya <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Type -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('productType')">
                                <h3 class="text-lg"><i class="fas fa-th-large filter-icon"></i>Product Type</h3>
                                <i id="productType-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="productType-content" class="filter-content active space-y-3 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="pt1" class="custom-checkbox" checked>
                                    <label for="pt1" class="text-sm cursor-pointer hover:text-white transition-colors">All Products</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="pt2" class="custom-checkbox">
                                    <label for="pt2" class="text-sm cursor-pointer hover:text-white transition-colors">Featured Products</label>
                                </div>
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('availability')">
                                <h3 class="text-lg"><i class="fas fa-check-circle filter-icon"></i>Availability</h3>
                                <i id="availability-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="availability-content" class="filter-content active space-y-3 mt-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="a1" class="custom-checkbox">
                                    <label for="a1" class="text-sm cursor-pointer hover:text-white transition-colors">All</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="a2" class="custom-checkbox">
                                    <label for="a2" class="text-sm cursor-pointer hover:text-white transition-colors">Available</label>
                                </div>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('priceRange')">
                                <h3 class="text-lg"><i class="fas fa-dollar-sign filter-icon"></i>Price</h3>
                                <i id="priceRange-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="priceRange-content" class="filter-content active space-y-4 mt-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-full">
                                        <input type="range" min="0" max="1000000" value="500000"
                                            class="w-full accent-white">
                                        <div class="flex justify-between mt-2">
                                            <span class="text-xs text-gray-400">Rp 0</span>
                                            <span class="text-xs text-gray-400">Rp 1.000.000</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Min"
                                            class="w-full search-input rounded py-2 px-3 text-sm">
                                    </div>
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Max"
                                            class="w-full search-input rounded py-2 px-3 text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('colors')">
                                <h3 class="text-lg"><i class="fas fa-palette filter-icon"></i>Color</h3>
                                <i id="colors-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="colors-content" class="filter-content active space-y-2 mt-3">
                                <div class="grid grid-cols-5 gap-3">
                                    <div class="w-6 h-6 rounded-full bg-black border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-white border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-gray-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-blue-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-red-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-green-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-yellow-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-pink-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-purple-500 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-amber-800 border border-gray-600 cursor-pointer color-circle">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Size -->
                        <div class="filter-section">
                            <div class="filter-title" onclick="toggleFilter('size')">
                                <h3 class="text-lg"><i class="fas fa-ruler filter-icon"></i>Size</h3>
                                <i id="size-icon" class="fas fa-chevron-down transition-transform"></i>
                            </div>
                            <div id="size-content" class="filter-content active space-y-2 mt-3">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="size-button w-full h-9 flex items-center justify-center border border-gray-600 cursor-pointer text-sm bg-transparent hover:bg-gray-800 transition-all">
                                        S</div>
                                    <div class="size-button w-full h-9 flex items-center justify-center border border-gray-600 cursor-pointer text-sm bg-transparent hover:bg-gray-800 transition-all">
                                        M</div>
                                    <div class="size-button w-full h-9 flex items-center justify-center border border-gray-600 cursor-pointer text-sm bg-transparent hover:bg-gray-800 transition-all">
                                        L</div>
                                    <div class="size-button w-full h-9 flex items-center justify-center border border-gray-600 cursor-pointer text-sm bg-transparent hover:bg-gray-800 transition-all">
                                        XL</div>
                                    <div class="size-button w-full h-9 flex items-center justify-center border border-gray-600 cursor-pointer text-sm bg-transparent hover:bg-gray-800 transition-all">
                                        XXL</div>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filter Button -->
                        <div class="apply-filters-bar">
                            <button class="w-full button-primary py-3 rounded-md text-sm">
                                <i class="fas fa-filter mr-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>

                    <!-- Main Products Display -->
                    <div class="w-full md:w-3/4 lg:w-4/5">
                        <!-- Header -->
                        <div class="glassmorphism mb-6 p-4 rounded-lg flex flex-col sm:flex-row justify-between items-center">
                            <h1 class="text-2xl font-bold mb-3 sm:mb-0">All Products</h1>
                            
                            <div class="flex items-center gap-3">
                                <div class="hidden sm:flex items-center">
                                    <span class="text-gray-400 mr-2">View:</span>
                                    <button class="p-2 hover:bg-gray-800 rounded transition-colors">
                                        <i class="fas fa-th text-white"></i>
                                    </button>
                                    <button class="p-2 hover:bg-gray-800 rounded transition-colors">
                                        <i class="fas fa-list text-gray-500"></i>
                                    </button>
                                </div>
                                
                            <div class="dropdown-sort">
                                    <button class="flex items-center sort-button px-4 py-2 rounded">
                                        <i class="fas fa-sort mr-2"></i> Best Seller <i class="fas fa-chevron-down ml-2"></i>
                                </button>
                                    <div class="dropdown-sort-content rounded">
                                        <a href="#" class="block sort-option"><i class="fas fa-clock mr-2"></i> Newest</a>
                                        <a href="#" class="block sort-option"><i class="fas fa-arrow-down mr-2"></i> Price: High to Low</a>
                                        <a href="#" class="block sort-option"><i class="fas fa-arrow-up mr-2"></i> Price: Low to High</a>
                                        <a href="#" class="block sort-option"><i class="fas fa-award mr-2"></i> Best Seller</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Product Items -->
                            @foreach ($products as $product)
                                <a href="{{ route('product.detail', $product->slug) }}" 
                                   class="product-item rounded-lg overflow-hidden">
                                    <div class="relative product-image-container">
                                        <div class="stok-badge">OUT OF STOCK</div>
                                        <img src="{{ asset('img/1.jpg') }}" alt="Hat"
                                            class="w-full h-72 object-cover product-image">
                                        <img src="{{ asset('img/2.jpg') }}" alt="Hat Alternate View"
                                            class="w-full h-72 object-cover product-image-hover">
                                    </div>
                                    <div class="p-4">
                                        <div class="category-label">Fashion</div>
                                        <h3 class="product-name">{{ $product->name }}</h3>
                                        <p class="price-tag text-lg font-bold mt-2">{{ $product->price }}</p>
                                        <div class="rating-stars">
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                            <span class="text-xs ml-1 text-gray-300">4.5</span>
                                            <span class="text-xs ml-1 text-gray-500">(120)</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-10 flex justify-center">
                            <div class="flex rounded-md">
                                <a href="#" class="pagination-link px-3 py-2 rounded-l-md border-r-0">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" class="pagination-link px-4 py-2 border-r-0 bg-white text-black">1</a>
                                <a href="#" class="pagination-link px-4 py-2 border-r-0">2</a>
                                <a href="#" class="pagination-link px-4 py-2 border-r-0">3</a>
                                <a href="#" class="pagination-link px-4 py-2 border-r-0">4</a>
                                <a href="#" class="pagination-link px-4 py-2 border-r-0">5</a>
                                <a href="#" class="pagination-link px-3 py-2 rounded-r-md">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter toggle for mobile
            const filterBtn = document.getElementById('filterBtn');
            const filterMenu = document.getElementById('filterMenu');
            
            if (filterBtn && filterMenu) {
                filterBtn.addEventListener('click', function() {
                    filterMenu.classList.toggle('hidden');
                });
            }

            // Size button selection
            const sizeButtons = document.querySelectorAll('.size-button');
            sizeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    sizeButtons.forEach(btn => btn.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Initialize price range slider if it exists
            const priceRange = document.getElementById('priceRange');
            if (priceRange) {
                const minPrice = document.getElementById('minPrice');
                const maxPrice = document.getElementById('maxPrice');
                
                if (window.noUiSlider) {
                    noUiSlider.create(priceRange, {
                        start: [parseInt(minPrice.dataset.min) || 0, parseInt(maxPrice.dataset.max) || 1000000],
                        connect: true,
                        range: {
                            'min': parseInt(minPrice.dataset.min) || 0,
                            'max': parseInt(maxPrice.dataset.max) || 1000000
                        },
                        format: {
                            to: function (value) {
                                return Math.round(value);
                            },
                            from: function (value) {
                                return Math.round(value);
                            }
                        }
                    });
                    
                    priceRange.noUiSlider.on('update', function (values, handle) {
                        if (handle === 0) {
                            minPrice.value = values[0];
                            document.getElementById('displayMinPrice').textContent = new Intl.NumberFormat('id-ID').format(values[0]);
                        } else {
                            maxPrice.value = values[1];
                            document.getElementById('displayMaxPrice').textContent = new Intl.NumberFormat('id-ID').format(values[1]);
                        }
                    });
                }
            }

            // Add hover effect for categories
            const categoryLabels = document.querySelectorAll('.filter-content label');
            categoryLabels.forEach(label => {
                label.addEventListener('mouseover', function() {
                    this.classList.add('text-white');
                });
                label.addEventListener('mouseout', function() {
                    this.classList.remove('text-white');
                });
            });
        });
        
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
</script>
</x-app-layout>
