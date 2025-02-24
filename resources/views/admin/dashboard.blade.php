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
        <canvas id="salesChart"></canvas> 
    </div>
@endsection

@push('styles')
<style>
    .graph-bar {
        width: 8%;
        background-color: #3b82f6;
        text-align: center;
        color: white;
        position: relative;
        border-radius: 8px;
        transition: height 0.3s ease-in-out;
    }

    .graph-bar span {
        position: absolute;
        top: -24px;
        font-size: 14px;
        font-weight: bold;
        color: #374151;
    }

    .graph-bar:hover {
        background-color: #2563eb;
    }
</style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var canvas = document.getElementById('salesChart');

            if (!canvas) {
                console.error("Canvas #salesChart tidak ditemukan!");
                return;
            }

            var ctx = canvas.getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($bulan),
                    datasets: [{
                        label: 'Total Penjualan',
                        data: @json($totalPenjualan),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            console.log("Labels:", @json($bulan)); 
            console.log("Data:", @json($totalPenjualan)); 
        });
    </script>
@endpush  
