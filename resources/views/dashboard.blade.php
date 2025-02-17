@extends('layout.app')

@section('title', 'Dashboard') 
@section('header', 'Dashboard')

@section('content')
<p class="mb-6">Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.</p>



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
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna border batang
                    borderWidth: 2,
                    hoverBackgroundColor: 'rgba(54, 162, 235, 0.8)', // Warna saat hover
                    hoverBorderColor: 'rgba(54, 162, 235, 1.2)' // Warna border saat hover
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
                            text: 'Bulan',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Penjualan (Rp)',
                            font: {
                                size: 14
                            }
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

