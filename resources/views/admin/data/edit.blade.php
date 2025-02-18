@extends('layouts.admin')

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-2">Edit Data Penyimpanan</h2>
    
    <a href="{{ route('data.index') }}" class="inline-block text-blue-600 hover:text-blue-800 mb-2">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Data
    </a>

    <!-- Tampilkan Error Validasi -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <form action="{{ route('data.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label for="nama_barang" class="block text-gray-600 font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" value="{{ old('nama_barang', $data->nama_barang) }}">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-600 font-semibold">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" value="{{ old('deskripsi', $data->deskripsi) }}">
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-600 font-semibold">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan jumlah barang" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" value="{{ old('jumlah', $data->jumlah) }}">
            </div>

            <div class="mb-4">
                <label for="harga_satuan" class="block text-gray-600 font-semibold">Harga Satuan</label>
                <input type="number" step="0.01" name="harga_satuan" id="harga_satuan" placeholder="Masukkan harga satuan" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" value="{{ old('harga_satuan', $data->harga_satuan) }}">
            </div>

            <div class="mb-4">
                <label for="lokasi_penyimpanan" class="block text-gray-600 font-semibold">Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" id="lokasi_penyimpanan" placeholder="Masukkan lokasi penyimpanan" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" value="{{ old('lokasi_penyimpanan', $data->lokasi_penyimpanan) }}">
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-200">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
