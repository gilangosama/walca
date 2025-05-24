<x-guest-layout>
    <style>
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            background: #111;
            border: 1px solid #333;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .input-field:focus {
            outline: none;
            border-color: #444;
        }

        .auth-button {
            width: 100%;
            padding: 0.75rem;
            background: #333;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .auth-button:hover {
            background: #444;
        }

        .auth-link {
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        .auth-link a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-link a:hover {
            text-decoration: underline;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: #aaa;
        }

        .remember-forgot a {
            color: white;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .auth-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .back-link {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            padding: 0.5rem 0;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>


    <div class="auth-container">
        <div class="w-20 h-20 bg-black flex items-center justify-center mx-auto mb-6 rounded">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="w-full h-full object-cover">
        </div>

        <h1 class="text-center text-2xl font-semibold text-white mb-2">Masuk</h1>
        <p class="text-center text-gray-400 mb-6">Masukkan akun untuk melanjutkan</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="remember-forgot">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="mr-2" name="remember">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit" class="auth-button">MASUK</button>

            <div class="auth-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap form login
            const loginForm = document.querySelector('form');
            
            if (loginForm) {
                loginForm.addEventListener('submit', function() {
                    // Simpan cart items dari localStorage agar bisa diakses setelah redirect
                    const cartItems = localStorage.getItem('cartItems');
                    if (cartItems && cartItems !== '[]') {
                        sessionStorage.setItem('pendingCartMigration', cartItems);
                    }
                });
            }
        });
    </script>
</x-guest-layout>

