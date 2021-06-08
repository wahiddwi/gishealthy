<header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-6 col-xl-2">
        <div class="sidebar-brand">
            <a href="/">
              <img src="{{asset('assets/img/logo.png')}}" alt="" width="100px">
          </div>
      </div>

      <div class="col-12 col-md-10 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right" role="navigation">

          <!--navbar-->
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <li class=""><a href="/" class="nav-link">Home</a></li>
            <li class="has-children">
              <a href="#" class="nav-link">Layanan</a>
              <ul class="dropdown">
                <li class="has-children">
                  <a href="#">Layanan Kesehatan</a>
                  <ul class="dropdown">
                    <li><a href="{{ route('data_rumahsakit') }}">Data Rumah Sakit</a></li>
                    <li><a href="{{ route('rumah_sakit.kecamatan') }}">Rumah Sakit Per Kecamatan</a></li>
                    <li><a href="{{ route('rumah_sakit.kelurahan') }}">Rumah Sakit Per Kelurahan</a></li>
                    <li><a href="{{ route('rumah_sakit.kota') }}">Rumah Sakit Per Kota</a></li>
                  </ul>
                </li>
                <li class="has-children">
                    <a href="#">Tenaga Kesehatan</a>
                    <ul class="dropdown">
                      <li><a href="{{ route('tenagamedis') }}">Data Tenaga Medis</a></li>
                      <li><a href="{{ route('tenagamedis-kelurahan') }}">Tenaga Medis Per Kelurahan</a></li>
                      <li><a href="{{ route('tenagamedis-kecamatan') }}">Tenaga Medis Per Kecamatan</a></li>
                      <li><a href="{{ route('tenagamedis-kota') }}">Tenaga Medis Per Kota</a></li>
                    </ul>
                  </li>
              </ul>
            </li>
            <li class="has-children">
                <a href="#" class="nav-link">Pemetaan</a>
                <ul class="dropdown">
                  <li><a href="{{ route('pemetaan') }}" class="nav-link">Pemetaan Rumah Sakit</a></li>
                  <li><a href="{{ route('pemetaan.rute') }}" class="nav-link">Cari Rute Rumah Sakit</a></li>
                  {{-- <li><a href="{{ route('pemetaan.covid19') }}" class="nav-link">Pemetaan Kasus Covid-19</a></li> --}}
                </ul>
              </li>
              <li class="has-children">
                <a href="#" class="nav-link">Wilayah</a>
                <ul class="dropdown">
                  <li><a href="{{ route('wilayah') }}" class="nav-link">Kota Madya</a></li>
                  <li><a href="{{ route('kecamatan') }}" class="nav-link">Kecamatan</a></li>
                  <li><a href="{{ route('kelurahan') }}" class="nav-link">Kelurahan</a></li>
                </ul>
              </li>

              <li class="has-children">
                <a href="#" class="nav-link">Pasien</a>
                <ul class="dropdown">
                  <li><a href="{{ route('wilayah') }}" class="nav-link">Data Pasien</a></li>
                  <li><a href="{{ route('kecamatan') }}" class="nav-link">Kecamatan</a></li>
                  <li><a href="{{ route('kelurahan') }}" class="nav-link">Kelurahan</a></li>
                </ul>
              </li>


            <li><a href="{{ route('post') }}" class="nav-link">Artikel</a></li>
            <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            </div>
        </ul>
        </nav>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>
      </div>

    </div>
  </div>

</header>
