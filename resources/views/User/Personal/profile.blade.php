
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
                                {{-- Awal session --}}
                                    @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                {{-- Akhir Session --}}
                        </div>
                    </div>
                    <div class="kontainer_utama">
                        <p><i class="fa fa-briefcase informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-home informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-envelope informasi_lagi"></i>{{ $pengguna->email }}</p>
                        <p><i class="fa fa-phone informasi_lagi"></i>{{ $pengguna->no_hp }}</p>
                        <form action="/logout_user" method="POST">
                            @csrf
                            <button class="ms-4 border-0" type="submit">Logout, {{ auth()->user()->name }}</button>
                        </form>
                        <hr>
                    </div>
                    <div class="tombol_ubah">
                        <a href="/profile_ubah">
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