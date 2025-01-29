<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Menampilkan semua murid
    public function index()
    {
        $murids = Data::all();
        return view('data.index', compact('data'));
    }

    // Menampilkan form tambah murid
    public function create()
    {
        return view('data.create');
    }

    // Menyimpan murid baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        Murid::create($request->all());
        return redirect()->route('data.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan detail murid
    public function show(Data $data)
    {
        return view('data.show', compact('data'));
    }

    // Menampilkan form edit murid
    public function edit(Data $data)
    {
        return view('data.edit', compact('data'));
    }

    // Menyimpan perubahan murid
    public function update(Request $request, Data $data)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        $data->update($request->all());
        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus murid
    public function destroy(Data $data)
    {
        $data->delete();
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
    }
}
