<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            /* Custom colors for the login page */
            :root {
                --login-primary: #f5a623;   /* Primary orange color */
                --login-secondary: #fff8e7;  /* Light background color */
                --login-accent: #ffb84d;     /* Accent color for buttons */
                --login-text: #4a4a4a;       /* Text color */
            }
            
            body {
                background-color: var(--login-primary);
                overflow-x: hidden;
                font-family: 'Figtree', sans-serif;
            }
            
            .login-curve-shape {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                z-index: 0;
                clip-path: polygon(0 0, 70% 0, 100% 100%, 0% 100%);
                background-color: white;
            }
            
            .login-container {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 relative">
            <!-- Curved background shape -->
            <div class="login-curve-shape"></div>
            
            <!-- Login container -->
            <div class="login-container w-full max-w-5xl flex flex-col md:flex-row rounded-2xl shadow-2xl overflow-hidden">
                <!-- Left side with illustration -->
                <div class="md:w-1/2 bg-white p-8 flex flex-col justify-center items-start">
                    <div class="text-2xl font-bold text-amber-500 mb-6">BISNIS RITEL</div>
                    <div class="w-full h-64 flex justify-center items-center mb-6">
                       <p class="font-bold">"Bisnis Ritel adalah jurusan yang fokus pada penjualan langsung ke konsumen, seperti di toko, minimarket, atau online."</p>
                       
                            
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="h-1 w-12 bg-amber-500 rounded-full"></div>
                        <div class="text-sm text-gray-500">Work together seamlessly</div>
                    </div>
                </div>
                
                <!-- Right side with login form -->
                <div class="md:w-1/2 bg-white p-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>