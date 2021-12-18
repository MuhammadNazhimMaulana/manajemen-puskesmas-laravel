@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/laporan">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Laporan Pengunjung" name="cari_laporan" value="{{ request('cari_laporan') }}">
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

        <a href="/laporan/create" class="btn btn-primary">Buat Laporan</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Admin</td>
                    <td>Jumlah Pengunjung</td>
                    <td>Jumlah Transaksi</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->jumlah_pengunjung }}</td>
                    <td>{{ $report->jumlah_transaksi }}</td>
                    <td class="aksi">
                        <a href="/laporan/update/{{ $report->id_laporan }}">Edit</a>
                        <a href="/laporan/pdf/{{ $report->id_laporan }}" target="_blank">PDF</a>
                        <form action="/laporan/delete/{{ $report->id_laporan }}" method="POST" class="d-inline">
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
            {{ $reports->links() }}
        </div>

    </div>
</div>
@endsection
