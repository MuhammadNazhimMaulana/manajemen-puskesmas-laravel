
@extends('layouts.main_user')

@section('utama')

<section class="user" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
               <div class="kartu_profile">
                   <div class="kontainer_gambar">
                       <div class="judul_nama">
                           <h2>{{ $pengguna->name }}</h2>
                        </div>
                    </div>
                    <div class="kontainer_utama">
                        <form action="/profil_ubah" method="POST">
                            @method('put')
                            @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $pengguna->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $pengguna->first_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $pengguna->last_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="{{ $pengguna->role }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $pengguna->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pengguna->no_hp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="hidden" class="form-control" name="old_password" value="{{ $pengguna->password }}">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            <hr>
                        </div>
                        <div class="tombol_ubah">
                            <button type="submit">
                            <span></span>    
                            Ubah Profile</button>
                        </div>
                    </form>

                    <div class="tombol_ubah">
                        <a href="/profile">
                        <span></span>    
                        Back to Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection