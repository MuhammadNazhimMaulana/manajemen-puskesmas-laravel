
@extends('layouts.main_user')

@section('utama')

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <h1 class="text-center mb-5">Transaksi Anda</h1>
                <div class="col-md-12 tampung">
                    @foreach ($transaksi as $transactions)    
                        <div class="baris">
                            <div class="kolom">
                                <div class="kartu-transaksi">
                                    <img style="width:150px; height: auto; padding-top: 10px;" src="{{ asset('storage/'.$transactions->foto_bukti_bayar) }}">
                                    <h2 class="judul">{{ $transactions->user->name }}</h2>
                                    <p>Text</p>
                                    <p><a href="/transaksi_user/pdf/{{ $transactions->id_transaksi }}">PDF</a></p>
                                    <p><button><a href="/transaksi_user/{{ $transactions->id_transaksi }}">Informasi Lebih</a></button></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection