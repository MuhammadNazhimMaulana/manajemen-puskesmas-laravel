
@extends('layouts.main_user')

@section('utama')

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="d-flex flex-column justify-content-center">
                    <h1 class="text-center mb-5">Pembelian Obat</h1>
                    <a href="/pendaftaran_user/create" class="btn btn-primary mb-4">Mendaftar</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Kebutuhan</th>
                            <th scope="col">Status Daftar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pendaftar as $signup)
                        <tr>
                            <td>{{ $signup->dokter_model->nama_dokter }}</td>
                            <td>{{ $signup->sakit }}</td>
                            <td>{{ $signup->kebutuhan }}</td>
                            <td>{{ $signup->status_daftar }}</td>
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