@extends('layouts.admin')

@section('title', 'Grafik Penjualan') 
@section('header', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/dashboard.css') }}">

<p class="mb-6 text-gray-700 text-lg">
    Ini adalah halaman utama dashboard tempat Anda dapat memantau statistik dan informasi penting.
</p>

@if(session('error'))
    <div class="alert alert-warning bg-yellow-300 text-yellow-900 p-4 rounded-lg mb-4">
        {{ session('error') }}
    </div>
@endif

<!-- Chart Section -->
<div class="bg-[#F5EFE6] p-10 rounded-lg shadow-lg mb-6 border border-gray-300">
    <h3 class="text-3xl font-semibold text-gray-900 mb-6">Sales Overview</h3>

    <!-- Container untuk grafik batang -->
    <div class="relative w-full h-72 border-b border-gray-400 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4 bg-[#F3E8D6]" id="barChart"></div>

    <!-- Label bulan -->
    <div class="flex flex-wrap justify-between mt-2 px-2 text-gray-800 text-sm" id="chartLabels"></div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let bulan = @json($bulan);
        let totalPenjualan = @json($totalPenjualan);

        console.log("Bulan:", bulan);
        console.log("Total Penjualan:", totalPenjualan);

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
            bar.style.backgroundColor = "#E8D9C4";

            let barValue = document.createElement("div");
            barValue.classList.add("bar-value");
            barValue.innerText = totalPenjualan[index];
            barValue.style.color = "#5A4A3E";

            barContainer.appendChild(barValue);
            barContainer.appendChild(bar);
            chartContainer.appendChild(barContainer);

            let label = document.createElement("div");
            label.classList.add("bar-label");
            label.innerText = bulan;
            label.style.color = "#7A6652";
            labelsContainer.appendChild(label);
        });
    });
</script>
@endpush
