<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('data.layout', compact('data'));
    }

    public function create()
    {
        return view('data.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable'
        ]);

        Data::create($request->all());

        return redirect()->route('data.layout')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Data $data)
    {
        return view('data.edit', compact('data'));
    }

    public function update(Request $request, Data $data)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable'
        ]);

        $data->update($request->all());

        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Data $data)
    {
        $data->delete();
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
    }
}
