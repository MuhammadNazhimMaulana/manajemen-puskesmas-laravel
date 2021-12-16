@foreach ($carts as $cart)
{{-- Modal Update --}}
<div class="modal fade" id="ModalUpdate{{ $cart->id_keranjang }}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/keranjang-obat/update/{{ $cart->id_keranjang }}" method="POST">
                @method('put')
                @csrf

                <!-- Awal Input Item -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" value="{{  $cart->obat_model->nama_obat }}" disabled>
                    </div>

                    {{-- Input Hidden --}}
                        <input type="hidden" name="harga_obat" id="harga_obat" value="{{ $cart->obat_model->harga_satuan }}">    
                        <input type="hidden" name="pembelian_id" id="pembelian_id" value="{{ $cart->pembelian_id }}">    
                        <input type="hidden" name="obat_id" id="obat_id" value="{{ $cart->obat_id }}">    
                        <input type="hidden" name="pasien_id" id="pasien_id" value="{{ $cart->pasien_id }}">    

                    <div class="col-md-6 mb-3">
                        <label for="jml_beli_obat" class="form-label">Jumlah Beli</label>
                        <input type="number" name="jml_beli_obat" class="form-control @error('jml_beli_obat') is-invalid @enderror" id="jml_beli_obat" placeholder="1 2 3..." value="{{ old('jml_beli_obat', $cart->jml_beli_obat) }}">
                        @error('jml_beli_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
        </div>

    </div>
</div>
@endforeach