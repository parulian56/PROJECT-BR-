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

@push('styles')
    <style>
        #myChart {
            width: 100%;
            height: 400px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var bulan = @json($bulan);
        var totalPenjualan = @json($totalPenjualan).map(Number);

        console.log(bulan); // Debug output
        console.log(totalPenjualan); // Debug output

        // Tampilkan Chart jika data tersedia
        if (bulan.length && totalPenjualan.length) {
            var ctx = document.getElementById('myChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: bulan,
                    datasets: [{
                        label: 'Total Penjualan (Rp)',
                        data: totalPenjualan,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        } else {
            console.log("Data bulan atau total penjualan kosong.");
            // Jika data kosong, tampilkan pesan kesalahan
            document.getElementById('myChart').parentNode.innerHTML = "<p class='text-red-600 text-center'>Tidak ada data transaksi untuk ditampilkan.</p>";
        }
    });
</script>
@endpush