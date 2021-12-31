@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/pasien">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pasien Berdasarkan Tanggal Pembayaran" name="cari_transaksi" value="{{ request('cari_transaksi') }}">
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

        <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Pasien</td>
                    <td>Jadwal Pasien</td>
                    <td>Keterangan Pembayaran</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transactions)
                <tr>
                    <td>{{ $transactions->user->first_name }}</td>
                    <td>{{ $transactions->pasien_model->jadwal_periksa}}</td>
                    <td>{{ $transactions->ket_pembayaran }}</td>
                    <td>
                        <a class="btn btn-info" href="/transaksi/update/{{ $transactions->id_transaksi }}">Edit</a>
                        <form action="/transaksi/delete/{{ $transactions->id_transaksi }}" method="POST" class="d-inline">
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
            {{ $transaksi->links() }}
        </div>

    </div>
</div>
@endsection
