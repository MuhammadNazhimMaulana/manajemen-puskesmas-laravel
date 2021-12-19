<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Puskesmas</title>

    <!-- AOS jdn link css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />

    <!-- magnific popup css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" />

    <!-- Bootstrap cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-grid.min.css" integrity="sha512-cKoGpmS4czjv58PNt1YTHxg0wUDlctZyp9KUxQpdbAft+XqnyKvDvcGX0QYCgCohQenOuyGSl8l1f7/+axAqyg==" crossorigin="anonymous" />

    <!-- fotn awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- oofline bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- File CSS custom -->
    <link rel="stylesheet" href="{{ asset('CSS/style_user.css') }}">
</head>

<body>

    @yield('utama')

    <!-- Bagian Footer mulai disni -->

    <section class="footer">
        <div class="container">
            <div class="row" style="margin-bottom:10px;">
                <div class="col-md-4" data-aos="fade-right">
                    <a style="margin-top: 20px;" href="#" class="logo"><span>M</span>anajemen <span>P</span>uskesmas.</span></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vitae totam libero possimus blanditiis.</p>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <h3>links</h3>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Fasilitas</a>
                    <a href="#">Review</a>
                    <a href="#">Kontak</a>
                    <a href="#">Post</a>
                </div>

                <div class="col-md-4" data-aos="fade-left">
                    <h3>Share</h3>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Instagram</a>
                    <a href="#">Github</a>
                </div>

            </div>
        </div>

        <h1 class="credit">Dibuat oleh <span>Muhammad Nazhim Maulana</span>| All right reserved.</h1>


    </section>

    <!-- Bagian Footer selesai disini -->


    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <!-- Magnific popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous"></script>

    <!-- AOS jdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{ asset('JS/utama.js') }}"></script>


    <script>
        AOS.init({
            duration: 1000,
            delay: 400
        })
    </script>


</body>

</html>