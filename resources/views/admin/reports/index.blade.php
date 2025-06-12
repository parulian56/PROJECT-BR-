<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi - Masterpiece Edition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'gradient': 'gradient 8s ease infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite alternate',
                        'bounce-gentle': 'bounce-gentle 2s ease-in-out infinite',
                        'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
                        'slide-in-right': 'slide-in-right 0.8s ease-out forwards',
                        'zoom-in': 'zoom-in 0.5s ease-out forwards',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': { 'background-position': '0% 50%' },
                            '50%': { 'background-position': '100% 50%' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        shimmer: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' },
                        },
                        'pulse-glow': {
                            '0%': { 'box-shadow': '0 0 20px rgba(245, 158, 11, 0.5)' },
                            '100%': { 'box-shadow': '0 0 40px rgba(245, 158, 11, 0.8)' },
                        },
                        'bounce-gentle': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
                        },
                        'fade-in-up': {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        'slide-in-right': {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        'zoom-in': {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                    },
                    backdropBlur: {
                        'xs': '2px',
                    },
                    boxShadow: {
                        'amber-glow': '0 0 30px rgba(245, 158, 11, 0.3)',
                        'amber-glow-lg': '0 0 50px rgba(245, 158, 11, 0.4)',
                        'elegant': '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                        'elegant-lg': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
                        'inner-glow': 'inset 0 2px 4px 0 rgba(255, 255, 255, 0.1)',
                    },
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-amber-masterpiece {
            background: linear-gradient(135deg,
                #fef7ed 0%,
                #fed7aa 15%,
                #fdba74 30%,
                #fb923c 45%,
                #f97316 60%,
                #ea580c 75%,
                #dc2626 90%,
                #991b1b 100%);
            background-size: 400% 400%;
        }

        .text-gradient-amber {
            background: linear-gradient(135deg, #f59e0b, #d97706, #b45309);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-amber-masterpiece {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
            position: relative;
            overflow: hidden;
        }

        .btn-amber-masterpiece::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn-amber-masterpiece:hover::before {
            left: 100%;
        }

        .card-amber-premium {
            background: linear-gradient(135deg,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(254, 243, 217, 0.9) 25%,
                rgba(255, 255, 255, 0.85) 50%,
                rgba(254, 243, 217, 0.8) 75%,
                rgba(255, 255, 255, 0.9) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .table-row-premium:hover {
            background: linear-gradient(135deg,
                rgba(254, 243, 217, 0.3) 0%,
                rgba(253, 230, 138, 0.2) 50%,
                rgba(254, 243, 217, 0.3) 100%);
            transform: translateX(5px);
            border-left: 4px solid #f59e0b;
        }

        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(245, 158, 11, 0.6);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 2s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 3s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 4s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 6s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 7s; }
        .particle:nth-child(9) { left: 90%; animation-delay: 8s; }
    </style>
</head>
<body class="font-inter bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 min-h-screen relative overflow-x-hidden">
    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Masterpiece Header -->
        <div class="card-amber-premium rounded-3xl shadow-elegant-lg p-8 mb-8 relative overflow-hidden animate-fade-in-up">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-100/20 via-orange-100/20 to-yellow-100/20 animate-gradient"></div>

            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row justify-between items-center">
                    <div class="text-center lg:text-left mb-8 lg:mb-0">
                        <div class="flex items-center justify-center lg:justify-start mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-amber-glow mr-4 animate-pulse-glow">
                                <i class="fas fa-chart-line text-2xl text-white"></i>
                            </div>
                            <div>
                                <h1 class="text-4xl lg:text-6xl font-black text-gradient-amber mb-2 animate-bounce-gentle">
                                    Laporan Transaksi
                                </h1>
                                <div class="h-2 w-32 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full shadow-amber-glow"></div>
                            </div>
                        </div>
                        <p class="text-amber-800 text-xl font-semibold tracking-wide">
                            ✨ Analisis Mendalam Transaksi Bisnis Premium ✨
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 justify-center animate-slide-in-right">
                        <button class="btn-amber-masterpiece px-8 py-4 text-white rounded-2xl font-bold text-sm shadow-elegant hover:shadow-amber-glow-lg transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                            <i class="fas fa-file-excel mr-3"></i>Export Excel
                        </button>
                        <button class="btn-amber-masterpiece px-8 py-4 text-white rounded-2xl font-bold text-sm shadow-elegant hover:shadow-amber-glow-lg transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                            <i class="fas fa-file-pdf mr-3"></i>Export PDF
                        </button>
                        <button class="btn-amber-masterpiece px-8 py-4 text-white rounded-2xl font-bold text-sm shadow-elegant hover:shadow-amber-glow-lg transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                            <i class="fas fa-print mr-3"></i>Print
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Filter Section -->
        <div class="card-amber-premium rounded-3xl p-8 mb-8 shadow-elegant hover:shadow-amber-glow transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.2s;">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-amber-glow mr-4 animate-float">
                    <i class="fas fa-filter text-white text-lg"></i>
                </div>
                <h3 class="text-2xl font-bold text-amber-900">🎯 Filter Laporan Premium</h3>
            </div>

            <form class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-amber-800 uppercase tracking-wider">
                        <i class="fas fa-calendar-alt mr-2"></i>Dari Tanggal
                    </label>
                    <input type="date" class="w-full px-6 py-4 rounded-xl border-2 border-amber-200 bg-white/80 backdrop-blur-sm focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 font-medium text-amber-900 shadow-inner-glow">
                </div>

                <div class="space-y-3">
                    <label class="block text-sm font-bold text-amber-800 uppercase tracking-wider">
                        <i class="fas fa-calendar-alt mr-2"></i>Sampai Tanggal
                    </label>
                    <input type="date" class="w-full px-6 py-4 rounded-xl border-2 border-amber-200 bg-white/80 backdrop-blur-sm focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 font-medium text-amber-900 shadow-inner-glow">
                </div>

                <div class="space-y-3">
                    <label class="block text-sm font-bold text-amber-800 uppercase tracking-wider">
                        <i class="fas fa-user mr-2"></i>Status
                    </label>
                    <select class="w-full px-6 py-4 rounded-xl border-2 border-amber-200 bg-white/80 backdrop-blur-sm focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 font-medium text-amber-900 shadow-inner-glow">
                        <option>Semua Status</option>
                        <option>Berhasil</option>
                        <option>Pending</option>
                        <option>Gagal</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="btn-amber-masterpiece w-full h-14 text-white rounded-xl font-bold text-sm shadow-elegant hover:shadow-amber-glow-lg transition-all duration-300 hover:scale-105">
                        <i class="fas fa-search mr-3"></i>🚀 Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Magnificent Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card-amber-premium p-8 rounded-3xl shadow-elegant hover:shadow-amber-glow-lg transition-all duration-500 hover:scale-105 animate-zoom-in relative overflow-hidden group" style="animation-delay: 0.3s;">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-100/30 to-orange-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-amber-700 font-bold mb-3 uppercase tracking-wider">
                                📊 Total Transaksi
                            </p>
                            <h3 class="text-4xl font-black text-amber-900 mb-2">1,247</h3>
                            <p class="text-xs text-amber-600 font-semibold">Transaksi tercatat</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg animate-bounce-gentle">
                            <i class="fas fa-receipt text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-amber-premium p-8 rounded-3xl shadow-elegant hover:shadow-amber-glow-lg transition-all duration-500 hover:scale-105 animate-zoom-in relative overflow-hidden group" style="animation-delay: 0.4s;">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-100/30 to-orange-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-amber-700 font-bold mb-3 uppercase tracking-wider">
                                💰 Total Pendapatan
                            </p>
                            <h3 class="text-4xl font-black text-amber-900 mb-2">Rp 2.847.500.000</h3>
                            <p class="text-xs text-amber-600 font-semibold">Revenue terkumpul</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg animate-bounce-gentle">
                            <i class="fas fa-coins text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-amber-premium p-8 rounded-3xl shadow-elegant hover:shadow-amber-glow-lg transition-all duration-500 hover:scale-105 animate-zoom-in relative overflow-hidden group" style="animation-delay: 0.5s;">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-100/30 to-orange-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-amber-700 font-bold mb-3 uppercase tracking-wider">
                                📈 Rata-rata Transaksi
                            </p>
                            <h3 class="text-4xl font-black text-amber-900 mb-2">Rp 2.284.500</h3>
                            <p class="text-xs text-amber-600 font-semibold">Per transaksi</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg animate-bounce-gentle">
                            <i class="fas fa-chart-line text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spectacular Transaction Table -->
        <div class="card-amber-premium rounded-3xl shadow-elegant-lg overflow-hidden animate-fade-in-up" style="animation-delay: 0.6s;">
            <div class="bg-gradient-to-r from-amber-600 via-orange-600 to-amber-700 px-8 py-6 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-400/20 animate-gradient"></div>
                <div class="relative z-10 flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm mr-4">
                        <i class="fas fa-table text-white text-lg"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">✨ Detail Transaksi Premium ✨</h3>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-amber-50 to-orange-50">
                        <tr>
                            <th class="px-8 py-6 text-left text-sm font-black text-amber-800 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-day mr-3 text-amber-600"></i>
                                    📅 Tanggal
                                </div>
                            </th>
                            <th class="px-8 py-6 text-left text-sm font-black text-amber-800 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-file-invoice mr-3 text-amber-600"></i>
                                    📋 No. Invoice
                                </div>
                            </th>
                            <th class="px-8 py-6 text-left text-sm font-black text-amber-800 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-amber-600"></i>
                                    👤 Customer
                                </div>
                            </th>
                            <th class="px-8 py-6 text-left text-sm font-black text-amber-800 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave mr-3 text-amber-600"></i>
                                    💰 Total
                                </div>
                            </th>
                            <th class="px-8 py-6 text-left text-sm font-black text-amber-800 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-3 text-amber-600"></i>
                                    📊 Status
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-amber-100">
                        <tr class="table-row-premium transition-all duration-300 hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50">
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full mr-4 animate-pulse"></div>
                                    12 Jun 2025
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-amber-200 shadow-inner-glow">
                                    INV-2025-001
                                </span>
                            </td>
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                John Doe
                            </td>
                            <td class="px-8 py-6 font-black text-amber-900 text-xl">
                                Rp 2.500.000
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-emerald-200">
                                    ✅ Berhasil
                                </span>
                            </td>
                        </tr>
                        <tr class="table-row-premium transition-all duration-300 hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50">
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full mr-4 animate-pulse"></div>
                                    11 Jun 2025
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-amber-200 shadow-inner-glow">
                                    INV-2025-002
                                </span>
                            </td>
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                Jane Smith
                            </td>
                            <td class="px-8 py-6 font-black text-amber-900 text-xl">
                                Rp 1.750.000
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-yellow-200">
                                    ⏳ Pending
                                </span>
                            </td>
                        </tr>
                        <tr class="table-row-premium transition-all duration-300 hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50">
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full mr-4 animate-pulse"></div>
                                    10 Jun 2025
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-amber-200 shadow-inner-glow">
                                    INV-2025-003
                                </span>
                            </td>
                            <td class="px-8 py-6 text-amber-900 font-semibold">
                                Mike Johnson
                            </td>
                            <td class="px-8 py-6 font-black text-amber-900 text-xl">
                                Rp 3.200.000
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 px-4 py-2 rounded-full text-sm font-bold border-2 border-emerald-200">
                                    ✅ Berhasil
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gradient-to-r from-amber-100 via-orange-100 to-amber-100">
                        <tr>
                            <td colspan="4" class="px-8 py-8 text-right font-black text-amber-900 text-xl uppercase tracking-wide">
                                <i class="fas fa-calculator mr-3"></i>💎 Total Keseluruhan
                            </td>
                            <td class="px-8 py-8 font-black text-amber-900 text-2xl">
                                Rp 2.847.500.000
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Magnificent Footer -->
        <div class="mt-8 card-amber-premium rounded-2xl p-6 shadow-elegant animate-fade-in-up" style="animation-delay: 0.8s;">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-amber-800">
                <div class="flex items-center mb-4 md:mb-0 font-semibold">
                    <i class="fas fa-info-circle mr-3 text-amber-600"></i>
                    <span>✨ Data diperbarui secara real-time premium</span>
                </div>
                <div class="flex items-center font-semibold">
                    <i class="fas fa-clock mr-3 text-amber-600"></i>
                    <span>🕐 Terakhir diperbarui: 12 Jun 2025, 14:30 WIB</span>
                </div>
            </div>
        </div>
    </div>
