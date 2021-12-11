@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/obat/create" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_obat" class="form-label">Nama</label>
                    <select class="form-select" name="nama_obat">
                        @foreach ($medicines as$obat)
                            @if(old('nama_obat') == $obat->id)
                                <option value="{{ $obat->title }}" selected>{{ $obat->title }}</option>
                            @else
                                <option value="{{ $obat->title }}">{{ $obat->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Obat</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="1 2 3..." value="{{ old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" id="tanggal_kadaluarsa" placeholder="Ruang..." value="{{ old('tanggal_kadaluarsa') }}">
                    @error('tanggal_kadaluarsa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" placeholder="Ruang..." value="{{ old('perusahaan') }}">
                    @error('perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_obat" class="form-label">Upload Gambar Obat</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('foto_obat') is-invalid @enderror" type="file" id="foto_obat" name="foto_obat" onchange="previewImage()">
                    @error('foto_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Obat</button>
            </form>
        </div>
    </div>
</div>

<script>

    function previewImage()
    {
    const image = document.querySelector('#foto_obat');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent)
        {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection

