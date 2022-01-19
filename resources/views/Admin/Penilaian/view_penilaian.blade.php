@extends('layouts.main')

@section('container')
<div class="values">
    <div class="board">
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Tanggal Penilaian</td>
                    <td>Skor Pelayanan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian as $scoring)
                <tr>
                    <td>{{ $scoring->created_at }}</td>
                    <td>{{ $scoring->skor_pelayanan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
        </div>

    </div>
</div>
@endsection
