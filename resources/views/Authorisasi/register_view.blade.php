@extends('layouts.main_auth')

@section('container_auth')

<div class="card register-form">
    <div class="card-body">
        <h1 class="card-title text-center"> {{ $title }} Admin</h1>
        <div class="card-text">
            <form action="/admin/register" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="first_name">Nama Depan</label>
                    <input type="text" name="first_name" class="form-control" required value="{{ old('first_name') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="last_name">Nama Belakang</label>
                    <input type="text" name="last_name" class="form-control" required value="{{ old('last_name') }}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control" required value="{{ old('no_hp') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required value="{{ old('password') }}">
                </div>
                <div class="form-group mt-3 d-grid gap-2">
                    <input type="submit" name="login" class="btn btn-primary" value="Register">
                </div>
            
                <div class="daftar">
                    Sudah Punya Akun? <a href="/admin/login">Ayo Login</a>
                </div>
            </form>            
        </div>
    </div>
</div>

@endsection