@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">Daftar Data Penyimpanan</h2>

    @if (session('success'))
        <div class="alert alert-success mt-4 bg-green-200 text-green-800 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @php
        $kategori_list = ['Makanan', 'Minuman', 'Kebutuhan Dapur', 'Produk Bayi', 'Produk Rumah Tangga', 'Kesehatan dan Kebersihan', 'Kosmetik', 'Lainnya'];
    @endphp

    <div class="mb-6 flex flex-wrap justify-center gap-4">
        @foreach ($kategori_list as $kategori)
            <a href="#{{ strtolower(str_replace(' ', '-', $kategori)) }}" class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-xl shadow-lg hover:bg-blue-600 transition">{{ $kategori }}</a>
        @endforeach
    </div>

    @foreach ($kategori_list as $kategori)
        @php
            $filtered_data = $datas->where('kategori', $kategori);
        @endphp

        @if ($filtered_data->count() > 0)
            <div id="{{ strtolower(str_replace(' ', '-', $kategori)) }}" class="mb-8 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-3xl font-semibold text-gray-700 mb-4 border-b pb-2">Kategori: {{ $kategori }}</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-100 text-lg">
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Id</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Nama Barang</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Deskripsi</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Jumlah</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Harga Pokok</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Harga Jual</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Lokasi Penyimpanan</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filtered_data as $data)
                                <tr class="border-b border-gray-200 hover:bg-gray-50 text-lg">
                                    <td class="py-3 px-4 text-gray-700">{{ $data->id }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $data->nama_barang }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $data->deskripsi ?? '-' }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $data->jumlah }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ number_format($data->harga_pokok, 2) }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ number_format($data->harga_jual, 2) }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $data->lokasi_penyimpanan }}</td>
                                    <td class="py-3 px-4 text-gray-700 flex items-center">
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
        @endif
    @endforeach
</div>
@endsection
