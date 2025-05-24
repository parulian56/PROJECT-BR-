@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Elegant Color Palette - Navy Blue, White, Cream */
    :root {
        /* Navy Blue Spectrum */
        --navy-50: #f8fafc;
        --navy-100: #f1f5f9;
        --navy-200: #e2e8f0;
        --navy-300: #cbd5e1;
        --navy-400: #94a3b8;
        --navy-500: #64748b;
        --navy-600: #475569;
        --navy-700: #334155;
        --navy-800: #1e293b;
        --navy-900: #0f172a;
        --navy-950: #020617;

        /* Cream Spectrum */
        --cream-50: #fefcf3;
        --cream-100: #fef9e7;
        --cream-200: #fef2cc;
        --cream-300: #fde68a;
        --cream-400: #fcd34d;
        --cream-500: #f59e0b;
        --cream-600: #d97706;
        --cream-700: #b45309;
        --cream-800: #92400e;
        --cream-900: #78350f;

        /* Pure White Spectrum */
        --white: #ffffff;
        --white-95: rgba(255, 255, 255, 0.95);
        --white-90: rgba(255, 255, 255, 0.9);
        --white-80: rgba(255, 255, 255, 0.8);
        --white-70: rgba(255, 255, 255, 0.7);
        --white-60: rgba(255, 255, 255, 0.6);
        --white-50: rgba(255, 255, 255, 0.5);
        --white-40: rgba(255, 255, 255, 0.4);
        --white-30: rgba(255, 255, 255, 0.3);
        --white-20: rgba(255, 255, 255, 0.2);
        --white-10: rgba(255, 255, 255, 0.1);
        --white-05: rgba(255, 255, 255, 0.05);

        /* Blue Accent Spectrum */
        --blue-50: #eff6ff;
        --blue-100: #dbeafe;
        --blue-200: #bfdbfe;
        --blue-300: #93c5fd;
        --blue-400: #60a5fa;
        --blue-500: #3b82f6;
        --blue-600: #2563eb;
        --blue-700: #1d4ed8;
        --blue-800: #1e40af;
        --blue-900: #1e3a8a;
    }

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 25%, var(--white-90) 50%, var(--navy-50) 75%, var(--white-95) 100%),
            radial-gradient(circle at top right, var(--cream-100) 0%, transparent 50%),
            radial-gradient(circle at bottom left, var(--navy-100) 0%, transparent 50%);
        min-height: 100vh;
        background-attachment: fixed;
    }

    /* Extended Utility Classes */
    .bg-navy-50 { background-color: var(--navy-50); }
    .bg-navy-100 { background-color: var(--navy-100); }
    .bg-navy-200 { background-color: var(--navy-200); }
    .bg-navy-300 { background-color: var(--navy-300); }
    .bg-navy-400 { background-color: var(--navy-400); }
    .bg-navy-500 { background-color: var(--navy-500); }
    .bg-navy-600 { background-color: var(--navy-600); }
    .bg-navy-700 { background-color: var(--navy-700); }
    .bg-navy-800 { background-color: var(--navy-800); }
    .bg-navy-900 { background-color: var(--navy-900); }
    .bg-navy-950 { background-color: var(--navy-950); }

    .bg-cream-50 { background-color: var(--cream-50); }
    .bg-cream-100 { background-color: var(--cream-100); }
    .bg-cream-200 { background-color: var(--cream-200); }
    .bg-cream-300 { background-color: var(--cream-300); }
    .bg-cream-400 { background-color: var(--cream-400); }
    .bg-cream-500 { background-color: var(--cream-500); }

    .bg-white { background-color: var(--white); }
    .bg-white-95 { background-color: var(--white-95); }
    .bg-white-90 { background-color: var(--white-90); }
    .bg-white-80 { background-color: var(--white-80); }
    .bg-white-70 { background-color: var(--white-70); }

    .text-navy-500 { color: var(--navy-500); }
    .text-navy-600 { color: var(--navy-600); }
    .text-navy-700 { color: var(--navy-700); }
    .text-navy-800 { color: var(--navy-800); }
    .text-navy-900 { color: var(--navy-900); }
    .text-cream-500 { color: var(--cream-500); }
    .text-cream-600 { color: var(--cream-600); }
    .text-cream-700 { color: var(--cream-700); }
    .text-cream-800 { color: var(--cream-800); }
    .text-white { color: var(--white); }

    /* Elegant transitions and animations */
    .transition-smooth {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-2px);
    }

    /* Custom shadows */
    .shadow-elegant {
        box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.08),
                    0 2px 4px -1px rgba(15, 23, 42, 0.04);
    }

    .shadow-elegant-lg {
        box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.1),
                    0 4px 6px -2px rgba(15, 23, 42, 0.05);
    }

    .hover\:shadow-elegant-lg:hover {
        box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.12),
                    0 10px 10px -5px rgba(15, 23, 42, 0.04);
    }

    /* Gradient backgrounds with Navy, Cream, White combinations */
    .bg-gradient-navy {
        background: linear-gradient(135deg, var(--navy-800) 0%, var(--navy-900) 50%, var(--navy-950) 100%);
    }

    .bg-gradient-navy-light {
        background: linear-gradient(135deg, var(--navy-600) 0%, var(--navy-700) 50%, var(--navy-800) 100%);
    }

    .bg-gradient-cream {
        background: linear-gradient(135deg, var(--cream-50) 0%, var(--cream-100) 50%, var(--cream-200) 100%);
    }

    .bg-gradient-cream-warm {
        background: linear-gradient(135deg, var(--cream-100) 0%, var(--cream-200) 50%, var(--cream-300) 100%);
    }

    .bg-gradient-white {
        background: linear-gradient(135deg, var(--white) 0%, var(--white-95) 50%, var(--white-90) 100%);
    }

    .bg-gradient-white-cream {
        background: linear-gradient(135deg, var(--white) 0%, var(--white-95) 30%, var(--cream-50) 70%, var(--cream-100) 100%);
    }

    .bg-gradient-navy-white {
        background: linear-gradient(135deg, var(--navy-800) 0%, var(--navy-700) 30%, var(--white-20) 70%, var(--white-10) 100%);
    }

    .bg-gradient-cream-navy {
        background: linear-gradient(135deg, var(--cream-100) 0%, var(--cream-200) 30%, var(--navy-100) 70%, var(--navy-200) 100%);
    }

    .bg-gradient-blue {
        background: linear-gradient(135deg, var(--blue-600) 0%, var(--blue-700) 50%, var(--navy-700) 100%);
    }

    .bg-gradient-blue-cream {
        background: linear-gradient(135deg, var(--blue-500) 0%, var(--blue-600) 30%, var(--cream-300) 70%, var(--cream-400) 100%);
    }

    /* Complex Multi-layer Gradients */
    .bg-gradient-masterpiece {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 25%, var(--white-90) 50%, var(--navy-50) 75%, var(--white-95) 100%),
            radial-gradient(circle at top left, var(--cream-100) 0%, transparent 40%),
            radial-gradient(circle at bottom right, var(--navy-100) 0%, transparent 40%),
            linear-gradient(45deg, var(--white-05) 25%, transparent 25%),
            linear-gradient(-45deg, var(--white-05) 25%, transparent 25%);
        background-size: 100% 100%, 600px 600px, 600px 600px, 40px 40px, 40px 40px;
    }

    .bg-gradient-card-premium {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 50%, var(--white-90) 100%),
            radial-gradient(circle at top right, var(--navy-50) 0%, transparent 60%);
    }

    .bg-gradient-header {
        background:
            linear-gradient(135deg, var(--navy-900) 0%, var(--navy-800) 30%, var(--navy-700) 70%, var(--navy-600) 100%),
            linear-gradient(45deg, var(--white-10) 0%, transparent 50%);
    }

    /* Custom components with enhanced color schemes */
    .masterpiece-container {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 25%, var(--white-90) 50%, var(--navy-50) 75%, var(--white-95) 100%),
            radial-gradient(circle at top left, var(--cream-100) 0%, transparent 50%),
            radial-gradient(circle at bottom right, var(--navy-100) 0%, transparent 50%);
        backdrop-filter: blur(20px);
        border: 2px solid var(--white-30);
        box-shadow:
            0 25px 50px -12px rgba(15, 23, 42, 0.15),
            0 0 0 1px var(--white-20),
            inset 0 1px 0 var(--white-40);
    }

    .icon-container {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        border: 1px solid var(--white-20);
    }

    .icon-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(45deg, var(--white-20) 0%, var(--white-10) 50%, transparent 100%),
            radial-gradient(circle, var(--white-10) 0%, transparent 70%);
        z-index: 1;
    }

    .icon-container i {
        z-index: 2;
        position: relative;
        filter: drop-shadow(0 1px 2px rgba(15, 23, 42, 0.1));
    }

    .stats-card {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 30%, var(--white-90) 70%, var(--navy-50) 100%),
            radial-gradient(circle at top right, var(--cream-100) 0%, transparent 60%),
            radial-gradient(circle at bottom left, var(--navy-100) 0%, transparent 60%);
        backdrop-filter: blur(12px);
        border: 1px solid var(--white-30);
        position: relative;
        overflow: hidden;
        box-shadow:
            0 10px 25px -5px rgba(15, 23, 42, 0.1),
            0 0 0 1px var(--white-20),
            inset 0 1px 0 var(--white-50);
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg,
            var(--navy-600) 0%,
            var(--blue-500) 25%,
            var(--cream-400) 50%,
            var(--blue-500) 75%,
            var(--navy-600) 100%);
        box-shadow: 0 3px 6px rgba(15, 23, 42, 0.1);
    }

    .stats-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, var(--cream-100) 0%, transparent 70%);
        opacity: 0.5;
        pointer-events: none;
    }

    .table-row-hover:hover {
        background:
            linear-gradient(135deg, var(--white-95) 0%, var(--cream-50) 50%, var(--white-90) 100%),
            radial-gradient(circle at center, var(--navy-50) 0%, transparent 60%);
        transform: scale(1.002);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
        border-left: 3px solid var(--navy-600);
    }

    /* Enhanced Buttons with Navy, Cream, White */
    .btn-primary {
        background:
            linear-gradient(135deg, var(--navy-700) 0%, var(--navy-800) 50%, var(--navy-900) 100%),
            radial-gradient(circle at top, var(--white-10) 0%, transparent 60%);
        border: 1px solid var(--navy-600);
        position: relative;
        overflow: hidden;
        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.2),
            0 0 0 1px var(--white-10),
            inset 0 1px 0 var(--white-20);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            transparent,
            var(--white-30),
            var(--cream-200),
            var(--white-30),
            transparent);
        transition: left 0.8s ease;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        background:
            linear-gradient(135deg, var(--navy-600) 0%, var(--navy-700) 50%, var(--navy-800) 100%),
            radial-gradient(circle at top, var(--cream-100) 0%, transparent 60%);
        transform: translateY(-2px);
        box-shadow:
            0 8px 20px rgba(15, 23, 42, 0.25),
            0 0 0 1px var(--white-20),
            inset 0 1px 0 var(--white-30);
    }

    .btn-secondary {
        background:
            linear-gradient(135deg, var(--white) 0%, var(--cream-50) 50%, var(--white-95) 100%);
        border: 2px solid var(--navy-200);
        color: var(--navy-800);
        position: relative;
        overflow: hidden;
        box-shadow:
            0 2px 8px rgba(15, 23, 42, 0.1),
            inset 0 1px 0 var(--white);
    }

    .btn-secondary:hover {
        background:
            linear-gradient(135deg, var(--cream-50) 0%, var(--cream-100) 50%, var(--white-90) 100%);
        border-color: var(--navy-400);
        transform: translateY(-1px);
        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.15),
            inset 0 1px 0 var(--white);
    }

    /* Form inputs with Navy, Cream, White styling */
    .form-input {
        background:
            linear-gradient(135deg, var(--white) 0%, var(--white-95) 50%, var(--cream-50) 100%);
        border: 2px solid var(--navy-200);
        backdrop-filter: blur(8px);
        box-shadow:
            0 2px 8px rgba(15, 23, 42, 0.05),
            inset 0 1px 0 var(--white);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-input:focus {
        background:
            linear-gradient(135deg, var(--white) 0%, var(--cream-50) 50%, var(--white-95) 100%);
        border-color: var(--navy-600);
        box-shadow:
            0 0 0 4px var(--navy-100),
            0 4px 12px rgba(15, 23, 42, 0.1),
            inset 0 1px 0 var(--white);
        transform: translateY(-1px);
    }

    .form-input:hover {
        border-color: var(--navy-400);
        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.08),
            inset 0 1px 0 var(--white);
    }

    /* Enhanced table styling */
    .table-header {
        background:
            linear-gradient(135deg, var(--navy-800) 0%, var(--navy-900) 50%, var(--navy-950) 100%),
            radial-gradient(circle at top left, var(--white-10) 0%, transparent 60%);
        position: relative;
        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.2),
            inset 0 1px 0 var(--white-10);
    }

    .table-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg,
            var(--cream-400) 0%,
            var(--white) 25%,
            var(--blue-400) 50%,
            var(--white) 75%,
            var(--cream-400) 100%);
        box-shadow: 0 2px 4px rgba(15, 23, 42, 0.1);
    }

    .table-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(45deg, var(--white-05) 25%, transparent 25%),
            linear-gradient(-45deg, var(--white-05) 25%, transparent 25%);
        background-size: 20px 20px;
        opacity: 0.3;
        pointer-events: none;
    }

    /* Table body enhancements */
    .table-body {
        background:
            linear-gradient(135deg, var(--white) 0%, var(--white-95) 100%);
    }

    .table-footer {
        background:
            linear-gradient(135deg, var(--cream-50) 0%, var(--cream-100) 30%, var(--white-95) 70%, var(--navy-50) 100%),
            radial-gradient(circle at center, var(--white-90) 0%, transparent 60%);
        border-top: 2px solid var(--navy-200);
        box-shadow:
            0 -2px 8px rgba(15, 23, 42, 0.05),
            inset 0 1px 0 var(--white-50);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out;
    }

    .animate-delay-100 { animation-delay: 0.1s; }
    .animate-delay-200 { animation-delay: 0.2s; }
    .animate-delay-300 { animation-delay: 0.3s; }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .icon-container {
            width: 40px;
            height: 40px;
        }
    }
