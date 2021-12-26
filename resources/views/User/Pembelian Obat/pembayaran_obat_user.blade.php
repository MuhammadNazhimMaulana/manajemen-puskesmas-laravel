
@extends('layouts.main_user')

@section('utama')

<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-NgiArnTP4ZvhamTm"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

<section class="transaksi_detail" style="margin-top: 50px;">
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
                                    <form action="/pembelian_user/payment/{{ $transaksi->id_pembelian }}" method="POST">
                                      @csrf
                                      <div class="mt-3 mb-5 row">
                                          <label for="Editor" class="col-sm-2 col-form-label">Biaya Pembayaran</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" readonly value="{{ $transaksi->jumlah_bayar }}">
                                          </div>
                                      </div>
                                      <div class="mb-5 row">
                                          <label for="Editor" class="col-sm-2 col-form-label">Nama Pembeli</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" readonly value="{{ $transaksi->user->first_name }}">
                                          </div>
                                      </div>
                                      {{-- Order id --}}
                                      <input type="hidden" class="form-control" name="order_id" readonly value="{{ $params }}">
                                    </form>
                                    
                                      <div class="d-flex justify-content-center">
                                        <button class="tombol-beli button me-3" id="pay-button">Checkout</button>
                                        <a href="/pembelian_user/{{ $transaksi->id_pembelian }}"><button class="tombol-beli button">Kembali</button></a>
                                    </div>
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

{{-- <input type="text" id="snapToken" value="{{ $snapToken }}" readonly> --}}

<script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
</script>

@endsection
