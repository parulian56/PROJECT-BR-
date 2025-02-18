<?php

namespace App\Http\Controllers; 

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiKasirController extends Controller
{
    public function index()
    {
        $transaksis = TransaksiKasir::all();
        return view('user.transaksi.index', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plu' => 'required',
            'deskripsi' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'fee' => 'nullable|numeric',
        ]);

        $total = ($request->qty * $request->harga) - $request->diskon + $request->fee;

        TransaksiKasir::create([
            'plu' => $request->plu,
            'deskripsi' => $request->deskripsi,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'fee' => $request->fee,
            'total' => $total,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        return view('user.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plu' => 'required',
            'deskripsi' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'fee' => 'nullable|numeric',
        ]);

        $total = ($request->qty * $request->harga) - $request->diskon + $request->fee;

        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->update([
            'plu' => $request->plu,
            'deskripsi' => $request->deskripsi,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'fee' => $request->fee,
            'total' => $total,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function hapusSemua()
    {
        TransaksiKasir::truncate();
        return redirect()->route('transaksi.index')->with('success', 'Semua transaksi berhasil dihapus.');
    }
}