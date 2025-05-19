@extends('layouts.admin')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 flex items-center">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-orange-600">Edit Data Penyimpanan</span>
                </h1>
                <p class="text-gray-600 text-sm md:text-base">Perbarui informasi item dalam inventaris</p>
            </div>

            <a href="{{ route('admin.data.kategori.makanan.index') }}"
               class="group flex items-center mt-4 md:mt-0 text-orange-600 hover:text-orange-800 font-medium transition-all duration-300 ease-in-out">
                <span class="flex items-center justify-center w-8 h-8 mr-2 bg-orange-100 rounded-full group-hover:bg-orange-200 transition-all duration-300">
                    <i class="fas fa-arrow-left text-sm"></i>
                </span>
                <span>Kembali ke Daftar</span>
            </a>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="animate-bounce-in mb-8 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-md">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-red-800 font-medium">Ada beberapa kesalahan pada input Anda:</h3>
                            <ul class="mt-2 pl-4 text-sm text-red-700 list-disc">
                                @foreach ($errors->all() as $error)
                                    <li class="mt-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-white text-xl font-semibold">Detail Informasi Produk</h2>
                <p class="text-orange-100 text-sm">Semua bidang yang ditandai dengan (*) wajib diisi</p>
            </div>

            <!-- Form Section -->
            <form action="{{ route('admin.data.kategori.makanan.update', $makanan->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Barang -->
                    <div class="col-span-1">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Barang <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-box text-gray-400"></i>
                            </div>
                            <input type="text" name="nama_barang" id="nama_barang"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="Masukkan nama barang" value="{{ old('nama_barang', $makanan->nama_barang) }}" required>
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="col-span-1">
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-gray-400"></i>
                            </div>
                            <input type="text" name="kategori" id="kategori"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="Masukkan kategori" value="{{ old('kategori', $makanan->kategori) }}" required>
                        </div>
                    </div>


                    <!-- Jumlah -->
                    <div class="col-span-1">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">
                            Jumlah Stok <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-cubes text-gray-400"></i>
                            </div>
                            <input type="number" name="jumlah" id="jumlah" min="0"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="Masukkan jumlah barang" value="{{ old('jumlah', $makanan->jumlah) }}" required>
                        </div>
                    </div>

                    <!-- Lokasi Penyimpanan -->
                    <div class="col-span-1">
                        <label for="lokasi_penyimpanan" class="block text-sm font-medium text-gray-700 mb-1">
                            Lokasi Penyimpanan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-warehouse text-gray-400"></i>
                            </div>
                            <input type="text" name="lokasi_penyimpanan" id="lokasi_penyimpanan"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="Masukkan lokasi penyimpanan" value="{{ old('lokasi_penyimpanan', $makanan->lokasi_penyimpanan) }}" required>
                        </div>
                    </div>

                    <!-- Informasi Harga Section -->
                    <div class="col-span-full mt-4">
                        <div class="border-b border-gray-200 pb-1 mb-4">
                            <h3 class="text-lg font-medium text-gray-800">Informasi Harga</h3>
                        </div>
                    </div>

                    <!-- Harga Pokok -->
                    <div class="col-span-1">
                        <label for="harga_pokok" class="block text-sm font-medium text-gray-700 mb-1">
                            Harga Pokok <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tags text-gray-400"></i>
                            </div>
                            <div class="absolute inset-y-0 left-0 pl-10 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" step="0.01" name="harga_pokok" id="harga_pokok" min="0"
                                class="block w-full pl-16 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="0.00" value="{{ old('harga_pokok', $makanan->harga_pokok) }}" required>
                        </div>
                    </div>

                    <!-- Harga Jual -->
                    <div class="col-span-1">
                        <label for="harga_jual" class="block text-sm font-medium text-gray-700 mb-1">
                            Harga Jual <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-hand-holding-usd text-gray-400"></i>
                            </div>
                            <div class="absolute inset-y-0 left-0 pl-10 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" step="0.01" name="harga_jual" id="harga_jual" min="0"
                                class="block w-full pl-16 pr-3 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent shadow-sm transition duration-150 ease-in-out"
                                placeholder="0.00" value="{{ old('harga_satuan', $makanan->harga_jual) }}" required>
                        </div>
                        <div class="mt-1">
                            <span id="profit_margin" class="text-sm text-gray-500">
                                Margin: <span class="font-medium text-green-600">0%</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Buttons Section -->
                <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                    <a href="{{ route('admin.data.kategori.makanan.index') }}"
                        class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Updated Timestamp -->
        <div class="mt-4 text-right text-sm text-gray-500">
            <p>Terakhir diperbarui: {{ $makanan->updated_at->format('d M Y, H:i') }}</p>
        </div>
    </div>
</div>

<script>
    // Calculate profit margin
    document.addEventListener('DOMContentLoaded', function() {
        const hargaPokokInput = document.getElementById('harga_pokok');
        const hargaJualInput = document.getElementById('harga_jual');
        const profitMarginElement = document.getElementById('profit_margin');

        const calculateMargin = function() {
            const hargaPokok = parseFloat(hargaPokokInput.value) || 0;
            const hargaJual = parseFloat(hargaJualInput.value) || 0;

            if (hargaPokok > 0 && hargaJual > 0) {
                const margin = ((hargaJual - hargaPokok) / hargaPokok) * 100;
                profitMarginElement.innerHTML = `Margin: <span class="${margin >= 0 ? 'font-medium text-green-600' : 'font-medium text-red-600'}">${margin.toFixed(2)}%</span>`;
            } else {
                profitMarginElement.innerHTML = `Margin: <span class="font-medium text-gray-600">0%</span>`;
            }
        };

        hargaPokokInput.addEventListener('input', calculateMargin);
        hargaJualInput.addEventListener('input', calculateMargin);

        // Calculate initial margin
        calculateMargin();
    });
</script>
@endsection
