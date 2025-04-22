<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    
    @stack('styles')
</head>
<body class="bg-stone-400 flex flex-col md:flex-row text-gray-800 min-h-screen">
    
    <!-- Sidebar -->
    <aside class="w-full md:w-72 bg-stone-300 text-gray-900 flex flex-col justify-between min-h-screen p-4 shadow-lg md:rounded-r-xl">
        <div>
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-6">
                <img alt="Logo" class="w-12 h-12" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                <span class="text-lg font-semibold">Admin Panel</span>
            </div>
            
            <!-- Menu Items -->
            <nav>
                <a href="{{ url('admin/dashboard') }}" class="block py-3 px-4 rounded-lg hover:bg-stone-400 transition flex items-center space-x-3">
                    <i class="fas fa-home"></i><span>Dashboard</span>
                </a>
                <a href="{{ url('admin/data') }}" class="block py-3 px-4 rounded-lg hover:bg-stone-400 transition flex items-center space-x-3">
                    <i class="fas fa-database"></i><span>Data</span>
                </a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-stone-400 transition flex items-center space-x-3">
                    <i class="fas fa-chart-bar"></i><span>Reports</span>
                </a>
            </nav>
        </div>
        
        <!-- Logout -->
        <div>
            <a href="#" class="block py-3 px-4 bg-stone-300 rounded-lg hover:bg-stone-400 transition flex items-center space-x-3">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-6">
        <!-- Header -->
        <header class="flex justify-between items-center bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold text-gray-700">@yield('title')</h2>
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
