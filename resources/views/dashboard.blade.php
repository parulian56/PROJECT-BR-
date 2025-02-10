@extends('layout.app')

@section('title', 'Dashboard') <!-- Judul halaman -->
@section('header', 'Dashboard') <!-- Judul di bagian header -->

@section('content')
    <h3 class="text-xl font-semibold mb-4">Selamat datang di Dashboard!</h3>
    <p class="mb-6">Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.</p>

    @if(session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif

    <p>Data Bulan: {{ json_encode($bulan) }}</p>
    <p>Data Total Penjualan: {{ json_encode($totalPenjualan) }}</p>

    <!-- Chart -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h3 class="text-lg font-semibold mb-2">Sales Overview</h3>
        <canvas id="myChart"></canvas>
    </div>

    <!-- Statistik Pengguna -->
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
            
            var bulan = @json($bulan);  // Pastikan ini berupa array nama bulan, bukan angka
            var totalPenjualan = @json($totalPenjualan);

            if (bulan.length === 0 || totalPenjualan.length === 0) {
                document.getElementById('myChart').parentNode.innerHTML = 
                    "<p class='text-red-600'>Tidak ada data transaksi untuk ditampilkan.</p>";
                return;
            }

            new Chart(ctx, {
                type: 'bar', // Ubah ke 'bar' jika ingin coba format lain
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
                                callback: function(value) { return 'Rp ' + value.toLocaleString(); }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
