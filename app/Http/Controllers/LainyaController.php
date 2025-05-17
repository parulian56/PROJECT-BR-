<?php

namespace App\Http\Controllers;

use App\Models\Lainya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LainyaController extends Controller
{

    
    public function index()
    {
        $lainya = Lainya::where('kategori', 'lainya')->paginate(10);
        return view('admin.data.kategori.lainya.index', compact('lainya'));
    }

    public function create()
    {
        return view('admin.data.kategori.lainya.create');
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string|in:lainya',
        'deskripsi' => 'nullable|string',
        'jumlah' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
        'lokasi_penyimpanan' => 'required|string|max:100',
    ]);

    try {
        Lainya::create($validated);
        return redirect()->route('admin.data.kategori.lainya.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Error storing lainya: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data')->withInput();
    }
}


    public function edit($id)
    {
        $lainya = Lainya::findOrFail($id);
        return view('admin.data.kategori.lainya.edit', compact('lainya'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:lainya',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            $lainya = Lainya::findOrFail($id);
            $lainya->update($validated);
            return redirect()->route('admin.data.kategori.lainya.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating lainya: '.$e->getMessage());
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $lainya = Lainya::findOrFail($id);
            $lainya->delete();
            return redirect()->route('admin.data.kategori.lainya.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting lainya: '.$e->getMessage());
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
