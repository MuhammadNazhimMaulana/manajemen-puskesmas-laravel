
@extends('layouts.main_user')

@section('utama')

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="d-flex flex-column justify-content-center">

                    {{-- Start Session --}}
                        @if(session()->has('success-menilai'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success-menilai') }}
                            </div>
                        @endif
                    {{-- End of Session --}}

                    <h1 class="text-center mb-5">Pembelian Obat</h1>
                    <form action="/pembelian_user/create" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-primary mb-4">Beli Obat</button>
                    </form>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">PPN</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tenggat Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pembelian as $buy)
                        <tr>
                            <td>{{ $buy->id_pembelian }}</td>
                            <td>{{ $buy->jumlah_bayar }}</td>
                            <td>{{ $buy->ppn }}</td>
                            <td>{{ $buy->status_pembayaran }}</td>
                            <td>{{ $buy->tgl_tenggat }}</td>
                            <td>
                                <a class="btn btn-primary" href="pembelian_user/{{ $buy->id_pembelian }}">View</a>
                                <a class="btn btn-secondary" target="_blank" href="/pembelian_user/pdf/{{ $buy->id_pembelian }}">pdf</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection