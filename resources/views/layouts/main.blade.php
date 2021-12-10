<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link untuk font-awesone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Link menuju CSS -->
    <link href="{{ asset('CSS/style_admin.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Manajemen Puskesmas</title>
  </head>
  <body>
    {{-- Sidebar --}}
    @include('layouts/partials.sidebar')
    
    <section id="interface">
      <div class="navigation">
        {{-- Navigation --}}
        @include('layouts/partials.navigation')
      </div>

      <h3 class="i-name">
        {{ $title }}
      </h3>
      
      {{-- Content --}} 
      @yield('container')

  </div>
</section>



    <!-- JS Bootstrap -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    {{-- Jquery --}}
    <script src="{{ asset('JS/javascript.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('JS/main.js') }}"></script>

  </body>
</html>