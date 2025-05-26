@extends('layouts.admin')

@section('content')
<!-- Main Container dengan Background Gradient -->
<div class="relative min-h-screen bg-gradient-to-br from-slate-900 via-purple-900/20 to-slate-900">
    <!-- Animated Background Elements (Fixed Position) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Primary floating orbs -->
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-gradient-to-r from-purple-500/30 to-pink-500/30 rounded-full mix-blend-multiply filter blur-3xl animate-float-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-gradient-to-r from-cyan-500/25 to-blue-500/25 rounded-full mix-blend-multiply filter blur-3xl animate-float-delayed"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-gradient-to-r from-emerald-500/20 to-teal-500/20 rounded-full mix-blend-multiply filter blur-3xl animate-float-reverse"></div>
        <div class="absolute bottom-1/3 right-1/4 w-72 h-72 bg-gradient-to-r from-orange-500/15 to-yellow-500/15 rounded-full mix-blend-multiply filter blur-3xl animate-float-slow-reverse"></div>
        <!-- Secondary smaller orbs -->
        <div class="absolute top-1/2 right-1/3 w-32 h-32 bg-gradient-to-r from-violet-400/20 to-purple-400/20 rounded-full mix-blend-multiply filter blur-2xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 left-1/3 w-40 h-40 bg-gradient-to-r from-rose-400/15 to-pink-400/15 rounded-full mix-blend-multiply filter blur-2xl animate-pulse-delayed"></div>
        <!-- Geometric shapes -->
        <div class="absolute top-1/4 right-1/2 w-20 h-20 bg-gradient-to-r from-indigo-500/25 to-purple-500/25 rotate-45 filter blur-xl animate-spin-slow"></div>
        <div class="absolute bottom-1/2 left-1/2 w-16 h-16 bg-gradient-to-r from-cyan-400/20 to-blue-400/20 rotate-12 filter blur-lg animate-bounce-slow"></div>
    </div>

    <!-- Subtle Grid Pattern Overlay -->
    <div class="fixed inset-0 opacity-[0.03] pointer-events-none">
        <div style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-6">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div class="space-y-2">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold bg-gradient-to-r from-white via-purple-200 to-cyan-200 bg-clip-text text-transparent drop-shadow-lg">
                    Kasir Amaliah
                </h1>
                <p class="text-slate-300 text-sm sm:text-lg font-light">Ringkasan transaksi dan penjualan hari ini</p>
            </div>
            <div class="group relative w-full md:w-auto">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <div class="relative flex items-center justify-center md:justify-start gap-3 px-4 sm:px-6 py-3 sm:py-4 rounded-2xl bg-slate-800/80 backdrop-blur-xl border border-slate-700/50 text-white shadow-2xl">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                    <i class="far fa-calendar-alt text-purple-400"></i>
                    <span class="font-semibold tracking-wide text-sm sm:text-base">{{ now()->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Transaksi Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <div class="relative p-6 rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 hover:border-purple-500/50 transition-all duration-500 shadow-2xl transform hover:scale-[1.02]">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <p class="text-xs sm:text-sm font-bold text-purple-300 uppercase tracking-widest mb-2">Total Transaksi</p>
                            <div class="flex items-end gap-2 sm:gap-4">
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">152</h3>
                                <div class="flex items-center gap-1 px-2 sm:px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/30">
                                    <i class="fas fa-arrow-up text-emerald-400 text-xs"></i>
                                    <span class="text-xs sm:text-sm font-bold text-emerald-400">12%</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-xs sm:text-sm mt-2 font-medium">dari kemarin</p>
                        </div>
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center shadow-lg shadow-purple-500/30">
                            <i class="fas fa-receipt text-white text-xl sm:text-2xl"></i>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mt-4"></div>
                </div>
            </div>
            <!-- Pendapatan Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-3xl blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <div class="relative p-6 rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 hover:border-cyan-500/50 transition-all duration-500 shadow-2xl transform hover:scale-[1.02]">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <p class="text-xs sm:text-sm font-bold text-cyan-300 uppercase tracking-widest mb-2">Pendapatan</p>
                            <div class="flex items-end gap-2 sm:gap-4">
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">5.4JT</h3>
                                <div class="flex items-center gap-1 px-2 sm:px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/30">
                                    <i class="fas fa-arrow-up text-emerald-400 text-xs"></i>
                                    <span class="text-xs sm:text-sm font-bold text-emerald-400">8%</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-xs sm:text-sm mt-2 font-medium">dari kemarin</p>
                        </div>
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-500 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                            <i class="fas fa-coins text-white text-xl sm:text-2xl"></i>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full mt-4"></div>
                </div>
            </div>
            <!-- Produk Terjual Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <div class="relative p-6 rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 hover:border-emerald-500/50 transition-all duration-500 shadow-2xl transform hover:scale-[1.02]">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <p class="text-xs sm:text-sm font-bold text-emerald-300 uppercase tracking-widest mb-2">Produk Terjual</p>
                            <div class="flex items-end gap-2 sm:gap-4">
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">287</h3>
                                <div class="flex items-center gap-1 px-2 sm:px-3 py-1 rounded-full bg-blue-500/20 border border-blue-500/30">
                                    <i class="fas fa-arrow-up text-blue-400 text-xs"></i>
                                    <span class="text-xs sm:text-sm font-bold text-blue-400">5%</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-xs sm:text-sm mt-2 font-medium">dari kemarin</p>
                        </div>
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg shadow-emerald-500/30">
                            <i class="fas fa-shopping-basket text-white text-xl sm:text-2xl"></i>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mt-4"></div>
                </div>
            </div>
            <!-- Rata-rata Transaksi Card -->
            <div class="group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-orange-600 to-yellow-600 rounded-3xl blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <div class="relative p-6 rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 hover:border-orange-500/50 transition-all duration-500 shadow-2xl transform hover:scale-[1.02]">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <p class="text-xs sm:text-sm font-bold text-orange-300 uppercase tracking-widest mb-2">Rata Transaksi</p>
                            <div class="flex items-end gap-2 sm:gap-4">
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">35.5K</h3>
                                <div class="flex items-center gap-1 px-2 sm:px-3 py-1 rounded-full bg-purple-500/20 border border-purple-500/30">
                                    <i class="fas fa-equals text-purple-400 text-xs"></i>
                                    <span class="text-xs sm:text-sm font-bold text-purple-400">Stabil</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-xs sm:text-sm mt-2 font-medium">konsisten</p>
                        </div>
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-yellow-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                            <i class="fas fa-chart-line text-white text-xl sm:text-2xl"></i>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full mt-4"></div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Transaksi Hari Ini -->
            <div class="lg:col-span-2 group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-cyan-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                <div class="relative rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 shadow-2xl overflow-hidden">
                    <!-- Header -->
                    <div class="border-b border-slate-700/50 p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <h3 class="font-bold text-xl sm:text-2xl text-white">Transaksi Hari Ini</h3>
                        <div class="flex space-x-2 sm:space-x-3 w-full sm:w-auto">
                            <button class="group/btn relative px-4 sm:px-6 py-2 sm:py-3 rounded-xl bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 hover:text-white transition-all duration-300 border border-slate-600/50 hover:border-purple-500/50 w-full sm:w-auto">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-cyan-500 rounded-xl blur opacity-0 group-hover/btn:opacity-30 transition duration-300"></div>
                                <div class="relative flex items-center justify-center sm:justify-start gap-2">
                                    <i class="fas fa-filter text-sm"></i>
                                    <span class="font-semibold text-sm sm:text-base">Filter</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-slate-900/50">
                                <tr>
                                    <th class="py-4 px-4 sm:px-6 text-left font-bold text-slate-300 uppercase tracking-wider text-xs sm:text-sm">ID Transaksi</th>
                                    <th class="py-4 px-4 sm:px-6 text-left font-bold text-slate-300 uppercase tracking-wider text-xs sm:text-sm">Waktu</th>
                                    <th class="py-4 px-4 sm:px-6 text-left font-bold text-slate-300 uppercase tracking-wider text-xs sm:text-sm">Total</th>
                                    <th class="py-4 px-4 sm:px-6 text-left font-bold text-slate-300 uppercase tracking-wider text-xs sm:text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700/50">
                                <tr class="hover:bg-slate-700/30 transition-all duration-300 group/row">
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white group-hover/row:text-purple-300 transition-colors text-sm sm:text-base">#TRX-20240429-001</td>
                                    <td class="py-4 px-4 sm:px-6 text-slate-400 font-medium text-sm sm:text-base">10:24 WIB</td>
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white text-sm sm:text-base">Rp125.000</td>
                                    <td class="py-4 px-4 sm:px-6">
                                        <span class="px-3 py-1 rounded-full text-xs sm:text-sm font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-700/30 transition-all duration-300 group/row">
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white group-hover/row:text-purple-300 transition-colors text-sm sm:text-base">#TRX-20240429-002</td>
                                    <td class="py-4 px-4 sm:px-6 text-slate-400 font-medium text-sm sm:text-base">11:45 WIB</td>
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white text-sm sm:text-base">Rp89.500</td>
                                    <td class="py-4 px-4 sm:px-6">
                                        <span class="px-3 py-1 rounded-full text-xs sm:text-sm font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-700/30 transition-all duration-300 group/row">
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white group-hover/row:text-purple-300 transition-colors text-sm sm:text-base">#TRX-20240429-003</td>
                                    <td class="py-4 px-4 sm:px-6 text-slate-400 font-medium text-sm sm:text-base">12:30 WIB</td>
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white text-sm sm:text-base">Rp156.750</td>
                                    <td class="py-4 px-4 sm:px-6">
                                        <span class="px-3 py-1 rounded-full text-xs sm:text-sm font-bold bg-red-500/20 text-red-400 border border-red-500/30">
                                            Gagal
                                        </span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-700/30 transition-all duration-300 group/row">
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white group-hover/row:text-purple-300 transition-colors text-sm sm:text-base">#TRX-20240429-004</td>
                                    <td class="py-4 px-4 sm:px-6 text-slate-400 font-medium text-sm sm:text-base">13:15 WIB</td>
                                    <td class="py-4 px-4 sm:px-6 font-bold text-white text-sm sm:text-base">Rp210.000</td>
                                    <td class="py-4 px-4 sm:px-6">
                                        <span class="px-3 py-1 rounded-full text-xs sm:text-sm font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                            Berhasil
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Footer -->
                    <div class="border-t border-slate-700/50 p-6 text-center">
                        <button class="group/btn relative px-6 py-3 rounded-xl font-bold text-purple-400 hover:text-white transition-all duration-300 text-sm sm:text-base">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-cyan-500 rounded-xl blur opacity-0 group-hover/btn:opacity-50 transition duration-300"></div>
                            <div class="relative flex items-center justify-center gap-2">
                                <span>Lihat Semua Transaksi</span>
                                <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Produk Terlaris -->
            <div class="space-y-6">
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-purple-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                    <div class="relative rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-slate-700/50 shadow-2xl overflow-hidden">
                        <!-- Header -->
                        <div class="border-b border-slate-700/50 p-6">
                            <h3 class="font-bold text-xl sm:text-2xl text-white">Produk Terlaris</h3>
                            <p class="text-slate-400 mt-1 font-medium text-sm sm:text-base">Hari ini</p>
                        </div>
                        <!-- Product List -->
                        <div class="p-6 space-y-4">
                            @foreach([
                                ['name' => 'Mie Instan Special', 'sold' => 42, 'revenue' => 'Rp1.050.000', 'color' => 'from-purple-500 to-pink-500'],
                                ['name' => 'Minuman Soda 350ml', 'sold' => 38, 'revenue' => 'Rp760.000', 'color' => 'from-cyan-500 to-blue-500'],
                                ['name' => 'Sabun Mandi Herbal', 'sold' => 25, 'revenue' => 'Rp375.000', 'color' => 'from-emerald-500 to-teal-500'],
                                ['name' => 'Susu Bubuk 400g', 'sold' => 18, 'revenue' => 'Rp540.000', 'color' => 'from-orange-500 to-yellow-500'],
                            ] as $index => $product)
                            <div class="flex items-center justify-between p-3 sm:p-4 rounded-2xl bg-slate-700/30 hover:bg-slate-700/50 transition-all duration-300 group/item border border-slate-600/30 hover:border-slate-500/50">
                                <div class="flex items-center space-x-3 sm:space-x-4">
                                    <div class="relative">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br {{ $product['color'] }} flex items-center justify-center shadow-lg">
                                            <i class="fas fa-box text-white text-lg sm:text-xl"></i>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-5 h-5 sm:w-6 sm:h-6 bg-gradient-to-r from-purple-500 to-cyan-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-[10px] sm:text-xs">{{ $index + 1 }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-bold text-white group-hover/item:text-purple-300 transition-colors text-sm sm:text-base">{{ $product['name'] }}</p>
                                        <p class="text-slate-400 text-xs sm:text-sm font-medium">{{ $product['sold'] }} terjual</p>
                                    </div>
                                </div>
                                <span class="font-black text-white text-sm sm:text-lg">{{ $product['revenue'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter :wght@100;200;300;400;500;600;700;800;900&display=swap');
    body {
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }
    /* Enhanced Floating Animations */
    @keyframes float-slow {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
            opacity: 0.3;
        }
        25% {
            transform: translateY(-20px) translateX(10px) rotate(1deg);
            opacity: 0.2;
        }
        50% {
            transform: translateY(-10px) translateX(-5px) rotate(-0.5deg);
            opacity: 0.4;
        }
        75% {
            transform: translateY(-25px) translateX(8px) rotate(0.5deg);
            opacity: 0.25;
        }
    }
    @keyframes float-delayed {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
            opacity: 0.25;
        }
        33% {
            transform: translateY(-15px) translateX(-8px) rotate(-0.5deg);
            opacity: 0.35;
        }
        66% {
            transform: translateY(-5px) translateX(12px) rotate(1deg);
            opacity: 0.2;
        }
    }
    @keyframes float-reverse {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
            opacity: 0.2;
        }
        50% {
            transform: translateY(15px) translateX(-10px) rotate(-0.8deg);
            opacity: 0.3;
        }
    }
    @keyframes float-slow-reverse {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
            opacity: 0.15;
        }
        40% {
            transform: translateY(12px) translateX(6px) rotate(0.3deg);
            opacity: 0.25;
        }
        80% {
            transform: translateY(-8px) translateX(-4px) rotate(-0.2deg);
            opacity: 0.2;
        }
    }
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 0.2;
            transform: scale(1);
        }
        50% {
            opacity: 0.4;
            transform: scale(1.05);
        }
    }
    @keyframes pulse-delayed {
        0%, 100% {
            opacity: 0.15;
            transform: scale(1);
        }
        50% {
            opacity: 0.3;
            transform: scale(1.08);
        }
    }
    @keyframes spin-slow {
        from {
            transform: rotate(0deg) translateY(0px);
        }
        to {
            transform: rotate(360deg) translateY(-2px);
        }
    }
    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(0px) rotate(12deg);
            opacity: 0.2;
        }
        50% {
            transform: translateY(-8px) rotate(15deg);
            opacity: 0.3;
        }
    }

    .animate-float-slow {
        animation: float-slow 20s ease-in-out infinite;
    }
    .animate-float-delayed {
        animation: float-delayed 25s ease-in-out infinite;
        animation-delay: -5s;
    }
    .animate-float-reverse {
        animation: float-reverse 18s ease-in-out infinite;
        animation-delay: -8s;
    }
    .animate-float-slow-reverse {
        animation: float-slow-reverse 22s ease-in-out infinite;
        animation-delay: -12s;
    }
    .animate-pulse-slow {
        animation: pulse-slow 8s ease-in-out infinite;
    }
    .animate-pulse-delayed {
        animation: pulse-delayed 10s ease-in-out infinite;
        animation-delay: -3s;
    }
    .animate-spin-slow {
        animation: spin-slow 30s linear infinite;
    }
    .animate-bounce-slow {
        animation: bounce-slow 6s ease-in-out infinite;
        animation-delay: -2s;
    }

    /* Glass morphism effects */
    .backdrop-blur-xl {
        backdrop-filter: blur(16px);
    }

    /* Smooth transitions */
    * {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Hover glow effects */
    .group:hover .blur {
        filter: blur(20px) brightness(1.1);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    ::-webkit-scrollbar-track {
        background: rgba(51, 65, 85, 0.3);
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #8b5cf6, #06b6d4);
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #7c3aed, #0891b2);
    }

    /* Enhanced table styling */
    table {
        border-collapse: separate;
        border-spacing: 0;
    }

    /* Refined text shadows for better readability */
    .text-white {
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    /* Gradient text clip support for older browsers */
    .bg-clip-text {
        -webkit-background-clip: text;
        background-clip: text;
    }

    /* Enhanced focus states */
    button:focus {
        outline: 2px solid rgba(139, 92, 246, 0.5);
        outline-offset: 2px;
    }

    /* Subtle shimmer effect for cards */
    .group:hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.05),
            transparent
        );
        animation: shimmer 2s ease-in-out;
        pointer-events: none;
        z-index: 1;
    }
    @keyframes shimmer {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }

    /* Improved performance for animations */
    .animate-float-slow,
    .animate-float-delayed,
    .animate-float-reverse,
    .animate-float-slow-reverse,
    .animate-pulse-slow,
    .animate-pulse-delayed,
    .animate-spin-slow,
    .animate-bounce-slow {
        will-change: transform, opacity;
        backface-visibility: hidden;
        perspective: 1000px;
    }

    /* Ensure fixed background doesn't interfere with scrolling */
    .fixed {
        position: fixed;
        will-change: transform;
    }

    /* Add subtle parallax effect to main content */
    .relative.z-10 {
        transform: translateZ(0);
    }

    /* Responsive improvements */
    @media (max-width: 640px) {
        .animate-float-slow,
        .animate-float-delayed,
        .animate-float-reverse,
        .animate-float-slow-reverse {
            animation-duration: 15s;
        }
    }

    /* Reduce motion for users who prefer it */
    @media (prefers-reduced-motion: reduce) {
        .animate-float-slow,
        .animate-float-delayed,
        .animate-float-reverse,
        .animate-float-slow-reverse,
        .animate-pulse-slow,
        .animate-pulse-delayed,
        .animate-spin-slow,
        .animate-bounce-slow {
            animation: none;
        }
        .group:hover::before {
            animation: none;
        }
    }
</style>
@endpush

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush