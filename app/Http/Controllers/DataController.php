<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::paginate(10);
        return view('admin.data.index', compact('data'));
    }

    public function create()
    {
        return view('admin.data.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        $todayFormatted = now()->format('dmY');
        $countToday = Data::whereRaw('DATE(created_at) = ?', [now()->toDateString()])->count() + 1;
        $order = str_pad($countToday, 2, '0', STR_PAD_LEFT);
        $codetrx = "am-{$order}-{$todayFormatted}-id";

        Data::create([
            'codetrx' => $codetrx,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        return redirect()->route('admin.data.index')->with('success', 'Data berhasil disimpan!');
    }

    public function stok(Request $request, $id)
{
    $data = Data::findOrFail($id);

    if ($request->isMethod('post')) {
        $request->validate([
            'stok' => 'required|integer|min:1|max:9999',
        ]);

        $data->stok += $request->stok;
        $data->save();

        return redirect()->route('admin.data.index')->with('success', 'Stok berhasil ditambahkan');
    }

    return view('admin.data.stok', compact('data'));
}


    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil dihapus');
    }
}
