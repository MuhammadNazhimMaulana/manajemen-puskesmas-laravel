<!-- Modal -->
<div class="modal fade" id="ModalNilai" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalNilaiLabel">Penilaian Pelayanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      {{-- Awal Form --}}
      <form action="/penilaian" method="POST">
        @csrf
      <div class="modal-body">

        <div class="mb-3">
          <label for="nama_penilai" class="form-label">Nama Penilai</label>
          <input type="text" class="form-control @error('nama_penilai') is-invalid @enderror" value="{{ $pembelian->user->first_name }} {{ $pembelian->user->last_name }}" name="nama_penilai" readonly>
          @error('nama_penilai')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

          {{-- Get user id --}}
          <input type="hidden" name="user_id" class="form-control" value="{{ $pembelian->user->id }}" readonly>
          <input type="hidden" name="transaksi_id" class="form-control" value="{{ $pembelian->transaksi_id }}" readonly>
          <input type="hidden" name="pembelian_id" class="form-control" value="{{ $pembelian->id_pembelian }}" readonly>

        <div class="nilai-css">
          <label for="skor_pelayanan" class="form-label">Rating</label>
            <div class="star-icon">
                <input type="radio" value="1" name="skor_pelayanan" checked id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="skor_pelayanan" id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="skor_pelayanan" id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="skor_pelayanan" id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="skor_pelayanan" id="rating5">
                <label for="rating5" class="fa fa-star"></label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {{-- Akhir Form --}}
      </form>

    </div>
  </div>
</div>