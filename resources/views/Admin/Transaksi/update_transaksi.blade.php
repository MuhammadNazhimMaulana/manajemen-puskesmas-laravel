@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/transaksi/update/{{ $transaksi->id_transaksi }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id', $transaksi->user_id) == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="pasien_id" class="form-label">Jadwal Periksa</label>
                    <select class="form-select" name="pasien_id">
                        @foreach ($pasien as $pacient)
                            @if(old('pasien_id', $transaksi->pasien_id) == $pacient->id_pasien)
                                <option value="{{ $pacient->id_pasien }}" selected>{{ $pacient->jadwal_periksa }}</option>
                            @else
                                <option value="{{ $pacient->id_pasien }}">{{ $pacient->jadwal_periksa }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    <label for="biaya_pembayaran" class="form-label">Biaya Pembayaran</label>
                    <input type="number" name="biaya_pembayaran" class="form-control @error('biaya_pembayaran') is-invalid @enderror" id="biaya_pembayaran" placeholder="Rp. " value="{{ old('biaya_pembayaran', $transaksi->biaya_pembayaran) }}">
                    @error('biaya_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tenggat_pembayaran" class="form-label">Tenggat Pembayaran</label>
                    <input type="date" name="tenggat_pembayaran" class="form-control @error('tenggat_pembayaran') is-invalid @enderror" id="tenggat_pembayaran" placeholder="Ruang..." value="{{ old('tenggat_pembayaran', $transaksi->tenggat_pembayaran) }}">
                    @error('tenggat_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_bayar" class="form-label">Tanggal Pembayaran</label>
                    <input type="date" name="tanggal_bayar" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" placeholder="Ruang..." value="{{ old('tanggal_bayar', $transaksi->tanggal_bayar) }}">
                    @error('tanggal_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_bukti_bayar" class="form-label">Upload Gambar Bukti Bayar</label>
                    <input type="hidden" name="fotoTransaksiLama" value="{{ $transaksi->foto_bukti_bayar }}">
                    {{-- Check If picture exist --}}
                    @if($transaksi->foto_bukti_bayar)
                        <img src="{{ asset('storage/' . $transaksi->foto_bukti_bayar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('foto_bukti_bayar') is-invalid @enderror" type="file" id="foto" name="foto_bukti_bayar" onchange="previewImage()">
                    @error('foto_bukti_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Transaksi</button>
            </form>
        </div>
    </div>
</div>

@endsection

