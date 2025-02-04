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
    <script>
        // Chart.js untuk grafik penjualan
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
                    datasets: [{
                        label: 'Penjualan',
                        data: [100, 200, 150, 300, 250],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                });
            });
        });
    </script>
@endpush
