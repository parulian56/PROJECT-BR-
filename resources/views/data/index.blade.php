@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Daftar Data Penyimpanan</h2>
        <a href="{{ route('data.create') }}" class="btn btn-primary px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Data</a>
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
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Deskripsi</th> <!-- Tambahan Deskripsi -->
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Harga Satuan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Total Nilai</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Lokasi Penyimpanan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $data->id }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $data->nama_barang }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $data->deskripsi ?? '-' }}</td> <!-- Menampilkan Deskripsi -->
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $data->jumlah }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ number_format($data->harga_satuan, 2) }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ number_format($data->total_nilai, 2) }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $data->lokasi_penyimpanan }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700 flex items-center">
                            <a href="{{ route('data.edit', $data->id) }}" class="text-yellow-600 hover:text-yellow-700 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('data.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
