<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Walca') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-black shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
        
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        
        @auth
            // Pengaturan untuk pengguna yang login - Memastikan setiap pengguna memiliki chat terpisah
            Tawk_API.visitor = {
                name : "{{ Auth::user()->name }}",
                email : "{{ Auth::user()->email }}",
                hash : "{{ md5(Auth::user()->id . Auth::user()->email . env('APP_KEY')) }}"
            };
            
            // Identifikasi tambahan - mengunci sesi percakapan ke pengguna tertentu
            Tawk_API.onLoad = function(){
                Tawk_API.setAttributes({
                    id: "{{ Auth::id() }}",
                    userId: "{{ Auth::id() }}",
                    uniqueId: "user_{{ Auth::id() }}_{{ time() }}",
                    userType: "customer",
                    sessionId: "{{ md5(Auth::id() . session()->getId()) }}"
                }, function(error){});
                
                // Hapus sesi chat sebelumnya jika ada
                localStorage.removeItem('twk_uuid');
                sessionStorage.removeItem('twk_conversation');
                
                // Sembunyikan ikon hamburger
                Tawk_API.onChatMaximized = function(){
                    // Mencoba menghapus ikon hamburger menu dengan CSS
                    var style = document.createElement('style');
                    style.innerHTML = `
                        .tawk-menu-container, .tawk-menu-overflow, .tawk-button-menu {
                            display: none !important;
                            visibility: hidden !important;
                            opacity: 0 !important;
                            pointer-events: none !important;
                        }
                        
                        /* Invert warna icon */
                        .tawk-min-container .tawk-button {
                            filter: invert(1) !important;
                        }
                        
                        /* Invert warna icon chat */
                        .tawk-min-container .tawk-button-icon, 
                        .tawk-chat-button-image, 
                        #tawkchat-minified-box {
                            filter: invert(1) !important;
                        }
                    `;
                    document.head.appendChild(style);
                    
                    // Alternatif lain mencoba mencari elemen hamburger menggunakan interval
                    var checkExist = setInterval(function() {
                        const hamburgerMenu = document.querySelector('.tawk-menu-container, .tawk-dropdown-menu, .tawk-button-menu');
                        if (hamburgerMenu) {
                            hamburgerMenu.style.display = 'none';
                            clearInterval(checkExist);
                        }
                    }, 100);
                };
            };
            
            // Pengaturan posisi dan tampilan chat
            Tawk_API.customStyle = {
                // Ubah ikon widget
                widget : {
                    icon : 'https://fashion-site.com/images/chat-icon.png'
                },
                // Warna tema widget
                color : {
                    header: '#000000',
                    main: '#000000'
                }
            };
            
            // Posisi widget
            Tawk_API.position = 'br';
            Tawk_API.margin = "0 20px 80px 0";
            
            // Sembunyikan fungsi menu
            Tawk_API.hideWidgetMenu = true;
            
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/6820537e893b3f190a5d5e08/1iqv4cai8';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                
                // Tambahkan CSS untuk icon chat setelah script dimuat
                setTimeout(function() {
                    var style = document.createElement('style');
                    style.innerHTML = `
                        #tawkchat-minified-container, #tawkchat-minified-wrapper {
                            filter: invert(1) !important;
                        }
                    `;
                    document.head.appendChild(style);
                }, 1000);
            })();
        @else
            // Script untuk pengguna yang belum login
            document.addEventListener('DOMContentLoaded', function() {
                // Buat tombol chat yang akan mengarahkan ke halaman login
                var chatButton = document.createElement('div');
                chatButton.innerHTML = `
                    <div id="login-chat-btn" style="position: fixed; bottom: 80px; right: 20px; background-color: #fff; color: black; 
                        border-radius: 50%; width: 60px; height: 60px; display: flex; justify-content: center; 
                        align-items: center; cursor: pointer; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 1000;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20,2H4C2.9,2,2,2.9,2,4v18l4-4h14c1.1,0,2-0.9,2-2V4C22,2.9,21.1,2,20,2z M20,16H6l-2,2V4h16V16z"/>
                            <path d="M7,9h10v2H7V9z M7,12h7v2H7V12z M7,6h10v2H7V6z"/>
                        </svg>
                    </div>
                `;
                document.body.appendChild(chatButton);
                
                // Tambahkan event listener untuk mengarahkan ke halaman login
                document.getElementById('login-chat-btn').addEventListener('click', function() {
                    // Tampilkan modal login
                    var modalHtml = `
                        <div id="login-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                            background-color: rgba(0,0,0,0.5); display: flex; justify-content: center; 
                            align-items: center; z-index: 2000;">
                            <div style="background: #111; color: white; padding: 20px; border-radius: 8px; max-width: 400px; width: 100%; border: 1px solid #333;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <h3 style="margin: 0; font-size: 18px; font-weight: bold;">Login untuk Mengobrol</h3>
                                    <button id="close-modal" style="background: none; border: none; cursor: pointer; font-size: 20px; color: white;">&times;</button>
                                </div>
                                <p style="margin-bottom: 20px;">Untuk mengobrol dengan customer service kami, silakan login terlebih dahulu.</p>
                                <a href="{{ route('login') }}" style="display: block; background-color: #fff; color: black; text-align: center; 
                                    padding: 10px; border-radius: 4px; text-decoration: none; font-weight: bold;">Login Sekarang</a>
                                <p style="margin-top: 15px; font-size: 14px; text-align: center;">
                                    Belum punya akun? <a href="{{ route('register') }}" style="color: #fff; text-decoration: underline;">Daftar</a>
                                </p>
                            </div>
                        </div>
                    `;
                    var modalContainer = document.createElement('div');
                    modalContainer.innerHTML = modalHtml;
                    document.body.appendChild(modalContainer);
                    
                    // Tambahkan event untuk menutup modal
                    document.getElementById('close-modal').addEventListener('click', function() {
                        document.getElementById('login-modal').remove();
                    });
                });
            });
        @endauth
        </script>
        <!--End of Tawk.to Script-->
    </body>
</html>
