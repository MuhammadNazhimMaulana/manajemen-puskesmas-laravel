<header>
    <div class="container">
        <a href="#" class="logo"><span>M</span>anajemen <span>P</span>uskesmas.</span></a>

        <nav class="nav">
            <ul>
                @can('empty')
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#fasilitas">Fasilitas</a></li>
                    <li><a href="#review">Review</a></li>
                    <li><a href="#register">Register</a></li>
                @endcan
                @can('user')
                    <li><a href="/">Home</a></li>
                    <li><a href="/pendaftaran_user">Daftar</a></li>
                    <li><a href="/pasien_user">Jadwal</a></li>
                    <li><a href="/pembelian_user">Beli Obat</a></li>
                    <li><a href="/transaksi_user">Transaksi</a></li>
                @endcan
            </ul>
        </nav>

        <div class="fas fa-bars"></div>

    </div>
</header>