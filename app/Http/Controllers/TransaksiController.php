<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
{
    // Ambil semua data transaksi
    $transaksis = Transaksi::all();

    // Kirim data transaksi ke tampilan
    return view('transaksi.index', compact('transaksis')); // Ganti 'transaksi' menjadi 'transaksis'
}

    // Menampilkan form untuk menambah transaksi
    public function create()
    {
        // Tampilkan form tambah transaksi
        return view('transaksi.create');
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        // Pastikan variabel transaksi sudah diambil dengan benar
        $transaksi = Transaksi::findOrFail($id);
    
        // Mengirimkan data transaksi ke view
        return view('transaksi.edit', compact('transaksi'));
    }
    

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required',
           'jumlah' => 'required|integer|min:1|max:9999',
            'harga' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        // Hitung total harga dan kembalian
        $total_harga = $request->jumlah * $request->harga;
        $kembalian = $request->bayar - $total_harga;

        // Simpan transaksi baru
        Transaksi::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        // Redirect ke daftar transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    // Menyimpan perubahan transaksi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Hitung total harga dan kembalian
        $total_harga = $request->jumlah * $request->harga;
        $kembalian = $request->bayar - $total_harga;

        // Update data transaksi
        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        // Redirect ke daftar transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Hapus transaksi
        $transaksi->delete();

        // Redirect ke daftar transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
