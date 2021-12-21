
@extends('layouts.main_user')

@section('utama')

<section class="user" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
               <div class="kartu_profile">
                   <div class="kontainer_gambar">
                       <img src="{{ asset('Images/pic3.jpg') }}" style="width: 100%; height:350px">
                       <div class="judul_nama">
                           <h2>{{ $pengguna->name }}</h2>
                        </div>
                    </div>
                    <div class="kontainer_utama">
                        <p><i class="fa fa-briefcase informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-home informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-envelope informasi_lagi"></i>{{ $pengguna->email }}</p>
                        <p><i class="fa fa-phone informasi_lagi"></i>Tutorial Mudah</p>
                        <hr>
                    </div>
                    <div class="tombol_ubah">
                        <a href="#">
                        <span></span>    
                        Ubah Profile</a>
                    </div>
                    <div class="tombol_ubah">
                        <a href="/">
                        <span></span>    
                        Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection