@extends('layouts.main')

@section('container')
<div class="values">

    <div class="board">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <div class="d-flex justify-content-evenly">
            <div class="col-md-5 mb-3">
                <label for="obat_id" class="form-label">Nama Obat</label>
                <select class="form-select" name="obat_id">
                    @foreach ($medicines as $medicine)
                        @if(old('obat_id') == $medicine->id_obat)
                            <option value="{{ $medicine->id_obat }}" selected>{{ $medicine->nama_obat }}</option>
                        @else
                            <option value="{{ $medicine->id_obat }}">{{ $medicine->nama_obat }}</option>
                        @endif
                    @endforeach
                  </select>

            </div>

            {{-- Input Id Pembelian --}}
                <input type="hidden" name="pembelian_id" value="{{ $pembelian->id_pembelian }}">

            <div class="col-md-5 mb-3">
                <label for="pasien_id" class="form-label">Jadwal Periksa</label>
                <select class="form-select" name="pasien_id">
                    @foreach ($pasien as $pacient)
                        @if(old('pasien_id') == $pacient->id_pasien)
                            <option value="{{ $pacient->id_pasien }}" selected>{{ $pacient->jadwal_periksa }}</option>
                        @else
                            <option value="{{ $pacient->id_pasien }}">{{ $pacient->jadwal_periksa }}</option>
                        @endif
                    @endforeach
                  </select>
            </div>
        </div>

    <div class="d-flex justify-content-evenly mt-3">
        <div class="col-md-5 mb-3">
            <label for="jml_beli_obat" class="form-label">Jumlah Beli</label>
            <input type="number" name="jml_beli_obat" class="form-control @error('jml_beli_obat') is-invalid @enderror" id="jml_beli_obat" placeholder="1 2 3..." value="{{ old('ruang') }}">
            @error('jml_beli_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-5 mb-3">
            <label for="harga_obat" class="form-label">Harga Obat</label>
            <input type="number" name="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror" id="harga_obat" readonly>
            @error('harga_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

{{-- Tabel Hasil Input --}}
    <div class="d-flex justify-content-center mt-3">
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Obat</td>
                    <td>Jumlah Beli</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
        </table>
    </div>

    </div>
</div>
@endsection
