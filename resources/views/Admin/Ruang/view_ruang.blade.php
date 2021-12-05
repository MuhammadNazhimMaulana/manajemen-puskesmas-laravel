@extends('layouts.main')

@section('container')
<h1>Halaman Ruang</h1>

@foreach ($rooms as $room)
<h1>{{ $room->nama_ruang }}</h1>
@endforeach

@endsection
