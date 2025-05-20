<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full bg-white rounded-lg p-6">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-amber-500">Welcome Back</h2>
            <div class="w-12 h-1 bg-amber-500 mx-auto my-2 rounded-full"></div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

           <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-gray-900" />
                <x-text-input 
                    id="email" 
                    class="block w-full px-4 py-3 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 focus:ring-3 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Enter your email"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
            </div>
            <!-- Password -->
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-900" />
                </div>
                <x-text-input 
                    id="password" 
                    class="block w-full px-4 py-3 rounded-lg border border-amber-300 bg-amber-500 text-amber-900 focus:ring-3 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="h-4 w-4 text-amber-500 border-amber-300 focus:ring-amber-500 rounded"
                        name="remember"
                    > 
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">
                        {{ __('Keep me logged in') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-amber-600 hover:text-amber-500" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div>
                <x-primary-button class="w-full flex justify-center py-3 px-4 rounded-full bg-amber-500 hover:bg-amber-600 text-white font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Sign Up Link -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Haven't joined?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-amber-600 hover:text-amber-500 font-medium">
                        Sign up
                    </a>
                @endif
            </p>
        </div>
    </div>
</x-guest-layout>