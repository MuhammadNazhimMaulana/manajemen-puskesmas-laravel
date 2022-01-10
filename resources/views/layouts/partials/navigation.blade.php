    <div class="n1">
      <div>
        <i id="menu-btn" class="fas fa-bars"></i>
      </div>
      {{-- <div class="search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="cari">
      </div> --}}
    </div>

    <div class="profile">
      <i class="far fa-bell"></i>
      <a href="/admin/profile"><img src="{{ asset('Images/Bonevian.png') }}"></a>
      @auth
        <form action="/admin/logout" method="POST">
          @csrf
          <button class="ms-4 border-0 btn btn-dark" type="submit">Logout {{ auth()->user()->name }}</button>
        </form>
      @else
      {{-- Jika Belum Login --}}
        <a class="ms-4" href="/admin/login">Login</a>
      @endauth
    </div>
