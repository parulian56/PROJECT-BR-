@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Laporan Transaksi Kasir ({{ ucfirst($filter) }})</h1>

        <!-- Filter Options -->
        <div class="mb-4 flex gap-2">
            <a href="{{ route('admin.report', ['filter' => 'harian']) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded {{ $filter === 'harian' ? 'bg-blue-800' : '' }}">
                Harian
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
