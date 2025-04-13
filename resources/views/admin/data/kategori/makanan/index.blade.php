@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Daftar Data Penyimpanan</h2>
        <a href="{{ route('data.create') }}" class="btn btn-primary px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Data</a>
        <a href="{{ route('') }}" class="btn btn-primary px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Data</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-4 bg-green-200 text-green-800 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Id</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Nama Barang</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Kategori</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Deskripsi</th> <!-- Tambahan Deskripsi -->
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga Pokok</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga jual</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Lokasi Penyimpanan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
        
        </table>
    </div>
</div>
@endsection
