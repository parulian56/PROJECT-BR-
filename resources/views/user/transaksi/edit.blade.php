@extends('layouts.user')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Transaksi</h2>
    <a href="{{ route('transaksi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mb-3 inline-block">Kembali</a>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">PLU</label>
            <input type="text" name="plu" class="w-full px-4 py-2 border rounded" value="{{ old('plu', $transaksi->plu) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <input type="text" name="deskripsi" class="w-full px-4 py-2 border rounded" value="{{ old('deskripsi', $transaksi->deskripsi) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Qty</label>
            <input type="number" name="qty" class="w-full px-4 py-2 border rounded" value="{{ old('qty', $transaksi->qty) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Harga</label>
            <input type="number" name="harga" class="w-full px-4 py-2 border rounded" value="{{ old('harga', $transaksi->harga) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Diskon</label>
            <input type="number" name="diskon" class="w-full px-4 py-2 border rounded" value="{{ old('diskon', $transaksi->diskon) }}" required>
        </div>

        <div class="flex justify-end mt-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
