<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeragamController extends Controller
{
    public function index()
    {
        $seragam = Seragam::where('kategori', 'seragam')->paginate(10);
        return view('admin.data.kategori.seragam.index', compact('seragam'));
    }

    public function create()
    {
        return view('admin.data.kategori.seragam.create');
    }
    public function show(Request $request)
    {
        //apalah
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string|in:seragam',
        'deskripsi' => 'nullable|string',
        'jumlah' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
        'lokasi_penyimpanan' => 'required|string|max:100',
    ]);

    try {
        seragam::create($validated);
        return redirect()->route('admin.data.kategori.seragam.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Error storing makanan: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data')->withInput();
    }
}


    public function edit($id)
    {
        $seragam = seragam::findOrFail($id);
        return view('admin.data.kategori.seragam.edit', compact('seragam'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:seragam',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            $seragam = seragam::findOrFail($id);
            $seragam->update($validated);
            return redirect()->route('admin.data.kategori.seragam.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating barang: '.$e->getMessage());
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $seragam = seragam::findOrFail($id);
            $seragam->delete();
            return redirect()->route('admin.data.kategori.seragam.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting Barang: '.$e->getMessage());
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
