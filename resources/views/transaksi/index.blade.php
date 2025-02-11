@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Daftar Transaksi</h2>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Transaksi</a>
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
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Nama Produk</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga Satuan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Total Harga</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Bayar</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Kembalian</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaksis as $transaksi)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm text-gray-800">{{ $transaksi->nama_produk }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800">{{ $transaksi->jumlah }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800">Rp {{ number_format($transaksi->harga_satuan, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800">Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                    
                    <td class="py-3 px-4">
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="text-yellow-600 hover:text-yellow-700 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
