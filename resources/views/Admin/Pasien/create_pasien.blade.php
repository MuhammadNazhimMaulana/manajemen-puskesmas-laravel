@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/pasien/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id') == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->first_name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                              
                <div class="mb-3">
                    <label for="ruang_id" class="form-label">Ruang</label>
                    <select class="form-select" name="ruang_id">
                        @foreach ($rooms as $room)
                            @if(old('ruang_id') == $room->id_ruang)
                                <option value="{{ $room->id_ruang }}" selected>{{ $room->nama_ruang }}</option>
                            @else
                                <option value="{{ $room->id_ruang }}">{{ $room->nama_ruang }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    <label for="jadwal_periksa" class="form-label">Jadwal Pemeriksaan</label>
                    <input type="date" name="jadwal_periksa" class="form-control @error('jadwal_periksa') is-invalid @enderror" id="jadwal_periksa" placeholder="Ruang..." value="{{ old('jadwal_periksa') }}">
                    @error('jadwal_periksa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Silakan Beri Keterangan Sesuai yang Diinginkan" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Pasien</button>
            </form>
        </div>
    </div>
</div>

@endsection

