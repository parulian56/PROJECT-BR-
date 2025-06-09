<!-- resources/views/user/transaksi/index.blade.php -->
@extends('layouts.user')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Daftar Transaksi -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-amber-600 px-6 py-4 flex justify-between items-center">
                <h2 class="text-white font-bold text-lg">Daftar Transaksi</h2>
                <div class="flex items-center space-x-2">
                    <button onclick="printReceipt()" class="px-3 py-1 bg-white text-amber-600 rounded text-sm font-medium">
                        <i class="fas fa-print mr-1"></i> Cetak
                    </button>
                    <form action="{{ route('transaksi.deleteAll') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus semua item transaksi?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm font-medium transition-colors">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Semua
                        </button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-stone-50 text-stone-600 text-sm uppercase">
                        <tr>
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Nama Barang</th>
                            <th class="py-3 px-4 text-left">Kategori</th>
                            <th class="py-3 px-4 text-left">Qty</th>
                            <th class="py-3 px-4 text-left">Harga</th>
                            <th class="py-3 px-4 text-left">Diskon</th>
                            <th class="py-3 px-4 text-left">Total</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($transaksis as $item)
                        <tr class="hover:bg-amber-50">
                            <td class="py-4 px-4">{{ $loop->iteration }}</td>
                            <td class="py-4 px-4 font-medium">{{ $item->deskripsi }}</td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="py-4 px-4">{{ $item->qty }}</td>
                            <td class="py-4 px-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-4">Rp {{ number_format($item->diskon, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 font-medium">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('transaksi.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Hapus item ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-stone-500">
                                <i class="fas fa-shopping-cart text-3xl mb-2"></i>
                                <p>Belum ada transaksi</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Pembayaran -->
    <div class="space-y-6">
        <!-- Form Tambah Item -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-amber-600 px-6 py-4">
                <h2 class="text-white font-bold text-lg">Tambah Item</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <!-- Input Pencarian Barang -->
                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Cari Barang</label>
                            <input type="text" id="product-search" 
                                   class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" 
                                   placeholder="Ketik PLU atau nama barang...">
                            <input type="hidden" name="plu" id="plu">
                        </div>

                        <!-- Input Nama Barang (otomatis terisi) -->
                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Nama Barang</label>
                            <input type="text" name="deskripsi" id="deskripsi" readonly
                                   class="w-full px-4 py-2 border border-stone-200 rounded-lg bg-stone-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Kategori</label>
                            <select name="kategori" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Alat Tulis">Alat Tulis</option>
                                <option value="Seragam">Seragam</option>
                                <option value="Kesehatan & Kebersihan">Kesehatan & Kebersihan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Jumlah</label>
                            <input type="number" name="qty" min="1" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Harga Satuan</label>
                            <input type="number" name="harga" min="0" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-stone-600 mb-1">Diskon</label>
                            <input type="number" name="diskon" min="0" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" value="0">
                        </div>
                        <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-plus-circle mr-2"></i> Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-amber-600 px-6 py-4">
                <h2 class="text-white font-bold text-lg">Pembayaran</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-stone-600 font-medium">Total Belanja:</span>
                    <span class="text-2xl font-bold text-amber-600">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>

                <form action="{{ route('transaksi.checkout') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-stone-600 mb-1">Jumlah Uang</label>
                        <input type="number" id="uang_dibayar" name="uang_dibayar" min="0" class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-amber-500 focus:border-amber-500" required>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-stone-600 mb-1">Kembalian</label>
                        <input type="text" id="kembalian" class="w-full px-4 py-2 border border-stone-200 rounded-lg bg-stone-100" readonly>
                    </div>
                    <button type="submit" class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg transition-colors font-medium">
                        <i class="fas fa-cash-register mr-2"></i> Proses Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $("#product-search").autocomplete({
            source: "{{ route('transaksi.searchProduct') }}",
            minLength: 2,
            select: function(event, ui) {
                // Isi form otomatis
                $("#plu").val(ui.item.codetrx);
                $("#deskripsi").val(ui.item.nama_barang);
                $("select[name='kategori']").val(ui.item.kategori);
                $("input[name='harga']").val(ui.item.harga_jual);
                $("input[name='qty']").focus();
            }
        }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
                .append(`<div>${item.codetrx} - ${item.nama_barang} (Rp ${item.harga_jual.toLocaleString('id-ID')})</div>`)
                .appendTo(ul);
        };

        // Hitung kembalian
        document.getElementById('uang_dibayar').addEventListener('input', function() {
            const total = {{ $grandTotal }};
            const uangDibayar = parseFloat(this.value) || 0;
            const kembalian = uangDibayar - total;
            
            document.getElementById('kembalian').value = kembalian >= 0 
                ? 'Rp ' + kembalian.toLocaleString('id-ID') 
                : 'Uang kurang Rp ' + Math.abs(kembalian).toLocaleString('id-ID');
        });
    });

    // Fungsi cetak struk
    function printReceipt() {
        const transaksis = {!! json_encode($transaksis) !!};
        const grandTotal = {!! $grandTotal !!};
        
        if (transaksis.length === 0) {
            alert('Tidak ada transaksi untuk dicetak!');
            return;
        }

        let receiptContent = `
            <style>
                body { font-family: Arial, sans-serif; }
                .receipt { width: 80mm; margin: 0 auto; padding: 10px; }
                .header { text-align: center; margin-bottom: 10px; }
                .title { font-weight: bold; font-size: 18px; }
                .address { font-size: 12px; margin-bottom: 10px; }
                .divider { border-top: 1px dashed #000; margin: 10px 0; }
                .item { display: flex; justify-content: space-between; margin-bottom: 5px; }
                .total { font-weight: bold; margin-top: 10px; text-align: right; }
                .footer { text-align: center; margin-top: 20px; font-size: 12px; }
            </style>
            <div class="receipt">
                <div class="header">
                    <div class="title">Toko Amaliah</div>
                    <div class="address">Jl. Contoh No. 123, Kota</div>
                </div>
                <div class="divider"></div>
                <div>${new Date().toLocaleString()}</div>
                <div class="divider"></div>
        `;

        transaksis.forEach(item => {
            receiptContent += `
                <div class="item">
                    <div>${item.deskripsi} (${item.qty}x)</div>
                    <div>Rp ${item.harga.toLocaleString('id-ID')}</div>
                </div>
            `;
        });

        receiptContent += `
            <div class="divider"></div>
            <div class="item">
                <div>Total:</div>
                <div>Rp ${grandTotal.toLocaleString('id-ID')}</div>
            </div>
            <div class="footer">
                Terima kasih telah berbelanja
            </div>
        `;

        const printWindow = window.open('', '_blank');
        printWindow.document.write(receiptContent);
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endpush
@endsection