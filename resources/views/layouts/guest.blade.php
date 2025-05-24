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
            body {
                background-color: #000000;
                color: #ffffff;
                font-family: 'figtree', sans-serif;
            }
            
            .animate-fade-in {
                animation: fadeIn 0.5s ease-in-out;
            }
            
            @keyframes fadeIn {
                0% { opacity: 0; transform: translateY(10px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            
            .card-shadow {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            .social-icon {
                transition: all 0.3s ease;
            }
            
            .social-icon:hover {
                transform: translateY(-3px);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <div class="absolute top-6 left-6 z-10">
                <a href="/" class="flex items-center text-gray-400 hover:text-white transition-colors focus:outline-none focus:ring-0">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="text-sm font-medium">Kembali ke Beranda</span>
                </a>
            </div>
            
            <div class="w-full sm:max-w-md px-6 py-8 animate-fade-in bg-black border border-gray-800 rounded-lg mt-6 mb-6">
                <div class="flex justify-center mb-6">
                    {{-- Logo akan ditampilkan dalam konten form login/register --}}
                </div>

                <div class="w-full overflow-hidden">
                    {{ $slot }}
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} CHMB Fashion. All rights reserved.
                    </p>
                    <div class="flex justify-center mt-4 space-x-6">
                        <a href="#" class="text-gray-500 hover:text-white social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-white social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-white social-icon focus:outline-none focus:ring-0">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
