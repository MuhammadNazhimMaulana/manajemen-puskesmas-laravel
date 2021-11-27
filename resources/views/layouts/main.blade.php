<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Manajemen Puskesmas</title>
  </head>
  <body>

    {{-- Navbar --}}
    @include('layouts/partials.navbar')

    {{-- Content --}}
      <div class="container mt-4">
          @yield('container')
      </div>


    <!-- JS Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>