@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Kategori Produk</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-white-200 p-4 rounded-lg">
    <a href="{{ url('admin/kategori/makanan/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">makanan</a>
    <a href="{{ url('admin/kategori/minuman/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">minuman</a>
    <a href="{{ url('admin/kategori/alat_tulis/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">alat tulis</a>
    <a href="{{ url('admin/kategori/seragam/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">seragam</a>
    <a href="{{ url('admin/kategori/kesehatandankebersihan/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">kesehatan dan kebersihan</a>
    <a href="{{ url('admin/kategori/lainya/index') }}"class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg shadow-md text-center transition duration-300">lainnya</a>

    </div>
</div>
@endsection
