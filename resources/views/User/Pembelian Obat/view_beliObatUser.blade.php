
@extends('layouts.main_user')

@section('utama')

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="d-flex flex-column justify-content-center">
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
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection