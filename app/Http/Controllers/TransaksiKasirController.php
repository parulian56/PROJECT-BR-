<?php

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller;
use App\Models\TransaksiKasir;
use Illuminate\Http\Request;

class TransaksiKasirController extends Controller
{
    public function index()
    {
        $transaksis = TransaksiKasir::all();
        return view('user.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        return view('user.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric|min:1',
            'bayar' => 'required|numeric|min:1',
        ]);

        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = max(0, $request->bayar - $total_harga);

        TransaksiKasir::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(TransaksiKasir $transaksi)
    {
        return view('user.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, TransaksiKasir $transaksi)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric|min:1',
            'bayar' => 'required|numeric|min:1',
        ]);

        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = max(0, $request->bayar - $total_harga);

        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(TransaksiKasir $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function hapusSemua()
    {
        TransaksiKasir::truncate(); // Menghapus semua data dari tabel transaksi
        return redirect()->route('transaksi.index')->with('success', 'Semua transaksi berhasil dihapus.');
    }
}
