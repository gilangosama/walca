<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Panduan Menggunakan Tawk.to untuk Admin</h3>
                    
                    <div class="mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-400">
                        <p class="text-yellow-700">Pastikan Anda sudah memiliki akses ke dashboard Tawk.to sebagai admin sebelum melanjutkan.</p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">1. Akses Dashboard Tawk.to</h4>
                            <p>Login ke <a href="https://dashboard.tawk.to" target="_blank" class="text-blue-600 hover:underline">dashboard.tawk.to</a> menggunakan akun yang terdaftar.</p>
                        </div>
                        
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">2. Melihat Chat Masuk</h4>
                            <p>Di dashboard, klik pada tab "Messaging" untuk melihat percakapan aktif dan riwayat chat.</p>
                            <ul class="list-disc ml-6 mt-2 text-gray-600">
                                <li>Chat aktif: Percakapan yang sedang berlangsung</li>
                                <li>Missed: Percakapan yang terlewat</li>
                                <li>Served: Percakapan yang sudah direspon</li>
                            </ul>
                        </div>
                        
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">3. Merespon Chat</h4>
                            <p>Klik pada chat yang ingin direspon, lalu ketik pesan Anda di kolom input dan tekan Enter untuk mengirim.</p>
                            <p class="mt-2">Tips cepat:</p>
                            <ul class="list-disc ml-6 mt-1 text-gray-600">
                                <li>Gunakan tombol F2 untuk menyisipkan canned response</li>
                                <li>Gunakan command + Enter untuk mengirim pesan lebih cepat</li>
                            </ul>
                        </div>
                        
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">4. Menyiapkan Canned Responses</h4>
                            <p>Buat jawaban template untuk pertanyaan yang sering ditanyakan:</p>
                            <ol class="list-decimal ml-6 mt-2 text-gray-600">
                                <li>Klik "Admin" di menu sebelah kiri</li>
                                <li>Pilih "Canned Responses"</li>
                                <li>Klik "Add Response" untuk membuat template baru</li>
                            </ol>
                        </div>
                        
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">5. Melihat Riwayat Chat</h4>
                            <p>Untuk melihat riwayat percakapan sebelumnya:</p>
                            <ol class="list-decimal ml-6 mt-2 text-gray-600">
                                <li>Klik "Reports" di menu sebelah kiri</li>
                                <li>Pilih "Chat History"</li>
                                <li>Gunakan filter untuk mencari percakapan tertentu</li>
                            </ol>
                        </div>
                        
                        <div class="border-b pb-4">
                            <h4 class="font-medium text-gray-700 mb-2">6. Mengatur Status Ketersediaan</h4>
                            <p>Atur status ketersediaan Anda untuk memberi tahu pelanggan apakah Anda online atau tidak:</p>
                            <ol class="list-decimal ml-6 mt-2 text-gray-600">
                                <li>Klik avatar profil Anda di sudut kanan atas</li>
                                <li>Pilih status: Online, Away, atau Invisible</li>
                            </ol>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-4 bg-blue-50 rounded-md">
                        <h4 class="font-medium text-blue-700 mb-2">Penting Diketahui:</h4>
                        <ul class="list-disc ml-6 text-blue-600">
                            <li>Anda akan menerima notifikasi email saat ada chat masuk jika tidak sedang online</li>
                            <li>Pasang aplikasi Tawk.to di smartphone Anda untuk menerima notifikasi mobile</li>
                            <li>Informasi pengunjung tersedia untuk melihat detail pelanggan yang chat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 