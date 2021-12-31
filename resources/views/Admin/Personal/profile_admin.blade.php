@extends('layouts.main')

@section('container')

<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Nama Pengguna</div>
                <div class="card-body">
                  <h5 class="card-title">Role</h5>
                  <p class="card-text">Keterangan</p>
                  <a href="#" class="btn btn-primary">Dashboard</a>
                  <a href="/admin/ubah_profile" class="btn btn-info">Ubah Data</a>
                </div>
              </div>
        </div>
    </div>
    
@endsection
