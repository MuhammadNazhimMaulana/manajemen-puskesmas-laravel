<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-NgiArnTP4ZvhamTm"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>

 {{-- <input type="text" id="snapToken" value="{{ $snapToken }}" readonly> --}}
 
  <body>
    <button id="pay-button">Pay!</button>
 
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('25ba824c-3754-41ce-bd54-c6736e049eff');
        // customer will be redirected after completing payment pop-up
      });
    </script>
  </body>
</html>