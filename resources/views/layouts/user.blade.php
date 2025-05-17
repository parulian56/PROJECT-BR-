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
<body class="bg-amber-50 min-h-screen font-sans text-stone-800">
    <!-- Using Alpine.js to manage sidebar state -->
    <div x-data="{ sidebarOpen: true }" class="flex w-full h-screen">
        <!-- Sidebar -->
        <aside 
            :class="{'w-64': sidebarOpen, 'w-16': !sidebarOpen}" 
            class="bg-gradient-to-b from-stone-700 via-amber-800 to-stone-800 border-r border-amber-700 shadow-lg h-screen transition-all duration-500 ease-in-out">

            <div class="flex flex-col h-full justify-between">
                <!-- Logo & Navigation -->
                <div>
                    <!-- Logo & Toggle -->
                    <div class="p-4 border-b border-amber-700 flex justify-between items-center">
                        <!-- Logo and title when expanded -->
                        <div class="flex items-center space-x-3" 
                            x-show="sidebarOpen" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-x-4"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform -translate-x-4">
                            <div class="bg-amber-600 p-2 rounded-lg">
                                <img alt="Logo" class="w-8 h-8" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-amber-200">Amaliah</h1>
                                <p class="text-sm text-amber-400">Sistem Kasir</p>
                            </div>
                        </div>

                        <!-- Only logo when collapsed -->
                        <div class="flex justify-center items-center" 
                            x-show="!sidebarOpen"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">
                            <div class="bg-amber-600 p-2 rounded-lg">
                                <img alt="Logo" class="w-8 h-8" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                            </div>
                        </div>

                        <!-- Toggle button -->
                        <button 
                            @click="sidebarOpen = !sidebarOpen" 
                            class="p-2 rounded-full hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-400 transition-colors text-amber-300 transform transition-transform duration-500 ease-in-out"
                            :class="{'rotate-180': !sidebarOpen}">
                            <i class="fas" :class="sidebarOpen ? 'fa-chevron-left' : 'fa-chevron-right'"></i>
                        </button>
                    </div>

                    <!-- Navigation -->
                    <nav class="p-4">
                        <div x-show="sidebarOpen" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            class="mb-2 text-xs font-semibold text-amber-400 uppercase tracking-wider pl-4">Menu</div>

                        <!-- Transaksi -->
                        <a href="{{ url('user/transaksi') }}" 
                            class="menu-item flex items-center my-1 px-4 py-3 rounded-lg {{ request()->is('user/transaksi*') ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100' : 'text-amber-200 hover:bg-gradient-to-r hover:from-amber-700 hover:to-amber-600 hover:text-amber-100' }} font-medium transition-all duration-300 ease-in-out transform hover:translate-x-1 hover:shadow-md relative overflow-hidden">
                            <div class="z-10 flex items-center">
                                <i class="fas fa-cash-register text-lg"></i>
                                <span x-show="sidebarOpen" 
                                    x-transition:enter="transition ease-out duration-300 delay-100"
                                    x-transition:enter-start="opacity-0 transform -translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-4"
                                    class="ml-3">Transaksi</span>
                            </div>
                            <div class="absolute inset-0 w-0 bg-gradient-to-r from-amber-500 to-yellow-500 transition-all duration-300 ease-out -z-0 nav-highlight"></div>
                        </a>

                        <!-- Data Barang -->
                        <a href="{{ url('user/barang') }}" 
                            class="menu-item flex items-center my-1 px-4 py-3 rounded-lg {{ request()->is('user/barang*') ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100' : 'text-amber-200 hover:bg-gradient-to-r hover:from-amber-700 hover:to-amber-600 hover:text-amber-100' }} font-medium transition-all duration-300 ease-in-out transform hover:translate-x-1 hover:shadow-md relative overflow-hidden">
                            <div class="z-10 flex items-center">
                                <i class="fas fa-box text-lg"></i>
                                <span x-show="sidebarOpen" 
                                    x-transition:enter="transition ease-out duration-300 delay-100"
                                    x-transition:enter-start="opacity-0 transform -translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-4"
                                    class="ml-3">Data Barang</span>
                            </div>
                            <div class="absolute inset-0 w-0 bg-gradient-to-r from-amber-500 to-yellow-500 transition-all duration-300 ease-out -z-0 nav-highlight"></div>
                        </a>
                    </nav>
                </div>

                <!-- Logout Button - Fixed Version -->
                <div class="p-4 border-t border-amber-700">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full py-2 text-sm bg-amber-700 text-amber-200 rounded-lg hover:bg-gradient-to-r hover:from-amber-800 hover:to-amber-600 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-sign-out-alt"></i>
                            <span x-show="sidebarOpen" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                class="ml-2">Logout</span>
                        </button>
                    </form>
                </div>    
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-hidden bg-gradient-to-br from-amber-50 to-stone-100">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-amber-100 py-4 px-6 flex items-center justify-between shadow-sm">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold ml-4 text-amber-900">@yield('header', 'Transaksi')</h2>
                </div>
                
                <!-- Search & Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 rounded-lg border border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all duration-300">
                        <i class="fas fa-search absolute left-3 top-3 text-amber-400"></i>
                    </div>
                    
                    <button class="p-2 rounded-full bg-amber-50 text-amber-700 hover:bg-amber-100 relative transition-all duration-300 ease-in-out transform hover:scale-110">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <div class="flex-1 overflow-auto p-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-amber-100 transition-all duration-300 hover:shadow-md">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-amber-100 p-4 text-center text-sm text-amber-700">
                &copy; 2025 Amaliah Kasir System. All rights reserved.
            </footer>
        </main>
    </div>
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Colored navigation highlight animation */
        .menu-item:hover .nav-highlight {
            width: 100%;
        }
        
        /* Pulse animation for active menu item */
        .menu-item.bg-gradient-to-r {
            animation: pulse-border 2s infinite;
        }
        
        @keyframes pulse-border {
            0% {
                box-shadow: 0 0 0 0 rgba(217, 119, 6, 0.4);
            }
            70% {
                box-shadow: 0 0 0 6px rgba(217, 119, 6, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(217, 119, 6, 0);
            }
        }
    </style>
    
    @stack('scripts')
</body>
</html>