@extends('main')

@section('content')
    <h2>Edit Murid</h2>
    <form action="{{ route('murid.update', $murid->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nama" value="{{ $murid->nama }}">
        <input type="text" name="kelas" value="{{ $murid->kelas }}">
        <input type="text" name="jurusan" value="{{ $murid->jurusan }}">
        <button type="submit">Update</button>
    </form>
@endsection
