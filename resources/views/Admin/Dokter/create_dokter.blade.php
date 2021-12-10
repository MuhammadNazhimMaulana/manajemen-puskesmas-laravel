@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/dokter/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                    <input type="text" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" placeholder="Ruang..." value="{{ old('nama_dokter') }}">
                    @error('nama_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis Dokter</label>
                    <input type="text" name="spesialis" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" placeholder="1 2 3..." value="{{ old('ruang') }}">
                    @error('spesialis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jadwal_hari" class="form-label">Jadwal Hari</label>
                    <input type="text" name="jadwal_hari" class="form-control @error('jadwal_hari') is-invalid @enderror" id="jadwal_hari" placeholder="1 2 3..." value="{{ old('ruang') }}">
                    @error('jadwal_hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jadwal_jam" class="form-label">Jadwal Jam</label>
                    <input type="text" name="jadwal_jam" class="form-control @error('jadwal_jam') is-invalid @enderror" id="jadwal_jam" placeholder="1 2 3..." value="{{ old('ruang') }}">
                    @error('jadwal_jam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_dokter" class="form-label">Upload Foto Dokter</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('foto_dokter') is-invalid @enderror" type="file" id="foto_dokter" name="foto_dokter" onchange="previewImage()">
                    @error('foto_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Dokter</button>
            </form>
        </div>
    </div>
</div>

<script>

    function previewImage()
    {
    const image = document.querySelector('#foto_dokter');
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

