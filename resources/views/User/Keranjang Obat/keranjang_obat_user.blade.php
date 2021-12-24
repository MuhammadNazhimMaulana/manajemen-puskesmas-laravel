
@extends('layouts.main_user')

@section('utama')

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
                                      <form action="/keranjang-obat-user/payment/{{ $pembelian->id_pembelian }}" method="POST">
                                        @csrf
                                        <div class="mt-3 mb-5 row">
                                            <label for="id_pembelian" class="col-sm-2 col-form-label">Nomor Pembelian</label>
                                            <div class="col-sm-10">
                                                <input name="id_pembelian" type="text" class="form-control" readonly value="{{ $pembelian->id_pembelian }}">
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