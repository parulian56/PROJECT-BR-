<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiKasirController extends Controller
{
    public function index()
{
    $transaksis = TransaksiDetail::with('data')->whereNull('transaksi_id')->latest()->get();
    $grandTotal = $transaksis->sum(function($item) {
        return $item->qty * $item->data->harga_jual;
    });

    $products = Data::where('stok', '>', 0)
                  ->orderBy('nama_barang')
                  ->get();

    return view('user.transaksi.index', [
        'transaksis' => $transaksis,
        'grandTotal' => $grandTotal,
        'products' => $products
    ]);
}
    public function store(Request $request)
{
    $request->validate([
        'data_id' => 'required|exists:data,id',
        'codetrx' => 'required',
        'nama_barang' => 'required',
        'kategori' => 'required',
        'harga_jual' => 'required|numeric|min:0',
        'qty' => 'required|integer|min:1'
    ]);

    $product = Data::findOrFail($request->data_id);

    // Check stock availability
    if ($product->stok < $request->qty) {
        return back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $product->stok);
    }

    // Check if item already exists in current transaction
    $existingItem = TransaksiDetail::where('data_id', $request->data_id)
                                 ->whereNull('transaksi_id')
                                 ->first();

    if ($existingItem) {
        // Update existing item
        $existingItem->qty += $request->qty;
        $existingItem->save();
    } else {
        // Create new transaction item
        TransaksiDetail::create([
            'data_id' => $request->data_id,
            'codetrx' => $request->codetrx,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'harga_jual' => $request->harga_jual,
            'qty' => $request->qty
        ]);
    }

    return redirect()->route('transaksi.index')->with('success', 'Item berhasil ditambahkan ke transaksi!');
}
    // ... (method lainnya tetap sama)

public function destroy($id)
{
    $transaksi = Transaksi::findOrFail($id); // <== You were missing this line
    $transaksi->delete();

    return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus!');
}


public function deleteAll()
{
    // Delete all transaction items not yet tied to a finalized transaction
    TransaksiDetail::whereNull('transaksi_id')->delete();

    return redirect()->route('transaksi.index')->with('success', 'Semua item transaksi berhasil dihapus!');
}

public function checkout(Request $request)
{
    $request->validate([
        'codetrx' => 'required|string',
        'uang_dibayar' => 'required|numeric|min:0',
    ]);

    $transaksiDetails = TransaksiDetail::whereNull('transaksi_id')->get();

    if ($transaksiDetails->isEmpty()) {
        return redirect()->route('transaksi.index')->with('error', 'Tidak ada item untuk diproses.');
    }

    $grandTotal = $transaksiDetails->sum(function ($item) {
        return $item->qty * $item->harga_jual;
    });

    // Validasi ketat bahwa uang dibayar harus >= total
    if ($request->uang_dibayar < $grandTotal) {
        return back()
            ->withInput()
            ->with('error', 'Uang yang dibayar kurang dari total belanja. Kurang: Rp ' . number_format($grandTotal - $request->uang_dibayar, 0, ',', '.'));
    }

    // Mulai transaction database untuk memastikan konsistensi data
    DB::beginTransaction();

    try {
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'kode_transaksi' => $request->codetrx,
            'total_harga' => $grandTotal,
            'uang_dibayar' => $request->uang_dibayar,
            'kembalian' => $request->uang_dibayar - $grandTotal
        ]);

        foreach ($transaksiDetails as $item) {
            $item->transaksi_id = $transaksi->id;
            $item->save();

            // Kurangi stok barang dengan pengecekan
            $product = Data::find($item->data_id);
            if ($product->stok < $item->qty) {
                throw new \Exception("Stok {$product->nama_barang} tidak mencukupi");
            }
            $product->decrement('stok', $item->qty);
        }

        DB::commit();
        
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil disimpan! Kembalian: Rp ' . number_format($request->uang_dibayar - $grandTotal, 0, ',', '.'));

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Transaksi gagal: ' . $e->getMessage());
    }
}
}