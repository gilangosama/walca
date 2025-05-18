<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CHMB') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .bg-dots-darker {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
            }
            
            @media (prefers-color-scheme: dark) {
                .bg-dots-lighter {
                    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
                }
            }
            
            .animate-fade-in {
                animation: fadeIn 0.5s ease-in-out;
            }
            
            @keyframes fadeIn {
                0% { opacity: 0; transform: translateY(10px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            
            .card-shadow {
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            }
            
            .social-icon {
                transition: all 0.3s ease;
            }
            
            .social-icon:hover {
                transform: translateY(-3px);
            }
            
            .bounce-hover:hover {
                animation: bounce 0.5s;
            }
            
            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-5px); }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="relative min-h-screen flex flex-col items-center justify-center bg-dots-darker">
            <div class="absolute top-6 left-6 z-10">
                <a href="/" class="flex items-center text-gray-800 hover:text-black transition-colors focus:outline-none focus:ring-0">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="text-sm font-medium">Kembali ke Beranda</span>
                </a>
            </div>
            
            <div class="w-full sm:max-w-md px-8 py-10 animate-fade-in card-shadow rounded-2xl mt-10 mb-10">
                <div class="flex justify-center mb-10">
                    {{-- <a href="/" class="bounce-hover focus:outline-none focus:ring-0">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-800" />
                    </a> --}}
                </div>

                <div class="w-full overflow-hidden">
                    {{ $slot }}
                </div>
                
                <div class="mt-10 text-center">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} CHMB Fashion. All rights reserved.
                    </p>
                    <div class="flex justify-center mt-4 space-x-6">
                        <a href="#" class="text-gray-700 hover:text-black social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-black social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-black social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
