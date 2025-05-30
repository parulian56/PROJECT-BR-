<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Menampilkan semua data penyimpanan
    public function index()
    {
        // Ambil semua data penyimpanan
        $data = Data::paginate(10);

        // Kirim data penyimpanan ke tampilan
        return view('admin.data.index', compact('data'));
    }

    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        // Tampilkan form tambah data penyimpanan
        return view('admin.data.create');
    }

    public function stok(){
        return view('admin.data.stok');
    }

    // Menampilkan form edit data penyimpanan
    public function edit($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Mengirimkan data penyimpanan ke view
        return view('admin.data.edit', compact('data'));
    }

    // Menyimpan data penyimpanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'codetrx' => 'required|unique:data,codetrx',
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:1',
            'harga_pokok' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'harga_jual' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Hitung total nilai

        // Simpan data penyimpanan baru
        Data::create([
            'codetrx' => $request->codetrx,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil disimpan');
    }

    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:1|max:9999',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Hitung total nilai

        // Update data penyimpanan
        $data->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
{
    // Ambil data penyimpanan berdasarkan ID
    $data = Data::findOrFail($id);

    // Hapus data penyimpanan
    $data->delete();

    // Redirect ke daftar data penyimpanan dengan pesan sukses
    return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil dihapus');
}


}
