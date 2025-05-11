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
                                <p class="text-sm font-medium text-gray-900 order-summary-subtotal">Rp 648.000</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm text-gray-600">Shipping</p>
                                <p class="text-sm font-medium text-gray-900">Calculated at checkout</p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 mt-6 pt-6">
                            <div class="flex justify-between">
                                <p class="text-base font-medium text-gray-900">Total</p>
                                <p class="text-base font-medium text-gray-900 order-summary-total">Rp 648.000</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('checkout') }}" id="checkoutButton" class="block text-center mt-6 w-full bg-black py-3 px-4 rounded-md text-sm font-medium text-white hover:bg-gray-900 transition duration-150 ease-in-out">
                            Continue to Checkout
                        </a>
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
            // Load cart items from localStorage
            const currentOrder = JSON.parse(localStorage.getItem('currentOrder'));
            if (currentOrder) {
                // Kosongkan cart container terlebih dahulu
                const cartContainer = document.querySelector('.divide-y.divide-gray-200');
                cartContainer.innerHTML = '';
                
                // Format harga
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                
                // Hitung total
                const totalPrice = currentOrder.price * currentOrder.quantity;
                
                // Buat element cart item
                const cartItemHTML = `
                    <div class="cart-item py-6 md:grid md:grid-cols-12 md:gap-4 md:items-center">
                        <div class="md:col-span-6 flex items-start space-x-4">
                            <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="{{ asset('img/1.jpg') }}" alt="${currentOrder.productName}" class="h-full w-full object-cover object-center">
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-base font-medium text-gray-900">${currentOrder.productName}</h3>
                                <p class="mt-1 text-sm text-gray-500">${currentOrder.size}</p>
                                <button class="remove-btn mt-2 text-sm text-gray-500 flex items-center md:hidden" onclick="removeCartItem()">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                        <div class="md:col-span-2 text-center mt-4 md:mt-0">
                            <p class="text-sm font-medium text-gray-900">${formatter.format(currentOrder.price)}</p>
                        </div>
                        <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                            <div class="flex items-center">
                                <button class="quantity-btn rounded-l-md" onclick="updateQuantity(-1)">
                                    <i class="fas fa-minus text-xs"></i>
                                </button>
                                <input type="text" value="${currentOrder.quantity}" class="w-10 h-30px text-center border-t border-b border-gray-300 text-sm quantity-input" readonly>
                                <button class="quantity-btn rounded-r-md" onclick="updateQuantity(1)">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>
                        <div class="md:col-span-2 text-center mt-4 md:mt-0">
                            <p class="item-total text-sm font-medium text-gray-900">${formatter.format(totalPrice)}</p>
                            <button class="remove-btn hidden md:inline-block text-sm text-gray-500 mt-2" onclick="removeCartItem()">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </div>
                    </div>
                `;
                
                // Tambahkan ke container
                cartContainer.innerHTML = cartItemHTML;
                
                // Update subtotal dan total
                document.querySelectorAll('.order-summary-subtotal').forEach(el => {
                    el.textContent = formatter.format(totalPrice);
                });
                document.querySelectorAll('.order-summary-total').forEach(el => {
                    el.textContent = formatter.format(totalPrice);
                });
            } else {
                // Jika tidak ada item di cart
                const cartContainer = document.querySelector('.divide-y.divide-gray-200');
                cartContainer.innerHTML = `
                    <div class="py-6 text-center">
                        <p class="text-gray-500">Keranjang belanja Anda kosong.</p>
                        <a href="{{ route('shops') }}" class="mt-4 inline-block text-sm font-medium text-black">
                            Belanja Sekarang
                        </a>
                    </div>
                `;
                
                // Disable tombol checkout
                const checkoutButton = document.getElementById('checkoutButton');
                if (checkoutButton) {
                    checkoutButton.classList.add('opacity-50', 'cursor-not-allowed');
                    checkoutButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        alert('Keranjang belanja Anda kosong.');
                    });
                }
            }
            
            // Fungsi untuk update quantity
            window.updateQuantity = function(change) {
                const input = document.querySelector('.quantity-input');
                let value = parseInt(input.value);
                const newValue = value + change;
                
                if (newValue >= 1) {
                    input.value = newValue;
                    
                    // Update localStorage
                    const currentOrder = JSON.parse(localStorage.getItem('currentOrder'));
                    if (currentOrder) {
                        currentOrder.quantity = newValue;
                        localStorage.setItem('currentOrder', JSON.stringify(currentOrder));
                        
                        // Format currency
                        const formatter = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0
                        });
                        
                        // Update total price
                        const totalPrice = currentOrder.price * newValue;
                        document.querySelector('.item-total').textContent = formatter.format(totalPrice);
                        
                        // Update subtotal dan total
                        document.querySelectorAll('.order-summary-subtotal').forEach(el => {
                            el.textContent = formatter.format(totalPrice);
                        });
                        document.querySelectorAll('.order-summary-total').forEach(el => {
                            el.textContent = formatter.format(totalPrice);
                        });
                    }
                }
            };
            
            // Fungsi untuk menghapus item
            window.removeCartItem = function() {
                localStorage.removeItem('currentOrder');
                const cartItem = document.querySelector('.cart-item');
                cartItem.style.opacity = '0';
                
                // Format currency untuk tampilan
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                
                setTimeout(() => {
                    cartItem.remove();
                    
                    // Reset subtotal dan total
                    document.querySelectorAll('.order-summary-subtotal').forEach(el => {
                        el.textContent = formatter.format(0);
                    });
                    document.querySelectorAll('.order-summary-total').forEach(el => {
                        el.textContent = formatter.format(0);
                    });
                    
                    // Tampilkan pesan keranjang kosong
                    const cartContainer = document.querySelector('.divide-y.divide-gray-200');
                    cartContainer.innerHTML = `
                        <div class="py-6 text-center">
                            <p class="text-gray-500">Keranjang belanja Anda kosong.</p>
                            <a href="{{ route('shops') }}" class="mt-4 inline-block text-sm font-medium text-black">
                                Belanja Sekarang
                            </a>
                        </div>
                    `;
                    
                    // Disable tombol checkout
                    const checkoutButton = document.getElementById('checkoutButton');
                    if (checkoutButton) {
                        checkoutButton.classList.add('opacity-50', 'cursor-not-allowed');
                        checkoutButton.addEventListener('click', function(e) {
                            e.preventDefault();
                            alert('Keranjang belanja Anda kosong.');
                        });
                    }
                }, 300);
            };
        });
    </script>
</x-app-layout>
