<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;

class TransaksiKasirController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksis = TransaksiKasir::all();
        return view('transaksi.index', compact('transaksis'));
    }

    // Menampilkan form untuk menambah transaksi
    public function create()
    {
        return view('transaksi.create');
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric',
            'bayar' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ],
    [
        'nama_produk' => 'tidak boleh kosong',
        'jumlah' => 'tidak boleh kosong, harus angka, dan harus diisi',
        'harga_satuan' => 'tidak boleh kosong, dan harus angka',
        'bayar' => 'tidak boleh kosong, dan harus angka',
        'metode_pembayaran' => 'tidak boleh kosong',
    ]);

        // Hitung total harga dan kembalian
        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = $request->bayar - $total_harga;

        TransaksiKasir::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    // Menyimpan perubahan transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'bayar' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        $transaksi = TransaksiKasir::findOrFail($id);

        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = $request->bayar - $total_harga;

        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
