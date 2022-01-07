<section id="menu">
    <div class="logo">
        <img src="{{ asset('Images/Bonevian.png') }}">
        <h2>Manajemen Puskesmas</h2>
    </div>

    <div class="items">
        <li class="{{ ($title == "Dashboard") ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i><a href="/dashboard">Dashboard</a></li>
        @can('admin')
            <li class="{{ ($title == "Dokter") ? 'active' : '' }}"><i class="fas fa-user-md"></i><a href="/dokter">Dokter</a></li>
            <li class="{{ ($title == "Laporan Pengunjung") ? 'active' : '' }}"><i class="fas fa-file"></i><a href="/laporan">Laporan</a></li>
        @endcan
        @canany(['admin', 'apoteker'])
            <li class="{{ ($title == "Obat") ? 'active' : '' }}"><i class="fas fa-tablets"></i><a href="/obat">Obat</a></li>
        @endcanany
        @can('admin')
            <li class="{{ ($title == "Pendaftaran") ? 'active' : '' }}"><i class="fas fa-registered"></i><a href="/pendaftaran">Pendaftaran</a></li>
        @endcan
        @canany(['admin', 'dokter'])
            <li class="{{ ($title == "Pasien") ? 'active' : '' }}"><i class="fas fa-procedures"></i><a href="/pasien">Pasien</a></li>
        @endcanany
        @canany(['kasir', 'admin', 'apoteker'])
            <li class="{{ ($title == "Pembelian Obat") ? 'active' : '' }}"><i class="fas fa-shopping-cart"></i><a href="/pembelian">Pembelian Obat</a></li>
        @endcanany
        @can('admin')
            <li class="{{ ($title == "Ruang") ? 'active' : '' }}"><i class="fas fa-hospital"></i><a href="/ruang">Ruang</a></li>
        @endcan
        @canany(['kasir', 'admin'])
            <li class="{{ ($title == "Transaksi") ? 'active' : '' }}"><i class="fas fa-store"></i><a href="/transaksi">Transaksi</a></li>
        @endcanany
    </div>

</section>