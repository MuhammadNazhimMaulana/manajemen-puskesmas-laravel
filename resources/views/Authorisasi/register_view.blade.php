@extends('layouts.main_auth')

@section('container_auth')

<div class="card register-form">
    <div class="card-body">
        <h1 class="card-title text-center"> {{ $title }} Admin</h1>
        <div class="card-text">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
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
                    Sudah Punya Akun? <a href="/login">Ayo Login</a>
                </div>
            </form>            
        </div>
    </div>
</div>

@endsection