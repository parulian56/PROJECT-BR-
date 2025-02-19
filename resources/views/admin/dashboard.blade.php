@extends('layouts.admin')

@section('title', 'Dashboard') 
@section('header', 'Dashboard')

@section('content')
    <p class="mb-6 text-gray-600 text-lg">Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.</p>

    <!-- Tampilkan error jika ada -->
    @if(session('error'))
        <div class="alert alert-warning bg-yellow-200 text-yellow-800 p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Chart Section -->
    <div class="bg-white p-10 rounded-lg shadow-lg mb-6">
        <h3 class="text-3xl font-semibold text-gray-800 mb-6">Sales Overview</h3>
        
        <!-- Chart Container -->
        <canvas id="salesChart" width="400" height="200"></canvas>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  <!-- Pastikan Chart.js dimuat -->
    <script>
        // Data untuk Chart.js
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar', // Tipe chart (bar chart)
            data: {
                labels: @json($bulan), // Data bulan
                datasets: [{
                    label: 'Total Penjualan',  // Nama label dataset
                    data: @json($totalPenjualan), // Data total penjualan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Mulai dari angka 0
                    }
                }
            }
        });
    </script>
@endpush
