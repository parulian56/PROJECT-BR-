<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK AMALIAH - Login</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: {
                            light: '#F6F1E9',
                            base: '#F2E3C9', 
                            dark: '#E8D8C4'
                        },
                        coffee: {
                            light: '#F4A261',
                            medium: '#E76F51',
                            dark: '#5F7161',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @media (max-width: 640px) {
            .responsive-container {
                margin: 0 16px;
            }
        }
    </style>
</head>
<body class="bg-cream-light min-h-screen flex flex-col justify-center items-center py-8 px-4">
    <!-- Main Container -->
    <div class="w-full max-w-md bg-white rounded-2xl overflow-hidden shadow-xl responsive-container">
        <!-- Header with Logo -->
        <div class="bg-cream-base px-6 py-6 sm:py-8 flex flex-col items-center">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-coffee-medium rounded-full flex items-center justify-center mb-3 sm:mb-4">
                <i class="fas fa-mug-hot text-white text-xl sm:text-2xl"></i>
            </div>
            <h1 class="text-xl sm:text-2xl font-bold text-coffee-dark tracking-wide">SMK<span class="text-coffee-medium">AMALIAH</span></h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">nananananana</p>
        </div>
        
        <!-- Form Section -->
        <div class="bg-white px-6 sm:px-8 py-6 sm:py-8">
            <h2 class="text-lg sm:text-xl font-medium text-coffee-dark mb-5 sm:mb-6 text-center">Welcome Back</h2>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <div class="relative">
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            class="w-full bg-cream-light border-0 rounded-xl p-3 sm:p-4 pl-10 sm:pl-12 text-coffee-dark placeholder-gray-400 focus:ring-2 focus:ring-coffee-light outline-none text-sm sm:text-base" 
                            placeholder="Email Address"
                            required
                            autocomplete="email"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-coffee-medium opacity-70 text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Password Field -->
                <div>
                    <div class="relative">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            class="w-full bg-cream-light border-0 rounded-xl p-3 sm:p-4 pl-10 sm:pl-12 text-coffee-dark placeholder-gray-400 focus:ring-2 focus:ring-coffee-light outline-none text-sm sm:text-base" 
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-coffee-medium opacity-70 text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember" 
                            name="remember" 
                            type="checkbox" 
                            class="w-4 h-4 text-coffee-medium rounded border-gray-300 focus:ring-coffee-light"
                        >
                        <label for="remember" class="ml-2 text-xs sm:text-sm text-gray-600">Remember Me</label>
                    </div>
                    
                    <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-coffee-medium hover:text-coffee-dark">
                        Forgot Password?
                    </a>
                </div>
                
                <!-- Sign In Button -->
                <button 
                    type="submit" 
                    class="w-full bg-coffee-medium hover:bg-coffee-light text-white font-medium py-3 sm:py-4 rounded-xl transition-colors duration-300 shadow-md text-sm sm:text-base mt-2"
                >
                    Sign In
                </button>
                
                <!-- Divider -->
                <div class="relative flex items-center py-2">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-3 sm:mx-4 text-xs text-gray-400">or continue with</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>
                
                <!-- Social Login Buttons -->
                <div class="grid grid-cols-3 gap-2 sm:gap-3">
                    <button type="button" class="flex justify-center items-center bg-cream-light p-3 rounded-xl hover:bg-cream-dark transition-colors duration-300">
                        <i class="fab fa-google text-gray-600"></i>
                    </button>
                    <button type="button" class="flex justify-center items-center bg-cream-light p-3 rounded-xl hover:bg-cream-dark transition-colors duration-300">
                        <i class="fab fa-facebook-f text-gray-600"></i>
                    </button>
                    <button type="button" class="flex justify-center items-center bg-cream-light p-3 rounded-xl hover:bg-cream-dark transition-colors duration-300">
                        <i class="fab fa-apple text-gray-600"></i>
                    </button>
                </div>
            </form>
            
            <!-- Register Link -->
            <p class="text-center text-gray-500 mt-5 sm:mt-6 text-xs sm:text-sm">
                Don't have an account? 
                <a href="#" class="text-coffee-medium font-medium hover:underline">Sign up</a>
            </p>
        </div>
    </div>
    
    <!-- Bottom Brand Text -->
    <div class="mt-4 sm:mt-6 text-center">
        <span class="text-xs text-gray-500">© 2025 SMK AMALIAH 1&2.</span>
    </div>
</body>
</html>