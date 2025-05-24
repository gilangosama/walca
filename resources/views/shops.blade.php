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
                    colors: {
                        gold: '#FFD700',
                        goldenrod: '#FFA500',
                    },
                    transitionProperty: {
                        'max-height': 'max-height',
                    },
                }
            },
            plugins: [
                function({ addVariant }) {
                    addVariant('selected', '&.selected');
                    addVariant('active', '&.active');
                },
            ],
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
            background-color: rgba(255, 255, 255, 0.05);
        }

        .custom-checkbox:hover {
            border-color: #999;
            background-color: rgba(255, 255, 255, 0.1);
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
            padding-bottom: 1.25rem;
            margin-bottom: 1.25rem;
            transition: all 0.3s ease;
        }

        .filter-section:hover {
            border-bottom-color: #555;
        }

        .filter-section:last-child {
            border-bottom: none;
        }

        .filter-title {
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            padding: 0.75rem 0.5rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .filter-title:hover {
            background-color: rgba(255, 255, 255, 0.05);
            transform: translateX(3px);
        }

        .filter-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            padding-left: 0.5rem;
        }

        .filter-content.active {
            max-height: 500px;
            opacity: 1;
            padding-top: 0.5rem;
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
            background-color: rgba(17, 17, 17, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid #333;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            transform: translateZ(0);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .sidebar-container:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        .filter-icon {
            display: inline-block;
            margin-right: 10px;
            color: #FFD700;
            width: 22px;
            text-align: center;
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .filter-title:hover .filter-icon {
            transform: scale(1.2);
        }

        .button-primary {
            background: linear-gradient(to right, #FFD700, #FFA500);
            color: black;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            overflow: hidden;
            position: relative;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.2);
        }
        
        .button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
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
        
        .filter-label {
            transition: all 0.2s ease;
            padding: 6px 10px;
            border-radius: 4px;
            display: block;
            cursor: pointer;
        }

        .filter-label:hover {
            background-color: rgba(255, 255, 255, 0.05);
            transform: translateX(5px);
        }
        
        .apply-filters-bar {
            position: sticky;
            bottom: 0;
            background-color: rgba(20, 20, 20, 0.95);
            backdrop-filter: blur(15px);
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 20px;
            margin-left: -16px;
            margin-right: -16px;
            margin-bottom: -16px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 -10px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .apply-filters-bar:hover {
            background-color: rgba(25, 25, 25, 0.98);
        }

        .color-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        .color-circle:hover {
            transform: scale(1.15);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .color-circle.selected:after {
            content: '✓';
            position: absolute;
            color: #fff;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-shadow: 0 0 3px rgba(0, 0, 0, 0.8);
        }

        .range-slider {
            height: 6px;
            border-radius: 3px;
            background: #333;
            outline: none;
            appearance: none;
        }

        .range-slider::-webkit-slider-thumb {
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FFD700;
            cursor: pointer;
            border: 2px solid #000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .range-slider::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FFD700;
            cursor: pointer;
            border: 2px solid #000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .size-button {
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid #333;
            border-radius: 4px;
            font-weight: 500;
        }
        
        .size-button:hover {
            background-color: rgba(255, 215, 0, 0.8);
            color: #000;
            border-color: rgba(255, 215, 0, 0.8);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .size-button.selected {
            background-color: #FFD700;
            color: #000;
            border-color: #FFD700;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        }
    </style>
    </head>

    <body class="bg-black font-sans text-white">
        <!-- Main Content with necessary top padding to prevent overlapping with fixed header -->
        <div class="pt-28 pb-16 bg-black">
            <div class="container mx-auto max-w-7xl px-4">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Sidebar Filters -->
                    <div class="w-full md:w-1/4 lg:w-1/5 bg-black/95 backdrop-blur-xl border border-neutral-700 rounded-xl shadow-lg shadow-black/30 ring-1 ring-white/5 transition-all duration-300 transform translate-z-0 h-fit sticky top-[120px] p-4 hover:shadow-xl hover:shadow-black/40 hover:ring-white/8">
                        <!-- Search -->
                        <div class="mb-6 relative">
                            <input type="text" placeholder="Cari produk..."
                                class="w-full bg-neutral-800/70 backdrop-blur-md border border-neutral-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-gold text-white transition-all duration-300 focus:border-white focus:bg-neutral-800/90 focus:shadow-md focus:shadow-white/15 placeholder-neutral-500">
                            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-neutral-400"></i>
                        </div>

                        <h2 class="text-xl font-bold mb-4 border-b border-neutral-700 pb-2 text-gold">Filter</h2>

                        <!-- Categories -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('category')">
                                <h3 class="text-lg"><i class="fas fa-tags inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Category</h3>
                                <i id="category-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="category-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-2 mt-2 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat1" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="cat1" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">RELEASE TODAY</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat2" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="cat2" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">OVERSIZED TEE</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat3" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="cat3" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">ZIP HOODIE/HOODIE/CREWNECK</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat4" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="cat4" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">KNITWEAR/CARDIGAN</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat5" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="cat5" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">CROPTOP/TANKTOP</label>
                                </div>
                                <div class="mt-3">
                                    <button class="flex items-center text-sm text-gold hover:text-yellow-300 transition group">
                                        <span>Lihat lainnya</span> <i class="fas fa-chevron-down ml-1 transition-transform group-hover:rotate-180"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Type -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('productType')">
                                <h3 class="text-lg"><i class="fas fa-th-large inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Product Type</h3>
                                <i id="productType-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="productType-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-2 mt-2 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="pt1" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2" checked>
                                    <label for="pt1" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">All Products</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="pt2" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="pt2" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">Featured Products</label>
                                </div>
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('availability')">
                                <h3 class="text-lg"><i class="fas fa-check-circle inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Availability</h3>
                                <i id="availability-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="availability-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-2 mt-2 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="a1" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="a1" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">All</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="a2" class="w-[18px] h-[18px] appearance-none border border-neutral-500 rounded cursor-pointer transition-all duration-200 bg-white/5 hover:border-neutral-400 hover:bg-white/10 checked:bg-white checked:border-white relative
                                    checked:after:content-['✓'] checked:after:absolute checked:after:text-black checked:after:text-xs checked:after:top-1/2 checked:after:left-1/2 checked:after:-translate-x-1/2 checked:after:-translate-y-1/2">
                                    <label for="a2" class="text-sm cursor-pointer transition-all duration-200 py-1.5 px-2.5 rounded block hover:bg-white/5 hover:translate-x-[5px]">Available</label>
                                </div>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('priceRange')">
                                <h3 class="text-lg"><i class="fas fa-dollar-sign inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Price</h3>
                                <i id="priceRange-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="priceRange-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-4 mt-3 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-full">
                                        <input type="range" min="0" max="1000000" value="500000"
                                            class="w-full h-1.5 rounded-md bg-neutral-700 outline-none appearance-none accent-gold [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-[18px] [&::-webkit-slider-thumb]:h-[18px] [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-gold [&::-webkit-slider-thumb]:cursor-pointer [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-black [&::-webkit-slider-thumb]:shadow-md [&::-moz-range-thumb]:w-[18px] [&::-moz-range-thumb]:h-[18px] [&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:bg-gold [&::-moz-range-thumb]:cursor-pointer [&::-moz-range-thumb]:border-2 [&::-moz-range-thumb]:border-black [&::-moz-range-thumb]:shadow-md">
                                        <div class="flex justify-between mt-2">
                                            <span class="text-xs text-neutral-400">Rp 0</span>
                                            <span class="text-xs text-neutral-400">Rp 1.000.000</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Min"
                                            class="w-full bg-neutral-800/70 backdrop-blur-md border border-neutral-600 rounded py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-white">
                                    </div>
                                    <div class="w-1/2">
                                        <input type="text" placeholder="Max"
                                            class="w-full bg-neutral-800/70 backdrop-blur-md border border-neutral-600 rounded py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-white">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('colors')">
                                <h3 class="text-lg"><i class="fas fa-palette inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Color</h3>
                                <i id="colors-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="colors-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-2 mt-3 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="grid grid-cols-5 gap-3">
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-black" data-color="black"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-white" data-color="white"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-gray-500" data-color="gray"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-blue-500" data-color="blue"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-red-500" data-color="red"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-green-500" data-color="green"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-yellow-500" data-color="yellow"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-pink-500" data-color="pink"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-purple-500" data-color="purple"></div>
                                    <div class="w-6 h-6 rounded-full border-2 border-white/10 cursor-pointer transition-all duration-300 shadow-md hover:scale-115 hover:border-white/50 hover:shadow-lg relative after:content-['✓'] after:absolute after:text-white after:text-xs after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:opacity-0 after:shadow-sm after:text-shadow selected:after:opacity-100 bg-amber-800" data-color="brown"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Size -->
                        <div class="border-b border-neutral-700 pb-5 mb-5 transition-all duration-300 hover:border-neutral-500 last:border-b-0">
                            <div class="font-semibold flex justify-between cursor-pointer py-3 px-2 rounded-md transition-all duration-300 hover:bg-white/5 hover:translate-x-[3px]" onclick="toggleFilter('size')">
                                <h3 class="text-lg"><i class="fas fa-ruler inline-block mr-2.5 text-gold w-[22px] text-center text-sm transition-transform duration-300 group-hover:scale-120"></i>Size</h3>
                                <i id="size-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                            </div>
                            <div id="size-content" class="max-h-0 overflow-hidden transition-all duration-300 opacity-0 pl-2 space-y-2 mt-3 active:max-h-[500px] active:opacity-100 active:pt-2">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="bg-white/5 border border-neutral-700 rounded transition-all duration-300 font-medium w-full h-9 flex items-center justify-center cursor-pointer text-sm hover:bg-gold/80 hover:text-black hover:border-gold/80 hover:-translate-y-0.5 hover:shadow-md hover:shadow-black/20 selected:bg-gold selected:text-black selected:border-gold selected:font-semibold selected:shadow-md selected:shadow-gold/30">S</div>
                                    <div class="bg-white/5 border border-neutral-700 rounded transition-all duration-300 font-medium w-full h-9 flex items-center justify-center cursor-pointer text-sm hover:bg-gold/80 hover:text-black hover:border-gold/80 hover:-translate-y-0.5 hover:shadow-md hover:shadow-black/20 selected:bg-gold selected:text-black selected:border-gold selected:font-semibold selected:shadow-md selected:shadow-gold/30">M</div>
                                    <div class="bg-white/5 border border-neutral-700 rounded transition-all duration-300 font-medium w-full h-9 flex items-center justify-center cursor-pointer text-sm hover:bg-gold/80 hover:text-black hover:border-gold/80 hover:-translate-y-0.5 hover:shadow-md hover:shadow-black/20 selected:bg-gold selected:text-black selected:border-gold selected:font-semibold selected:shadow-md selected:shadow-gold/30">L</div>
                                    <div class="bg-white/5 border border-neutral-700 rounded transition-all duration-300 font-medium w-full h-9 flex items-center justify-center cursor-pointer text-sm hover:bg-gold/80 hover:text-black hover:border-gold/80 hover:-translate-y-0.5 hover:shadow-md hover:shadow-black/20 selected:bg-gold selected:text-black selected:border-gold selected:font-semibold selected:shadow-md selected:shadow-gold/30">XL</div>
                                    <div class="bg-white/5 border border-neutral-700 rounded transition-all duration-300 font-medium w-full h-9 flex items-center justify-center cursor-pointer text-sm hover:bg-gold/80 hover:text-black hover:border-gold/80 hover:-translate-y-0.5 hover:shadow-md hover:shadow-black/20 selected:bg-gold selected:text-black selected:border-gold selected:font-semibold selected:shadow-md selected:shadow-gold/30">XXL</div>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filter Button -->
                        <div class="sticky bottom-0 bg-neutral-900/95 backdrop-blur-xl py-5 px-5 border-t border-white/10 mt-5 -mx-4 -mb-4 rounded-b-xl shadow-lg shadow-black/20 transition-all duration-300 hover:bg-neutral-900/98">
                            <button class="w-full bg-gradient-to-r from-gold to-goldenrod text-black transition-all duration-300 font-semibold tracking-wider py-3 rounded-md text-sm overflow-hidden relative shadow-md shadow-gold/20 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-gold/30 after:content-[''] after:absolute after:inset-0 after:bg-gradient-to-r after:from-transparent after:via-white/20 after:to-transparent after:-left-full after:transition-all after:duration-300 hover:after:left-full">
                                <i class="fas fa-filter mr-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>

                    <!-- Main Products Display -->
                    <div class="w-full md:w-3/4 lg:w-4/5">
                        <!-- Header -->
                        <div class="bg-black/80 backdrop-blur-md mb-6 p-5 rounded-lg flex flex-col sm:flex-row justify-between items-center border border-neutral-800 shadow-lg">
                            <h1 class="text-2xl font-bold mb-3 sm:mb-0 text-white">All Products</h1>
                            
                            <div class="relative group" style="position: relative;">
                                <button class="flex items-center bg-neutral-800/70 backdrop-blur-md border border-neutral-700 px-4 py-2.5 rounded-md text-white transition-all duration-300 hover:bg-neutral-700 hover:border-neutral-600">
                                    <i class="fas fa-sort mr-2 text-gold"></i> Best Seller <i class="fas fa-chevron-down ml-2 text-neutral-400"></i>
                                </button>
                                <div style="position: absolute; right: 0; top: 100%; margin-top: 0.25rem; z-index: 99999; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);" class="hidden group-hover:block bg-neutral-800/95 backdrop-blur-xl min-w-[200px] rounded-md border border-neutral-700 overflow-visible">
                                    <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-neutral-700 transition-colors border-b border-neutral-700">
                                        <i class="fas fa-clock mr-2 text-gold"></i> Newest
                                    </a>
                                    <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-neutral-700 transition-colors border-b border-neutral-700">
                                        <i class="fas fa-arrow-down mr-2 text-gold"></i> Price: High to Low
                                    </a>
                                    <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-neutral-700 transition-colors border-b border-neutral-700">
                                        <i class="fas fa-arrow-up mr-2 text-gold"></i> Price: Low to High
                                    </a>
                                    <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-neutral-700 transition-colors">
                                        <i class="fas fa-award mr-2 text-gold"></i> Best Seller
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Product Items -->
                            @foreach ($products as $product)
                                <a href="{{ route('product.detail', $product->slug) }}" 
                                   class="group bg-neutral-900/50 backdrop-blur-sm border border-neutral-800 rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-black/30 hover:border-neutral-700">
                                    <div class="relative overflow-hidden">
                                        @if($product->stock <= 0)
                                            <div class="absolute top-3 left-3 bg-white text-black text-xs font-bold uppercase tracking-wider py-1 px-2 rounded z-10">OUT OF STOCK</div>
                                        @endif
                                        @if(isset($product->image) && is_array($product->image) && count($product->image) > 0)
                                            <img src="{{ asset('storage/product/' . $product->image[0]) }}" alt="{{ $product->name }}"
                                                class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                                            @if(count($product->image) > 1)
                                                <img src="{{ asset('storage/product/' . $product->image[1]) }}" alt="{{ $product->name }} Alternate View"
                                                    class="absolute inset-0 w-full h-80 object-cover opacity-0 transition-opacity duration-700 group-hover:opacity-100">
                                            @endif
                                        @else
                                            <img src="{{ asset('img/1.jpg') }}" alt="Default Product Image"
                                                class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <div class="text-gold text-sm mb-2">Fashion</div>
                                        <h3 class="text-lg font-semibold mb-2 text-white group-hover:text-gold transition-colors">{{ $product->name }}</h3>
                                        <p class="text-xl font-bold mb-3 text-white">{{ $product->price }}</p>
                                        <div class="flex items-center">
                                            <div class="flex mr-2">
                                                <i class="fas fa-star text-gold text-xs"></i>
                                                <i class="fas fa-star text-gold text-xs"></i>
                                                <i class="fas fa-star text-gold text-xs"></i>
                                                <i class="fas fa-star text-gold text-xs"></i>
                                                <i class="fas fa-star-half-alt text-gold text-xs"></i>
                                            </div>
                                            <span class="text-xs text-white">4.5</span>
                                            <span class="text-xs text-neutral-500 ml-1">(120)</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-12 flex justify-center">
                            <div class="flex rounded-md overflow-hidden shadow-lg">
                                <a href="#" class="bg-neutral-800 text-white px-4 py-3 border-r border-neutral-700 hover:bg-neutral-700 transition-colors">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" class="bg-gold text-black px-5 py-3 border-r border-neutral-700 font-medium">1</a>
                                <a href="#" class="bg-neutral-800 text-white px-5 py-3 border-r border-neutral-700 hover:bg-neutral-700 transition-colors">2</a>
                                <a href="#" class="bg-neutral-800 text-white px-5 py-3 border-r border-neutral-700 hover:bg-neutral-700 transition-colors">3</a>
                                <a href="#" class="bg-neutral-800 text-white px-5 py-3 border-r border-neutral-700 hover:bg-neutral-700 transition-colors">4</a>
                                <a href="#" class="bg-neutral-800 text-white px-5 py-3 border-r border-neutral-700 hover:bg-neutral-700 transition-colors">5</a>
                                <a href="#" class="bg-neutral-800 text-white px-4 py-3 hover:bg-neutral-700 transition-colors">
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

    // Price Range Slider
    const priceSlider = document.querySelector('.range-slider');
    const priceMin = document.querySelector('input[placeholder="Min"]');
    const priceMax = document.querySelector('input[placeholder="Max"]');
    
    if(priceSlider) {
        priceSlider.addEventListener('input', function() {
            const value = this.value;
            const max = this.max;
            const percentage = (value / max) * 100;
            
            // Format the value as currency
            const formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
            
            // Update the max input value
            priceMax.value = formattedValue;
        });
    }

    // Toggle Filter Sections
    function toggleFilter(id) {
        const content = document.getElementById(`${id}-content`);
        const icon = document.getElementById(`${id}-icon`);
        
        if (content.classList.contains('active')) {
            content.classList.remove('active');
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.classList.add('active');
            icon.style.transform = 'rotate(-180deg)';
        }
    }

    // Color Selection
    const colorCircles = document.querySelectorAll('.color-circle');
    colorCircles.forEach(circle => {
        circle.addEventListener('click', function() {
            const wasSelected = this.classList.contains('selected');
            
            // Remove selected from all circles if not multi-select
            // colorCircles.forEach(c => c.classList.remove('selected'));
            
            // Toggle selection on the clicked circle
            if (wasSelected) {
                this.classList.remove('selected');
            } else {
                this.classList.add('selected');
            }
        });
    });

    // Size Selection
    const sizeButtons = document.querySelectorAll('.size-button');
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const wasSelected = this.classList.contains('selected');
            
            // Toggle selection
            if (wasSelected) {
                this.classList.remove('selected');
            } else {
                // Remove selected from other buttons if not multi-select
                // sizeButtons.forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
            }
        });
    });

    // Filter Labels Hover
    const filterLabels = document.querySelectorAll('.filter-label');
    filterLabels.forEach(label => {
        label.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        label.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Apply Button Animation
    const applyButton = document.querySelector('.button-primary');
    if (applyButton) {
        applyButton.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        applyButton.addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });
        
        // Add shine effect on hover
        applyButton.addEventListener('mousemove', function(e) {
            const x = e.pageX - this.offsetLeft;
            const y = e.pageY - this.offsetTop;
            
            this.style.setProperty('--x', x + 'px');
            this.style.setProperty('--y', y + 'px');
        });
    }
    
    // Initialize all filter sections as open by default
    document.addEventListener('DOMContentLoaded', function() {
        const filterSections = ['category', 'productType', 'availability', 'priceRange', 'colors', 'size'];
        filterSections.forEach(section => {
            const content = document.getElementById(`${section}-content`);
            const icon = document.getElementById(`${section}-icon`);
            
            if (content && !content.classList.contains('active')) {
                content.classList.add('active');
                if (icon) icon.style.transform = 'rotate(-180deg)';
            }
        });
        
        // Initialize price slider
        if(priceSlider) {
            const formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(priceSlider.value);
            
            priceMax.value = formattedValue;
            priceMin.value = "Rp 0";
        }
    });
</script>
</x-app-layout>
