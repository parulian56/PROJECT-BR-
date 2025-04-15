@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center border-b-2 pb-2">Daftar Kategori Produk</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
        <a href="{{ url('admin/data/kategori/makanan/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300">
            Makanan
        </a>

        <a href="{{ url('admin/data/kategori/minuman/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300">
            Minuman
        </a>

        <a href="{{ url('admin/data/kategori/alat_tulis/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300">
            Alat Tulis
        </a>

        <a href="{{ url('admin/data/kategori/seragam/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300">
            Seragam
        </a>

        <a href="{{ url('admin/data/kategori/kesehatandankebersihan/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300 text-center px-4">
            Kesehatan & Kebersihan
        </a>

        <a href="{{ url('admin/data/kategori/lainya/index') }}"
            class="flex items-center justify-center h-24 bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:shadow-lg transition duration-300">
            Lainnya
        </a>
    </div>
</div>
@endsection
