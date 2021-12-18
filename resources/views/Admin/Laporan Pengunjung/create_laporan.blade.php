@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/laporan/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id') == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                    <input type="number" name="jumlah_pengunjung" class="form-control @error('jumlah_pengunjung') is-invalid @enderror" id="jumlah_pengunjung" value="{{ $jml_pengunjung->jml_pasien }}" readonly>
                    @error('jumlah_pengunjung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                    <input type="number" name="jumlah_transaksi" class="form-control @error('jumlah_transaksi') is-invalid @enderror" id="jumlah_transaksi" value="{{ $jml_transaksi }}" readonly>
                    @error('jumlah_transaksi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Buat Laporan</button>
            </form>
        </div>
    </div>
</div>

@endsection

