@extends('layout.app')

@section('content')
<head> <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"></head>
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Tambah Transaksi</h2>
    
    <a href="{{ route('transaksi.index') }}" class="inline-block text-blue-600 hover:text-blue-800 mb-4">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Transaksi
    </a>

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_produk" class="block text-gray-600 font-semibold">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-600 font-semibold">Jumlah</label>
                <input type="number" name="jumlah" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-gray-600 font-semibold">Harga</label>
                <input type="number" name="harga" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <div class="mb-4">
                <label for="bayar" class="block text-gray-600 font-semibold">Bayar</label>
                <input type="number" name="bayar" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
