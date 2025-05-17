<x-guest-layout>
    <div class="max-w-md w-full mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden p-8 space-y-6">
        <div class="text-center">
            <x-slot name="logo">
                <a href="/" class="flex justify-center">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500 dark:text-gray-400" />
                </a>
            </x-slot>
            
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mt-4">Create Account</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Join us today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input 
                    id="name" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition duration-200" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus
                    placeholder="Enter your full name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input 
                    id="email" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition duration-200" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required
                    placeholder="Enter your email address"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input 
                    id="password" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition duration-200"
                    type="password"
                    name="password"
                    required 
                    autocomplete="new-password"
                    placeholder="Create a password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input 
                    id="password_confirmation" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition duration-200"
                    type="password"
                    name="password_confirmation"
                    required
                    placeholder="Confirm your password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
            </div>

            <div>
                <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition duration-200">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 font-medium transition duration-200">
                Sign in
            </a>
        </div>
    </div>
</x-guest-layout>