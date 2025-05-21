@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Modern color palette */
    .bg-primary-50 { background-color: #f0f9ff; }
    .bg-primary-100 { background-color: #e0f2fe; }
    .bg-primary-200 { background-color: #bae6fd; }
    .bg-primary-300 { background-color: #7dd3fc; }
    .bg-primary-400 { background-color: #38bdf8; }
    .bg-primary-500 { background-color: #0ea5e9; }
    .bg-primary-600 { background-color: #0284c7; }
    .bg-primary-700 { background-color: #0369a1; }
    .bg-primary-800 { background-color: #075985; }
    .bg-primary-900 { background-color: #0c4a6e; }

    .text-primary-500 { color: #0ea5e9; }
    .text-primary-600 { color: #0284c7; }
    .text-primary-700 { color: #0369a1; }
    .text-primary-800 { color: #075985; }
    .text-primary-900 { color: #0c4a6e; }

    .bg-secondary-50 { background-color: #f8fafc; }
    .bg-secondary-100 { background-color: #f1f5f9; }
    .bg-secondary-200 { background-color: #e2e8f0; }
    .bg-secondary-300 { background-color: #cbd5e1; }
    .bg-secondary-400 { background-color: #94a3b8; }
    .bg-secondary-500 { background-color: #64748b; }
    .bg-secondary-600 { background-color: #475569; }
    .bg-secondary-700 { background-color: #334155; }
    .bg-secondary-800 { background-color: #1e293b; }
    .bg-secondary-900 { background-color: #0f172a; }

    .text-secondary-500 { color: #64748b; }
    .text-secondary-600 { color: #475569; }
    .text-secondary-700 { color: #334155; }
    .text-secondary-800 { color: #1e293b; }
    .text-secondary-900 { color: #0f172a; }

    /* Elegant transitions */
    .transition-smooth { transition: all 0.3s ease-in-out; }

    /* Card shadows */
    .shadow-elegant { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.02); }
    .hover\:shadow-elegant:hover { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03); }

    /* Table styling */
    .table-row-hover:hover { background-color: #f8fafc; }

    /* Custom rounded corners */
    .rounded-xl { border-radius: 12px; }

    /* Icon styling */
    .icon-container {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
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

<div class="bg-secondary-50 rounded-xl shadow-elegant p-6 border border-secondary-200 transition-smooth">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-secondary-900 mb-1 flex items-center">
                <div class="icon-container bg-primary-100 text-primary-600 mr-3">
                    <i class="fas fa-file-invoice"></i>
                </div>
                Laporan Transaksi
            </h1>
            <p class="text-secondary-500">Analisis lengkap transaksi Anda</p>
        </div>

        <div class="flex flex-wrap gap-3 mt-4 md:mt-0">
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm flex items-center transition-smooth">
                <i class="fas fa-file-excel mr-2"></i> Excel
            </button>
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm flex items-center transition-smooth">
                <i class="fas fa-file-pdf mr-2"></i> PDF
            </button>
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm flex items-center transition-smooth">
                <i class="fas fa-print mr-2"></i> Print
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-5 rounded-xl mb-8 border border-secondary-200 shadow-elegant hover:shadow-elegant transition-smooth">
        <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-secondary-700 mb-2">Periode Laporan</label>
                <select name="filter" class="w-full px-4 py-2 border border-secondary-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white transition-smooth">
                    <option value="harian" {{ $filter == 'harian' ? 'selected' : '' }}>Harian</option>
                    <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                    <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                    <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-secondary-700 mb-2">Dari Tanggal</label>
                <input type="date" name="start_date" class="w-full px-4 py-2 border border-secondary-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-smooth">
            </div>

            <div>
                <label class="block text-sm font-medium text-secondary-700 mb-2">Sampai Tanggal</label>
                <input type="date" name="end_date" class="w-full px-4 py-2 border border-secondary-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-smooth">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full h-[42px] bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium flex items-center justify-center transition-smooth">
                    <i class="fas fa-filter mr-2"></i> Terapkan
                </button>
            </div>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white p-5 rounded-xl border border-secondary-200 shadow-elegant hover:shadow-elegant transition-smooth">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-secondary-600 font-medium mb-1">Total Transaksi</p>
                    <h3 class="text-2xl font-bold text-secondary-900">{{ $transaksis->count() }}</h3>
                </div>
                <div class="icon-container bg-blue-100 text-blue-600">
                    <i class="fas fa-receipt"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-secondary-200 shadow-elegant hover:shadow-elegant transition-smooth">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-secondary-600 font-medium mb-1">Total Pendapatan</p>
                    <h3 class="text-2xl font-bold text-secondary-900">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                </div>
                <div class="icon-container bg-green-100 text-green-600">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-secondary-200 shadow-elegant hover:shadow-elegant transition-smooth">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-secondary-600 font-medium mb-1">Rata-rata Transaksi</p>
                    <h3 class="text-2xl font-bold text-secondary-900">
                        @if($transaksis->count() > 0)
                            Rp {{ number_format($total / $transaksis->count(), 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </h3>
                </div>
                <div class="icon-container bg-purple-100 text-purple-600">
                    <i class="fas fa-chart-simple"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="bg-white rounded-xl border border-secondary-200 shadow-elegant overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-primary-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-day mr-2"></i> Tanggal
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-medium uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-file-invoice mr-2"></i> Invoice
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-medium uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-coins mr-2"></i> Total
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-secondary-200">
                    @forelse ($transaksis as $t)
                    <tr class="table-row-hover transition-smooth">
                        <td class="px-6 py-4 text-secondary-800">{{ $t->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-xs font-medium">
                                {{ $t->invoice ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-secondary-800">Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center text-secondary-500">
                                <div class="icon-container bg-secondary-100 text-secondary-400 mb-3">
                                    <i class="fas fa-folder-open text-xl"></i>
                                </div>
                                <p class="font-medium text-secondary-700 mb-1">Tidak ada data transaksi</p>
                                <p class="text-sm">Silahkan pilih periode lain</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-secondary-50">
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-right font-bold text-secondary-800">Total Keseluruhan</td>
                        <td class="px-6 py-4 font-bold text-secondary-800">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="text-right text-sm text-secondary-500">
        <p>Terakhir diperbarui: {{ now()->format('d M Y H:i') }}</p>
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
