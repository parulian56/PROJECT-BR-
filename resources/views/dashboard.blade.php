@extends('layout.app')

@section('title', 'Dashboard') 
@section('header', 'Dashboard')

@section('content')
<p class="mb-6">Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.</p>

<!-- Barang Terjual -->
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h3 class="text-lg font-semibold mb-2">Barang Terjual Terbaru</h3>
    
    @if ($barangTerjual->isEmpty())
        <p class="text-gray-600">Belum ada transaksi barang yang terjual.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-300">
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Nama Produk</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Jumlah</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangTerjual as $barang)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-800">{{ $barang->nama_produk }}</td>
                            <td class="py-3 px-4 text-sm text-gray-800">{{ number_format($barang->jumlah, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-sm text-gray-800">{{ $barang->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@if(session('error'))
    <div class="alert alert-warning">{{ session('error') }}</div>
@endif

<!-- Chart -->
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h3 class="text-lg font-semibold mb-2">Sales Overview</h3>
    <canvas id="myChart"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById('myChart');

        if (!canvas) {
            console.error("Canvas 'myChart' tidak ditemukan!");
            return;
        }

        var ctx = canvas.getContext('2d');

        // Hapus chart sebelumnya jika ada (agar tidak duplikat saat reload)
        if (window.myChart instanceof Chart) {
            window.myChart.destroy();
        }

        // Ambil data dari controller
        var bulan = @json($bulan);
        var totalPenjualan = @json($totalPenjualan).map(Number);

        console.log("Bulan:", bulan);
        console.log("Total Penjualan:", totalPenjualan);

        // Cek jika data kosong
        if (!bulan.length || !totalPenjualan.length) {
            canvas.parentNode.innerHTML = "<p class='text-red-600 text-center'>Tidak ada data transaksi untuk ditampilkan.</p>";
            return;
        }

        // Buat chart baru
        window.myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bulan,
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: totalPenjualan,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Penjualan (Rp)'
                        },
                        ticks: {
                            callback: function(value) { return 'Rp ' + value.toLocaleString('id-ID'); }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
