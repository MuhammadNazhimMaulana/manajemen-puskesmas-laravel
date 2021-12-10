@extends('layouts.main')

@section('container')

<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/ruang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Ruang" name="cari_ruang" value="{{ request('cari_ruang') }}">
                    <button class="btn btn-danger" type="submit">Cari</button>
                  </div>
            </form>
        </div>
    </div>

    <div class="board">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <a href="/ruang/create" class="btn btn-primary">Tambah Ruang</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Ruang</td>
                    <td>Kapasitas</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->nama_ruang }}</td>
                    <td>{{ $room->kapasitas }}</td>
                    <td class="aksi">
                        <a href="/ruang/update/{{ $room->id_ruang }}">Edit</a>
                        <form action="/ruang/delete/{{ $room->id_ruang }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="bg-white border-0" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
            {{ $rooms->links() }}
        </div>

    </div>
</div>

@endsection
