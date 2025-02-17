@extends('layout.app')

@section('content')
<head> <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"></head>
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-2">Edit Data</h2>
    
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

    <div class="bg-white shadow-lg rounded-lg p-4 max-w-lg mx-auto">
        <form action="{{ route('data.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-2">
                <label for="nama_barang" class="block text-gray-600 font-semibold">Nama barang</label>
                <input type="text" name="nama_barang" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('nama_barang', $data->nama_barang) }}">
            </div>

            <div class="mb-2">
                <label for="jumlah" class="block text-gray-600 font-semibold">Jumlah</label>
                <input type="number" name="jumlah" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('jumlah', $data->jumlah) }}">
            </div>

            <div class="mb-2">
                <label for="harga_satuan" class="block text-gray-600 font-semibold">Harga Satuan</label>
                <input type="number" name="harga_satuan" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('harga_satuan', $data->harga_satuan) }}">
            </div>

            <div class="mb-2">
                <label for="lokasi_penyimpanan" class="block text-gray-600 font-semibold">lokasi penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('lokasi_penyimpanan', $data->lokasi_penyimpanan) }}">
            </div>

            

            <div class="flex justify-end mt-2">
                <button type="submit" class="bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection  
