@extends('layout.app')

@section('content')
<head> <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"></head>
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-2">Tambah Transaksi</h2>
    
    <a href="{{ route('transaksi.index') }}" class="inline-block text-blue-600 hover:text-blue-800 mb-2">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Transaksi
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
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label for="nama_produk" class="block text-gray-600 font-semibold">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('nama_produk') }}">
            </div>

            <div class="mb-2">
                <label for="jumlah" class="block text-gray-600 font-semibold">Jumlah</label>
                <input type="number" name="jumlah" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('jumlah') }}">
            </div>

            <div class="mb-2">
                <label for="harga_satuan" class="block text-gray-600 font-semibold">Harga Satuan</label>
                <input type="number" name="harga_satuan" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('harga_satuan') }}">
            </div>

            <div class="mb-2">
                <label for="bayar" class="block text-gray-600 font-semibold">Bayar</label>
                <input type="number" name="bayar" class="form-input mt-2 block w-full border border-gray-300 rounded-lg p-3" value="{{ old('bayar') }}">
            </div>

            

            <div class="flex justify-end mt-2">
                <button type="submit" class="bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
