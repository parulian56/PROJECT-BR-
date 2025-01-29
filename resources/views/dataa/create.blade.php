@extends('main')

@section('content')
    <h2>Tambah Murid</h2>
    <form action="{{ route('murid.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="kelas" placeholder="Kelas">
        <input type="text" name="jurusan" placeholder="Jurusan">
        <button type="submit">Simpan</button>
    </form>
@endsection
