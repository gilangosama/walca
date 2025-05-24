<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <div class="max-w-3xl mx-auto bg-gray-900 p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-white mb-6 text-center">Pembayaran Pesanan</h1>
            
            <div class="mb-6 bg-gray-800 p-4 rounded-lg">
                <h2 class="text-lg font-semibold text-white mb-2">Detail Pesanan</h2>
                <div class="flex justify-between text-gray-300 mb-2">
                    <span>Invoice:</span>
                    <span>{{ $order->invoice }}</span>
                </div>
                <div class="flex justify-between text-gray-300 mb-2">
                    <span>Total Pembayaran:</span>
                    <span>Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-300">
                    <span>Status:</span>
                    <span class="px-2 py-1 rounded bg-yellow-600 text-white text-xs">{{ ucfirst($order->status) }}</span>
                </div>
            </div>
            
            <div class="text-center">
                <p class="text-gray-300 mb-4">Silakan klik tombol di bawah untuk melanjutkan ke pembayaran</p>
                
                <button id="pay-button" class="bg-white hover:bg-gray-200 text-gray-800 font-bold py-3 px-6 rounded-lg transition duration-300">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>

    <!-- Load Midtrans JS library -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.getElementById('pay-button');
            const snapToken = "{{ $snapToken }}";
            
            // Kosongkan cartItems di localStorage
            localStorage.removeItem('cartItems');
            
            payButton.addEventListener('click', function() {
                // Trigger snap popup
                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        /* Arahkan ke halaman sukses */
                        window.location.href = "{{ route('midtrans.finish') }}";
                    },
                    onPending: function(result) {
                        /* Arahkan ke halaman pending */
                        window.location.href = "{{ route('midtrans.unfinish') }}";
                    },
                    onError: function(result) {
                        /* Arahkan ke halaman error */
                        window.location.href = "{{ route('midtrans.error') }}";
                    },
                    onClose: function() {
                        /* Pengguna menutup popup tanpa menyelesaikan pembayaran */
                        alert('Anda belum menyelesaikan pembayaran');
                    }
                });
            });
        });
    </script>
</x-app-layout> 