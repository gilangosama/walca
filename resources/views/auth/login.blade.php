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

        .login-container {
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .remember-me input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: #FFD700;
        }

        .forgot-password {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #FFD700;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        .login-button {
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

        .login-button::before {
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

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 20px rgba(255, 215, 0, 0.2),
                0 6px 6px rgba(255, 215, 0, 0.1);
        }

        .register-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .register-link a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 500;
            margin-left: 0.3rem;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }
    </style>

    <a href="/" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Beranda
    </a>

    <div class="login-container">
        <div class="logo-wrapper">
            <a href="/" class="bounce-hover focus:outline-none focus:ring-0 mx-auto">
                <x-application-logo class="w-20 h-20 fill-current text-gray-800" />
            </a>
        </div>

        <div class="title-section">
            <h1>Login Account</h1>
            <div class="title-underline"></div>
            <p>Login untuk melihat pesanan dan wishlist Anda</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if(request()->has('redirect'))
                <input type="hidden" name="redirect" value="{{ request()->redirect }}">
            @endif

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" 
                    class="input-field" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
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
                    autocomplete="current-password"
                    placeholder="Masukkan password Anda">
                <i class="fas fa-lock input-icon"></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="remember-forgot">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit" class="login-button">
                Masuk
            </button>

            <div class="register-link">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </form>
    </div>
</x-guest-layout>

