@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Data Barang</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        use Carbon\Carbon;
        use App\Models\Data;

        $today = Carbon::now()->format('dmY');
        $prefix = 'am-' . $today . '-';
        $countToday = Data::whereRaw('DATE(created_at) = ?', [now()->toDateString()])->count() + 1;
        $order = str_pad($countToday, 2, '0', STR_PAD_LEFT);
        $generatedCodetrx = $prefix . $order . 'id';
    @endphp

    <form action="{{ route('admin.data.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Hanya preview, tidak dikirim ke server --}}
        <div>
            <label class="block font-semibold">Kode Transaksi (otomatis)</label>
            <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-700" value="{{ $generatedCodetrx }}" readonly>
        </div>

        <div>
            <label class="block font-semibold">Nama Barang</label>
            <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" value="{{ old('nama_barang') }}" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-stone-600 mb-1">Kategori</label>
            <select name="kategori" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" required>
                <option value="">Pilih Kategori</option>
                <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="Alat Tulis" {{ old('kategori') == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                <option value="Seragam" {{ old('kategori') == 'Seragam' ? 'selected' : '' }}>Seragam</option>
                <option value="Kesehatan & Kebersihan" {{ old('kategori') == 'Kesehatan & Kebersihan' ? 'selected' : '' }}>Kesehatan & Kebersihan</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Stok</label>
            <input type="number" name="stok" class="w-full border rounded px-3 py-2" value="{{ old('stok') }}" min="1" required>
        </div>

        <div>
            <label class="block font-semibold">Harga Pokok</label>
            <input type="number" name="harga_pokok" class="w-full border rounded px-3 py-2" value="{{ old('harga_pokok') }}" min="0" required>
        </div>

        <div>
            <label class="block font-semibold">Harga Jual</label>
            <input type="number" name="harga_jual" class="w-full border rounded px-3 py-2" value="{{ old('harga_jual') }}" min="0" required>
        </div>

        <div>
            <label class="block font-semibold">Lokasi Penyimpanan</label>
            <input type="text" name="lokasi_penyimpanan" class="w-full border rounded px-3 py-2" value="{{ old('lokasi_penyimpanan') }}" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.data.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
