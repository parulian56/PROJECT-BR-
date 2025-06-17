@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')
@php
    $total = 0;
    foreach ($transaksis as $t) {
        $total += $t->total;
    }
@endphp

<div class="bg-white rounded-lg shadow-sm p-6 animate-fadeIn">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start mb-8">
        <div class="mb-6 lg:mb-0">
            <h1 class="text-2xl font-semibold text-gray-800 mb-2">Laporan Transaksi</h1>
            <p class="text-gray-600">Ringkasan data transaksi bisnis</p>
        </div>

        <div class="flex gap-3">
            <button id="exportExcel" class="bg-green-50 hover:bg-green-100 border border-green-200 px-4 py-2 text-green-700 rounded-lg text-sm font-medium flex items-center transition-colors">
                <i class="fas fa-file-excel mr-2"></i> Export Excel
            </button>
            <button class="bg-red-50 hover:bg-red-100 border border-red-200 px-4 py-2 text-red-700 rounded-lg text-sm font-medium flex items-center transition-colors">
                <i class="fas fa-file-pdf mr-2"></i> Export PDF
            </button>
            <button class="bg-blue-50 hover:bg-blue-100 border border-blue-200 px-4 py-2 text-blue-700 rounded-lg text-sm font-medium flex items-center transition-colors">
                <i class="fas fa-print mr-2"></i> Print
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-5 mb-8">
        <h3 class="text-lg font-medium text-blue-800 mb-4">Filter Laporan</h3>

        <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-blue-700 mb-2">Dari Tanggal</label>
                <input type="date" name="start_date" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-sm font-medium text-blue-700 mb-2">Sampai Tanggal</label>
                <input type="date" name="end_date" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium flex items-center justify-center transition-colors">
                    <i class="fas fa-search mr-2"></i> Terapkan Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Transaksi</p>
                    <h3 class="text-2xl font-semibold text-gray-800">{{ number_format($transaksis->count()) }}</h3>
                    <p class="text-xs text-gray-500 mt-1">Transaksi tercatat</p>
                </div>
                <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                    <i class="fas fa-receipt"></i>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Pendapatan</p>
                    <h3 class="text-2xl font-semibold text-gray-800">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                    <p class="text-xs text-gray-500 mt-1">Revenue terkumpul</p>
                </div>
                <div class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-600 rounded-lg">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Rata-rata Transaksi</p>
                    <h3 class="text-2xl font-semibold text-gray-800">
                        @if($transaksis->count() > 0)
                            Rp {{ number_format($total / $transaksis->count(), 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">Per transaksi</p>
                </div>
                <div class="w-10 h-10 flex items-center justify-center bg-purple-100 text-purple-600 rounded-lg">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="bg-indigo-50 border-b border-indigo-200 px-6 py-4">
            <h3 class="text-lg font-medium text-indigo-800">Detail Transaksi</h3>
        </div>

        <div class="overflow-x-auto">
            <table id="transactionTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                            No. Invoice
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($transaksis as $t)
                    <tr class="hover:bg-indigo-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            {{ $t->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $t->invoice ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                            Rp {{ number_format($t->total, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center text-gray-400">
                                <div class="w-12 h-12 flex items-center justify-center bg-gray-100 rounded-lg mb-3">
                                    <i class="fas fa-folder-open text-xl text-gray-400"></i>
                                </div>
                                <p class="font-medium text-gray-600 mb-1">Tidak ada data transaksi</p>
                                <p class="text-sm text-gray-500">Silahkan pilih periode lain atau periksa filter Anda</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($transaksis->count() > 0)
                <tfoot class="bg-indigo-50">
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-right font-medium text-indigo-800">
                            Total Keseluruhan
                        </td>
                        <td class="px-6 py-4 font-semibold text-indigo-800">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-600 bg-slate-50 border border-slate-200 rounded-lg p-4 mt-6">
        <div class="flex items-center mb-2 md:mb-0">
            <i class="fas fa-info-circle mr-2 text-slate-500"></i>
            <span>Data diperbarui secara real-time</span>
        </div>
        <div class="flex items-center">
            <i class="fas fa-clock mr-2 text-slate-500"></i>
            <span>Terakhir diperbarui: {{ now()->format('d M Y, H:i') }} WIB</span>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>
@endpush

@push('scripts')
<!-- Load SheetJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Export to Excel functionality
        document.getElementById('exportExcel').addEventListener('click', function() {
            // Create workbook
            const wb = XLSX.utils.book_new();

            // Create worksheet with data
            const wsData = [];

            // Add header
            wsData.push(['LAPORAN TRANSAKSI']);
            wsData.push(['Tanggal: ' + (new Date()).toLocaleDateString('id-ID')]);
            wsData.push(['']); // Empty row

            // Add summary
            wsData.push(['RINGKASAN']);
            wsData.push(['Total Transaksi', '{{ $transaksis->count() }}']);
            wsData.push(['Total Pendapatan', 'Rp {{ number_format($total, 0, ",", ".") }}']);
            wsData.push(['Rata-rata', 'Rp {{ $transaksis->count() > 0 ? number_format($total / $transaksis->count(), 0, ",", ".") : "0" }}']);
            wsData.push(['']); // Empty row

            // Add table headers
            wsData.push(['Tanggal', 'No. Invoice', 'Total']);

            // Add data
            @foreach ($transaksis as $t)
            wsData.push([
                '{{ $t->created_at->format("d M Y") }}',
                '{{ $t->invoice ?? "N/A" }}',
                'Rp {{ number_format($t->total, 0, ",", ".") }}'
            ]);
            @endforeach

            // Add total
            if ({{ $transaksis->count() }} > 0) {
                wsData.push(['', 'TOTAL', 'Rp {{ number_format($total, 0, ",", ".") }}']);
            }

            // Create worksheet
            const ws = XLSX.utils.aoa_to_sheet(wsData);

            // Set column widths
            ws['!cols'] = [
                { wch: 15 },
                { wch: 20 },
                { wch: 20 }
            ];

            // Style cells with clean, minimal styling
            const range = XLSX.utils.decode_range(ws['!ref']);
            for (let R = 0; R <= range.e.r; R++) {
                for (let C = 0; C <= range.e.c; C++) {
                    const cellAddress = XLSX.utils.encode_cell({ r: R, c: C });
                    if (!ws[cellAddress]) continue;

                    if (!ws[cellAddress].s) ws[cellAddress].s = {};

                    // Header styling
                    if (R === 0) {
                        ws[cellAddress].s = {
                            font: { bold: true, sz: 14, color: { rgb: "1F2937" } },
                            fill: { fgColor: { rgb: "F9FAFB" } },
                            alignment: { horizontal: "center" }
                        };
                    }
                    // Sub header
                    else if (R === 1) {
                        ws[cellAddress].s = {
                            font: { sz: 11, color: { rgb: "6B7280" } },
                            fill: { fgColor: { rgb: "F9FAFB" } },
                            alignment: { horizontal: "center" }
                        };
                    }
                    // Summary header
                    else if (R === 3) {
                        ws[cellAddress].s = {
                            font: { bold: true, sz: 12, color: { rgb: "1F2937" } },
                            fill: { fgColor: { rgb: "E5E7EB" } },
                            alignment: { horizontal: "center" }
                        };
                    }
                    // Summary data
                    else if (R >= 4 && R <= 7) {
                        ws[cellAddress].s = {
                            font: { bold: C === 0 ? true : false, color: { rgb: "374151" } },
                            fill: { fgColor: { rgb: "F9FAFB" } },
                            border: {
                                top: { style: "thin", color: { rgb: "E5E7EB" } },
                                bottom: { style: "thin", color: { rgb: "E5E7EB" } },
                                left: { style: "thin", color: { rgb: "E5E7EB" } },
                                right: { style: "thin", color: { rgb: "E5E7EB" } }
                            }
                        };
                    }
                    // Table headers
                    else if (R === 9) {
                        ws[cellAddress].s = {
                            font: { bold: true, color: { rgb: "1F2937" } },
                            fill: { fgColor: { rgb: "E5E7EB" } },
                            alignment: { horizontal: "center" },
                            border: {
                                top: { style: "medium", color: { rgb: "9CA3AF" } },
                                bottom: { style: "medium", color: { rgb: "9CA3AF" } },
                                left: { style: "thin", color: { rgb: "E5E7EB" } },
                                right: { style: "thin", color: { rgb: "E5E7EB" } }
                            }
                        };
                    }
                    // Data rows
                    else if (R > 9) {
                        const isTotal = ws[cellAddress].v && ws[cellAddress].v.toString().includes('TOTAL');
                        if (isTotal) {
                            ws[cellAddress].s = {
                                font: { bold: true, color: { rgb: "1F2937" } },
                                fill: { fgColor: { rgb: "E5E7EB" } },
                                border: {
                                    top: { style: "medium", color: { rgb: "9CA3AF" } },
                                    bottom: { style: "medium", color: { rgb: "9CA3AF" } },
                                    left: { style: "thin", color: { rgb: "E5E7EB" } },
                                    right: { style: "thin", color: { rgb: "E5E7EB" } }
                                }
                            };
                        } else {
                            const isEven = (R % 2 === 0);
                            ws[cellAddress].s = {
                                font: { color: { rgb: "374151" } },
                                fill: { fgColor: { rgb: isEven ? "FFFFFF" : "F9FAFB" } },
                                border: {
                                    top: { style: "thin", color: { rgb: "F3F4F6" } },
                                    bottom: { style: "thin", color: { rgb: "F3F4F6" } },
                                    left: { style: "thin", color: { rgb: "F3F4F6" } },
                                    right: { style: "thin", color: { rgb: "F3F4F6" } }
                                }
                            };
                        }
                    }
                }
            }

            // Merge header cells
            ws['!merges'] = [
                { s: { r: 0, c: 0 }, e: { r: 0, c: 2 } },
                { s: { r: 1, c: 0 }, e: { r: 1, c: 2 } },
                { s: { r: 3, c: 0 }, e: { r: 3, c: 2 } }
            ];

            XLSX.utils.book_append_sheet(wb, ws, 'Laporan Transaksi');
            XLSX.writeFile(wb, 'Laporan_Transaksi.xlsx');
        });

        // Button loading states
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon && this.type === 'submit') {
                    const originalClass = icon.className;
                    icon.className = 'fas fa-spinner fa-spin mr-2';
                    this.disabled = true;

                    setTimeout(() => {
                        icon.className = originalClass;
                        this.disabled = false;
                    }, 1500);
                }
            });
        });
    });
</script>
@endpush
@endsection
