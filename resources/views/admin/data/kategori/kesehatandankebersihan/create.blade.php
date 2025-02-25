@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Tambah Data Penyimpanan</h2>
        <a href="{{ route('admin.data.kategori.kesehatandankebersihan.index') }}" class="btn btn-primary px-6 py-2 bg-gray-600 text-white rounded-lg shadow-md hover:bg-gray-700 transition">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mb-6 bg-red-200 text-red-800 p-4 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kesehatandankebersihan.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Input Transaction ID -->
        <div class="mb-4">
            <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID</label>
            <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Input Nama Barang -->
        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Input Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
        </div>

        <!-- Input Jumlah -->
        <div class="mb-4">
            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

                <!-- Input Harga pokok -->
        <div class="mb-4">
            <label for="harga_pokok" class="block text-sm font-medium text-gray-700">Harga Pokok</label>
            <input type="number" step="0.01" name="harga_pokok" id="harga_pokok" value="{{ old('harga_pokok') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Input Harga Satuan -->
        <div class="mb-4">
            <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
            <input type="number" step="0.01" name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Input Lokasi Penyimpanan -->
        <div class="mb-4">
            <label for="lokasi_penyimpanan" class="block text-sm font-medium text-gray-700">Lokasi Penyimpanan</label>
            <input type="text" name="lokasi_penyimpanan" id="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
