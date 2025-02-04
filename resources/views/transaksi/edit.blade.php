@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Edit Transaksi</h2>
        <a href="{{ route('transaksi.index') }}" class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow-md hover:bg-gray-700 transition">Kembali ke Daftar Transaksi</a>
    </div>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600" for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control w-full px-4 py-2 border rounded-lg" value="{{ old('nama_produk', $transaksi->nama_produk) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600" for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control w-full px-4 py-2 border rounded-lg" value="{{ old('jumlah', $transaksi->jumlah) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600" for="harga">Harga</label>
            <input type="number" name="harga" class="form-control w-full px-4 py-2 border rounded-lg" value="{{ old('harga', $transaksi->harga) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600" for="bayar">Bayar</label>
            <input type="number" name="bayar" class="form-control w-full px-4 py-2 border rounded-lg" value="{{ old('bayar', $transaksi->bayar) }}" required>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
            Perbarui Transaksi
        </button>
    </form>
</div>
@endsection
