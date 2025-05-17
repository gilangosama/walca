<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background: linear-gradient(45deg, #000, #111);
            color: white;
        }

        .cart-container {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .cart-item {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 0;
        }

        .cart-item:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }

        .cart-header {
            color: rgba(255, 255, 255, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 1rem;
        }

        .product-details {
            color: rgba(255, 255, 255, 0.9);
        }

        .product-name {
            color: white;
            font-weight: 600;
        }

        .product-size {
            color: rgba(255, 255, 255, 0.7);
        }

        .product-price {
            color: white;
            font-weight: 600;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .quantity-input {
            background: rgba(0, 0, 0, 0.3);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 50px !important;
            text-align: center;
        }

        .remove-btn {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.375rem;
            background: rgba(255, 255, 255, 0.1);
        }

        .remove-btn:hover {
            color: #ff4444;
            background: rgba(255, 255, 255, 0.15);
        }

        .continue-shopping {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .continue-shopping:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .order-summary {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            color: white;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: black;
            font-weight: 600;
            padding: 1rem;
            border-radius: 0.5rem;
            width: 100%;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .checkout-btn.disabled {
            background: linear-gradient(135deg, #808080, #A9A9A9);
            cursor: not-allowed;
            opacity: 0.7;
        }

        .payment-methods {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .payment-methods img {
            transition: all 0.3s ease;
            filter: grayscale(100%) brightness(1.2);
            opacity: 0.7;
        }

        .payment-methods img:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: translateY(-3px);
        }

        .product-image {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>

    <!-- Content Container -->
    <div class="pt-16">
        <!-- Page Title -->
        <div class="bg-black bg-opacity-50 py-6 border-b border-gray-800">
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-medium text-white">Keranjang Belanja</h1>
            </div>
        </div>

        <!-- Cart Content -->
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3 cart-container">
                    <!-- Cart Header -->
                    <div class="hidden md:grid md:grid-cols-12 gap-4 cart-header">
                        <div class="md:col-span-6">Produk</div>
                        <div class="md:col-span-2 text-center">Harga</div>
                        <div class="md:col-span-2 text-center">Jumlah</div>
                        <div class="md:col-span-2 text-center">Total</div>
                    </div>

                    <div class="divide-y divide-gray-800">
                        <!-- Cart items will be dynamically inserted here -->
                    </div>

                    <!-- Continue Shopping -->
                    <div class="mt-8">
                        <a href="/shops" class="continue-shopping">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Lanjutkan Belanja
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="order-summary">
                        <h2 class="text-xl font-medium text-white mb-6">Ringkasan Pesanan</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <p class="text-gray-300">Subtotal</p>
                                <p class="font-medium text-white order-summary-subtotal">Rp 0</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-300">Pengiriman</p>
                                <p class="font-medium text-white">Dihitung saat checkout</p>
                            </div>
                            
                            <div class="border-t border-gray-700 my-4"></div>
                        
                            <div class="flex justify-between">
                                <p class="text-lg font-medium text-white">Total</p>
                                <p class="text-lg font-medium text-white order-summary-total">Rp 0</p>
                            </div>
                        </div>
                        
                        <button id="checkoutButton" class="checkout-btn w-full mt-6">
                            Lanjut ke Pembayaran
                        </button>
                    </div>

                    <!-- Payment Methods -->
                    <div class="payment-methods">
                        <h3 class="text-sm font-medium text-white mb-4">Metode Pembayaran:</h3>
                        <div class="flex flex-wrap gap-3">
                            <!-- Payment method images -->
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
                const cartContainer = document.querySelector('.divide-y.divide-gray-800');
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
                            <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                <img src="{{ asset('img/1.jpg') }}" alt="${currentOrder.productName}" class="h-full w-full object-cover object-center">
                            </div>
                            <div class="flex flex-col product-details">
                                <h3 class="product-name">${currentOrder.productName}</h3>
                                <p class="mt-1 product-size">${currentOrder.size}</p>
                                <button class="remove-btn mt-2 text-sm flex items-center md:hidden" onclick="removeCartItem()">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </div>
                        </div>
                        <div class="md:col-span-2 text-center mt-4 md:mt-0">
                            <p class="product-price">${formatter.format(currentOrder.price)}</p>
                        </div>
                        <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                            <div class="flex items-center">
                                <button class="quantity-btn rounded-l-md" onclick="updateQuantity(-1)">
                                    <i class="fas fa-minus text-xs"></i>
                                </button>
                                <input type="text" value="${currentOrder.quantity}" class="quantity-input h-[35px]" readonly>
                                <button class="quantity-btn rounded-r-md" onclick="updateQuantity(1)">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>
                        <div class="md:col-span-2 text-center mt-4 md:mt-0">
                            <p class="item-total product-price">${formatter.format(totalPrice)}</p>
                            <button class="remove-btn hidden md:inline-flex items-center mt-2" onclick="removeCartItem()">
                                <i class="fas fa-trash mr-1"></i> Hapus
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
                const cartContainer = document.querySelector('.divide-y.divide-gray-800');
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
                    const cartContainer = document.querySelector('.divide-y.divide-gray-800');
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
