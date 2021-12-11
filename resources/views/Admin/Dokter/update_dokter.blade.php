@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/dokter/update/{{ $dokter->id_dokter }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                    <input type="text" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" placeholder="Dokter..." value="{{ old('nama_dokter', $dokter->nama_dokter) }}">
                    @error('nama_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis Dokter</label>
                    <input type="text" name="spesialis" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" placeholder="Spesialis..." value="{{ old('spesialis', $dokter->spesialis) }}">
                    @error('spesialis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jadwal_hari" class="form-label">Jadwal Hari</label>
                    <input type="text" name="jadwal_hari" class="form-control @error('jadwal_hari') is-invalid @enderror" id="jadwal_hari" placeholder="Senin..." value="{{ old('jadwal_hari', $dokter->jadwal_hari) }}">
                    @error('jadwal_hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jadwal_waktu" class="form-label">Jadwal Jam</label>
                    <input type="text" name="jadwal_waktu" class="form-control @error('jadwal_waktu') is-invalid @enderror" id="jadwal_waktu" placeholder="09.30-..." value="{{ old('jadwal_waktu', $dokter->jadwal_waktu) }}">
                    @error('jadwal_waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_dokter" class="form-label">Upload Foto Dokter</label>
                        <input type="hidden" name="fotoDokterLama" value="{{ $dokter->foto_dokter }}">
                        {{-- Check If picture exist --}}
                        @if($dokter->foto_dokter)
                            <img src="{{ asset('storage/' . $dokter->foto_dokter) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                    <input class="form-control @error('foto_dokter') is-invalid @enderror" type="file" id="foto_dokter" name="foto_dokter" onchange="previewImage()">
                    @error('foto_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Dokter</button>
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

