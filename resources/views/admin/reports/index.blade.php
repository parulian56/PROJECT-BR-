@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-center" style="color: #63452c;">Ringkasan Report Kasir</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

        <!-- Hari Ini -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2 text-amber-800">Hari Ini</h3>
            <p>Total Pendapatan: <strong class="text-green-600">Rp {{ number_format($totalHariIni, 0, ',', '.') }}</strong></p>
            <p>Jumlah Transaksi: <strong class="text-blue-600">{{ $jumlahTransaksiHariIni }}</strong></p>
            <p>Barang Terjual: <strong class="text-indigo-600">{{ $totalQtyHariIni }}</strong></p>
        </div>

        <!-- Minggu Ini -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2 text-amber-800">Minggu Ini</h3>
            <p>Total Pendapatan: <strong class="text-green-600">Rp {{ number_format($totalMingguIni, 0, ',', '.') }}</strong></p>
        </div>

        <!-- Bulan Ini -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2 text-amber-800">Bulan Ini</h3>
            <p>Total Pendapatan: <strong class="text-green-600">Rp {{ number_format($totalBulanIni, 0, ',', '.') }}</strong></p>
        </div>

    </div>
</div>
@endsection
