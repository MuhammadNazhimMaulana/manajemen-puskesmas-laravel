
@extends('layouts.main_user')

@section('utama')

<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-NgiArnTP4ZvhamTm"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <h1 class="text-center mb-5">Transaksi Anda</h1>
                <div class="col-md-12 tampung">
                  
                  {{-- <input type="text" id="snapToken" value="{{ $snapToken }}" readonly> --}}

                  <button id="pay-button">Pay!</button>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('c67e684f-4946-431a-a35b-8c4738ed0156');
    // customer will be redirected after completing payment pop-up
  });
</script>

@endsection
