@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/pasien">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pasien Berdasarkan Tanggal" name="cari_pasien" value="{{ request('cari_pasien') }}">
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
        @can('admin')
        <a href="/pasien/create" class="btn btn-primary">Tambah Pasien</a>
        @endcan
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Pasien</td>
                    <td>Kebutuhan Pasien</td>
                    <td>Keterangan</td>
                    @canany(['admin', 'dokter'])
                        <td>Aksi</td>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $people)
                <tr>
                    <td>{{ $people->user->first_name }}</td>
                    <td>{{ $people->pendaftaran_model->kebutuhan}}</td>
                    <td>{{ $people->keterangan }}</td>
                    @canany(['admin', 'dokter'])
                    <td>
                        <a class="btn btn-info" href="/pasien/update/{{ $people->id_pasien }}">Edit</a>
                        @endcanany
                        @can('admin')
                        <form action="/pasien/delete/{{ $people->id_pasien }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
            {{ $pasien->links() }}
        </div>

    </div>
</div>
@endsection
