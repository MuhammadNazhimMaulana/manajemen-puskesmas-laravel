@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/pendaftaran/update/{{ $pendaftaran->id_daftar }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id', $pendaftaran->user_id) == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->first_name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    <label for="dokter_id" class="form-label">Dokter</label>
                    <select class="form-select" name="dokter_id">
                        @foreach ($docters as $docter)
                            @if(old('dokter_id', $pendaftaran->dokter_id) == $docter->id_dokter)
                                <option value="{{ $docter->id_dokter }}" selected>{{ $docter->nama_dokter }}</option>
                            @else
                                <option value="{{ $docter->id_dokter }}">{{ $docter->nama_dokter }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    <label for="sakit" class="form-label">Keluhan Sakit</label>
                    <textarea class="form-control @error('sakit') is-invalid @enderror" name="sakit" placeholder="Silakan deskripsikan keluhan sakit anda disini" id="sakit" style="height: 100px" >{{ $pendaftaran->sakit }}</textarea>
                    @error('sakit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kebutuhan" class="form-label">Kebutuhan</label>
                    <select class="form-select" name="kebutuhan">
                        @if(old('kebutuhan', $pendaftaran->kebutuhan) == "Urgent")
                            <option value="1" selected>{{ $pendaftaran->kebutuhan }}</option>
                            <option value="2">Tidak Urgent</option>
                        @elseif(old('kebutuhan', $pendaftaran->kebutuhan) == "Tidak Urgent") 
                            <option value="2" selected>{{ $pendaftaran->kebutuhan }}</option>
                            <option value="1">Urgent</option>
                        @else
                            <option selected>Silakan Pilih Kebutuhan</option>
                            <option value="1">Urgent</option>
                            <option value="2">Tidak Urgent</option>
                        @endif
                      </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Pendaftar</button>
            </form>
        </div>
    </div>
</div>

@endsection

