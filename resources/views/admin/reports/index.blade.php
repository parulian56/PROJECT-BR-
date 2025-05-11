@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Laporan Transaksi Kasir ({{ ucfirst($filter) }})</h1>

        <!-- Filter Options -->
        <div class="mb-4 flex gap-2">
            <a href="{{ route('admin.reports.daily') }}"
   class="bg-amber-500 hover:bg-amber-600 text-white rounded-xl shadow p-6 flex justify-between items-center">
    <div>
        <h3 class="text-lg font-semibold">Laporan Harian</h3>
        <p class="text-sm">Transaksi hari ini</p>
    </div>
    <i class="fas fa-calendar-day text-3xl"></i>
</a>

            <a href="{{ route('admin.report', ['filter' => 'mingguan']) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded {{ $filter === 'mingguan' ? 'bg-blue-800' : '' }}">
                Mingguan
            </a>
            <a href="{{ route('admin.report', ['filter' => 'bulanan']) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded {{ $filter === 'bulanan' ? 'bg-blue-800' : '' }}">
                Bulanan
            </a>
            <a href="{{ route('admin.report', ['filter' => 'tahunan']) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded {{ $filter === 'tahunan' ? 'bg-blue-800' : '' }}">
                Tahunan
            </a>
        </div>

        <!-- Table -->
        @include('admin.partials.report-table')  <!-- Menyertakan tabel laporan transaksi -->
        
    </div>
@endsection
