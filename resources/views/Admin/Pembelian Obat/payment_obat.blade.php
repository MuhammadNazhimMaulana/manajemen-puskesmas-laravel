@extends('layouts.main')

@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="values">

    <div class="board">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <form action="/pembelian/payment/{{ $pembelian->id_pembelian }}" method="POST">
            @method('put')
            @csrf

            <div class="d-flex justify-content-evenly mt-3">
                <div class="col-md-5 mb-3">
                    <label for="ppn" class="form-label">PPN</label>
                    <input type="number" name="ppn" id="ppn" class="form-control @error('ppn') is-invalid @enderror" id="ppn" value="0.1" readonly>
                    @error('ppn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-5 mb-3">
                    <label for="jumlah_bayar" class="form-label">Total Pembayaran</label>
                    <input type="hidden" id="old_jumlah_bayar" class="form-control" value="{{ $pembelian->jumlah_bayar }}">
                    <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" placeholder="1 2 3..." value="" readonly>
                    @error('jumlah_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            {{-- Input Todays Date --}}
            <input type="hidden" name="tgl_bayar" class="form-control" value="{{ $today }}">

            <div class="d-flex justify-content-center mt-3">
                <div class="col-md-10 mb-3">
                    <label for="tgl_tenggat" class="form-label">Tenggat Pembayaran</label>
                    <input type="date" id="tgl_tenggat" name="tgl_tenggat" class="form-control @error('tgl_tenggat') is-invalid @enderror" value="{{ $deadline }}" readonly>
                    @error('tgl_tenggat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary me-3" value="Bayar Sendiri" name="bayar">Mandiri</button>
                <button type="submit" class="btn btn-primary" value="Bayar Kasir" name="bayar">Bayar</button>
            </div>
        </form>

@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function() {
    
    // Getting prize of medicine and times it with how many that person buy
        var old_jumlah_bayar = $('#old_jumlah_bayar').val();

        var ppn = $('#ppn').val();

        if (old_jumlah_bayar != '') {

            $('#jumlah_bayar').val(parseInt(old_jumlah_bayar) + parseInt((old_jumlah_bayar * ppn)));

        } else {
            $('#jumlah_bayar').val('');
        }

    });
</script>

@endsection