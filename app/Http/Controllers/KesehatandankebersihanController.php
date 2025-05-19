<?php

namespace App\Http\Controllers;

use App\Models\Kesehatandankebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KesehatandankebersihanController extends Controller
{
    public function index()
    {
        $kesehatandankebersihan = Kesehatandankebersihan::where('kategori', 'kesehatandankebersihan')->paginate(10);
        return view('admin.data.kategori.kesehatandankebersihan.index', compact('kesehatandankebersihan'));
    }

    public function create()
    {
        return view('admin.data.kategori.kesehatandankebersihan.create');
    }

    public function show()
    {
        //kontol
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string|in:kesehatandankebersihan',
        'deskripsi' => 'nullable|string',
        'jumlah' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
        'lokasi_penyimpanan' => 'required|string|max:100',
    ]);

    try {
        Kesehatandankebersihan::create($validated);
        return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Error storing barang: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data')->withInput();
    }
}


    public function edit($id)
    {
        $kesehatandankebersihan = Kesehatandankebersihan::findOrFail($id);
        return view('admin.data.kategori.kesehatandankebersihan.edit', compact('makanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:makanan',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            $kesehatandankebersihan = Kesehatandankebersihan::findOrFail($id);
            $kesehatandankebersihan->update($validated);
            return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating barang: '.$e->getMessage());
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $kesehatandankebersihan = Kesehatandankebersihan::findOrFail($id);
            $kesehatandankebersihan->delete();
            return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting barang: '.$e->getMessage());
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
