@extends('layouts.user')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<div class="container mx-auto p-6 flex flex-col lg:flex-row justify-center gap-6">
    <!-- TABEL TRANSAKSI -->
    <div class="lg:w-3/4 w-full">
        <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Transaksi</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-3 text-center">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="w-full border border-gray-300 text-center bg-white">
                <thead class="bg-gray-200 text-gray-700">
                    <tr class="text-sm">
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
                    @php $grandTotal = 0; @endphp
                    @foreach ($transaksis as $transaksi)
                    @php $grandTotal += $transaksi->total; @endphp
                    <tr class="hover:bg-gray-100 text-sm">
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->plu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->deskripsi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->qty }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->diskon, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->fee, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FORM TAMBAH TRANSAKSI -->
    <div class="lg:w-1/4 w-full flex flex-col gap-4">
        <div class="p-4 bg-gray-100 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4 text-center">Tambah Transaksi</h3>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label class="block text-sm font-medium">PLU</label>
                    <input type="text" name="plu" value="{{ old('plu') }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200" required>
                </div>                
                <div class="mb-2">
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Qty</label>
                    <input type="number" name="qty" value="{{ old('qty') }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Diskon</label>
                    <input type="number" name="diskon" value="{{ old('diskon') ?? 0 }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Fee</label>
                    <input type="number" name="fee" value="{{ old('fee') ?? 0 }}" class="w-full border rounded p-2 focus:ring focus:ring-blue-200">
                </div>
                <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded mt-2 hover:bg-blue-600 transition">Tambah</button>
            </form>
        </div>

        <!-- KALKULATOR PEMBAYARAN -->
        <div class="p-4 bg-gray-100 rounded-lg shadow-md text-center">
            <h3 class="text-xl font-semibold mb-2">Total Pembayaran: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h3>
            <label class="block text-sm font-medium mb-1">Masukkan Jumlah Uang</label>
            <input type="number" id="jumlah_uang" class="w-full border rounded p-2 mb-2" placeholder="Masukkan jumlah uang">
            <button onclick="hitungKembalian()" class="bg-green-500 text-white w-full py-2 rounded hover:bg-green-600 transition">Hitung Kembalian</button>
            <h3 class="text-lg font-semibold mt-2">Kembalian: Rp <span id="kembalian">0</span></h3>
            <p id="warning" class="text-red-500 text-sm mt-2 hidden">Uang tidak cukup!</p>
        </div>
    </div>
</div>

<script>
    function hitungKembalian() {
        let total = {{ $grandTotal }};
        let jumlahUang = parseFloat(document.getElementById('jumlah_uang').value) || 0;
        let kembalian = jumlahUang - total;

        if (kembalian < 0) {
            document.getElementById('warning').classList.remove('hidden');
            document.getElementById('kembalian').innerText = "0";
        } else {
            document.getElementById('warning').classList.add('hidden');
            document.getElementById('kembalian').innerText = kembalian.toLocaleString('id-ID');
        }
    }
</script>

@endsection
