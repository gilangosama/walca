<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
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
            display: inline-block;
            padding: 0.75rem 1.25rem;
            background-color: #000;
            color: #fff;
            font-weight: 500;
            font-size: 0.875rem;
            text-align: center;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            background-color: #222;
            transform: translateY(-1px);
        }
        .checkout-summary {
            background-color: #f9fafb;
            border-radius: 0.5rem;
            padding: 1.25rem;
        }
        .checkout-summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        .checkout-summary-total {
            font-weight: 600;
            font-size: 1.125rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
        }
    </style>

    <!-- Content Container with padding for fixed header -->
    <div class="bg-white pt-16">
        <!-- Page Title -->
        <div class="bg-gray-100 py-6 border-b border-gray-200">
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-medium text-gray-900">Checkout</h1>
            </div>
        </div>

        <!-- Checkout Content -->
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            <form id="checkoutForm" class="flex flex-col lg:flex-row gap-8">
                <!-- Checkout Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengiriman</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label for="firstName" class="form-label">Nama Depan</label>
                                <input type="text" id="firstName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="form-label">Nama Belakang</label>
                                <input type="text" id="lastName" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="tel" id="phone" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="form-group">
                                <label for="province" class="form-label">Provinsi</label>
                                <select id="province" class="form-select" required>
                                    <option value="" selected disabled>Pilih Provinsi</option>
                                    <option value="jawa-barat">Jawa Barat</option>
                                    <option value="jawa-tengah">Jawa Tengah</option>
                                    <option value="jawa-timur">Jawa Timur</option>
                                    <option value="dki-jakarta">DKI Jakarta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city" class="form-label">Kota/Kabupaten</label>
                                <select id="city" class="form-select" required>
                                    <option value="" selected disabled>Pilih Kota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postalCode" class="form-label">Kode Pos</label>
                                <input type="text" id="postalCode" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Metode Pengiriman</h2>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input type="radio" id="shipping1" name="shipping" value="jne" class="form-check-input" required checked>
                                <div>
                                    <label for="shipping1" class="form-label mb-0">JNE Regular (2-3 hari)</label>
                                    <p class="text-sm text-gray-500">Rp 15.000</p>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="shipping2" name="shipping" value="jnt" class="form-check-input" required>
                                <div>
                                    <label for="shipping2" class="form-label mb-0">J&T Express (1-2 hari)</label>
                                    <p class="text-sm text-gray-500">Rp 18.000</p>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="shipping3" name="shipping" value="sicepat" class="form-check-input" required>
                                <div>
                                    <label for="shipping3" class="form-label mb-0">SiCepat (1-2 hari)</label>
                                    <p class="text-sm text-gray-500">Rp 20.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg border border-gray-200 p-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Metode Pembayaran</h2>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input type="radio" id="payment1" name="payment" value="bank_transfer" class="form-check-input" required checked>
                                <div>
                                    <label for="payment1" class="form-label mb-0">Transfer Bank</label>
                                    <p class="text-sm text-gray-500">BCA, Mandiri, BNI</p>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="payment2" name="payment" value="ewallet" class="form-check-input" required>
                                <div>
                                    <label for="payment2" class="form-label mb-0">E-Wallet</label>
                                    <p class="text-sm text-gray-500">OVO, GoPay, DANA</p>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="payment3" name="payment" value="cod" class="form-check-input" required>
                                <div>
                                    <label for="payment3" class="form-label mb-0">Bayar di Tempat (COD)</label>
                                    <p class="text-sm text-gray-500">Hanya tersedia untuk area tertentu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-1/3 mt-8 lg:mt-0">
                    <div class="bg-white rounded-lg border border-gray-200 p-6 sticky top-24">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Ringkasan Pesanan</h2>
                        
                        <div id="checkoutItems" class="mb-6">
                            <!-- Items will be dynamically added here -->
                        </div>
                        
                        <div class="checkout-summary">
                            <div class="checkout-summary-item">
                                <span class="text-sm text-gray-600">Subtotal</span>
                                <span id="checkout-subtotal" class="text-sm font-medium text-gray-900">Rp 0</span>
                            </div>
                            <div class="checkout-summary-item">
                                <span class="text-sm text-gray-600">Pengiriman</span>
                                <span id="checkout-shipping" class="text-sm font-medium text-gray-900">Rp 15.000</span>
                            </div>
                            <div class="checkout-summary-item checkout-summary-total">
                                <span class="text-gray-900">Total</span>
                                <span id="checkout-total" class="text-gray-900">Rp 0</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="mt-6 w-full btn-primary">
                            Buat Pesanan
                        </button>
                        
                        <p class="text-xs text-gray-500 mt-4 text-center">
                            Dengan melakukan pemesanan, Anda menyetujui Syarat dan Ketentuan serta Kebijakan Privasi kami.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load order from localStorage
            const currentOrder = JSON.parse(localStorage.getItem('currentOrder'));
            if (!currentOrder) {
                window.location.href = "{{ route('cart') }}";
                return;
            }
            
            // Mengisi data pengguna yang login
            @auth
                // Mendapatkan nama lengkap dan memisahkan menjadi nama depan dan belakang
                const fullName = "{{ Auth::user()->name }}";
                const nameParts = fullName.split(' ');
                let firstName = '';
                let lastName = '';
                
                if (nameParts.length > 1) {
                    firstName = nameParts[0];
                    lastName = nameParts.slice(1).join(' ');
                } else {
                    firstName = fullName;
                }
                
                // Mengisi field nama dan email
                document.getElementById('firstName').value = firstName;
                document.getElementById('lastName').value = lastName;
                document.getElementById('email').value = "{{ Auth::user()->email }}";
            @endauth
            
            // Data provinsi dan kota
            const locationData = {
                'jawa-barat': [
                    { id: 'bandung', name: 'Bandung' },
                    { id: 'bogor', name: 'Bogor' },
                    { id: 'bekasi', name: 'Bekasi' },
                    { id: 'cirebon', name: 'Cirebon' },
                    { id: 'depok', name: 'Depok' },
                    { id: 'tasikmalaya', name: 'Tasikmalaya' }
                ],
                'jawa-tengah': [
                    { id: 'semarang', name: 'Semarang' },
                    { id: 'solo', name: 'Surakarta (Solo)' },
                    { id: 'magelang', name: 'Magelang' },
                    { id: 'pekalongan', name: 'Pekalongan' },
                    { id: 'salatiga', name: 'Salatiga' }
                ],
                'jawa-timur': [
                    { id: 'surabaya', name: 'Surabaya' },
                    { id: 'malang', name: 'Malang' },
                    { id: 'kediri', name: 'Kediri' },
                    { id: 'batu', name: 'Batu' },
                    { id: 'madiun', name: 'Madiun' },
                    { id: 'blitar', name: 'Blitar' }
                ],
                'dki-jakarta': [
                    { id: 'jakarta-pusat', name: 'Jakarta Pusat' },
                    { id: 'jakarta-utara', name: 'Jakarta Utara' },
                    { id: 'jakarta-barat', name: 'Jakarta Barat' },
                    { id: 'jakarta-selatan', name: 'Jakarta Selatan' },
                    { id: 'jakarta-timur', name: 'Jakarta Timur' },
                    { id: 'kepulauan-seribu', name: 'Kepulauan Seribu' }
                ]
            };
            
            // Fungsi untuk mengupdate daftar kota berdasarkan provinsi
            function updateCities() {
                const provinceSelect = document.getElementById('province');
                const citySelect = document.getElementById('city');
                const selectedProvince = provinceSelect.value;
                
                // Hapus semua opsi kota
                citySelect.innerHTML = '<option value="" selected disabled>Pilih Kota</option>';
                
                // Jika provinsi dipilih, tambahkan kota-kotanya
                if (selectedProvince && locationData[selectedProvince]) {
                    locationData[selectedProvince].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                }
            }
            
            // Tambahkan event listener ke select provinsi
            const provinceSelect = document.getElementById('province');
            provinceSelect.addEventListener('change', updateCities);
            
            // Format currency
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            
            // Display order items
            const checkoutItems = document.getElementById('checkoutItems');
            const orderTotal = currentOrder.price * currentOrder.quantity;
            
            checkoutItems.innerHTML = `
                <div class="flex items-center justify-between mb-3 pb-3 border-b border-gray-200">
                    <div class="flex items-start">
                        <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 mr-3">
                            <img src="{{ asset('img/1.jpg') }}" alt="${currentOrder.productName}" class="h-full w-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">${currentOrder.productName}</h3>
                            <p class="text-xs text-gray-500">Size: ${currentOrder.size}</p>
                            <p class="text-xs text-gray-500">Qty: ${currentOrder.quantity}</p>
                        </div>
                    </div>
                    <p class="text-sm font-medium text-gray-900">${formatter.format(orderTotal)}</p>
                </div>
            `;
            
            // Update totals
            document.getElementById('checkout-subtotal').textContent = formatter.format(orderTotal);
            
            // Calculate total with shipping
            const shippingCost = 15000; // Default shipping cost
            const grandTotal = orderTotal + shippingCost;
            document.getElementById('checkout-total').textContent = formatter.format(grandTotal);
            
            // Handle shipping method change
            const shippingOptions = document.querySelectorAll('input[name="shipping"]');
            shippingOptions.forEach(option => {
                option.addEventListener('change', function() {
                    let shippingCost = 15000;
                    if (this.value === 'jnt') {
                        shippingCost = 18000;
                    } else if (this.value === 'sicepat') {
                        shippingCost = 20000;
                    }
                    
                    document.getElementById('checkout-shipping').textContent = formatter.format(shippingCost);
                    const grandTotal = orderTotal + shippingCost;
                    document.getElementById('checkout-total').textContent = formatter.format(grandTotal);
                });
            });
            
            // Handle form submission
            const checkoutForm = document.getElementById('checkoutForm');
            checkoutForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Simulate order processing
                alert('Pesanan Anda sedang diproses!\nTerima kasih telah berbelanja di toko kami.');
                
                // Clear cart
                localStorage.removeItem('currentOrder');
                
                // Redirect to thank you page
                // In a real application, you would redirect to a proper thank you page
                window.location.href = "{{ route('shops') }}";
            });
        });
    </script>
</x-app-layout> 