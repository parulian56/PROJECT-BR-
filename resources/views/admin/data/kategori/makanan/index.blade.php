@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Daftar Data Penyimpanan</h2>
        <a href="{{ route('admin.data.kategori.makanan.create') }}" class="btn btn-primary px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Data</a>
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
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Deskripsi</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga Pokok</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga Jual</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Lokasi Penyimpanan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($makanan as $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4 text-sm">{{ $item->id }}</td>
                        <td class="py-3 px-4 text-sm">{{ $item->nama_barang }}</td>
                        <td class="py-3 px-4 text-sm">{{ $item->deskripsi }}</td>
                        <td class="py-3 px-4 text-sm">{{ $item->jumlah }}</td>
                        <td class="py-3 px-4 text-sm">Rp{{ number_format($item->harga_pokok, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-sm">Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-sm">{{ $item->lokasi_penyimpanan }}</td>
                        <td class="py-3 px-4 text-sm">
                            <a href="{{ route('admin.data.kategori.makanan.edit', $item->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('admin.data.kategori.makanan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
