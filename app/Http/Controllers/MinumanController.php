<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MinumanController extends Controller
{
    public function index()
    {
        $minuman = Minuman::where('kategori', 'minuman')->paginate(10);
        return view('admin.data.kategori.minuman.index', compact('minuman'));
    }

    public function create()
    {
        return view('admin.data.kategori.minuman.create');
    }
    public function show(Request $request)
    {
        //anjayy
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string|in:minuman',
        'deskripsi' => 'nullable|string',
        'jumlah' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
        'lokasi_penyimpanan' => 'required|string|max:100',
    ]);

    try {
        Minuman::create($validated);
        return redirect()->route('admin.data.kategori.minuman.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        Log::error('Error storing barang: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data')->withInput();
    }
}


    public function edit($id)
    {
        $minuman = Minuman::findOrFail($id);
        return view('admin.data.kategori.minuman.edit', compact('minuman'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:minuman',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            $minuman = Minuman::findOrFail($id);
            $minuman->update($validated);
            return redirect()->route('admin.data.kategori.minuman.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating barang: '.$e->getMessage());
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $minuman = Minuman::findOrFail($id);
            $minuman->delete();
            return redirect()->route('admin.data.kategori.minuman.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting Barang: '.$e->getMessage());
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
