@extends('layouts.admin')

@section('content')
<!-- Main Container with Subtle Background -->
<div class="min-h-screen bg-slate-50">
    <!-- Main Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div class="space-y-2">
                <h1 class="text-3xl sm:text-4xl font-bold text-slate-800">
                    Kasir Amaliah
                </h1>
                <p class="text-slate-500 text-sm sm:text-base">Ringkasan transaksi dan penjualan hari ini</p>
            </div>
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200 shadow-sm">
                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                <i class="far fa-calendar-alt text-slate-400"></i>
                <span class="font-medium text-slate-700">{{ now()->format('d M Y') }}</span>
            </div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <!-- Total Transaksi Card -->
            <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Total Transaksi</p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">152</h3>
                            <div class="flex items-center gap-1 px-2 py-1 rounded-full bg-emerald-100">
                                <i class="fas fa-arrow-up text-emerald-600 text-xs"></i>
                                <span class="text-xs font-semibold text-emerald-600">12%</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs mt-2">dari kemarin</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-receipt text-purple-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Pendapatan Card -->
            <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Pendapatan</p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">5.4JT</h3>
                            <div class="flex items-center gap-1 px-2 py-1 rounded-full bg-emerald-100">
                                <i class="fas fa-arrow-up text-emerald-600 text-xs"></i>
                                <span class="text-xs font-semibold text-emerald-600">8%</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs mt-2">dari kemarin</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-coins text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Produk Terjual Card -->
            <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Produk Terjual</p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">287</h3>
                            <div class="flex items-center gap-1 px-2 py-1 rounded-full bg-blue-100">
                                <i class="fas fa-arrow-up text-blue-600 text-xs"></i>
                                <span class="text-xs font-semibold text-blue-600">5%</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs mt-2">dari kemarin</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                        <i class="fas fa-shopping-basket text-green-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Rata-rata Transaksi Card -->
            <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Rata Transaksi</p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">35.5K</h3>
                            <div class="flex items-center gap-1 px-2 py-1 rounded-full bg-purple-100">
                                <i class="fas fa-equals text-purple-600 text-xs"></i>
                                <span class="text-xs font-semibold text-purple-600">Stabil</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs mt-2">konsisten</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center">
                        <i class="fas fa-chart-line text-amber-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Transaksi Hari Ini -->
            <div class="lg:col-span-2">
                <div class="rounded-xl bg-white border border-slate-200 shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div class="border-b border-slate-200 p-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h3 class="font-bold text-lg text-slate-800">Transaksi Hari Ini</h3>
                            <p class="text-slate-500 text-sm">Daftar transaksi terbaru</p>
                        </div>
                        <button class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors duration-300 text-sm font-medium flex items-center gap-2">
                            <i class="fas fa-filter text-xs"></i>
                            <span>Filter</span>
                        </button>
                    </div>
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="py-3 px-4 text-left font-semibold text-slate-600 uppercase tracking-wider text-xs">ID Transaksi</th>
                                    <th class="py-3 px-4 text-left font-semibold text-slate-600 uppercase tracking-wider text-xs">Waktu</th>
                                    <th class="py-3 px-4 text-left font-semibold text-slate-600 uppercase tracking-wider text-xs">Total</th>
                                    <th class="py-3 px-4 text-left font-semibold text-slate-600 uppercase tracking-wider text-xs">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">#TRX-20240429-001</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">10:24 WIB</td>
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">Rp125.000</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">#TRX-20240429-002</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">11:45 WIB</td>
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">Rp89.500</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">#TRX-20240429-003</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">12:30 WIB</td>
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">Rp156.750</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            Gagal
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">#TRX-20240429-004</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">13:15 WIB</td>
                                    <td class="py-3 px-4 font-medium text-slate-800 text-sm">Rp210.000</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Footer -->
                    <div class="border-t border-slate-200 p-4 text-center">
                        <button class="px-4 py-2 rounded-lg font-medium text-purple-600 hover:text-purple-800 transition-colors duration-300 text-sm flex items-center justify-center gap-2 mx-auto">
                            <span>Lihat Semua Transaksi</span>
                            <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Produk Terlaris -->
            <div class="space-y-6">
                <div class="rounded-xl bg-white border border-slate-200 shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div class="border-b border-slate-200 p-5">
                        <h3 class="font-bold text-lg text-slate-800">Produk Terlaris</h3>
                        <p class="text-slate-500 text-sm">Hari ini</p>
                    </div>
                    <!-- Product List -->
                    <div class="p-4 space-y-3">
                        @foreach([
                            ['name' => 'Mie Instan Special', 'sold' => 42, 'revenue' => 'Rp1.050.000', 'color' => 'bg-purple-100', 'icon' => 'fa-box', 'icon-color' => 'text-purple-600'],
                            ['name' => 'Minuman Soda 350ml', 'sold' => 38, 'revenue' => 'Rp760.000', 'color' => 'bg-blue-100', 'icon' => 'fa-bottle-water', 'icon-color' => 'text-blue-600'],
                            ['name' => 'Sabun Mandi Herbal', 'sold' => 25, 'revenue' => 'Rp375.000', 'color' => 'bg-green-100', 'icon' => 'fa-soap', 'icon-color' => 'text-green-600'],
                            ['name' => 'Susu Bubuk 400g', 'sold' => 18, 'revenue' => 'Rp540.000', 'color' => 'bg-amber-100', 'icon' => 'fa-wine-bottle', 'icon-color' => 'text-amber-600'],
                        ] as $index => $product)
                        <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50 hover:bg-slate-100 transition-colors duration-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg {{ $product['color'] }} flex items-center justify-center">
                                    <i class="fas {{ $product['icon'] }} {{ $product['icon-color'] }}"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-800 text-sm">{{ $product['name'] }}</p>
                                    <p class="text-slate-500 text-xs">{{ $product['sold'] }} terjual</p>
                                </div>
                            </div>
                            <span class="font-semibold text-slate-800 text-sm">{{ $product['revenue'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
        color: #1e293b;
    }
    
    /* Smooth transitions */
    * {
        transition: all 0.2s ease;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    ::-webkit-scrollbar-track {
        background: rgba(203, 213, 225, 0.3);
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    
    /* Table hover effect */
    tbody tr {
        transition: background-color 0.15s ease;
    }
    
    /* Button hover effects */
    button:hover {
        transform: translateY(-1px);
    }
    
    /* Pulse animation for status indicator */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    /* Focus states for accessibility */
    button:focus, input:focus, select:focus {
        outline: 2px solid #6366f1;
        outline-offset: 2px;
    }
    
    /* Card hover effects */
    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    
    .shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    /* Reduce motion for users who prefer it */
    @media (prefers-reduced-motion: reduce) {
        * {
            transition: none !important;
            animation: none !important;
        }
    }
</style>
@endpush

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush