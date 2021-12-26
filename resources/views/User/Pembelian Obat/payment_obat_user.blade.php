
@extends('layouts.main_user')

@section('utama')

<section class="keranjang_detail" style="margin-top: 50px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="container mb-5 my-3 py-5">
                    <div class="col-md-12">
                        <div class="row latar" id="bookmain">
                            <div class="col-sm-12">
                                <div class="box-back">
                                    <h1 class="text-center mt-3">Total Pembayaran</h1>
                                    <hr class="gelap">
                                    <div class="book-information">

                                      {{-- Start Session --}}
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
                                      {{-- End Of Session --}}

                                      <form action="/pembelian_user/payment/{{ $pembelian->id_pembelian }}" method="POST">
                                        @method('put')
                                        @csrf
                                        
                                        <div class="mt-3 mb-5 row">
                                            <label for="ppn" class="col-sm-2 col-form-label">PPN</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="ppn" class="form-control @error('ppn') is-invalid @enderror" id="ppn" value="0.1" readonly>
                                                @error('ppn')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Pembelian</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" id="old_jumlah_bayar" class="form-control" value="{{ $pembelian->jumlah_bayar }}">
                                                <input type="number" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" readonly>
                                                @error('jumlah_bayar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="tgl_tenggat" class="col-sm-2 col-form-label">Jumlah Pembelian</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl_tenggat" class="form-control @error('tgl_tenggat') is-invalid @enderror" id="tgl_tenggat" value="{{ $deadline }}" readonly>
                                                @error('tgl_tenggat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                          <button type="submit" class="tombol-beli button">Pembayaran</button>
                                      </div>

                                      </form>
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
