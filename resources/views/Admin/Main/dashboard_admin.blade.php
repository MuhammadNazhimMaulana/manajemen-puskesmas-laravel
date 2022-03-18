@extends('layouts.main')

@section('container')

      <div class="values">
        <div class="val-box">
          <i class="fas fa-users"></i>
            <div>
              <h3>8,267</h3>
              <span>Pengguna</span>
            </div>
          </div>
        <div class="val-box">
          <i class="fas fa-shopping-cart"></i>
            <div>
              <h3>8,267</h3>
              <span>Total Pesanan</span>
            </div>
          </div>
        <div class="val-box">
          <i class="fas fa-bacon"></i>
            <div>
              <h3>8,267</h3>
              <span>Penjualan</span>
            </div>
          </div>
        <div class="val-box">
          <i class="fas fa-dollar-sign"></i>
            <div>
              <h3>8,267</h3>
              <span>Bulan ini</span>
            </div>
          </div>
        </div>

        <div class="row mt-3 ms-3">

          <div class="col-md-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
              <div class="card-header text-center">Jumlah Pasien</div>
              <div class="card-body">
                  <div class="container-white">
                      <canvas id="pasien" width="400" height="400"></canvas>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
              <div class="card-header text-center">Penilaian Transaksi</div>
              <div class="card-body">
                  <div class="container-white">
                      <canvas id="penilaian_transaksi" width="400" height="400"></canvas>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
              <div class="card-header text-center">Penilaian Pendaftaran</div>
              <div class="card-body">
                  <div class="container-white">
                      <canvas id="penilaian" width="400" height="400"></canvas>
                  </div>
              </div>
            </div>
          </div>

        </div>
        


@endsection

@section('script')

<script>
  // Chart Untuk transaksi
  var kategori_transaksi = document.getElementById('transaksi');
  var data_transaksi = [];
  var label_transaksi = [];

  @foreach($transaksi_per_kategori as $key => $value)
    data_transaksi.push({{ $value->jumlah }});
    label_transaksi.push('{{ $value->pengguna }}')
  @endforeach

  var data_transaksi_per_kategori = {
      datasets: [{
          data: data_transaksi,
          backgroundColor: [
              'rgba(255, 99, 132, 0.8)',
              'rgba(54, 162, 235, 0.8)',
              'rgba(255, 206, 86, 0.8)',
          ],
      }],
      labels: label_transaksi,
  }

  var chart_transaksi = new Chart(kategori_transaksi, {
      type: 'doughnut',
      data: data_transaksi_per_kategori
  });

    // Chart Untuk pasien
    var kategori_pasien = document.getElementById('pasien');
    var data_pasien = [];
    var label_pasien = [];

    @foreach($pasien_per_kategori as $key => $value)
    data_pasien.push({{ $value->jumlah }});
    label_pasien.push('{{ $value->pengguna }}')
    @endforeach

    var data_pasien_per_kategori = {
        datasets: [{
            data: data_pasien,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_pasien,
    }

    var chart_pasien = new Chart(kategori_pasien, {
        type: 'doughnut',
        data: data_pasien_per_kategori
    });

    // Chart Untuk penilaian transaksi
    var kategori_penilaian_transaksi = document.getElementById('penilaian_transaksi');
    var data_penilaian_transaksi = [];
    var label_penilaian_transaksi = [];

    @foreach($penilaian_pembelian as $key => $value)
    data_penilaian_transaksi.push({{ $value->jumlah }});
    @endforeach

    var data_penilaian_transaksi_per_kategori = {
        datasets: [{
            data: data_penilaian_transaksi,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_penilaian_transaksi,
    }

    var chart_pasien = new Chart(kategori_penilaian_transaksi, {
        type: 'doughnut',
        data: data_penilaian_transaksi_per_kategori
    });

    // Chart Untuk penilaian pendaftaran
    var kategori_penilaian = document.getElementById('penilaian');
    var data_penilaian = [];
    var label_penilaian = [];

    @foreach($penilaian as $key => $value)
    data_penilaian.push({{ $value->jumlah }});
    @endforeach

    var data_penilaian_per_kategori = {
        datasets: [{
            data: data_penilaian,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_penilaian,
    }

    var chart_pasien = new Chart(kategori_penilaian, {
        type: 'doughnut',
        data: data_penilaian_per_kategori
    });

</script>
@endsection