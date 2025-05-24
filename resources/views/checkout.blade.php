<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(45deg, #000, #111);
            color: #fff;
            font-family: 'Roboto Condensed', sans-serif;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
        }
        .form-control {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }
        .form-control:focus {
            outline: none;
            border-color: #000000;
            box-shadow: 0 0 0 1px #000000;
        }
        .form-select {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
        }
        .form-check {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }
        .form-check:hover {
            background-color: #f9fafb;
        }
        .form-check-input {
            margin-right: 0.75rem;
        }
        .btn-primary {
            background: linear-gradient(90deg, #FFD700, #FFB300);
            color: #222;
            font-weight: bold;
            border-radius: 24px;
            border: none;
            padding: 14px 0;
            width: 100%;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s, color 0.2s;
            margin-top: 0;
            cursor: pointer;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #FFB300, #FFD700);
            color: #000;
        }
        .checkout-dark-card {
            background: rgba(20, 20, 20, 0.85);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.35);
            border: 1px solid rgba(255,255,255,0.08);
            color: #fff;
        }
        .checkout-dark-card input,
        .checkout-dark-card select,
        .checkout-dark-card textarea {
            background: rgba(255,255,255,0.08);
            color: #fff;
            border: 1px solid #333;
            border-radius: 8px;
        }
        .checkout-dark-card input:focus,
        .checkout-dark-card select:focus,
        .checkout-dark-card textarea:focus {
            border-color: #FFD700;
            outline: none;
            background: rgba(255,255,255,0.15);
        }
        .checkout-dark-label {
            color: #FFD700;
            font-weight: 500;
        }
        .checkout-summary-title {
            color: #FFD700;
            font-size: 1.2rem;
            font-weight: 700;
        }
        .checkout-summary-total {
            color: #FFD700;
            font-size: 1.3rem;
            font-weight: 700;
        }
        .checkout-summary-item span {
            color: #eee;
        }
        .checkout-summary-item .checkout-summary-total {
            color: #FFD700;
        }
        .checkout-summary {
            background: rgba(30,30,30,0.95);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.35);
            border: 1px solid rgba(255,255,255,0.08);
            color: #fff;
        }
        .checkout-summary img {
            border-radius: 8px;
        }
        .checkout-summary .text-gray-900, .checkout-summary .text-gray-500 {
            color: #fff !important;
        }
        .checkout-summary .text-gray-500 {
            color: #bbb !important;
        }
        .checkout-summary .text-lg {
            color: #FFD700 !important;
        }
        .checkout-summary .btn-primary {
            margin-top: 1rem;
        }
        @media (max-width: 600px) {
            .checkout-dark-card, .checkout-summary {
                padding: 1rem !important;
            }
        }
        /* Perbaiki tampilan select dan option agar kontras di dark mode */
        select.form-select, .form-select {
            background: #fff !important;
            color: #222 !important;
            border: 2px solid #FFD700 !important;
            font-weight: 500;
        }
        select.form-select:focus, .form-select:focus {
            border-color: #FFB300 !important;
            background: #fff !important;
            color: #222 !important;
            outline: none;
        }
        select.form-select option, .form-select option {
            background: #fff !important;
            color: #222 !important;
        }
        .checkout-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }
        .checkout-left {
            flex: 2 1 350px;
            min-width: 320px;
            background: rgba(20, 20, 20, 0.85);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.35);
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
        }
        .checkout-right {
            flex: 1 1 320px;
            min-width: 300px;
            background: rgba(30,30,30,0.95);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.35);
            padding: 2rem 1.5rem;
            position: sticky;
            top: 2rem;
            height: fit-content;
        }
        @media (max-width: 900px) {
            .checkout-container {
                flex-direction: column;
                gap: 1.5rem;
            }
            .checkout-left, .checkout-right {
                min-width: 0;
                width: 100%;
                padding: 1.2rem 0.7rem;
            }
            .checkout-right {
                position: static;
            }
        }
        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.2rem;
            border-bottom: 1px solid #333;
            padding-bottom: 1rem;
        }
        .order-item-img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #FFD70033;
            background: #fff;
        }
        .order-item-info {
            flex: 1;
        }
        .order-item-title {
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }
        .order-item-detail {
            color: #FFD700;
            font-size: 0.9rem;
            margin-bottom: 0.1rem;
        }
        .order-item-qty {
            color: #bbb;
            font-size: 0.9rem;
        }
        .order-item-total {
            color: #FFD700;
            font-weight: bold;
            font-size: 1.1rem;
            min-width: 70px;
            text-align: right;
        }
    </style>

    <!-- Content Container with padding for fixed header -->
    <div class="bg-black pt-16 min-h-screen">
        <!-- Page Title -->
        <div class="bg-gray-900 bg-opacity-80 py-6 border-b border-gray-800">
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-white">Checkout</h1>
            </div>
        </div>

        <!-- Checkout Content -->
        <form method="POST" action="{{ route('checkout.placeOrder') }}">
            @csrf
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 checkout-container">
                <!-- LEFT: Shipping Info + Payment -->
                <div class="checkout-left">
                    <h2 class="text-lg font-bold text-white mb-4">Shipping Information</h2>
                    
                    @php
                        $addresses = Auth::user()->address ?? [];
                    @endphp
                    <div class="form-group mb-4">
                        <label for="addressSelect" class="checkout-dark-label">Shipping Address</label>
                        <select id="addressSelect" name="address_id" class="form-select" required>
                            <option value="" selected disabled>Select Address</option>
                            @foreach($addresses as $address)
                                <option value="{{ $address->id }}">
                                    {{ $address->label }} - {{ $address->street }}, {{ $address->regency }}, {{ $address->province }}
                                </option>
                            @endforeach
                            <option value="new">Add new address</option>
                        </select>
                    </div>
                    <!-- Manual Address Form (hidden by default) -->
                    <div id="manualAddressForm" style="display:none;">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label for="firstName" class="checkout-dark-label">First Name</label>
                                <input type="text" id="firstName" class="form-control" placeholder="Your first name">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="checkout-dark-label">Phone Number</label>
                                <input type="tel" id="phone" class="form-control" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="checkout-dark-label">Address</label>
                            <input type="text" id="address" class="form-control" placeholder="Your address">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="form-group">
                                <label for="province" class="checkout-dark-label">Province</label>
                                <select id="province" class="form-select">
                                    <option value="" selected disabled>Select Province</option>
                                    <option value="jawa-barat">West Java</option>
                                    <option value="jawa-tengah">Central Java</option>
                                    <option value="jawa-timur">East Java</option>
                                    <option value="dki-jakarta">DKI Jakarta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city" class="checkout-dark-label">City/Regency</label>
                                <select id="city" class="form-select">
                                    <option value="" selected disabled>Select City</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postalCode" class="checkout-dark-label">Postal Code</label>
                                <input type="text" id="postalCode" class="form-control" placeholder="Postal code">
                            </div>
                        </div>
                    </div>
                    <!-- Payment Method Section -->
                    <div class="form-group mt-6">
                        <label class="checkout-dark-label">Choose Payment Method</label>
                        <select id="paymentMethod" name="payment_method" class="form-select" required>
                            <option value="" selected disabled>Select Payment Method</option>
                            <option value="midtrans">Midtrans Payment Gateway</option>
                            <option value="cod">Cash on Delivery (COD)</option>
                        </select>
                    </div>
                </div>
                <!-- RIGHT: Order Summary -->
                <div class="checkout-right">
                    <h2 class="checkout-summary-title mb-4">Order Summary</h2>
                    <div class="mb-4">
                        @forelse($orderItems as $item)
                            <div class="order-item">
                                <img src="{{ $item['productImage'] }}" alt="{{ $item['productName'] }}" class="order-item-img">
                                <div class="order-item-info">
                                    <div class="order-item-title">{{ $item['productName'] }}</div>
                                    <div class="order-item-detail">Size: {{ $item['size'] }}</div>
                                    <div class="order-item-qty">Qty: {{ $item['quantity'] }}</div>
                                    <div class="order-item-qty">Price: <span class="text-yellow-400 font-bold">Rp {{ number_format($item['price'],0,',','.') }}</span></div>
                                </div>
                                <div class="order-item-total">Rp {{ number_format($item['price'] * $item['quantity'],0,',','.') }}</div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <p class="text-gray-400">Your cart is empty.</p>
                                <a href="{{ route('shops') }}" class="text-sm text-yellow-400 font-medium mt-2 inline-block">Shop Now</a>
                            </div>
                        @endforelse
                    </div>
                    <div class="checkout-summary-item flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
                    </div>
                    <div class="checkout-summary-item flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Rp {{ number_format($shipping,0,',','.') }}</span>
                    </div>
                    <div class="checkout-summary-item flex justify-between checkout-summary-total mt-4">
                        <span>Total</span>
                        <span>Rp {{ number_format($total,0,',','.') }}</span>
                    </div>
                    <button type="submit" class="btn-primary w-full mt-4">Place Order</button>
                </div>
            </div>
        </form>
        <div class="text-xs text-gray-400 mt-4 text-center">
            By placing an order, you agree to our <a href="#" class="underline text-yellow-400">Terms & Conditions</a> and <a href="#" class="underline text-yellow-400">Privacy Policy</a>.
        </div>
    </div>
</x-app-layout> 