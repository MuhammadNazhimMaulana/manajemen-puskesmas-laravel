@extends('layouts.main_user')

@section('utama')

<!-- Bagian Home mulai dari sini -->
<section class="home" id="home" style="margin-top:-50px; margin-bottom: -50px;">
    <div class="container mt-5 pr-5">
        <div class="row min-vh-100 align-items-center text-center text-md-left">
            <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                <img src="{{ asset('Images/Doctors.png') }}" width="100%" alt="">
            </div>
            <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                <h1><span>Selamat </span> Datang
                    <h3><a href="#"><span style="  color: var(--blue);">Email</span></a>, Silakan Mendaftar Untuk Melakukan Pemeriksaan</h3>
                    <a href="#"><button class="button">Daftar</button></a>
            </div>
        </div>
    </div>
</section>
<!-- Bagian home selesai disini -->

@endsection