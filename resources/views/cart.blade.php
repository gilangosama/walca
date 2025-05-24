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

                    <div class="divide-y divide-gray-800" id="cart-items-container">
                        @php
                            $subtotal = 0;
                            $hasItems = false;
                        @endphp
                        
                        @if(Auth::check() && isset($cartItems) && $cartItems->count() > 0)
                            @php $hasItems = true; @endphp
                            @foreach($cartItems as $item)
                                @php
                                    $itemTotal = $item->product->price * $item->quantity;
                                    $subtotal += $itemTotal;
                                    $productImage = $item->product->image[0] ?? '';
                                @endphp
                                
                                <div class="cart-item py-6 md:grid md:grid-cols-12 md:gap-4 md:items-center" data-id="{{ $item->id }}">
                                    <div class="md:col-span-6 flex items-start space-x-4">
                                        <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                            <img src="{{ $productImage }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="flex flex-col product-details">
                                            <h3 class="product-name">{{ $item->product->name }}</h3>
                                            @if($item->size)
                                                <p class="mt-1 product-size">Ukuran: {{ $item->size }}</p>
                                            @endif
                                            @if($item->color)
                                                <p class="mt-1 product-size">Warna: {{ $item->color }}</p>
                                            @endif
                                            @if($item->jenis)
                                                <p class="mt-1 product-size">Jenis: {{ $item->jenis }}</p>
                                            @endif
                                            <form method="POST" action="{{ route('cart.remove', $item->id) }}" class="mt-2 inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="remove-btn text-sm flex items-center">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                        <p class="product-price">{{ 'Rp ' . number_format($item->product->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                                        <div class="flex items-center">
                                            <form method="POST" action="{{ route('cart.update', $item->id) }}" class="flex">
                                                @csrf
                                                @method('PATCH')
                                                <button type="button" class="quantity-btn rounded-l-md decrement-btn">
                                                    <i class="fas fa-minus text-xs"></i>
                                                </button>
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="quantity-input h-[35px]" min="1">
                                                <button type="button" class="quantity-btn rounded-r-md increment-btn">
                                                    <i class="fas fa-plus text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                        <p class="item-total product-price">{{ 'Rp ' . number_format($itemTotal, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Ini akan diisi oleh JavaScript untuk user yang belum login -->
                            <div id="cart-placeholder" class="py-6 text-center">
                                <p class="text-gray-500">Memuat keranjang belanja...</p>
                            </div>
                        @endif
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
                                <p class="font-medium text-white order-summary-subtotal">{{ 'Rp ' . number_format($subtotal ?? 0, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-300">Pengiriman</p>
                                <p class="font-medium text-white">Dihitung saat checkout</p>
                            </div>
                            
                            <div class="border-t border-gray-700 my-4"></div>
                        
                            <div class="flex justify-between">
                                <p class="text-lg font-medium text-white">Total</p>
                                <p class="text-lg font-medium text-white order-summary-total">{{ 'Rp ' . number_format($subtotal ?? 0, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        @if(Auth::check())
                            @if(isset($cartItems) && $cartItems->count() > 0)
                                <form action="{{ route('cart.checkoutToSession') }}" method="POST" id="checkoutForm">
                                    @csrf
                                    <button type="submit" id="checkoutButton" class="checkout-btn w-full mt-6">
                                        Lanjut ke Pembayaran
                                    </button>
                                </form>
                            @else
                                <button disabled class="checkout-btn disabled w-full mt-6">
                                    Lanjut ke Pembayaran
                                </button>
                            @endif
                        @else
                            <button id="localCheckoutButton" class="checkout-btn w-full mt-6">
                                Lanjut ke Pembayaran
                            </button>
                        @endif
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
            // Check if user is authenticated
            const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            
            // Jika ada pending cart migration dari localStorage
            if (isAuthenticated) {
                const pendingCartMigration = sessionStorage.getItem('pendingCartMigration');
                if (pendingCartMigration) {
                    // Kirim data keranjang ke server
                    migrateCartToDatabase(JSON.parse(pendingCartMigration));
                    // Hapus data pending
                    sessionStorage.removeItem('pendingCartMigration');
                    // Hapus keranjang dari localStorage
                    localStorage.removeItem('cartItems');
                }
            }
            
            // Handle keranjang untuk user yang belum login
            if (!isAuthenticated) {
                loadLocalStorageCart();
            }
            
            // Quantity buttons untuk user yang sudah login
            document.querySelectorAll('.increment-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="quantity"]');
                    input.value = parseInt(input.value) + 1;
                    updateCart(this.closest('form'));
                });
            });
            
            document.querySelectorAll('.decrement-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="quantity"]');
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateCart(this.closest('form'));
                    }
                });
            });
            
            // Form checkout untuk user yang sudah login
            const checkoutForm = document.getElementById('checkoutForm');
            if (checkoutForm) {
                checkoutForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = "{{ route('checkout') }}";
                        } else {
                            alert(data.message || 'Terjadi kesalahan');
                        }
                    });
                });
            }
            
            // Local checkout button untuk user yang belum login
            const localCheckoutButton = document.getElementById('localCheckoutButton');
            if (localCheckoutButton) {
                localCheckoutButton.addEventListener('click', function() {
                    window.location.href = "{{ route('login', ['redirect' => route('cart')]) }}";
                });
            }
            
            // Function update cart untuk user yang sudah login
            function updateCart(form) {
                const formData = new FormData(form);
                const url = form.action;
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-HTTP-Method-Override': 'PATCH'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                });
            }
            
            // Function load cart dari localStorage untuk user yang belum login
            function loadLocalStorageCart() {
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                const cartContainer = document.getElementById('cart-items-container');
                const placeholder = document.getElementById('cart-placeholder');
                
                if (placeholder) {
                    if (cartItems.length > 0) {
                        // Kosongkan placeholder
                        placeholder.remove();
                        
                        // Format currency
                        const formatter = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0
                        });
                        
                        // Hitung subtotal
                        let subtotal = 0;
                        
                        // Render cart items
                        cartItems.forEach((item, index) => {
                            const itemTotal = item.price * item.quantity;
                            subtotal += itemTotal;
                            
                            const cartItemElement = document.createElement('div');
                            cartItemElement.className = 'cart-item py-6 md:grid md:grid-cols-12 md:gap-4 md:items-center';
                            cartItemElement.dataset.index = index;
                            
                            cartItemElement.innerHTML = `
                                <div class="md:col-span-6 flex items-start space-x-4">
                                    <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                        <img src="${item.productImage}" alt="${item.productName}" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="flex flex-col product-details">
                                        <h3 class="product-name">${item.productName}</h3>
                                        ${item.size ? `<p class="mt-1 product-size">Ukuran: ${item.size}</p>` : ''}
                                        ${item.color ? `<p class="mt-1 product-size">Warna: ${item.color}</p>` : ''}
                                        ${item.jenis ? `<p class="mt-1 product-size">Jenis: ${item.jenis}</p>` : ''}
                                        <button type="button" class="remove-btn mt-2 text-sm flex items-center" onclick="removeCartItem(${index})">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                                <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                    <p class="product-price">${formatter.format(item.price)}</p>
                                </div>
                                <div class="md:col-span-2 flex justify-center mt-4 md:mt-0">
                                    <div class="flex items-center">
                                        <button type="button" class="quantity-btn rounded-l-md" onclick="updateLocalQuantity(${index}, -1)">
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <input type="text" value="${item.quantity}" class="quantity-input h-[35px]" readonly>
                                        <button type="button" class="quantity-btn rounded-r-md" onclick="updateLocalQuantity(${index}, 1)">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="md:col-span-2 text-center mt-4 md:mt-0">
                                    <p class="item-total product-price">${formatter.format(itemTotal)}</p>
                                </div>
                            `;
                            
                            cartContainer.appendChild(cartItemElement);
                        });
                        
                        // Update subtotal dan total
                        document.querySelectorAll('.order-summary-subtotal, .order-summary-total').forEach(el => {
                            el.textContent = formatter.format(subtotal);
                        });
                    } else {
                        // Jika keranjang kosong
                        placeholder.innerHTML = `
                            <p class="text-gray-500">Keranjang belanja Anda kosong.</p>
                            <a href="{{ route('shops') }}" class="mt-4 inline-block text-sm font-medium text-white">
                                Belanja Sekarang
                            </a>
                        `;
                        
                        // Disable checkout button
                        if (localCheckoutButton) {
                            localCheckoutButton.disabled = true;
                            localCheckoutButton.classList.add('disabled');
                        }
                    }
                }
            }
            
            // Migrate cart dari localStorage ke database
            function migrateCartToDatabase(cartItems) {
                fetch('{{ route("cart.migrate") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ cartItems })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        console.log('Keranjang berhasil dimigrasi: ' + data.message);
                    }
                });
            }
            
            // Global functions untuk user yang belum login
            window.updateLocalQuantity = function(index, change) {
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (!cartItems[index]) return;
                
                cartItems[index].quantity = Math.max(1, cartItems[index].quantity + change);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                location.reload();
            };
            
            window.removeCartItem = function(index) {
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (!cartItems[index]) return;
                
                cartItems.splice(index, 1);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                location.reload();
            };
        });
    </script>
</x-app-layout>
