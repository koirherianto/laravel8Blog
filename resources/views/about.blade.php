@extends('layout.main')

@section('container')
    <h1>Halaman About</h1>
        
    <ul>
        <li>Nama {{ $nama }}</li>
        <li>Nim {{ $nim }}</li>
        <li><img src="img/{{ $gambar }}" width="200"></li>
    </ul>
@endsection
