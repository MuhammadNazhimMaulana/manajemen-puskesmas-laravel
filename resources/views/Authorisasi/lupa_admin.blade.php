@extends('layouts.main_auth')

@section('container_auth')

<div class="card login-form">
    <div class="card-body">
        <h1 class="card-title text-center"> {{ $title }} Admin</h1>

        {{-- Tampilan Email Tidak ada --}}
        @if(session()->has('emailnotFound'))
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            {{ session('emailnotFound') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-text">
            <form action="/admin/forgetPass_admin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" autofocus value="{{ old('email') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group mt-3 d-grid gap-2">
                    <input type="submit" name="login" class="btn btn-primary" value="Ubah Password">
                </div>
            
            </form>
        </div>
    </div>
</div>

@endsection