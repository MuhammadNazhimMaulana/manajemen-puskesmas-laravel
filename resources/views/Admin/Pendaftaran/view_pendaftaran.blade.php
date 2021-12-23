@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/pendaftaran">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pendaftar Berdasarkan Keluhan" name="cari_pendaftar" value="{{ request('cari_pendaftar') }}">
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

        <a href="/pendaftaran/create" class="btn btn-primary">Tambah Pendaftar</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Pendaftar</td>
                    <td>Nama Dokter</td>
                    <td>Keluhan</td>
                    <td>Kebutuhan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftar as $daftar)
                <tr>
                    <td>{{ $daftar->user->first_name }}</td>
                    <td>{{ $daftar->dokter_model->nama_dokter }}</td>
                    <td>{{ $daftar->sakit }}</td>
                    <td>{{ $daftar->kebutuhan }}</td>
                    <td class="aksi">
                        <a href="/pendaftaran/update/{{ $daftar->id_daftar }}">Edit</a>
                        <form action="/pendaftaran/delete/{{ $daftar->id_daftar }}" method="POST" class="d-inline">
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
            {{ $pendaftar->links() }}
        </div>

    </div>
</div>
@endsection
