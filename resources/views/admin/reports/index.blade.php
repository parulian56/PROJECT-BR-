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
            <button id="exportPDF" class="bg-red-50 hover:bg-red-100 border border-red-200 px-4 py-2 text-red-700 rounded-lg text-sm font-medium flex items-center transition-colors">
                <i class="fas fa-file-pdf mr-2"></i> Export PDF
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-5 mb-8">
        <h3 class="text-lg font-medium text-black mb-4">Filter Laporan</h3>

        <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-black mb-2">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-sm font-medium text-black mb-2">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium flex items-center justify-center transition-colors">
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
            <h3 class="text-lg font-medium text-black">Detail Transaksi</h3>
        </div>

        <div class="overflow-x-auto">
            <table id="transactionTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                            No. Invoice
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
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
<!-- Load jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<!-- Load html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Export to Excel functionality
        document.getElementById('exportExcel').addEventListener('click', function() {
            // ... (kode export Excel yang sudah ada) ...
        });

        // Export to PDF functionality
        document.getElementById('exportPDF').addEventListener('click', function() {
            // Show loading indicator
            const pdfButton = this;
            const originalContent = pdfButton.innerHTML;
            pdfButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Membuat PDF...';
            pdfButton.disabled = true;

            // Use html2canvas to capture the report content
            const element = document.querySelector('.bg-white.rounded-lg.shadow-sm');

            html2canvas(element, {
                scale: 2, // Higher quality
                logging: false,
                useCORS: true,
                allowTaint: true,
                scrollY: -window.scrollY
            }).then(canvas => {
                // Initialize jsPDF
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');

                // Calculate PDF dimensions
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 210; // A4 width in mm
                const pageHeight = 295; // A4 height in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;

                // Add image to PDF
                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // Add additional pages if content is too long
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Save the PDF
                pdf.save('Laporan_Transaksi_{{ \Carbon\Carbon::now()->format("Ymd_His") }}.pdf');

                // Restore button state
                pdfButton.innerHTML = originalContent;
                pdfButton.disabled = false;
            }).catch(error => {
                console.error('Error generating PDF:', error);
                pdfButton.innerHTML = originalContent;
                pdfButton.disabled = false;
                alert('Gagal membuat PDF. Silakan coba lagi.');
            });
        });
    });
</script>
@endpush
@endsection
