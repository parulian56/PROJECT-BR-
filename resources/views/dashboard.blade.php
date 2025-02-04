@extends('layout.app')

@section('title', 'Dashboard') <!-- Judul halaman -->
@section('header', 'Dashboard') <!-- Judul di bagian header -->

@section('content')
    <h3 class="text-xl font-semibold mb-4">Selamat datang di Dashboard!</h3>
    <p class="mb-6">Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.</p>

    <!-- Chart -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h3 class="text-lg font-semibold mb-2">Sales Overview</h3>
        <canvas id="myChart"></canvas>
    </div>

    <!-- Another Section (optional) -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h3 class="text-lg font-semibold mb-2">Statistik Pengguna</h3>
        <p>Data statistik pengguna dan transaksi akan ditampilkan di sini.</p>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            
            // Ambil data dari controller
            var bulan = @json($bulan);
            var totalPenjualan = @json($totalPenjualan);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: bulan.map(b => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][b - 1]), // Menampilkan nama bulan
                    datasets: [{
                        label: 'Penjualan',
                        data: totalPenjualan,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Penjualan (Rp)'
                            },
                            ticks: {
                                callback: function(value) { return 'Rp ' + value.toLocaleString(); }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
