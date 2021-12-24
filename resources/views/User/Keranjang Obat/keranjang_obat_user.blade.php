
@extends('layouts.main_user')

@section('utama')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<section class="transaksi_detail" style="margin-top: 50px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="container mb-5 my-3 py-5">
                    <div class="col-md-12">
                        <div class="row latar" id="bookmain">
                            <div class="col-sm-12">
                                <div class="box-back">
                                    <h1 class="text-center mt-3">Keranjang Obat</h1>
                                    <hr class="gelap">
                                    <div class="book-information">

                                      {{-- Start Session --}}
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
                                      {{-- End Of Session --}}

                                      <form action="/keranjang-obat-user/payment/{{ $pembelian->id_pembelian }}" method="POST">
                                        @csrf
                                        
                                        <div class="mt-3 mb-5 row">
                                          <label for="obat_id" class="col-sm-2 col-form-label">Nama Obat</label>
                                          <div class="col-sm-10">
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
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                          <label for="pasien_id" class="col-sm-2 col-form-label">Jadwal Periksa</label>
                                          <div class="col-sm-10">
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

                                        <input name="id_pembelian" type="hidden" class="form-control" value="{{ $pembelian->id_pembelian }}">

                                        <div class="mt-3 mb-5 row">
                                            <label for="jml_beli_obat" class="col-sm-2 col-form-label">Jumlah Pembelian</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="jml_beli_obat" class="form-control @error('jml_beli_obat') is-invalid @enderror" id="jml_beli_obat" placeholder="1 2 3..." value="{{ old('jml_beli_obat') }}">
                                                @error('jml_beli_obat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="harga_obat" class="col-sm-2 col-form-label">Harga Obat</label>
                                            <div class="col-sm-10">
                                              <input type="number" name="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror" id="harga_obat" readonly>
                                              @error('harga_obat')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                              @enderror
                                            </div>
                                        </div>

                                      </form>
                                      
                                        <div class="d-flex justify-content-center">
                                          <a href="/transaksi_user/{{ $pembelian->id_pembelian }}"><button class="tombol-beli button">Kembali</button></a>
                                      </div>

                                      {{-- Tabel Keranjang --}}
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      {{-- Akhir Tabel --}}

                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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