</style>
@endsection

@section('content')
@php
    $total = 0;
    foreach ($transaksis as $t) {
        $total += $t->total;
    }
@endphp

<div class="masterpiece-container rounded-2xl shadow-elegant-lg p-8 transition-smooth animate-fade-in-up">
    <!-- Elegant Header -->
    <div class="flex flex-col lg:flex-row justify-between items-center mb-10">
        <div class="text-center lg:text-left mb-6 lg:mb-0">
            <div class="flex items-center justify-center lg:justify-start mb-4">
                <div class="icon-container bg-gradient-blue text-white mr-4 shadow-elegant">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-navy-900 mb-2">
                        Laporan Transaksi
                    </h1>
                    <div class="h-1 w-20 bg-gradient-blue rounded-full"></div>
                </div>
            </div>
            <p class="text-navy-600 text-lg font-medium">Analisis mendalam transaksi bisnis Anda</p>
        </div>

        <div class="flex flex-wrap gap-3 justify-center">
            <button class="btn-primary px-6 py-3 text-white rounded-xl text-sm font-medium flex items-center transition-smooth hover-lift shadow-elegant">
                <i class="fas fa-file-excel mr-2"></i> Export Excel
            </button>
            <button class="btn-primary px-6 py-3 text-white rounded-xl text-sm font-medium flex items-center transition-smooth hover-lift shadow-elegant">
                <i class="fas fa-file-pdf mr-2"></i> Export PDF
            </button>
            <button class="btn-primary px-6 py-3 text-white rounded-xl text-sm font-medium flex items-center transition-smooth hover-lift shadow-elegant">
                <i class="fas fa-print mr-2"></i> Print
            </button>
        </div>
    </div>

    <!-- Premium Filter Section -->
    <div class="bg-gradient-cream p-6 rounded-2xl mb-10 shadow-elegant hover:shadow-elegant-lg transition-smooth animate-fade-in-up animate-delay-100">
        <div class="flex items-center mb-4">
            <div class="icon-container bg-gradient-navy text-white mr-3 shadow-elegant">
                <i class="fas fa-filter"></i>
            </div>
            <h3 class="text-xl font-semibold text-navy-800">Filter Laporan</h3>
        </div>

        <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="block text-sm font-semibold text-navy-700 mb-3">Periode Laporan</label>
                <select name="filter" class="form-input w-full px-4 py-3 rounded-xl focus:ring-2 focus:ring-navy-600 focus:border-navy-600 transition-smooth">
                    <option value="harian" {{ $filter == 'harian' ? 'selected' : '' }}>📅 Harian</option>
                    <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>📊 Mingguan</option>
                    <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>📈 Bulanan</option>
                    <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>📋 Tahunan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-navy-700 mb-3">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-input w-full px-4 py-3 rounded-xl focus:ring-2 focus:ring-navy-600 focus:border-navy-600 transition-smooth">
            </div>

            <div>
                <label class="block text-sm font-semibold text-navy-700 mb-3">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-input w-full px-4 py-3 rounded-xl focus:ring-2 focus:ring-navy-600 focus:border-navy-600 transition-smooth">
            </div>

            <div class="flex items-end">
                <button type="submit" class="btn-primary w-full h-12 text-white rounded-xl font-semibold flex items-center justify-center transition-smooth hover-lift shadow-elegant">
                    <i class="fas fa-search mr-2"></i> Terapkan Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Elegant Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="stats-card p-6 rounded-2xl shadow-elegant hover:shadow-elegant-lg transition-smooth hover-lift animate-fade-in-up animate-delay-100">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-navy-600 font-semibold mb-2 uppercase tracking-wide">Total Transaksi</p>
                    <h3 class="text-3xl font-bold text-navy-900">{{ number_format($transaksis->count()) }}</h3>
                    <p class="text-xs text-navy-500 mt-1">Transaksi tercatat</p>
                </div>
                <div class="icon-container bg-gradient-blue text-white shadow-elegant">
                    <i class="fas fa-receipt text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card p-6 rounded-2xl shadow-elegant hover:shadow-elegant-lg transition-smooth hover-lift animate-fade-in-up animate-delay-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-navy-600 font-semibold mb-2 uppercase tracking-wide">Total Pendapatan</p>
                    <h3 class="text-3xl font-bold text-navy-900">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                    <p class="text-xs text-navy-500 mt-1">Revenue terkumpul</p>
                </div>
                <div class="icon-container bg-gradient-navy text-cream-100 shadow-elegant">
                    <i class="fas fa-coins text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card p-6 rounded-2xl shadow-elegant hover:shadow-elegant-lg transition-smooth hover-lift animate-fade-in-up animate-delay-300">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-navy-600 font-semibold mb-2 uppercase tracking-wide">Rata-rata Transaksi</p>
                    <h3 class="text-3xl font-bold text-navy-900">
                        @if($transaksis->count() > 0)
                            Rp {{ number_format($total / $transaksis->count(), 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </h3>
                    <p class="text-xs text-navy-500 mt-1">Per transaksi</p>
                </div>
                <div class="icon-container bg-cream-200 text-cream-700 shadow-elegant">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Transaction Table -->
    <div class="bg-white rounded-2xl shadow-elegant-lg overflow-hidden mb-8 animate-fade-in-up animate-delay-300">
        <div class="table-header px-6 py-4">
            <div class="flex items-center">
                <div class="icon-container bg-cream-200 text-navy-800 mr-3">
                    <i class="fas fa-table"></i>
                </div>
                <h3 class="text-xl font-bold text-white">Detail Transaksi</h3>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-navy-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold text-navy-800 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-day mr-2 text-navy-600"></i> Tanggal
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-navy-800 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-file-invoice mr-2 text-navy-600"></i> No. Invoice
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-navy-800 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave mr-2 text-navy-600"></i> Total
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-navy-100">
                    @forelse ($transaksis as $t)
                    <tr class="table-row-hover transition-smooth">
                        <td class="px-6 py-4 text-navy-800 font-medium">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-gradient-blue rounded-full mr-3"></div>
                                {{ $t->created_at->format('d M Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-gradient-cream text-navy-800 px-4 py-2 rounded-full text-sm font-semibold border border-cream-200">
                                {{ $t->invoice ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-navy-900 text-lg">
                            Rp {{ number_format($t->total, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center text-navy-500">
                                <div class="icon-container bg-navy-100 text-navy-400 mb-4 w-16 h-16">
                                    <i class="fas fa-folder-open text-2xl"></i>
                                </div>
                                <p class="font-bold text-navy-700 mb-2 text-lg">Tidak ada data transaksi</p>
                                <p class="text-sm text-navy-500">Silahkan pilih periode lain atau periksa filter Anda</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-gradient-cream">
                    <tr>
                        <td colspan="2" class="px-6 py-6 text-right font-bold text-navy-800 text-lg uppercase tracking-wide">
                            <i class="fas fa-calculator mr-2"></i>Total Keseluruhan
                        </td>
                        <td class="px-6 py-6 font-bold text-navy-900 text-xl">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Elegant Footer -->
    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-navy-600 bg-gradient-cream rounded-xl p-4">
        <div class="flex items-center mb-2 md:mb-0">
            <i class="fas fa-info-circle mr-2 text-navy-500"></i>
            <span class="font-medium">Data diperbarui secara real-time</span>
        </div>
        <div class="flex items-center">
            <i class="fas fa-clock mr-2 text-navy-500"></i>
            <span>Terakhir diperbarui: {{ now()->format('d M Y, H:i') }} WIB</span>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add loading states for buttons
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                const text = this.querySelector('span') || this;

                if (this.type === 'submit') {
                    icon.className = 'fas fa-spinner fa-spin mr-2';
                    setTimeout(() => {
                        icon.className = icon.dataset.original || 'fas fa-check mr-2';
                    }, 2000);
                }
            });
        });

        // Add hover effects to cards
        document.querySelectorAll('.stats-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add progressive loading animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-fade-in-up').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            observer.observe(el);
        });
    });
</script>
@endsection
