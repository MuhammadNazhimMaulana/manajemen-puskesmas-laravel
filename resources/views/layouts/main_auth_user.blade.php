<html>

<head>
    <!-- CSS Custom -->
    <link href="{{ asset('CSS/login_user.css') }}" rel="stylesheet">

    <!-- Link untuk font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

</head>

<body>
    <div class="login-div">
        <div class="logo">
            <img src="{{ asset('Images/Doctors.png') }}" alt="">
        </div>

        <div class="title">{{ $title }}</div>
        <div class="subtitle">Manajemen Puskesmas</div>

        {{-- Data --}}
        @yield('container_auth_user')

    </div>

</body>

</html>