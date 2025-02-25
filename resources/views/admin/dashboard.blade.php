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
   <!-- Chart Section -->
<!-- Chart Section -->
<div class="bg-white p-10 rounded-lg shadow-lg mb-6">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Sales Overview</h3>
    
    <!-- Container untuk grafik batang -->
    <div class="relative w-full h-72 border-b border-gray-300 flex items-end justify-between" id="barChart"></div>
    
    <!-- Label bulan -->
    <div class="flex justify-between mt-2 px-2 text-gray-700 text-sm" id="chartLabels"></div>
</div>

@endsection

@push('styles')
<style>
    .bar-container {
        width: 8%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .bar {
        width: 100%;
        background-color: #3b82f6;
        border-radius: 6px 6px 0 0;
        transition: height 0.3s ease-in-out;
    }

    .bar:hover {
        background-color: #2563eb;
    }

    .bar-label {
        font-size: 14px;
        color: #374151;
        margin-top: 4px;
    }

    .bar-value {
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        position: absolute;
        top: -24px;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 3px 6px;
        border-radius: 4px;
        visibility: hidden;
    }

    .bar-container:hover .bar-value {
        visibility: visible;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let bulan = @json($bulan);
        let totalPenjualan = @json($totalPenjualan);

        console.log("Bulan:", bulan); // Cek apakah data bulan dikirim
        console.log("Total Penjualan:", totalPenjualan); // Cek apakah data penjualan dikirim

        let chartContainer = document.getElementById("barChart");
        let labelsContainer = document.getElementById("chartLabels");

        if (!bulan.length || !totalPenjualan.length) {
            console.warn("Data transaksi kosong! Cek database.");
            return;
        }

        let maxValue = Math.max(...totalPenjualan) || 1;

        bulan.forEach((bulan, index) => {
            let barContainer = document.createElement("div");
            barContainer.classList.add("bar-container");

            let bar = document.createElement("div");
            bar.classList.add("bar");
            let heightPercentage = (totalPenjualan[index] / maxValue) * 100;
            bar.style.height = heightPercentage + "%";

            let barValue = document.createElement("div");
            barValue.classList.add("bar-value");
            barValue.innerText = totalPenjualan[index];

            barContainer.appendChild(barValue);
            barContainer.appendChild(bar);
            chartContainer.appendChild(barContainer);

            let label = document.createElement("div");
            label.classList.add("bar-label");
            label.innerText = bulan;
            labelsContainer.appendChild(label);
        });
    });
</script>

@endpush

