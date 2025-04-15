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
        'plu' => 'required|string|unique:transaksi_kasir,plu',
        'deskripsi' => 'required|string',
        'qty' => 'required|integer|min:1',
        'harga' => 'required|numeric|min:0',
        'diskon' => 'nullable|numeric|min:0',
        
    ], [
        'plu.unique' => 'PLU sudah digunakan, silakan gunakan PLU yang berbeda.',
        'plu.required' => 'PLU wajib diisi.',
        'qty.min' => 'Jumlah produk minimal 1.',
        'harga.min' => 'Harga tidak boleh negatif.',
    ]);

    // Hitung total harga
    $total = ($request->harga * $request->qty) - $request->diskon;

    // Simpan transaksi
    TransaksiKasir::create([
        'plu' => $request->plu,
        'deskripsi' => $request->deskripsi,
        'qty' => $request->qty,
        'harga' => $request->harga,
        'diskon' => $request->diskon ?? 0,
        
        'total' => $total,
    ]);

    return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
}


    public function edit($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        return view('user.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plu' => 'required|integer|unique:transaksi_kasirs,plu,' . $id, // Cek unik, kecuali untuk transaksi yang sedang diedit
            'deskripsi' => 'required',
            'qty' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric',
          ]);
    
        $total = ($request->qty * $request->harga) - ($request->diskon ?? 0) ;
    
        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->update([
            'plu' => $request->plu,
            'deskripsi' => $request->deskripsi,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'diskon' => $request->diskon ?? 0,
            
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