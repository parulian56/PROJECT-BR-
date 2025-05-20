<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiKasirController extends Controller
{
    public function index()
    {
        $transaksis = TransaksiKasir::latest()->get();
        $grandTotal = $transaksis->sum('total');

        return view('user.transaksi.index', compact('transaksis', 'grandTotal'));
    }

    public function create()
    {
        $produks = Produk::select('plu', 'nama_barang', 'harga_jual', 'kategori')
                        ->orderBy('nama_barang')
                        ->get();

        return view('user.transaksi.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $harga = floatval($request->harga);
        $qty = intval($request->qty);
        $maxDiskon = $harga * $qty;

        $validated = $request->validate([
            'plu' => 'required|string',
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|string|in:Makanan,Minuman,Alat Tulis,Seragam,Kesehatan & Kebersihan,Lainnya',
            'qty' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:' . $maxDiskon
        ]);

        $total = ($validated['harga'] * $validated['qty']) - ($validated['diskon'] ?? 0);

        TransaksiKasir::create([
            'plu' => $validated['plu'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'qty' => $validated['qty'],
            'harga' => $validated['harga'],
            'diskon' => $validated['diskon'] ?? 0,
            'total' => $total
        ]);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        $produks = Produk::select('plu', 'nama_barang', 'harga_jual', 'kategori')
                        ->orderBy('nama_barang')
                        ->get();

        return view('user.transaksi.edit', compact('transaksi', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $harga = floatval($request->harga);
        $qty = intval($request->qty);
        $maxDiskon = $harga * $qty;

        $validated = $request->validate([
            'plu' => 'required|string',
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|string|in:Makanan,Minuman,Alat Tulis,Seragam,Kesehatan & Kebersihan,Lainnya',
            'qty' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:' . $maxDiskon
        ]);

        $total = ($validated['harga'] * $validated['qty']) - ($validated['diskon'] ?? 0);

        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->update([
            'plu' => $validated['plu'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'qty' => $validated['qty'],
            'harga' => $validated['harga'],
            'diskon' => $validated['diskon'] ?? 0,
            'total' => $total
        ]);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
                         ->with('success', 'Item berhasil dihapus dari transaksi!');
    }

    public function clearAll(Request $request)
{
    // Validasi akses hanya untuk user yang berwenang
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Konfirmasi via AJAX atau form submit
    if ($request->ajax()) {
        TransaksiKasir::truncate();
        return response()->json(['success' => true, 'message' => 'Semua transaksi berhasil dihapus!']);
    }

    // Untuk request biasa
    TransaksiKasir::truncate();
    return redirect()->route('transaksi.index')
                     ->with('success', 'Semua transaksi berhasil dihapus!');
}

    public function checkout(Request $request)
    {
        $transaksis = TransaksiKasir::all();
        $grandTotal = $transaksis->sum('total');

        if ($transaksis->isEmpty()) {
            return redirect()->route('transaksi.index')
                             ->with('warning', 'Tidak ada item untuk diproses.');
        }

        $request->validate([
            'uang_dibayar' => 'required|numeric|min:' . $grandTotal
        ]);

        $transaksi = Transaksi::create([
            'kode_transaksi' => 'TRX-' . date('YmdHis') . '-' . uniqid(),
            'total' => $grandTotal,
            'uang_dibayar' => $request->uang_dibayar,
            'kembalian' => $request->uang_dibayar - $grandTotal,
            'tanggal' => now(),
            'status' => 'selesai',
            'user_id' => auth()->id()
        ]);

        foreach ($transaksis as $item) {
            $transaksi->items()->create([
                'plu' => $item->plu,
                'nama_barang' => $item->deskripsi,
                'kategori' => $item->kategori,
                'qty' => $item->qty,
                'harga_satuan' => $item->harga,
                'diskon' => $item->diskon,
                'total' => $item->total
            ]);
        }

        TransaksiKasir::truncate();

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil diselesaikan! Total: Rp ' . number_format($grandTotal, 0, ',', '.'));
    }
}
