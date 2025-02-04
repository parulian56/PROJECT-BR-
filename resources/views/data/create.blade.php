@extends('layout')

@section('content')
    <h2>Tambah Data</h2>
    <form action="{{ route('data.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul" required>
        <textarea name="content" placeholder="Konten"></textarea>
        <button type="submit">Simpan</button>
    </form>
@endsection
