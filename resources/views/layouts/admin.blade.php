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
<body class="bg-gradient-to-b from-blue-200 to-blue-400 flex text-gray-800">
    
    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-blue-500 to-blue-700 text-gray-100 flex flex-col justify-between min-h-screen p-4 rounded-r-xl shadow-lg">
        <div>
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-6">
                <img alt="Logo" class="w-12 h-12" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                <span class="text-lg font-semibold">Admin Panel</span>
            </div>
            
            <!-- Menu Items -->
            <nav>
                <a href="{{ url('admin/dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-th-large mr-3"></i> Dashboard
                </a>
                <a href="{{ url('admin/data') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-database mr-3"></i> Data
                </a>
                <a href="#" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-chart-line mr-3"></i> Reports
                </a>
            </nav>
        </div>
        
        <!-- Settings -->
        <div>
            <a href="#" class="flex items-center py-3 px-4 bg-blue-600 rounded-lg hover:bg-blue-500 transition">
                <i class="fas fa-cog mr-3"></i> Settings
            </a>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Header -->
        
        
        <!-- Content Section -->
        <section class="bg-white p-6 rounded-lg shadow mt-4">
            @yield('content')
        </section>
    </main>
    
    @stack('scripts')
</body>
</html>