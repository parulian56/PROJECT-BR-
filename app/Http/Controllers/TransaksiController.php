<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        $total_harga = $request->jumlah * $request->harga;
        $kembalian = $request->bayar - $total_harga;

        Transaksi::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $total_harga = $request->jumlah * $request->harga;
        $kembalian = $request->bayar - $total_harga;

        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
