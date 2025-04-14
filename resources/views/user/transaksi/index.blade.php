@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/fontawesome') }}">

<div class="container mx-auto p-4 flex flex-col lg:flex-row gap-6">
    <!-- TABEL TRANSAKSI -->
    <div class="w-full lg:w-3/4">
        <h2 class="text-xl md:text-2xl font-semibold mb-4 text-center">Daftar Transaksi</h2>
        
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-3 text-center">{{ session('success') }}</div>
        @endif
        
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full border border-gray-300 text-sm md:text-base bg-white text-center">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-3 py-2">PLU</th>
                        <th class="border px-3 py-2">Nama Barang</th>
                        <th class="border px-3 py-2">Jumlah</th>
                        <th class="border px-3 py-2">Harga</th>
                        <th class="border px-3 py-2">Diskon</th>
                        <th class="border px-3 py-2">Total</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach ($transaksis as $transaksi)
                        @php $grandTotal += $transaksi->total; @endphp
                        <tr class="hover:bg-gray-100">
                            <td class="border px-3 py-2">{{ $transaksi->plu }}</td>
                            <td class="border px-3 py-2">{{ $transaksi->deskripsi }}</td>
                            <td class="border px-3 py-2">{{ $transaksi->qty }}</td>
                            <td class="border px-3 py-2">Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                            <td class="border px-3 py-2">Rp {{ number_format($transaksi->diskon, 0, ',', '.') }}</td>
                            <td class="border px-3 py-2">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            <td class="border px-3 py-2 flex flex-col md:flex-row justify-center gap-2">
                                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FORM TAMBAH & PEMBAYARAN -->
    <div class="w-full lg:w-1/4 flex flex-col gap-6">
        <!-- Form Input -->
        <div class="p-4 bg-gray-100 rounded-lg shadow-md">
            <h3 class="text-lg md:text-xl font-semibold mb-4 text-center">Tambah Transaksi</h3>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                @foreach (['plu' => 'PLU', 'deskripsi' => 'Nama barang', 'qty' => 'Jumlah Barang', 'harga' => 'Harga', 'diskon' => 'Diskon'] as $name => $label)
                <div class="mb-2">
                    <label class="block text-sm font-medium">{{ $label }}</label>
                    <input type="{{ in_array($name, ['qty', 'harga', 'diskon']) ? 'number' : 'text' }}" name="{{ $name }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200">
                    @error($name)
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach
                <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded mt-2 hover:bg-blue-600 transition">Tambah</button>
            </form>
        </div>

        <!-- Kalkulator Pembayaran -->
        <div class="p-4 bg-gray-100 rounded-lg shadow-md text-center">
            <h3 class="text-lg md:text-xl font-semibold mb-2">Total Pembayaran:</h3>
            <h4 class="text-blue-600 font-bold text-xl mb-3">Rp {{ number_format($grandTotal, 0, ',', '.') }}</h4>
            <label class="block text-sm font-medium mb-1">Masukkan Jumlah Uang</label>
            <input type="number" id="jumlah_uang" class="w-full border rounded p-2 mb-2" placeholder="Masukkan jumlah uang">
            <button onclick="hitungKembalian()" class="bg-green-500 text-white w-full py-2 rounded hover:bg-green-600 transition">Hitung Kembalian</button>
            <h3 class="text-lg font-semibold mt-2">Kembalian: Rp <span id="kembalian">0</span></h3>
        </div>
    </div>
</div>

<script>
    function hitungKembalian() {
        let total = {{ $grandTotal }};
        let jumlahUang = parseInt(document.getElementById('jumlah_uang').value);
        let kembalian = jumlahUang - total;
        document.getElementById('kembalian').innerText = kembalian > 0 ? kembalian.toLocaleString('id-ID') : '0';
    }
</script>
@endsection
