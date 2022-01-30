
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
                                    <h1 class="text-center mt-3">Keranjang Obat</h1>
                                    <hr class="gelap">
                                    <div class="book-information">

                                      {{-- Start Session --}}
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
                                      {{-- End Of Session --}}

                                      <form action="/keranjang-obat-user/create" method="POST">
                                        @csrf
                                        
                                        <div class="mt-3 mb-5 row">
                                          <label for="obat_id" class="col-sm-2 col-form-label">Nama Obat</label>
                                          <div class="col-sm-10">
                                            <select class="form-select" name="obat_id" id="obat_id">
                                                @foreach ($medicines as $medicine)
                                                    @if(old('obat_id') == $medicine->id_obat)
                                                        <option data-harga="{{ $medicine->harga_satuan }}" value="{{ $medicine->id_obat }}" selected>{{ $medicine->nama_obat }}</option>
                                                    @else
                                                        <option data-harga="{{ $medicine->harga_satuan }}" value="{{ $medicine->id_obat }}">{{ $medicine->nama_obat }}</option>
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

                                        <input name="pembelian_id" type="hidden" class="form-control" value="{{ $pembelian->id_pembelian }}">

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

                                        <div class="d-flex justify-content-center mb-4">
                                          <button type="submit" class="tombol-beli button">Tambah</button>
                                      </div>

                                      </form>
                                      
                                      {{-- Tabel Keranjang --}}
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">Jumlah Beli</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($carts as $cart)
                                          <tr>
                                            <td>{{ $cart->obat_model->nama_obat }}</td>
                                            <td>{{ $cart->jml_beli_obat }}</td>
                                            <td>{{ $cart->harga_obat }}</td>
                                            <td>
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
                                      {{-- Akhir Tabel --}}

                                      {{-- Menuju Checkout --}}
                                      <form action="/pembelian_user/payment/{{ $pembelian->id_pembelian }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $pembelian->id_pembelian }}">  
                                        <input type="hidden" name="jml_bayaran" id="jml_bayaran" value="{{ $total_beli->jml_bayar }}">  
                                        <div class="d-flex justify-content-center mt-3">
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

    {{-- Memanggil Modal Update --}}
    @include('User/Keranjang Obat/Modal.update_keranjang_user')

    {{-- Memanggil Modal Delete --}}
    @include('User/Keranjang Obat/Modal.delete_keranjang_user')

@endsection

@section('script')
<script type="text/javascript">
$("[name='jml_beli_obat']").on('input', function(e) {
    e.preventDefault()
    harga = $("[name='obat_id'] option:selected").data('harga')
    qty = $(this).val()
    $("[name='harga_obat']").val(harga * qty)
})
</script>

@endsection