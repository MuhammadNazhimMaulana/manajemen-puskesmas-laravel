@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/ruang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Dokter" name="cari_dokter" value="{{ request('cari_dokter') }}">
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

        <a href="/dokter/create" class="btn btn-primary">Tambah Dokter</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Dokter</td>
                    <td>Spesialis</td>
                    <td>Jadwal Hari</td>
                    <td>Jadwal Jam</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($docters as $docter)
                <tr>
                    <td>{{ $docter->nama_dokter }}</td>
                    <td>{{ $docter->spesialis }}</td>
                    <td>{{ $docter->jadwal_hari }}</td>
                    <td>{{ $docter->jadwal_jam }}</td>
                    <td class="aksi">
                        <a href="/dokter/update/{{ $docter->id_dokter }}">Edit</a>
                        <form action="/dokter/delete/{{ $docter->id_dokter }}" method="POST" class="d-inline">
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
            {{ $docters->links() }}
        </div>

    </div>
</div>
@endsection
