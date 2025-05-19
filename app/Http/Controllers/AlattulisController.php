<?php

namespace App\Http\Controllers;

use App\Models\Alattulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlattulisController extends Controller
{
    public function index()
    {
        $alattulis = Alattulis::where('kategori', 'alattulis')->paginate(10);
        return view('admin.data.kategori.alattulis.index', compact('alattulis'));
    }

    public function create()
    {
        return view('admin.data.kategori.alattulis.create');
    }
    public function show(Request $request)
    {
        //anjayy
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string|in:alattulis',
        'deskripsi' => 'nullable|string',
        'jumlah' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
        'lokasi_penyimpanan' => 'required|string|max:100',
    ]);

    try {
        Alattulis::create($validated);
        return redirect()->route('admin.data.kategori.alattulis.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Error storing barang: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data')->withInput();
    }
}


    public function edit($id)
    {
        $alattulis = Alattulis::findOrFail($id);
        return view('admin.data.kategori.alattulis.edit', compact('alattulis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:alattulis',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            $alattulis = Alattulis::findOrFail($id);
            $alattulis->update($validated);
            return redirect()->route('admin.data.kategori.alattulis.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating barang: '.$e->getMessage());
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $alattulis = Alattulis::findOrFail($id);
            $alattulis->delete();
            return redirect()->route('admin.data.kategori.alattulis.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting Barang: '.$e->getMessage());
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
