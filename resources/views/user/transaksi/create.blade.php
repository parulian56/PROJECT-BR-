@extends('layouts.user')

@section('content')
<div class="container mx-auto p-6 flex justify-center">
    <div class="w-3/4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Tambah Transaksi</h2>

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

        <div class="bg-white shadow-lg rounded-lg p-4">
            <!-- If the transaction exists, we will display the form for editing -->
            <form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->id) : route('transaksi.store') }}" method="POST">
                @csrf
                @if (isset($transaksi))
                    @method('PUT') <!-- This will indicate that it's an update operation -->
                @endif

                <div class="mb-2">
                    <label for="plu" class="block text-sm font-medium">PLU</label>
                    <input type="text" name="plu" class="w-full border rounded p-2" value="{{ old('plu', $transaksi->plu ?? '') }}">
                </div>

                <div class="mb-2">
                    <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                    <input type="text" name="deskripsi" class="w-full border rounded p-2" value="{{ old('deskripsi', $transaksi->deskripsi ?? '') }}">
                </div>

                <div class="mb-2">
                    <label for="qty" class="block text-sm font-medium">Qty</label>
                    <input type="number" name="qty" class="w-full border rounded p-2" value="{{ old('qty', $transaksi->qty ?? '') }}">
                </div>

                <div class="mb-2">
                    <label for="harga" class="block text-sm font-medium">Harga</label>
                    <input type="number" name="harga" class="w-full border rounded p-2" value="{{ old('harga', $transaksi->harga ?? '') }}">
                </div>

                <div class="mb-2">
                    <label for="diskon" class="block text-sm font-medium">Diskon</label>
                    <input type="number" name="diskon" class="w-full border rounded p-2" value="{{ old('diskon', $transaksi->diskon ?? '') }}">
                </div>

                <div class="mb-2">
                    <label for="fee" class="block text-sm font-medium">Fee</label>
                    <input type="number" name="fee" class="w-full border rounded p-2" value="{{ old('fee', $transaksi->fee ?? '') }}">
                </div>

                <div class="flex justify-end mt-2">
                    <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded mt-2">{{ isset($transaksi) ? 'Update' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
