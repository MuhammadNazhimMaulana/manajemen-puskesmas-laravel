@extends('layouts.main')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/pasien/update/{{ $pasien->id_pasien }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                            @if(old('user_id', $pasien->user_id) == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->first_name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                @can('admin')
                <div class="mb-3">
                    <label for="dokter_id" class="form-label">Dokter</label>
                    <select class="form-select" name="dokter_id">
                        @foreach ($docters as $docter)
                            @if(old('dokter_id', $pasien->dokter_id) == $docter->id_dokter)
                                <option value="{{ $docter->id_dokter }}" selected>{{ $docter->nama_dokter }}</option>
                            @else
                                <option value="{{ $docter->id_dokter }}">{{ $docter->nama_dokter }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>
                
                <div class="mb-3">
                    <label for="ruang_id" class="form-label">Ruang</label>
                    <select class="form-select" name="ruang_id">
                        @foreach ($rooms as $room)
                            @if(old('ruang_id', $pasien->ruang_id) == $room->id_ruang)
                                <option value="{{ $room->id_ruang }}" selected>{{ $room->nama_ruang }}</option>
                            @else
                                <option value="{{ $room->id_ruang }}">{{ $room->nama_ruang }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>
                
                <div class="mb-3">
                    <label for="daftar_id" class="form-label">Keluhan</label>
                    <select class="form-select" name="daftar_id">
                        @foreach ($registrations as $registration)
                            @if(old('daftar_id', $pasien->daftar_id) == $registration->id_daftar)
                                <option value="{{ $registration->id_daftar }}" selected>{{ $registration->sakit }}</option>
                            @else
                                <option value="{{ $registration->id_daftar }}">{{ $registration->sakit }}</option>
                            @endif
                        @endforeach
                      </select>
                </div>
                @endcan()

                <div class="mb-3">
                    <label for="obat_id" class="form-label">Kebutuhan Obat</label>
                    <select class="form-select" name="obat_id">
                        @foreach ($medicines as $medicine)
                            @if(old('obat_id', $pasien->obat_id) == $medicine->id_obat)
                                <option value="{{ $medicine->id_obat }}" selected>{{ $medicine->nama_obat }}</option>
                            @else
                                <option value="{{ $medicine->id_obat }}">{{ $medicine->nama_obat }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                @can('admin')
                <div class="mb-3">
                    <label for="jadwal_periksa" class="form-label">Jadwal Pemeriksaan</label>
                    <input type="date" name="jadwal_periksa" class="form-control @error('jadwal_periksa') is-invalid @enderror" id="jadwal_periksa" placeholder="Jadwal..." value="{{ old('jadwal_periksa', $pasien->jadwal_periksa) }}">
                    @error('jadwal_periksa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @endcan()

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Silakan Beri Keterangan Sesuai yang Diinginkan" value="{{ old('keterangan', $pasien->keterangan) }}">
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Pasien</button>
            </form>
        </div>
    </div>
</div>

@endsection

