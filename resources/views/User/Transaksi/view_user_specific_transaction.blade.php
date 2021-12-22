
@extends('layouts.main_user')

@section('utama')

<section class="transaksi_detail" style="margin-top: 50px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="container mb-5 my-3 py-5">
                    <div class="col-md-12">
                        <div class="row latar" id="bookmain">
                            <div class="col-sm-4">
                                <div id="carousel-slide" class="carousel slide mt-3" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/'.$transaksi->foto_bukti_bayar) }}" class="d-block w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="box-back">
                                    <h1 class="text-center mt-3">{{ $transaksi->user->name }}</h1>
                                    <hr class="gelap">
                                    <div class="book-information">
                                        <a href="/transaksi_user" class="back">Kembali ke Daftar</a>
                                        <div class="mt-3 mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Biaya Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $transaksi->biaya_pembayaran }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Jadwal Periksa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $transaksi->pasien_model->jadwal_periksa }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $transaksi->tanggal_bayar }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Keterangan Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $transaksi->ket_pembayaran }}">
                                            </div>
                                        </div>
                                        <p class="description">
                                            Jadi ini merupakan bagian deskripsi yang di rangkai nantinya dengan data-data buku yang masih tersisa apa saja dan ini masih bisa mengalami perubahan kok
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection