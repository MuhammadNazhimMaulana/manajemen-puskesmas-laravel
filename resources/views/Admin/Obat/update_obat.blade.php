@extends('layouts.main')

@section('container')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/obat/update/{{ $obat->id_obat }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="nama_obat" class="form-label">Nama Obat</label>
                    <select class="form-select" name="nama_obat" id="nama_obat">
                        @foreach ($medicines as $medicine)
                            @if(old('nama_obat', $obat->nama_obat) == $medicine->title)
                                <option value="{{ $medicine->title }}" selected>{{ $medicine->title }}</option>
                            @else
                                <option value="{{ $medicine->title }}">{{ $medicine->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Obat</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="1 2 3..." value="{{ old('stok', $obat->stok) }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" value="{{ old('harga_satuan', $obat->harga_satuan) }}" readonly>
                    @error('harga_satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" id="tanggal_kadaluarsa" placeholder="Ruang..." value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}">
                    @error('tanggal_kadaluarsa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" placeholder="Ruang..." value="{{ old('perusahaan', $obat->perusahaan) }}">
                    @error('perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_obat" class="form-label">Upload Gambar Obat</label>
                    <input type="hidden" name="fotoObatLama" value="{{ $obat->foto_obat }}">
                        {{-- Check If picture exist --}}
                        @if($obat->foto_obat)
                            <img src="{{ asset('storage/' . $obat->foto_obat) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                    <input class="form-control @error('foto_obat') is-invalid @enderror" type="file" id="foto" name="foto_obat" onchange="previewImage()">
                    @error('foto_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Ubah Obat</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- Getting automatic value --}}
<script type="text/javascript">

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function() {

    $('#nama_obat').change(function() {

        var nama_obat = $('#nama_obat').val();

        var action = 'get_harga_obat';

        if (nama_obat != '') {
            $.ajax({
                url:"../get_harga",
                method: "GET",
                data: {
                    nama_obat: nama_obat,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    $('#harga_satuan').val(data.data_obat[0].id * 10000);
                }
            });

        } else {
            $('#harga_satuan').val('');
        }
    });

    });
</script>

@endsection

