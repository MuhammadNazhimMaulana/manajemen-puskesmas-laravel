@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/obat">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Obat Berdasarkan Nama" name="cari_pendaftar" value="{{ request('cari_pendaftar') }}">
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

        <a href="/obat/create" class="btn btn-primary">Tambah Obat</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Obat</td>
                    <td>Jumlah Stok</td>
                    <td>Tanggal Kadaluarsa</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat as $medicine)
                <tr>
                    <td>{{ $medicine->nama_obat }}</td>
                    <td>{{ $medicine->stok}}</td>
                    <td>{{ $medicine->tanggal_kadaluarsa }}</td>
                    <td>
                        <a class="btn btn-info" href="/obat/update/{{ $medicine->id_obat }}">Edit</a>
                        <form action="/obat/delete/{{ $medicine->id_obat }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
            {{ $obat->links() }}
        </div>

    </div>
</div>
@endsection
