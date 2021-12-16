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

        @if(session()->has('success-tambah'))
        <div class="alert alert-success" role="alert">
            {{ session('success-tambah') }}
        </div>
        @endif

        @if(session()->has('success-update'))
        <div class="alert alert-success" role="alert">
            {{ session('success-update') }}
        </div>
        @endif

        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <form action="/keranjang-obat/create" method="POST">
            @csrf

            <div class="d-flex justify-content-evenly mt-3">
                <div class="col-md-5 mb-3">
                    <label for="jumlah_bayar" class="form-label">Total Pembayaran</label>
                    <input type="number" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" placeholder="1 2 3..." value="{{ $bayar }}">
                    @error('jumlah_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-evenly mt-3">
                <button type="submit" class="btn btn-primary">Tambah Isi Keranjang</button>
            </div>
        </form>

@endsection

@section('script')
<script type="text/javascript">

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function() {
    
    // Getting prize of medicine and times it with how many that person buy
    $('#obat_id').change(function() {

        var obat_id = $('#obat_id').val();

        var action = 'get_cost';

        var id_pembelian = $('#pembelian_id').val();

        var jml_beli_obat = $('#jml_beli_obat').val();

        if (obat_id != '') {
            $.ajax({
                url: id_pembelian + "/harga_obat",
                method: "GET",
                data: {
                    obat_id: obat_id,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    $('#harga_obat').val(data.harga_satuan * jml_beli_obat);
                }
            });

        } else {
            $('#harga_obat').val('');
        }
    });

    });
</script>

@endsection