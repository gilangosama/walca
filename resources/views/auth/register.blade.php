<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #000000, #1a1a1a);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .back-button {
            position: fixed;
            top: 2rem;
            left: 2rem;
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(-5px);
        }

        .back-button i {
            margin-right: 0.5rem;
            transition: transform 0.3s ease;
        }

        .back-button:hover i {
            transform: translateX(-3px);
        }

        .register-container {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            margin: 2rem auto;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 0 2px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: containerFadeIn 0.8s ease-out;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @keyframes containerFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 2rem;
        }

        .logo-wrapper svg {
            width: 80px;
            height: 80px;
            fill: white !important;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.2));
            transition: transform 0.3s ease;
        }

        .logo-wrapper:hover svg {
            transform: scale(1.1);
        }

        .title-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .title-section h1 {
            color: white;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
        }

        .title-section p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .title-underline {
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #FFD700, transparent);
            margin: 1rem auto;
            border-radius: 2px;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
            width: 100%;
        }

        .input-group label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .input-group:focus-within label {
            color: #FFD700;
            transform: translateX(5px);
        }

        .input-field {
            width: 100%;
            padding: 1rem 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            padding-left: 3rem;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 215, 0, 0.5);
            box-shadow: 
                0 0 20px rgba(255, 215, 0, 0.1),
                inset 0 0 10px rgba(255, 215, 0, 0.05);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #FFD700;
            opacity: 0.7;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            margin-top: 0.5rem;
        }

        .input-field:focus + .input-icon {
            opacity: 1;
            transform: translateY(-50%) scale(1.1);
        }

        .register-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            border: none;
            border-radius: 12px;
            color: black;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .register-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: 0.5s;
        }

        .register-button:hover::before {
            left: 100%;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 20px rgba(255, 215, 0, 0.2),
                0 6px 6px rgba(255, 215, 0, 0.1);
        }

        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .login-link a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 500;
            margin-left: 0.3rem;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        .terms-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            margin-top: 1rem;
            line-height: 1.5;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            backdrop-filter: blur(5px);
        }

        .terms-text a {
            color: #FFD700;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .terms-text a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 1px;
            bottom: -2px;
            left: 0;
            background: #FFD700;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .terms-text a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .password-strength {
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
            position: relative;
        }

        .password-strength::before {
            content: '';
            display: block;
            height: 100%;
            width: 0;
            background: linear-gradient(to right, #ff4d4d, #FFD700, #4CAF50);
            transition: width 0.5s ease, background-color 0.5s ease;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        .password-strength[data-strength="weak"]::before {
            width: 33.33%;
            background: #ff4d4d;
        }

        .password-strength[data-strength="medium"]::before {
            width: 66.66%;
            background: #FFD700;
        }

        .password-strength[data-strength="strong"]::before {
            width: 100%;
            background: #4CAF50;
        }
    </style>

    <a href="/" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Beranda
    </a>

    <div class="register-container">
        <div class="logo-wrapper">
            <a href="/" class="bounce-hover focus:outline-none focus:ring-0 mx-auto">
                <x-application-logo class="w-20 h-20 fill-current text-gray-800" />
            </a>
        </div>

        <div class="title-section">
            <h1>Daftar Akun</h1>
            <div class="title-underline"></div>
            <p>Bergabung untuk mendapatkan layanan eksklusif</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            @if(request()->has('redirect'))
                <input type="hidden" name="redirect" value="{{ request()->redirect }}">
            @endif

            <div class="input-group">
                <label for="name">Nama Lengkap</label>
                <input id="name" 
                    class="input-field" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    placeholder="Masukkan nama lengkap Anda">
                <i class="fas fa-user input-icon"></i>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" 
                    class="input-field" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username" 
                    placeholder="Masukkan email Anda">
                <i class="fas fa-envelope input-icon"></i>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" 
                    class="input-field" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Minimal 8 karakter">
                <i class="fas fa-lock input-icon"></i>
                <div class="password-strength" data-strength="weak"></div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="input-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" 
                    class="input-field" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Masukkan password Anda kembali">
                <i class="fas fa-lock input-icon"></i>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="register-button">
                Daftar Sekarang
            </button>

            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">Masuk di sini</a>
            </div>

            <p class="terms-text">
                Dengan mendaftar, Anda menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> kami
            </p>
        </form>
    </div>

    <script>
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = document.querySelector('.password-strength');
            
            if (password.length < 8) {
                strength.setAttribute('data-strength', 'weak');
            } else if (password.length < 12) {
                strength.setAttribute('data-strength', 'medium');
            } else {
                strength.setAttribute('data-strength', 'strong');
            }
        });
    </script>
</x-guest-layout>

