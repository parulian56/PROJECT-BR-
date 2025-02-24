@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Kategori Produk</h2>
    
    <div class="grid grid-cols-4 gap-4">
    <a href="{{ url('admin/kategori/makanan/index') }}">makanan</a>
    <a href="{{ url('admin/kategori/minuman/index') }}">minuman</a>
    <a href="{{ url('admin/kategori/alat_tulis/index') }}">alat tulis</a>
    <a href="{{ url('admin/kategori/seragam/index') }}">seragam</a>
    <a href="{{ url('admin/kategori/kesehatandankebersihan/index') }}">kesehatan dan kebersihan</a>
    <a href="{{ url('admin/kategori/lainya/index') }}">lainnya</a>
    </div>
</div>
@endsection
