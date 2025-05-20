@extends('layouts.admin')

@section('content')
<div class="bg-stone-100 min-h-screen py-8 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header with subtle animation -->
        <div class="mb-8 relative">
            <h2 class="text-3xl md:text-4xl font-bold text-amber-700 inline-flex items-center group">
                <span class="mr-3 transform transition-transform duration-300 group-hover:rotate-12">📋</span>
                <span class="relative">
                    Daftar Barang
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-500 transition-all duration-300 group-hover:w-full"></span>
                </span>
            </h2>
            <p class="text-stone-600 mt-2">Kelola inventaris barang dengan mudah dan efisien</p>
        </div>

        <!-- Navigation and search bar -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <a
                href="{{ route('admin.data.index') }}"
                class="bg-stone-700 hover:bg-stone-800 text-white font-medium rounded-lg py-3 px-6 flex items-center justify-center gap-2 shadow-md transition-all duration-300 hover:shadow-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>


            <a
                href="{{ route('admin.data.kategori.alattulis.create') }}"
                class="bg-stone-800 hover:bg-stone-900 text-white font-medium rounded-lg py-3 px-6 flex items-center justify-center gap-2 shadow-md transition-all duration-300 hover:shadow-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data
            </a>
        </div>

        <!-- Table with enhanced design -->
        <div class="overflow-hidden bg-white rounded-xl shadow-lg border border-stone-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">No</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">Nama Barang</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">Jumlah</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">Harga Pokok</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">Harga Jual</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-left text-sm tracking-wider">Lokasi</th>
                            <th class="px-4 py-3 bg-amber-600 text-white font-semibold text-center text-sm tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-200">
                        @forelse ($alattulis as $item)
                            <tr class="hover:bg-amber-50 transition-colors duration-150">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-stone-600">
                                    {{ $loop->iteration + ($alattulis->perPage() * ($alattulis->currentPage() - 1)) }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-stone-800">
                                    {{ $item->nama_barang }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-stone-600">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $item->jumlah }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-stone-600">
                                    Rp {{ number_format($item->harga_pokok, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-stone-600">
                                    Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-stone-600">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-md bg-stone-100 text-stone-800">
                                        {{ $item->lokasi_penyimpanan }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('admin.data.kategori.alattulis.edit', $item->id) }}"
                                           class="bg-stone-300 hover:bg-stone-400 text-stone-800 p-2 rounded-md transition-colors duration-200"
                                           title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.data.kategori.alattulis.destroy', $item->id) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-stone-600 hover:bg-stone-700 text-white p-2 rounded-md transition-colors duration-200"
                                                    title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-stone-500">
                                    <div class="flex flex-col items-center justify-center space-y-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <span class="font-medium">Tidak ada data barang</span>
                                        <p class="text-stone-400 text-sm">Tambahkan data untuk menampilkan inventaris makanan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination with custom design -->
        <div class="mt-6">
            <div class="bg-white p-3 rounded-lg shadow-sm">
                {{ $alattulis->links() }}
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-amber-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-amber-100 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-stone-500 font-medium">Kelola Inventaris</p>
                        <p class="text-lg font-semibold text-stone-800">Efisien & Mudah</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-stone-500 font-medium">Status Stok</p>
                        <p class="text-lg font-semibold text-stone-800">Selalu Terpantau</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-stone-500 font-medium">Analisis Harga</p>
                        <p class="text-lg font-semibold text-stone-800">Maksimalkan Profit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
