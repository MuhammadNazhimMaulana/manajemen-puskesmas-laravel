@extends('../layouts/main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/ruang/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_ruang" class="form-label">Nama Ruang</label>
                    <input type="text" name="nama_ruang" class="form-control @error('nama_ruang') is-invalid @enderror" id="nama_ruang" placeholder="Ruang..." value="{{ old('nama_ruang') }}">
                    @error('nama_ruang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas Ruang</label>
                    <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" placeholder="1 2 3..." value="{{ old('ruang') }}">
                    @error('kapasitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Ruang</button>
            </form>
        </div>
    </div>
</div>

@endsection

