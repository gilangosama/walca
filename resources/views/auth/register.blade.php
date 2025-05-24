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

        .terms-text {
            text-align: center;
            color: #777;
            font-size: 0.8rem;
            margin-top: 1rem;
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

        <h1 class="text-center text-2xl font-semibold text-white mb-2">Daftar Akun</h1>
        <p class="text-center text-gray-400 mb-6">Buat akun baru untuk mulai berbelanja</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkap" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500" />
            </div>

            <div>
                <input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <div>
                <input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <div>
                <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500" />
            </div>

            <button type="submit" class="auth-button">DAFTAR</button>

            <div class="auth-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
            </div>

            <div class="terms-text">
                Dengan mendaftar, Anda menyetujui Syarat & Ketentuan dan Kebijakan Privasi kami.
            </div>
        </form>
    </div>
</x-guest-layout>

