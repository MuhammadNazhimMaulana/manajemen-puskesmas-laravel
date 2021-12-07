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

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Title</td>
                        <td>Status</td>
                        <td>Role</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="people">
                            <img src="Images/Bonevian.png">
                            <div class="people-de">
                                <h5>Nama</h5>
                                <p>email</p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5>Pekerjaan</h5>
                            <p>Web Dev</p>
                        </td>

                        <td class="aktif"><p>Active</p></td>

                        <td class="role">
                            <p>Pemilik</p>
                        </td>

                        <td class="aksi"><a href="#">Edit</a></td>

                    </tr>
                </tbody>
            </table>
        </div>
@endsection