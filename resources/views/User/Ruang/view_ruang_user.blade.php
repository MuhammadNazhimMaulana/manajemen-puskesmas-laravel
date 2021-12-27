
@extends('layouts.main_user')

@section('utama')

<section class="dokter" style="margin-top: 50px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="tampungan">
                        <h1>Daftar Obat</h1>
                        <div class="isi_tampungan">
                            @foreach ($rooms as $room)                         
                            <a href="#" class="daftar">
                                <img src="{{ asset('storage/'.$room->foto_ruang) }}">
                                <small>{{ $room->nama_ruang }}</small>
                                <h2>Petunjuknya</h2>
                                <p class="penjelasan">{{ $room->kapasitas }}</p>
                                <div class="lebih">
                                    <p>Baca</p>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection