
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
                                    <h1 class="text-center mt-3">Form Pendaftaran</h1>
                                    <hr class="gelap">
                                    <div class="book-information">

                                      <form action="/pendaftaran_user/create" method="POST">
                                        @csrf
                                        
                                        <div class="mt-3 mb-5 row">
                                            <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="user_id" class="form-control" value="{{ $user->id }}" readonly>
                                                <input type="text" class="form-control" value="{{ $user->first_name }}" readonly>

                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="spesialis" class="col-sm-2 col-form-label">Spesialis Dokter</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="spesialis">
                                                    @foreach ($docters as $docter)
                                                        @if(old('spesialis') == $docter->id_dokter)
                                                            <option value="{{ $docter->spesialis }}" selected>{{ $docter->spesialis }}</option>
                                                        @else
                                                            <option value="{{ $docter->spesialis }}">{{ $docter->spesialis }}</option>
                                                        @endif
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="dokter_id" class="col-sm-2 col-form-label">Nama Dokter</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="dokter_id">
                                                        <option value="">Pilih Dokter</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="sakit" class="col-sm-2 col-form-label">Keluhan Sakit</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="sakit" class="form-control @error('sakit') is-invalid @enderror">
                                                @error('sakit')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-5 row">
                                            <label for="kebutuhan" class="col-sm-2 col-form-label">Kebutuhan</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="kebutuhan">
                                                    <option selected>Silakan Pilih Kebutuhan</option>
                                                    <option value="1">Urgent</option>
                                                    <option value="2">Tidak Urgent</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                          <button type="submit" class="tombol-beli button">Daftar</button>
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

{{-- Ajax --}}
@section('script')
<script type="text/javascript">
$("[name='spesialis']").on('click', function(e) {
    e.preventDefault()
    e.preventDefault()
  spesialis = $(this).val()
  $.ajax({
    url: "http://127.0.0.1:8000/pendaftaran_user/create/" + spesialis,
    type: "GET",
    dataType: "html",
    data: {}
  })
  .done(function(data) {
    $("[name='dokter_id']").html(data)
  })
})
</script>

@endsection