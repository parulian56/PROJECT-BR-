@extends('layouts.admin')

@section('title', 'Laporan Transaksi')
@section('header', 'Laporan Transaksi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Laporan Harian -->
        <a href="{{ route('admin.reports.daily') }}" class="bg-amber-500 hover:bg-amber-600 text-white rounded-xl shadow p-6 transition-all duration-300 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Laporan Harian</h3>
                <p class="text-sm">Transaksi hari ini</p>
            </div>
            <i class="fas fa-calendar-day text-3xl"></i>
        </a>

        <!-- Laporan Mingguan -->
        <a href="{{ route('admin.reports.weekly') }}" class="bg-green-500 hover:bg-green-600 text-white rounded-xl shadow p-6 transition-all duration-300 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Laporan Mingguan</h3>
                <p class="text-sm">Transaksi 7 hari terakhir</p>
            </div>
            <i class="fas fa-calendar-week text-3xl"></i>
        </a>

        <!-- Laporan Bulanan -->
        <a href="{{ route('admin.reports.monthly') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow p-6 transition-all duration-300 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Laporan Bulanan</h3>
                <p class="text-sm">Transaksi bulan ini</p>
            </div>
            <i class="fas fa-calendar-alt text-3xl"></i>
        </a>

        <!-- Laporan Tahunan -->
        <a href="{{ route('admin.reports.yearly') }}" class="bg-purple-500 hover:bg-purple-600 text-white rounded-xl shadow p-6 transition-all duration-300 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Laporan Tahunan</h3>
                <p class="text-sm">Transaksi tahun ini</p>
            </div>
            <i class="fas fa-calendar text-3xl"></i>
        </a>
    </div>
@endsection
