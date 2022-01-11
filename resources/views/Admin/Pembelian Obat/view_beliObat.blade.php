@extends('layouts.main')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/pasien">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pembelian Obat" name="cari_pembelian" value="{{ request('cari_pembelian') }}">
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
        
        @if(session()->has('lunas'))
        <div class="alert alert-success" role="alert">
            {{ session('lunas') }}
        </div>
        @endif

        @if(session()->has('belum_lunas'))
        <div class="alert alert-success" role="alert">
            {{ session('belum_lunas') }}
        </div>
        @endif

        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <form action="/pembelian/create" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-primary">Beli Obat</button>
        </form>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Pembeli</td>
                    <td>Tanggal Pembayaran Pemeriksaan</td>
                    <td>PPN</td>
                    <td>Pembayaran Setelah PPN</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $buy_medicines)
                <tr>
                    <td>{{ $buy_medicines->user->first_name }}</td>
                    <td>{{ $buy_medicines->transaksi_model->tanggal_bayar}}</td>
                    <td>{{ $buy_medicines->ppn }}</td>
                    <td>{{ $buy_medicines->jumlah_bayar }}</td>
                    <td>
                        <a class="btn btn-info" href="/pembelian/payment/{{ $buy_medicines->id_pembelian }}">Edit</a>
                        <form action="/pembelian/delete/{{ $buy_medicines->id_pembelian }}" method="POST" class="d-inline">
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
            {{ $pembelian->links() }}
        </div>

    </div>
</div>
@endsection
