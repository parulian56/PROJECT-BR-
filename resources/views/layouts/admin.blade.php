<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f59e0b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>@yield('title', 'Kasir Amaliah')</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

    @stack('styles')
</head>
<body class="bg-amber-50 font-sans text-stone-800">
    <!-- Mobile-first layout with bottom navigation -->
    <div x-data="{
        showSidebar: false,
        activeTab: 'transaksi',
        cartCount: 0
    }" class="flex flex-col min-h-screen">

        <!-- Top App Bar (Header) -->
        <header class="bg-gradient-to-r from-amber-600 to-amber-700 text-white shadow-md sticky top-0 z-10">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <button @click="showSidebar = !showSidebar" class="p-2 rounded-full hover:bg-amber-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-bold">Amaliah Kasir</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="p-2 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Sidebar for Mobile -->
        <div x-show="showSidebar"
             @click.away="showSidebar = false"
             class="fixed inset-0 z-20 bg-black bg-opacity-50 transition-opacity duration-300"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">

            <div class="absolute left-0 top-0 h-full w-4/5 max-w-sm bg-gradient-to-b from-stone-700 via-amber-800 to-stone-800 shadow-xl transform transition-transform duration-300"
                 :class="{'translate-x-0': showSidebar, '-translate-x-full': !showSidebar}">

                <div class="flex flex-col h-full p-4">
                    <!-- Sidebar Header -->
                    <div class="flex items-center justify-between border-b border-amber-700 pb-4 mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-amber-600 p-2 rounded-lg">
                                <img alt="Logo" class="w-8 h-8" src="{{ asset('asset/image/logo amaliah.png') }}"/>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-amber-200">Amaliah</h1>
                                <p class="text-sm text-amber-400">Sistem Kasir</p>
                            </div>
                        </div>
                        <button @click="showSidebar = false" class="p-2 text-amber-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1">
                        <div class="mb-2 text-xs font-semibold text-amber-400 uppercase tracking-wider pl-4">Menu</div>

                        <a href="{{ url('admin/dashboard') }}"
                           @click="activeTab = 'dashboard'; showSidebar = false"
                           class="menu-item flex items-center my-1 px-4 py-3 rounded-lg {{ request()->is('user/transaksi*') ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100' : 'text-amber-200 hover:bg-gradient-to-r hover:from-amber-700 hover:to-amber-600 hover:text-amber-100' }} font-medium transition-all duration-300">
                            <i class="fas fa-cash-register text-lg"></i>
                            <span class="ml-3">Transaksi</span>
                        </a>

                        <a href="{{ url('admin/data') }}"
                           @click="activeTab = 'data'; showSidebar = false"
                           class="menu-item flex items-center my-1 px-4 py-3 rounded-lg {{ request()->is('user/barang*') ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100' : 'text-amber-200 hover:bg-gradient-to-r hover:from-amber-700 hover:to-amber-600 hover:text-amber-100' }} font-medium transition-all duration-300">
                            <i class="fas fa-box text-lg"></i>
                            <span class="ml-3">Data Barang</span>
                        </a>
                    </nav>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full py-2 px-4 text-sm bg-amber-700 text-amber-200 rounded-lg hover:bg-gradient-to-r hover:from-amber-800 hover:to-amber-600 transition-all duration-300">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="ml-2">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 container mx-auto px-4 py-4">
            <!-- Dynamic Page Title -->
            <div class="mb-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-amber-900">@yield('header', 'Transaksi')</h2>
                <div x-show="activeTab === 'transaksi'" class="relative">
                    <button class="p-2 bg-amber-600 text-white rounded-full shadow-md">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="bg-white rounded-xl shadow-sm p-4 mb-16 border border-amber-100">
                @yield('content')
            </div>
        </main>

        <!-- Bottom Navigation (Mobile) -->
        <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-amber-200 shadow-lg z-10 md:hidden">
            <div class="flex justify-around">
                <a href="{{ url('admin/dashboard') }}"
                   @click="activeTab = 'dashboard'"
                   class="flex flex-col items-center justify-center p-3 text-center w-full transition-colors duration-300"
                   :class="activeTab === 'transaksi' ? 'text-amber-600' : 'text-stone-500 hover:text-amber-600'">
                    <i class="fas fa-cash-register text-xl mb-1"></i>
                    <span class="text-xs">Home</span>
                </a>

                <a href="{{ url('admin/data') }}"
                   @click="activeTab = 'data'"
                   class="flex flex-col items-center justify-center p-3 text-center w-full transition-colors duration-300"
                   :class="activeTab === 'barang' ? 'text-amber-600' : 'text-stone-500 hover:text-amber-600'">
                    <i class="fas fa-box text-xl mb-1"></i>
                    <span class="text-xs">Data Barang</span>
                </a>

                <button class="flex flex-col items-center justify-center p-3 text-center w-full text-stone-500 hover:text-amber-600 transition-colors duration-300">
                    <i class="fas fa-cog text-xl mb-1"></i>
                    <span class="text-xs">Pengaturan</span>
                </button>
            </div>
        </nav>
    </div>

    <style>
        [x-cloak] { display: none !important; }

        /* For PWA install prompt */
        @media (display-mode: standalone) {
            body {
                overscroll-behavior-y: contain;
            }

            /* Hide address bar space */
            header {
                padding-top: env(safe-area-inset-top);
            }

            /* Adjust bottom nav for iOS */
            nav.fixed-bottom {
                padding-bottom: env(safe-area-inset-bottom);
            }
        }

        /* Touch feedback */
        .menu-item:active {
            transform: scale(0.98);
        }

        /* Optimize for touch targets */
        button, a {
            touch-action: manipulation;
        }
    </style>

    @stack('scripts')
</body>
</html>
