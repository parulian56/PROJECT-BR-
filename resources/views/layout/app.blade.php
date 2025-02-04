<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-white p-6 shadow-md h-screen">
        <img alt="Logo" class="w-10 h-10 mx-auto mb-4" src="https://storage.googleapis.com/a1aa/image/slN8CqsLk76FNJ7ZpNUY51JfYkS5SfadoSmSFX1HetxpQ0NoA.jpg"/>
        <a href="{{ url('dashboard') }}" class="block py-2 px-4 hover:bg-gray-200"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ url('data') }}" class="block py-2 px-4 hover:bg-gray-200"><i class="fas fa-folder"></i> Data</a>
        <a href="{{ url('transaksi') }}" class="block py-2 px-4 hover:bg-gray-200"><i class="fas fa-file-alt"></i> Transaksi</a>
        <a href="#" class="block py-2 px-4 hover:bg-gray-200"><i class="fas fa-chart-line"></i> Reports</a>
        <div class="mt-6">
            <a href="#" class="block py-2 px-4 hover:bg-gray-200"><i class="fas fa-cog"></i> Settings</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <div class="text-lg font-bold">@yield('header', 'Dashboard')</div>
            <div class="flex items-center space-x-4">
                <i class="fas fa-bell text-gray-500"></i>
                <img alt="Profile" class="w-8 h-8 rounded-full" src="https://storage.googleapis.com/a1aa/image/miGc9xemrAUTSaqlYxkb4UHT9khpUc3YLdId0cCAe3yVI6GUA.jpg"/>
                <span>Tom Cook</span>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white p-6 rounded-lg shadow">
            @yield('content')
        </div>
        
    </div>

</body>
</html>
