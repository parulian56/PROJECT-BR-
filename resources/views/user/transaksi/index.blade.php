@extends('layouts.user')

@section('content')
<div class="container mx-auto p-6 flex justify-center">
    <div class="w-3/4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Transaksi</h2>
        
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-3 text-center">{{ session('success') }}</div>
        @endif
        
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">PLU</th>
                        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2">Qty</th>
                        <th class="border border-gray-300 px-4 py-2">Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Diskon</th>
                        <th class="border border-gray-300 px-4 py-2">Fee</th>
                        <th class="border border-gray-300 px-4 py-2">Total</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->plu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->deskripsi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->qty }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->diskon, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->fee, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center gap-2">
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="w-1/4 p-4 bg-gray-100 rounded-lg ml-6">
        <h3 class="text-xl font-semibold mb-4">Tambah Transaksi</h3>
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label class="block text-sm font-medium">PLU</label>
                <input type="text" name="plu" class="w-full border rounded p-2">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium">Deskripsi</label>
                <input type="text" name="deskripsi" class="w-full border rounded p-2">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium">Qty</label>
                <input type="number" name="qty" class="w-full border rounded p-2">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium">Harga</label>
                <input type="number" name="harga" class="w-full border rounded p-2">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium">Diskon</label>
                <input type="number" name="diskon" class="w-full border rounded p-2">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium">Fee</label>
                <input type="number" name="fee" class="w-full border rounded p-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded mt-2">Tambah</button>
        </form>
        <form action="{{ route('transaksi.hapusSemua') }}" method="POST" class="mt-4">
            @csrf
            @method('POST')
            <button type="submit" class="bg-red-500 text-white w-full py-2 rounded" onclick="return confirm('Yakin ingin menghapus semua transaksi?')">Hapus Semua</button>
        </form>
    </div>
</div>
@endsection
