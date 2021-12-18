@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/laporan/update/{{ $laporan->id_laporan }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id', $laporan->user_id) == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                    <input type="number" name="jumlah_pengunjung" class="form-control @error('jumlah_pengunjung') is-invalid @enderror" id="jumlah_pengunjung" value="{{ $laporan->jumlah_pengunjung }}" readonly>
                    @error('jumlah_pengunjung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                    <input type="number" name="jumlah_transaksi" class="form-control @error('jumlah_transaksi') is-invalid @enderror" id="jumlah_transaksi" value="{{ $laporan->jumlah_transaksi }}" readonly>
                    @error('jumlah_transaksi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="periode_awal" class="form-label">Periode Awal</label>
                    <input type="date" name="periode_awal" class="form-control @error('periode_awal') is-invalid @enderror" id="periode_awal" value="{{ $laporan->periode_awal  }}" readonly>
                    @error('periode_awal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="periode_akhir" class="form-label">Periode Akhir</label>
                    <input type="date" name="periode_akhir" class="form-control @error('periode_akhir') is-invalid @enderror" id="periode_akhir" value="{{ $laporan->periode_akhir  }}" readonly>
                    @error('periode_akhir')
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

