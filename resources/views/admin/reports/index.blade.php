@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .bg-brown-50 { background-color: #FBF7F3; }
    .bg-brown-100 { background-color: #F5EDE4; }
    .bg-brown-200 { background-color: #E8D8C9; }
    .bg-brown-300 { background-color: #D2B9A5; }
    .bg-brown-400 { background-color: #BEA18C; }
    .bg-brown-500 { background-color: #8D6E63; }
    .bg-brown-600 { background-color: #6D4C41; }
    .bg-brown-700 { background-color: #5D4037; }
    .bg-brown-800 { background-color: #4E342E; }
    .bg-brown-900 { background-color: #3E2723; }
    
    .text-brown-500 { color: #8D6E63; }
    .text-brown-600 { color: #6D4C41; }
    .text-brown-700 { color: #5D4037; }
    .text-brown-800 { color: #4E342E; }
    .text-brown-900 { color: #3E2723; }
    
    .border-brown-100 { border-color: #F5EDE4; }
    .border-brown-200 { border-color: #E8D8C9; }
    .border-brown-300 { border-color: #D2B9A5; }
    .border-brown-500 { border-color: #8D6E63; }
    
    .hover\:bg-brown-700:hover { background-color: #5D4037; }
    .hover\:bg-brown-800:hover { background-color: #4E342E; }
    .hover\:text-brown-800:hover { color: #4E342E; }
    
    .focus\:ring-brown-500:focus { --tw-ring-color: #8D6E63; }
    .focus\:border-brown-500:focus { border-color: #8D6E63; }
    
    .hover\:bg-brown-50:hover { background-color: #FBF7F3; }
</style>
@endsection

@section('content')
<!-- Calculate total before rendering content -->
@php
    $total = 0;
    foreach ($transaksis as $t) {
        $total += $t->total;
    }
@endphp

<div class="bg-brown-50 rounded-lg shadow-md p-6 border border-brown-200">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brown-900 mb-4 md:mb-0">
            <i class="fas fa-file-invoice text-brown-600 mr-2"></i>Laporan Transaksi
        </h1>
        
        <div class="flex flex-wrap gap-2">
            <button class="bg-brown-700 hover:bg-brown-800 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors">
                <i class="fas fa-file-excel mr-2"></i> Export Excel
            </button>
            <button class="bg-brown-700 hover:bg-brown-800 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors">
                <i class="fas fa-file-pdf mr-2"></i> Export PDF
            </button>
            <button class="bg-brown-700 hover:bg-brown-800 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors">
                <i class="fas fa-print mr-2"></i> Print
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-4 rounded-lg mb-6 border border-brown-200 shadow-sm">
        <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="text-sm font-medium text-brown-800 mb-1">Periode Laporan</label>
                <select name="filter" onchange="this.form.submit()" class="border border-brown-300 px-3 py-2 rounded-md focus:ring-2 focus:ring-brown-500 focus:border-brown-500 transition-all bg-brown-50 text-brown-800">
                    <option value="harian" {{ $filter == 'harian' ? 'selected' : '' }}>Harian</option>
                    <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                    <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                    <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                </select>
            </div>
            
            <div class="flex items-end justify-end">
                <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-md font-medium flex justify-center items-center transition-colors">
                    <i class="fas fa-search mr-2"></i> Tampilkan
                </button>
            </div>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white border border-brown-200 p-4 rounded-lg shadow-sm">
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-brown-600 font-medium">Total Transaksi</p>
                    <h3 class="text-2xl font-bold text-brown-900">{{ $transaksis->count() }}</h3>
                </div>
                <div class="bg-brown-100 p-3 rounded-full self-start">
                    <i class="fas fa-receipt text-brown-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-brown-200 p-4 rounded-lg shadow-sm">
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-brown-600 font-medium">Total Pendapatan</p>
                    <h3 class="text-2xl font-bold text-brown-900">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-brown-100 p-3 rounded-full self-start">
                    <i class="fas fa-coins text-brown-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white border border-brown-200 p-4 rounded-lg shadow-sm">
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-brown-600 font-medium">Rata-rata Transaksi</p>
                    <h3 class="text-2xl font-bold text-brown-900">
                        @if($transaksis->count() > 0)
                            Rp {{ number_format($total / $transaksis->count(), 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </h3>
                </div>
                <div class="bg-brown-100 p-3 rounded-full self-start">
                    <i class="fas fa-chart-simple text-brown-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="overflow-x-auto rounded-lg border border-brown-200 shadow-sm">
        <table class="min-w-full bg-white">
            <thead class="bg-brown-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-day mr-2"></i> Tanggal
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-file-invoice mr-2"></i> Invoice
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-coins mr-2"></i> Total
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-brown-200">
                @forelse ($transaksis as $t)
                    <tr class="hover:bg-brown-50 transition-colors">
                        <td class="px-4 py-3 text-brown-800">{{ $t->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="bg-brown-100 text-brown-800 px-2 py-1 rounded text-xs">
                                {{ $t->invoice ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 font-medium text-brown-800">Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-folder-open text-brown-300 text-5xl mb-3"></i>
                                <p class="font-medium text-brown-600">Tidak ada data transaksi</p>
                                <p class="text-sm text-brown-500">Silahkan pilih periode lain</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-brown-100">
                <tr>
                    <td colspan="2" class="px-4 py-3 text-right font-bold text-brown-800">Total Keseluruhan</td>
                    <td class="px-4 py-3 font-bold text-brown-800">Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Footer Info -->
    <div class="mt-4 text-right text-sm text-brown-600">
        <p>Data diperbarui terakhir: {{ now()->format('d M Y H:i') }}</p>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any JavaScript functionality here
    });
</script>
@endsection