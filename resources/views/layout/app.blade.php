<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body class="bg-blue-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-yellow-500 flex flex-col justify-between rounded-r-3xl">
        <div class="mt-10">
            <!-- Logo -->
            <img alt="Logo" class="w-13 h-12 mx-auto mb-4" src="/asset/image/logo amaliah.png"/>
            
            <!-- Menu Items -->
            <a href="{{ url('admin/dashboard') }}" class="flex items-center py-4 px-6 hover:bg-gray-700">
                <i class="fas fa-th-large mr-3"></i> 
                <span>Dashboard</span>
            </a>
            <a href="{{ url('admin/data') }}" class="flex items-center py-4 px-6 hover:bg-gray-700">
                <i class="fas fa-database mr-3"></i> 
                <span>Data</span>
            </a>
            <a href="#" class="flex items-center py-4 px-6 hover:bg-gray-700">
                <i class="fas fa-chart-line mr-3"></i> 
                <span>Reports</span>
            </a>
        </div>

        <!-- Settings -->
        <div class="mb-10">
            <a href="#" class="flex items-center py-4 px-6 bg-gray-700 text-white rounded-l-full">
                <i class="fas fa-cog mr-3"></i> 
                <span>Settings</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-end items-center space-x-4">
            <i class="fas fa-bell text-yellow-500"></i>
            <i class="fas fa-bars text-yellow-500"></i>
            <div class="bg-yellow-500 w-10 h-10 rounded-full"></div>
        </div>

        <!-- Content Section -->
        <div class="bg-white p-6 rounded-lg shadow mt-4">
            @yield('content')
        </div>
    </div>

</body>
<!-- Layout -->
@stack('scripts')

</html>

