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
<body class="bg-gray-50 min-h-screen font-sans text-gray-800">
    <div class="flex w-full h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r border-gray-200 shadow-lg h-screen">
            <div class="flex flex-col h-full justify-between">
                <!-- Logo & Header -->
                <div>
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-500 p-2 rounded-lg">
                                <img alt="Logo" class="w-8 h-8" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-800">Amaliah</h1>
                                <p class="text-sm text-gray-500">Sistem Kasir</p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="p-4">
                        <div class="mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider pl-4">Menu</div>
                        <a href="{{ url('user/dashboard') }}" class="flex items-center my-1 px-4 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-all">
                            <i class="fas fa-home mr-3 text-lg"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ url('user/transaksi') }}" class="flex items-center my-1 px-4 py-3 rounded-lg bg-blue-50 text-blue-600 font-medium">
                            <i class="fas fa-cash-register mr-3 text-lg"></i>
                            <span>Transaksi</span>
                        </a>
                        <a href="{{ url('user/produk') }}" class="flex items-center my-1 px-4 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-all">
                            <i class="fas fa-box mr-3 text-lg"></i>
                            <span>Produk</span>
                        </a>
                        <a href="{{ url('user/laporan') }}" class="flex items-center my-1 px-4 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-all">
                            <i class="fas fa-chart-line mr-3 text-lg"></i>
                            <span>Laporan</span>
                        </a>
                    </nav>
                </div>

                <!-- User Profile & Logout -->
                <div class="p-4 border-t border-gray-100">
                    <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-100 mb-2 cursor-pointer">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-sm">Kasir</p>
                                <p class="text-xs text-gray-500">Online</p>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-ellipsis-v text-gray-400"></i>
                        </div>
                    </div>
                    <a href="{{ url('logout') }}" class="flex items-center justify-center w-full py-2 mt-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-gray-200 py-4 px-6 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="text-xl font-semibold ml-4">@yield('header', 'Transaksi')</h2>
                </div>
                
                <!-- Search & Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    
                    <button class="p-2 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200 relative">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 p-4 text-center text-sm text-gray-500">
                &copy; 2025 Amaliah Kasir System. All rights reserved.
            </footer>
        </main>
    </div>
    
    @stack('scripts')
</body>
</html>