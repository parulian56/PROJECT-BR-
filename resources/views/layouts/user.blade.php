<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Kasir')</title>
    
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    
    @stack('styles')
</head>
<body class="bg-gradient-to-b from-blue-200 to-blue-400 flex text-gray-800">
    
    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-blue-500 to-blue-700 text-gray-100 flex flex-col justify-between min-h-screen p-4 rounded-r-xl shadow-lg">
        <div>
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-6">
                <img alt="Logo" class="w-12 h-12" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                <span class="text-lg font-semibold">Kasir</span>
            </div>
            
            <!-- Menu Items -->
            <nav>
                <a href="{{ url('user/transaksi') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-cash-register mr-3"></i> Transaksi
                </a>
            </nav>
        </div>
        
        <!-- Logout Button -->
        <div>
            <a href="{{ url('logout') }}" class="flex items-center py-3 px-4 bg-blue-600 rounded-lg hover:bg-blue-500 transition">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </a>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <header class="flex justify-between items-center bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold text-gray-700">@yield('header', 'Transaksi Kasir')</h2>
            <div class="flex items-center space-x-4">
                <i class="fas fa-bell text-gray-600 hover:text-blue-500 cursor-pointer"></i>
                <i class="fas fa-bars text-gray-600 hover:text-blue-500 cursor-pointer"></i>
                <div class="bg-blue-500 w-10 h-10 rounded-full"></div>
            </div>
        </header>
        
        <!-- Content Section -->
        <section class="bg-white p-6 rounded-lg shadow mt-4">
            @yield('content')
        </section>
    </main>
    
    @stack('scripts')
</body>
</html>
