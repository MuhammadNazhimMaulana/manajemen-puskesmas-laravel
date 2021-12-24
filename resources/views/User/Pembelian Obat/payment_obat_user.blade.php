
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
                                    <h1 class="text-center mt-3">Pembayaran Obat</h1>
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

                                      <form action="/keranjang-obat-user/create" method="POST">
                                        @csrf
                                        
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

                                        <div class="d-flex justify-content-center mb-4">
                                          <button type="submit" class="tombol-beli button">Tambah</button>
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
