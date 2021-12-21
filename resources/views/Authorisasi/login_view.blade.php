@extends('layouts.main_auth')

@section('container_auth')

<div class="card login-form">
    <div class="card-body">
        <h1 class="card-title text-center"> {{ $title }} Admin</h1>

        {{-- Tampilan Berhasil Register --}}
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Tampilan Gagal Login --}}
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-text">
            <form action="/admin/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" autofocus value="{{ old('username') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group mt-3 d-grid gap-2">
                    <input type="submit" name="login" class="btn btn-primary" value="login">
                </div>
            
                <div class="daftar">
                    Tidak Punya Akun? <a href="/admin/register">Ayo Daftar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection