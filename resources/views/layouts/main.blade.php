<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link untuk font-awesone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Link menuju CSS -->
    <link href="CSS/style_admin.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Manajemen Puskesmas</title>
  </head>
  <body>

    {{-- Navbar --}}
    @include('layouts/partials.navbar')

    {{-- Content --}}
      <div class="container">
            @yield('container')
      </div>

    <!-- JS Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>