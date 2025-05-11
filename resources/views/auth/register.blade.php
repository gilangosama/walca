<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-2">Register Account</h1>
        <div class="w-20 h-1 bg-black mx-auto mb-4"></div>
        <p class="text-gray-600">Join us to enjoy exclusive services</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6 mx-2">
        @csrf

        <!-- Hidden redirect field -->
        @if(request()->has('redirect'))
            <input type="hidden" name="redirect" value="{{ request()->redirect }}">
        @endif

        <!-- Name -->
        <div class="relative">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-user"></i>
                </div>
                <input id="name" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                    placeholder="Enter your full name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-envelope"></i>
                </div>
                <input id="email" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    placeholder="Enter your email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-lock"></i>
                </div>
                <input id="password" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="Minimum 8 characters" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <div class="flex items-center">
                <div class="absolute left-4 text-gray-400">
                    <i class="fas fa-lock"></i>
                </div>
                <input id="password_confirmation" 
                    class="w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent focus:ring-offset-2 transition-all shadow-sm hover:border-gray-400" 
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Enter your password again" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-black text-white py-3.5 px-4 rounded-lg hover:bg-gray-800 transition-all font-medium text-sm uppercase tracking-wider shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                Register Now
            </button>
        </div>

        <div class="text-center pt-4">
            <p class="text-xs text-gray-500 mb-4">
                By registering, you agree to our <a href="#" class="text-black font-medium focus:outline-none focus:ring-0">Terms & Conditions</a> and <a href="#" class="text-black font-medium focus:outline-none focus:ring-0">Privacy Policy</a>
            </p>
            <a href="{{ route('login') }}" class="inline-block text-sm text-gray-700 hover:text-black font-medium transition-colors focus:outline-none focus:ring-0">
                Already have an account? <span class="font-bold underline">Login here</span>
            </a>
        </div>
    </form>
</x-guest-layout>

