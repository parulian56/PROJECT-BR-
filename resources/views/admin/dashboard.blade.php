@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-stone-800">Kasir Amaliah</h1>
            <p class="text-stone-500">Ringkasan transaksi dan penjualan hari ini</p>
        </div>
        <div class="date-display py-2 px-4 rounded-xl bg-stone-100 text-stone-700 shadow-sm">
            <i class="far fa-calendar-alt mr-2"></i> 
            <span class="font-medium">{{ now()->format('d M Y') }}</span>
        </div>
    </div>

    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
        <!-- Card: Total Transaksi -->
        <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow duration-300 border-l-4 border-amber-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Total Transaksi</p>
                    <div class="flex items-end mt-2">
                        <h3 class="text-3xl font-bold text-stone-800 mr-2">152</h3>
                        <span class="text-sm font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>12%
                        </span>
                    </div>
                    <p class="text-xs text-stone-400 mt-2">dari kemarin</p>
                </div>
                <div class="bg-amber-100 text-amber-600 p-3 rounded-lg shadow-inner">
                    <i class="fas fa-receipt text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card: Pendapatan -->
        <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow duration-300 border-l-4 border-amber-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Pendapatan</p>
                    <div class="flex items-end mt-2">
                        <h3 class="text-3xl font-bold text-stone-800 mr-2">Rp5.4JT</h3>
                        <span class="text-sm font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>8%
                        </span>
                    </div>
                    <p class="text-xs text-stone-400 mt-2">dari kemarin</p>
                </div>
                <div class="bg-amber-100 text-amber-600 p-3 rounded-lg shadow-inner">
                    <i class="fas fa-coins text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card: Produk Terjual -->
        <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow duration-300 border-l-4 border-amber-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Produk Terjual</p>
                    <div class="flex items-end mt-2">
                        <h3 class="text-3xl font-bold text-stone-800 mr-2">287</h3>
                        <span class="text-sm font-medium text-blue-500 bg-blue-100 px-2 py-1 rounded-full">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>5%
                        </span>
                    </div>
                    <p class="text-xs text-stone-400 mt-2">dari kemarin</p>
                </div>
                <div class="bg-amber-100 text-amber-600 p-3 rounded-lg shadow-inner">
                    <i class="fas fa-shopping-basket text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card: Rata-rata Belanja -->
        <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow duration-300 border-l-4 border-amber-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Rata Transaksi</p>
                    <div class="flex items-end mt-2">
                        <h3 class="text-3xl font-bold text-stone-800 mr-2">Rp35.5K</h3>
                        <span class="text-sm font-medium text-purple-500 bg-purple-100 px-2 py-1 rounded-full">
                            <i class="fas fa-equals mr-1 text-xs"></i>
                        </span>
                    </div>
                    <p class="text-xs text-stone-400 mt-2">stabil</p>
                </div>
                <div class="bg-amber-100 text-amber-600 p-3 rounded-lg shadow-inner">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Transaksi Hari Ini -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="border-b border-stone-100 p-5 flex justify-between items-center">
                <h3 class="font-bold text-stone-800">Transaksi Hari Ini</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-lg text-sm transition-colors">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <button class="px-3 py-1 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-sm transition-colors">
                        <i class="fas fa-plus mr-1"></i> Transaksi Baru
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-stone-50 text-stone-500 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold">ID Transaksi</th>
                            <th class="py-3 px-4 text-left font-semibold">Waktu</th>
                            <th class="py-3 px-4 text-left font-semibold">Total</th>
                            <th class="py-3 px-4 text-left font-semibold">Status</th>
                            <th class="py-3 px-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="py-4 px-4 font-medium text-stone-800">#TRX-20240429-001</td>
                            <td class="py-4 px-4 text-sm text-stone-600">10:24 WIB</td>
                            <td class="py-4 px-4 font-medium text-stone-800">Rp125.000</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="text-stone-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="py-4 px-4 font-medium text-stone-800">#TRX-20240429-002</td>
                            <td class="py-4 px-4 text-sm text-stone-600">11:45 WIB</td>
                            <td class="py-4 px-4 font-medium text-stone-800">Rp89.500</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="text-stone-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="py-4 px-4 font-medium text-stone-800">#TRX-20240429-003</td>
                            <td class="py-4 px-4 text-sm text-stone-600">12:30 WIB</td>
                            <td class="py-4 px-4 font-medium text-stone-800">Rp156.750</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Proses</span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="text-stone-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="py-4 px-4 font-medium text-stone-800">#TRX-20240429-004</td>
                            <td class="py-4 px-4 text-sm text-stone-600">13:15 WIB</td>
                            <td class="py-4 px-4 font-medium text-stone-800">Rp210.000</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="text-stone-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="border-t border-stone-100 p-4 text-center">
                <button class="px-4 py-2 text-sm font-medium text-amber-600 hover:text-amber-700 transition-colors">
                    Lihat Semua Transaksi <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
        </div>

        <!-- Produk Terlaris & Quick Actions -->
        <div class="space-y-6">
            <!-- Produk Terlaris -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="border-b border-stone-100 p-5">
                    <h3 class="font-bold text-stone-800">Produk Terlaris Hari Ini</h3>
                </div>
                <div class="p-5 space-y-4">
                    @foreach([
                        ['name' => 'Mie Instan Special', 'sold' => 42, 'revenue' => 'Rp1.050.000'],
                        ['name' => 'Minuman Soda 350ml', 'sold' => 38, 'revenue' => 'Rp760.000'],
                        ['name' => 'Sabun Mandi Herbal', 'sold' => 25, 'revenue' => 'Rp375.000'],
                        ['name' => 'Susu Bubuk 400g', 'sold' => 18, 'revenue' => 'Rp540.000'],
                    ] as $product)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-stone-100 flex items-center justify-center text-amber-600">
                                <i class="fas fa-box"></i>
                            </div>
                            <div>
                                <p class="font-medium text-stone-800">{{ $product['name'] }}</p>
                                <p class="text-xs text-stone-500">{{ $product['sold'] }} terjual</p>
                            </div>
                        </div>
                        <span class="font-medium text-stone-700">{{ $product['revenue'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="border-b border-stone-100 p-5">
                    <h3 class="font-bold text-stone-800">Aksi Cepat</h3>
                </div>
                <div class="p-5 grid grid-cols-2 gap-3">
                    <button class="p-3 bg-amber-100 hover:bg-amber-200 rounded-lg transition-colors flex flex-col items-center">
                        <div class="w-10 h-10 bg-amber-600 text-white rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="text-sm font-medium text-stone-700">Transaksi Baru</span>
                    </button>
                    <button class="p-3 bg-stone-100 hover:bg-stone-200 rounded-lg transition-colors flex flex-col items-center">
                        <div class="w-10 h-10 bg-stone-600 text-white rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-search"></i>
                        </div>
                        <span class="text-sm font-medium text-stone-700">Cari Produk</span>
                    </button>
                    <button class="p-3 bg-stone-100 hover:bg-stone-200 rounded-lg transition-colors flex flex-col items-center">
                        <div class="w-10 h-10 bg-stone-600 text-white rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-print"></i>
                        </div>
                        <span class="text-sm font-medium text-stone-700">Cetak Laporan</span>
                    </button>
                    <button class="p-3 bg-stone-100 hover:bg-stone-200 rounded-lg transition-colors flex flex-col items-center">
                        <div class="w-10 h-10 bg-stone-600 text-white rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="text-sm font-medium text-stone-700">Pengaturan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background-color: #f8f5f2;
    }
    
    .shadow-inner {
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.05);
    }
    
    .transition-colors {
        transition: background-color 0.2s ease, color 0.2s ease;
    }
    
    .hover\:shadow-md:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .border-l-4 {
        border-left-width: 4px;
    }
    
    .text-stone-800 {
        color: #292524;
    }
    
    .text-stone-700 {
        color: #44403c;
    }
    
    .text-stone-600 {
        color: #57534e;
    }
    
    .text-stone-500 {
        color: #78716c;
    }
    
    .text-stone-400 {
        color: #a8a29e;
    }
    
    .bg-stone-100 {
        background-color: #f5f5f4;
    }
    
    .bg-stone-200 {
        background-color: #e7e5e4;
    }
    
    .bg-amber-100 {
        background-color: #fef3c7;
    }
    
    .bg-amber-200 {
        background-color: #fde68a;
    }
    
    .bg-amber-600 {
        background-color: #d97706;
    }
    
    .bg-amber-700 {
        background-color: #b45309;
    }
    
    .border-stone-100 {
        border-color: #f5f5f4;
    }
    
    .divide-stone-100 {
        border-color: #f5f5f4;
    }
    
    .text-amber-600 {
        color: #d97706;
    }
    
    .text-amber-700 {
        color: #b45309;
    }
    
    table {
        border-collapse: separate;
        border-spacing: 0;
    }
    
    th {
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    tr:last-child td {
        border-bottom: none;
    }
</style>
@endpush