<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        .cart-item {
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            background-color: #f9f9f9;
        }
        .quantity-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e5e5e5;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .quantity-btn:hover {
            background-color: #f0f0f0;
        }
        .remove-btn {
            transition: all 0.2s ease;
        }
        .remove-btn:hover {
            color: #ff0000;
        }
    </style>

    <!-- Content Container with padding for fixed header -->
    <div class="bg-white pt-16">
        <!-- Page Title -->
        <div class="bg-gray-100 py-6 border-b border-gray-200">
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-medium text-gray-900">Shopping Cart</h1>
            </div>
        </div>

        <!-- Cart Content -->
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <!-- Cart Header (Desktop only) -->
                    <div class="hidden md:grid md:grid-cols-12 gap-4 pb-4 border-b border-gray-200 text-sm text-gray-500">
                        <div class="md:col-span-6">Product</div>
                        <div class="md:col-span-2 text-center">Price</div>
                        <div class="md:col-span-2 text-center">Quantity</div>
                        <div class="md:col-span-2 text-center">Total</div>
                    </div>

                    <!-- Cart Items List -->
                    <div class="divide-y divide-gray-200">
                        <!-- Item 1 -->
                        <div class="cart-item py-6 md:grid md:grid-cols-12 md:gap-4 md:items-center">
                            <div class="md:col-span-6 flex items-start space-x-4">
                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('img/product1.jpg') }}" alt="CHMB Basic White Shirt" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="text-base font-medium text-gray-900">CHMB Basic White Shirt</h3>
                                    <p class="mt-1 text-sm text-gray-500">White / XL</p>
                                    <button class="remove-btn mt-2 text-sm text-gray-500 flex items-center md:hidden">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                            <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                <p class="text-sm font-medium text-gray-900">Rp 249.000</p>
                            </div>
                            <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                                <div class="flex items-center">
                                    <button class="quantity-btn rounded-l-md">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <input type="text" value="1" class="w-10 h-30px text-center border-t border-b border-gray-300 text-sm" readonly>
                                    <button class="quantity-btn rounded-r-md">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                <p class="text-sm font-medium text-gray-900">Rp 249.000</p>
                                <button class="remove-btn hidden md:inline-block text-sm text-gray-500 mt-2">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="cart-item py-6 md:grid md:grid-cols-12 md:gap-4 md:items-center">
                            <div class="md:col-span-6 flex items-start space-x-4">
                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('img/product2.jpg') }}" alt="CHMB Comfort Hoodie" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="text-base font-medium text-gray-900">CHMB Comfort Hoodie</h3>
                                    <p class="mt-1 text-sm text-gray-500">Off-White / L</p>
                                    <button class="remove-btn mt-2 text-sm text-gray-500 flex items-center md:hidden">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                            <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                <p class="text-sm font-medium text-gray-900">Rp 399.000</p>
                            </div>
                            <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                                <div class="flex items-center">
                                    <button class="quantity-btn rounded-l-md">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <input type="text" value="1" class="w-10 h-30px text-center border-t border-b border-gray-300 text-sm" readonly>
                                    <button class="quantity-btn rounded-r-md">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                <p class="text-sm font-medium text-gray-900">Rp 399.000</p>
                                <button class="remove-btn hidden md:inline-block text-sm text-gray-500 mt-2">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="mt-8">
                        <a href="/shops" class="text-sm font-medium text-black flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-1/3 mt-8 lg:mt-0">
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900 mb-6">Order Summary</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <p class="text-sm text-gray-600">Subtotal</p>
                                <p class="text-sm font-medium text-gray-900">Rp 648.000</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm text-gray-600">Shipping</p>
                                <p class="text-sm font-medium text-gray-900">Calculated at checkout</p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 mt-6 pt-6">
                            <div class="flex justify-between">
                                <p class="text-base font-medium text-gray-900">Total</p>
                                <p class="text-base font-medium text-gray-900">Rp 648.000</p>
                            </div>
                        </div>
                        
                        <button class="mt-6 w-full bg-black py-3 px-4 rounded-md text-sm font-medium text-white hover:bg-gray-900 transition duration-150 ease-in-out">
                            Continue to Checkout
                        </button>
                    </div>

                    <!-- Payment Methods -->
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-900 mb-4">We Accept:</h3>
                        <div class="flex flex-wrap gap-2">
                            <img src="{{ asset('img/bayar/SVG.png') }}" alt="Payment Method" class="h-6">
                            <img src="{{ asset('img/bayar/SVG-1.png') }}" alt="Payment Method" class="h-6">
                            <img src="{{ asset('img/bayar/SVG-2.png') }}" alt="Payment Method" class="h-6">
                            <img src="{{ asset('img/bayar/SVG-3.png') }}" alt="Payment Method" class="h-6">
                            <img src="{{ asset('img/bayar/SVG-4.png') }}" alt="Payment Method" class="h-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol quantity
            const minusBtns = document.querySelectorAll('.quantity-btn:first-child');
            const plusBtns = document.querySelectorAll('.quantity-btn:last-child');
            
            minusBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.nextElementSibling;
                    let value = parseInt(input.value);
                    if (value > 1) {
                        input.value = value - 1;
                    }
                });
            });
            
            plusBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    let value = parseInt(input.value);
                    input.value = value + 1;
                });
            });
            
            // Tombol hapus
            const removeBtns = document.querySelectorAll('.remove-btn');
            
            removeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const item = this.closest('.cart-item');
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.remove();
                    }, 300);
                });
            });
        });
    </script>
</x-app-layout>
