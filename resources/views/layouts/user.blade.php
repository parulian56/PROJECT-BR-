<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Kasir')</title>

    <!-- Tailwind atau CSS lainnya -->
    @vite('resources/css/app.css')
    
    <!-- Custom CSS -->
    @stack('styles')

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <!-- Sidebar -->
<aside class="w-64 bg-blue-900 text-white min-h-screen p-6 flex flex-col justify-between">
    <div>
        <h2 class="text-2xl font-bold">Kasir</h2>
        <nav class="mt-6">
            <a href="{{ url('user/transaksi') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-700">Transaksi</a>
        </nav>
    </div>

    <!-- Tombol Kembali ke Login -->
    
</aside>


    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800">@yield('header', 'Transaksi Kasir')</h2>

        <div class="bg-white p-6 rounded-lg shadow mt-4">
            @yield('content')
        </div>
    </main>

</body>
@stack('scripts')
</html>
