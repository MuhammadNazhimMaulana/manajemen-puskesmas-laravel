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

        @if(session()->has('kebanyakan'))
        <div class="alert alert-danger" role="alert">
            {{ session('kebanyakan') }}
        </div>
        @endif

        @if(session()->has('tambah-double'))
        <div class="alert alert-danger" role="alert">
            {{ session('tambah-double') }}
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
                <div class="d-flex justify-content-evenly">
                    <div class="col-md-5 mb-3">
                        <label for="obat_id" class="form-label">Nama Obat</label>
                        <select class="form-select" name="obat_id" id="obat_id">
                            @foreach ($medicines as $medicine)
                                @if(old('obat_id') == $medicine->id_obat)
                                    <option value="{{ $medicine->id_obat }}" selected>{{ $medicine->nama_obat }}</option>
                                @else
                                    <option value="{{ $medicine->id_obat }}">{{ $medicine->nama_obat }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Input Id Pembelian --}}
                        <input type="hidden" name="pembelian_id" id="pembelian_id" value="{{ $pembelian->id_pembelian }}">

                    <div class="col-md-5 mb-3">
                        <label for="pasien_id" class="form-label">Jadwal Periksa</label>
                        <select class="form-select" name="pasien_id">
                            @foreach ($pasien as $pacient)
                                @if(old('pasien_id') == $pacient->id_pasien)
                                    <option value="{{ $pacient->id_pasien }}" selected>{{ $pacient->jadwal_periksa }}</option>
                                @else
                                    <option value="{{ $pacient->id_pasien }}">{{ $pacient->jadwal_periksa }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="d-flex justify-content-evenly mt-3">
                <div class="col-md-5 mb-3">
                    <label for="jml_beli_obat" class="form-label">Jumlah Beli</label>
                    <input type="number" name="jml_beli_obat" class="form-control @error('jml_beli_obat') is-invalid @enderror" id="jml_beli_obat" placeholder="1 2 3..." value="{{ old('jml_beli_obat') }}">
                    @error('jml_beli_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-5 mb-3">
                    <label for="harga_obat" class="form-label">Harga Obat</label>
                    <input type="number" name="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror" id="harga_obat" readonly>
                    @error('harga_obat')
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

{{-- Tabel Hasil Input --}}
    <div class="d-flex justify-content-center mt-3">
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Obat</td>
                    <td>Jumlah Beli</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->obat_model->nama_obat }}</td>
                    <td class="text-center">{{ $cart->jml_beli_obat }}</td>
                    <td>{{ $cart->harga_obat }}</td>
                    <td class="aksi">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $cart->id_keranjang }}">Edit</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $cart->id_keranjang }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total Belanja</td>
                    <td colspan="2">{{ $total_beli->jml_bayar }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="/pembelian/payment/{{ $pembelian->id_pembelian }}" method="POST">
        @csrf
        <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $pembelian->id_pembelian }}">  
        <input type="hidden" name="jml_bayaran" id="jml_bayaran" value="{{ $total_beli->jml_bayar }}">  
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Pembayaran</button>
        </div>
    </form>
  
    {{-- Memanggil Modal Update --}}
    @include('Admin/Keranjang Obat/Modal.update_keranjang')

    {{-- Memanggil Modal Delete --}}
    @include('Admin/Keranjang Obat/Modal.delete_keranjang')

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