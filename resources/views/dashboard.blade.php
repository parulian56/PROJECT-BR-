<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, dropdownOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Font Awesome (icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans" x-cloak>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-blue-800 text-white">
                <div class="flex items-center justify-center h-16 px-4 bg-blue-900">
                    <span class="text-xl font-semibold">MyApp</span>
                </div>
                <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                    <a href="#" class="flex items-center px-4 py-2 text-white bg-blue-700 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                        <i class="fas fa-users mr-3"></i>
                        Users
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                        <i class="fas fa-box mr-3"></i>
                        Products
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Reports
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>
                </nav>
                <div class="p-4 border-t border-blue-700">
                    <div class="flex items-center">
                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Admin User</p>
                            <p class="text-xs text-blue-200">admin@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 md:hidden"></div>

        <!-- Mobile sidebar -->
        <div x-show="sidebarOpen" class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-800 text-white transform transition-transform duration-300 ease-in-out md:hidden" 
             :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="flex items-center justify-between h-16 px-4 bg-blue-900">
                <span class="text-xl font-semibold">MyApp</span>
                <button @click="sidebarOpen = false" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center px-4 py-2 text-white bg-blue-700 rounded-lg">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                    <i class="fas fa-box mr-3"></i>
                    Products
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Reports
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-blue-700 rounded-lg">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </nav>
            <div class="p-4 border-t border-blue-700">
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="User">
                    <div class="ml-3">
                        <p class="text-sm font-medium">Admin User</p>
                        <p class="text-xs text-blue-200">admin@example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="User">
                                <span class="hidden md:inline">Admin User</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" 
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Settings
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                    <p class="text-gray-600">Welcome back, Admin User!</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Total Users</p>
                                <h3 class="text-2xl font-bold">1,254</h3>
                            </div>
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-500 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Total Products</p>
                                <h3 class="text-2xl font-bold">568</h3>
                            </div>
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-box text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-500 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Total Sales</p>
                                <h3 class="text-2xl font-bold">$12,540</h3>
                            </div>
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm text-red-500 mt-2">
                            <i class="fas fa-arrow-down mr-1"></i> 3% from last month
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Pending Orders</p>
                                <h3 class="text-2xl font-bold">24</h3>
                            </div>
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-500 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> 4% from last month
                        </p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold">Recent Activity</h2>
                        <a href="#" class="text-blue-600 text-sm">View All</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div>
                                <p class="font-medium">New user registered</p>
                                <p class="text-sm text-gray-500">John Doe registered 2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <p class="font-medium">New order placed</p>
                                <p class="text-sm text-gray-500">Order #1234 placed 4 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-3">
                                <i class="fas fa-box"></i>
                            </div>
                            <div>
                                <p class="font-medium">New product added</p>
                                <p class="text-sm text-gray-500">"Premium Widget" added yesterday</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6 border-b">
                        <h2 class="text-xl font-semibold">Recent Orders</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1234</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Doe</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-15</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$120.00</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1233</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jane Smith</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-14</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$85.50</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1232</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Robert Johnson</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-14</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$220.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>