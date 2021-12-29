
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
                                            {{-- Foto dari DB --}}
                                            {{-- <img src="{{ asset('storage/'.$pembelian->foto_bukti_bayar_obat) }}" class="d-block w-100"> --}}

                                            {{-- Foto Default --}}
                                            <img src="{{ asset('Images/pic3.jpg') }}" class="d-block w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="box-back">
                                    <h1 class="text-center mt-3">{{ $pembelian->user->first_name }}</h1>
                                    <hr class="gelap">
                                    <div class="book-information">
                                        <div class="d-flex justify-content-between">
                                            <a href="/pembelian_user" class="back">Kembali ke Daftar</a>
                                            <a href="/pembelian_user/pembayaran_obat/{{ $pembelian->id_pembelian }}" class="back">Menuju Pembayaran</a>
                                        </div>
                                        <div class="mt-3 mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Biaya Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $pembelian->jumlah_bayar }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Jadwal Periksa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $pembelian->transaksi_model->ket_pembayaran }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Editor" readonly value="{{ $pembelian->tgl_bayar }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="Editor" class="col-sm-2 col-form-label">Keterangan Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_pembayaran" readonly value="{{ $pembelian->status_pembayaran }}">
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalNilai">
                                            Penilaian
                                        </button>
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

    {{-- Memanggil Modal Penilaian --}}
    @include('User/Pembelian Obat/Modal Penilaian.penilaian_user')

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready( function() {

        var status_pembayaran = $('#status_pembayaran').val();

        if(status_pembayaran == "Menunggu Pembayaran")
        {
            $('#ModalNilai').modal('show');
        }
    });
</script>
    
@endsection