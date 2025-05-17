@extends('layouts.admin')

@section('content')
<div class="bg-stone-100 min-h-screen py-8 px-4 sm:px-6">
    <div class="max-w-3xl mx-auto">
        <!-- Form Card with subtle animation -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-stone-200 transform transition duration-500 hover:shadow-xl">
            <!-- Header -->
            <div class="bg-gradient-to-r from-amber-600 to-amber-700 px-6 py-5 relative overflow-hidden">
                <div class="absolute right-0 top-0 -mt-6 -mr-8 w-32 h-32 rounded-full bg-amber-500 opacity-20"></div>
                <div class="absolute right-10 top-10 w-16 h-16 rounded-full bg-white opacity-10"></div>

                <h2 class="text-2xl font-bold text-white relative z-10 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tambah Data Makanan
                </h2>
                <p class="text-amber-100 mt-1 relative z-10">Lengkapi form berikut untuk menambahkan data makanan baru</p>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.data.kategori.makanan.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-6">
                    <!-- Nama Barang Field -->
                    <div class="grid grid-cols-1 gap-4">
                        <div class="form-group">
                            <label for="nama_barang" class="block text-sm font-medium text-stone-700 mb-1">
                                Nama Barang
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="nama_barang"
                                    name="nama_barang"
                                    class="focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg"
                                    placeholder="Masukkan nama makanan"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Two Columns: Kategori and Jumlah -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kategori Field (Read Only) -->
                        <div class="form-group">
                            <label for="kategori" class="block text-sm font-medium text-stone-700 mb-1">
                                Kategori
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="kategori"
                                    name="kategori"
                                    value="makanan"
                                    readonly
                                    class="bg-stone-50 text-stone-500 focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg cursor-not-allowed"
                                >
                            </div>
                        </div>

                        <!-- Jumlah Field -->
                        <div class="form-group">
                            <label for="jumlah" class="block text-sm font-medium text-stone-700 mb-1">
                                Jumlah
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <input
                                    type="number"
                                    id="jumlah"
                                    name="jumlah"
                                    min="1"
                                    class="focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg"
                                    placeholder="Masukkan jumlah"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Two Columns: Harga Pokok and Harga Jual -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Harga Pokok Field -->
                        <div class="form-group">
                            <label for="harga_pokok" class="block text-sm font-medium text-stone-700 mb-1">
                                Harga Pokok
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-stone-500 sm:text-sm">Rp</span>
                                </div>
                                <input
                                    type="number"
                                    id="harga_pokok"
                                    name="harga_pokok"
                                    min="0"
                                    step="0.01"
                                    class="focus:ring-amber-500 focus:border-amber-500 block w-full pl-12 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg"
                                    placeholder="0"
                                    required
                                >
                            </div>
                            <p class="mt-1 text-xs text-stone-500">Harga pembelian per unit</p>
                        </div>

                        <!-- Harga Jual Field -->
                        <div class="form-group">
                            <label for="harga_jual" class="block text-sm font-medium text-stone-700 mb-1">
                                Harga Jual
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-stone-500 sm:text-sm">Rp</span>
                                </div>
                                <input
                                    type="number"
                                    id="harga_jual"
                                    name="harga_jual"
                                    min="0"
                                    step="0.01"
                                    class="focus:ring-amber-500 focus:border-amber-500 block w-full pl-12 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg"
                                    placeholder="0"
                                    required
                                >
                            </div>
                            <p class="mt-1 text-xs text-stone-500">Harga penjualan per unit</p>
                        </div>
                    </div>

                    <!-- Lokasi Penyimpanan Field -->
                    <div class="grid grid-cols-1 gap-4">
                        <div class="form-group">
                            <label for="lokasi_penyimpanan" class="block text-sm font-medium text-stone-700 mb-1">
                                Lokasi Penyimpanan
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="lokasi_penyimpanan"
                                    name="lokasi_penyimpanan"
                                    class="focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-3 sm:text-sm border-stone-300 rounded-lg"
                                    placeholder="Masukkan lokasi penyimpanan"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="pt-4 flex flex-col sm:flex-row-reverse gap-3">
                        <button
                            type="submit"
                            class="w-full sm:w-auto flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Data
                        </button>
                        <a
                            href="{{ route('admin.data.kategori.makanan.index') }}"
                            class="w-full sm:w-auto flex justify-center items-center px-6 py-3 border border-stone-300 text-base font-medium rounded-lg shadow-sm text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors duration-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tips Card -->
        <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden border border-stone-200">
            <div class="p-5 bg-amber-50 border-b border-amber-100">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-medium text-amber-800">Tips Manajemen Stok</h3>
                </div>
            </div>
            <div class="p-5">
                <ul class="space-y-3 text-sm text-stone-600">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Selalu periksa kembali harga pokok dan harga jual untuk memastikan margin keuntungan.</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Lokasi penyimpanan harus spesifik untuk memudahkan pencarian stok.</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Input jumlah dengan tepat untuk menjaga akurasi inventaris.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
