<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-2">Login Account</h1>
        <div class="w-20 h-1 bg-black mx-auto mb-4"></div>
        <p class="text-gray-600">Login to see your orders and wishlist</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6 mx-2">
        @csrf

        <!-- Hidden redirect field -->
        @if(request()->has('redirect'))
            <input type="hidden" name="redirect" value="{{ request()->redirect }}">
        @endif

        <!-- Email Address -->
        <div class="relative">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-envelope"></i>
                </div>
                <input id="email" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                    placeholder="Enter your email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative">
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-600 hover:text-black transition-colors focus:outline-none focus:ring-0" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-lock"></i>
                </div>
                <input id="password" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="password" name="password" required autocomplete="current-password" 
                    placeholder="Enter your password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-0 focus:ring-offset-0" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">
                Remember me
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-black text-white py-3.5 px-4 rounded-lg hover:bg-gray-800 transition-all font-medium text-sm uppercase tracking-wider shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                Login
            </button>
        </div>

        <div class="relative flex items-center justify-center mt-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative bg-white px-4 text-sm text-gray-500">
                or
            </div>
        </div>

        <div class="text-center pt-2">
            <a href="{{ route('register') }}" class="inline-block text-sm text-gray-700 hover:text-black font-medium transition-colors focus:outline-none focus:ring-0">
                Don't have an account? <span class="font-bold underline">Register now</span>
            </a>
        </div>
    </form>
</x-guest-layout>
