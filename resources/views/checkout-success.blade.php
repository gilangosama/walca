<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold text-yellow-400 mb-4">Terima kasih!</h1>
        <p class="text-lg text-white mb-6">Pesanan kamu berhasil dibuat.</p>
        <a href="{{ route('shops') }}" class="btn-primary">Kembali Belanja</a>
    </div>
    <script>
        // Kosongkan cart di localStorage
        localStorage.removeItem('cartItems');
    </script>
</x-app-layout> 