@extends('layouts.main')

@section('container')

<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">

              {{-- Awal session --}}
              <div class="board">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
              {{-- Akhir Session --}}

            <div class="card">
                <div class="card-header text-center">{{ $pengguna->first_name }} {{ $pengguna->last_name }}</div>
                <div class="card-body">
                  <h5 class="card-title">{{ $pengguna->role }}</h5>
                  <p class="card-text">{{ $pengguna->email }}</p>
                  <p class="card-text">{{ $pengguna->no_hp }}</p>
                  <a href="/dashboard" class="btn btn-primary">Dashboard</a>
                  <a href="/admin/ubah_profile" class="btn btn-info">Ubah Data</a>
                </div>
              </div>
        </div>
    </div>
    
@endsection
