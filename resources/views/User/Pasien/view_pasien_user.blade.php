
@extends('layouts.main_user')

@section('utama')


<section class="pasien" style="margin-top: 150px; margin-bottom:100px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="col" style="margin-bottom: 100px;">
                    <h1 class="text-center">Jadwal Pemeriksaan</h1>
                </div>
                <div class="col-md-12">
                    <table class="jadwal" style="font-size: 1.5rem;">
                        <tr class="test">
                            <th>Nama Pasien</th>
                            <th>Jadwal Periksa</th>
                            <th>Pemeriksa</th>
                            <th>Ruang</th>
                            <th>Pendaftaran</th>
                        </tr>
                        @foreach ($pasien as $pacient)        
                            <tr>
                                <td>{{ $pacient->user->first_name }}</td>
                                <td>{{ $pacient->jadwal_periksa }}</td>
                                <td>{{ $pacient->dokter_model->nama_dokter }}</td>
                                <td>{{ $pacient->ruang_model->nama_ruang }}</td>
                                <td>{{ $pacient->pendaftaran_model->kebutuhan }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="page">
                    {{ $pasien->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection