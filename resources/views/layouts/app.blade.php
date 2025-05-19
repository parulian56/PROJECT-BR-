<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>{{ config('app.name', 'Kasir Am') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #1e88e5;
            --primary-dark: #1565c0;
            --primary-light: #64b5f6;
            --secondary: #f5f9ff;
            --accent: #ff6e40;
            --dark: #263238;
            --light: #ffffff;
            --gray: #eceff1;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: var(--dark);
        }
        
        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 0.8rem 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            color: var(--light) !important;
            font-weight: 700;
            font-size: 1.6rem;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.4rem;
        }
        
        .navbar-light .navbar-nav .nav-link {
            color: var(--light);
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .navbar-light .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .navbar-light .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 0.7rem 1.5rem;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: var(--secondary);
            color: var(--primary);
        }
        
        main {
            flex: 1;
            padding: 2rem 0;
        }
        
        .auth-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .auth-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--light);
            padding: 2rem;
            text-align: center;
        }
        
        .auth-body {
            padding: 2rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.8rem 1rem;
            border: 1px solid #e0e0e0;
        }
        
        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 8px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(30, 136, 229, 0.2);
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(30, 136, 229, 0.3);
        }
        
        .footer {
            background-color: var(--dark);
            color: var(--light);
            padding: 1.5rem 0;
            margin-top: auto;
        }
        
        /* Dashboard Elements */
        .dash-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }
        
        .dash-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .dash-card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--secondary);
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .dash-card-title {
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .dash-card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        
        /* Sidebar if needed */
        .sidebar {
            background-color: var(--light);
            height: 100%;
            width: 250px;
            position: fixed;
            left: 0;
            top: 72px;
            padding: 2rem 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 999;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        
        .sidebar-link i {
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }
        
        .sidebar-link:hover, .sidebar-link.active {
            background-color: var(--secondary);
            border-left-color: var(--primary);
            color: var(--primary);
        }
        
        /* Add responsive styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    <i class="fas fa-cash-register"></i>
                    {{ config('app.name', 'Kasir Am') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/transactions">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/reports">Laporan</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i>
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user me-2"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="/settings">
                                        <i class="fas fa-cog me-2"></i> Pengaturan
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt me-2"></i>
                                     {{ __('Logout') }}
                                 </a>
                                 
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                 
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
                
                <!-- Example content for demonstration -->
                <div class="row">
                    
                    
                
           
        </main>
        
        <footer class="footer mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-3">Kasir Am</h5>
                        <p class="mb-0">Solusi kasir modern untuk bisnis Anda. Mudah digunakan, cepat, dan andal.</p>
                    </div>
                </div>
                
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
