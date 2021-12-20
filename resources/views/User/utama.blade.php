@extends('layouts.main_user')

@section('utama')

<!-- Bagian Header Mulai dari sini -->

<header>
    <div class="container">
        <a href="#" class="logo"><span>M</span>anajemen <span>P</span>uskesmas.</span></a>

        <nav class="nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#fasilitas">Fasilitas</a></li>
                <li><a href="#review">Review</a></li>
                <li><a href="#register">Register</a></li>
                <li><a href="#penjualan">penjualan Obat</a></li>
            </ul>
        </nav>

        <div class="fas fa-bars"></div>

    </div>
</header>

<!-- Bagian Header Selesai di sini -->

<!-- Bagian Home mulai dari sini -->
<section class="home" id="home">
    <div class="container mt-5 pr-5">
        <div class="row  align-items-center text-center text-md-left">
            <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                <img src="{{ asset('Images/Doctors.png') }}" width="100%" alt="">
            </div>
            <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                <h1><span>Tetap </span> aman, <span>tetap</span> sehat.</h1>
                <h3>Peduli pada kalian.</h3>
                <a href=""><button class="button">Belajar Lebih</button></a>
            </div>
        </div>
    </div>
</section>

<!-- Bagian home selesai disini -->

<!-- Bagian About mulai disini -->
<section class="about" id="about">
    <div class="container mt-5 pt-5">
        <div class="row  align-items-center">
            <div class="col-md-6 content" data-aos="fade-right">
                <div class="box">
                    <h3><i class="fas fa-ambulance"></i>Layanan Ambulans</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="box">
                    <h3><i class="fas fa-procedures"></i>Ruang darurat</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="box">
                    <h3><i class="fas fa-stethoscope"></i>Checkup Gratis</h3>
                    <p style="margin-bottom: 15px;">Lakukan Pemeriksaan dengan dokter untuk info lebih</p>
                    <a style="margin-left: 200px;" href=""><button class="button">Cek Dokter</button></a>
                </div>
            </div>
            <div class=" col-md-6 d-none d-md-block" data-aos="fade-left">
                <img src="{{ asset('Images/about.png') }}" width="100%" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Bagian about selesai disini -->

<!-- Bagian Fasilitas dimulai disini -->
<section class="fasilitas" id="fasilitas">
    <div class="container">
        <h1 class="heading"><span>'</span>Fasilitas Kami<span>'</span></h1>
        <div class="box-container">
            <div class="box" data-aos="zoom-in">
                <a href="" title="Fasilitas">
                    <img src="" alt="">
                </a>
            </div>
            <div class="box" data-aos="zoom-in">
                <a href="" title="Ruang Kimia">
                    <img src="" alt="">
                </a>
            </div>
            <div class="box" data-aos="zoom-in">
                <a href="" title="Ruang Kimia">
                    <img src="" alt="">
                </a>
            </div>
            <div class="box" data-aos="zoom-in">
                <a href="" title="Koridor">
                    <img src="" alt="">
                </a>
            </div>
            <div class="box" data-aos="zoom-in">
                <a href="" title="Operasi">
                    <img src="" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Bagian fasilitas selesai disini -->

<!-- Bagian review mulai disini -->

<section class="review" id="review">
    <div class="container">
        <h1 class="heading"><span>'</span>Review Orang<span>'</span></h1>
        <div class="box-container">
            <div class="box" data-aos="fade-right">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                <h3>Nama orang</h3>
                <span>Mei 10, 2021</span>
                <img src="" alt="">
            </div>
            <div class="box" data-aos="fade-up">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                <h3>Nama orang</h3>
                <span>Mei 10, 2021</span>
                <img src="" alt="">
            </div>
            <div class="box" data-aos="fade-left">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                <h3>Nama orang</h3>
                <span>Mei 10, 2021</span>
                <img src="" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Bagian review selesai disni -->

<!-- Bagian counter mulai disini -->

<section class="counter">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <i class="fas fa-hospital"></i>
                <span>120+</span>
                <h3>Rumah Sakit</h3>
            </div>

            <div class="box" data-aos="fade-up">
                <i class="fas fa-users"></i>
                <span>100+</span>
                <h3>Staf</h3>
            </div>

            <div class="box" data-aos="fade-up">
                <i class="fas fa-smile"></i>
                <span>1200+</span>
                <h3>Pasien Senang</h3>
            </div>

            <div class="box" data-aos="fade-up">
                <i class="fas fa-procedures"></i>
                <span>150+</span>
                <h3>Kamar Tidur</h3>
            </div>
        </div>
    </div>
</section>

<!-- Bagian counter selesai disini -->


<!-- Bagian kontak mulai disini -->

<section class="contact" id="register">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="heading"><span>'</span>Lakukan Pendaftaran<span>'</span></h1>
            <div class="col-md-10" data-aos="flip-down">
                <form action="" method="post">
                    <div class="inputBox">
                        <input type="text" name="firstname" placeholder="Nama Depan">
                        <input type="text" name="lastname" placeholder="Nama Belakang">
                    </div>

                    <div class="inputBox">
                        <input type="number" name="ktp" placeholder="Nomor KTP">
                        <input type="text" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="kota" placeholder="Kota Asal">
                        <input type="text" name="provinsi" placeholder="Provinsi Asal">
                        <input type="number" name="kode_pos" placeholder="Kode Pos">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" placeholder="Email Anda">
                        <input type="password" name="password" placeholder="Password akun anda">
                    </div>

                    <input type="submit" name="simpan" id="" value="Lakukan pendaftaran" class="button">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bagian kontak selesai disini -->


<!-- Bagian post dimulai disini -->
<section class="post" id="post">
    <div class="container ">
        <h1 class="heading"><span>'</span>Postingan keluar<span>'</span></h1>

        <div class="box-container">
            <div class="box" data-aos="fade-right">
                <img src="" alt="">
                <div class="content">
                    <span>Jan 5, 2021</span>
                    <a href="">
                        <h3>Judul postingan</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi sed impedit adipisci quod ducimus dolore eaque quo cupiditate non, aliquam magnam corporis magni, officia ipsam. Odit nobis repellat quisquam neque!</p>
                    <a href=""><button class="button">Belajar lebih</button></a>
                </div>
            </div>
            <div class="box" data-aos="fade-up">
                <img src="" alt="">
                <div class="content">
                    <span>Jan 5, 2021</span>
                    <a href="">
                        <h3>Judul postingan</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi sed impedit adipisci quod ducimus dolore eaque quo cupiditate non, aliquam magnam corporis magni, officia ipsam. Odit nobis repellat quisquam neque!</p>
                    <a href=""><button class="button">Belajar lebih</button></a>
                </div>
            </div>
            <div class="box" data-aos="fade-left">
                <img src="" alt="">
                <div class="content">
                    <span>Jan 5, 2021</span>
                    <a href="">
                        <h3>Judul postingan</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi sed impedit adipisci quod ducimus dolore eaque quo cupiditate non, aliquam magnam corporis magni, officia ipsam. Odit nobis repellat quisquam neque!</p>
                    <a href=""><button class="button">Belajar lebih</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bagian psot selesai disini -->

@endsection