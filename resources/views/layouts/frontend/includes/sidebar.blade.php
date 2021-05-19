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
          <li><a href="#" class="nav-link">Pemetaan Kasus Covid-19</a></li>
          {{-- <li><a href="#" class="nav-link">Wash your hands</a></li> --}}
          {{-- <li class="has-children">
            <a href="#">More Links</a>
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
            </ul>
          </li> --}}
        </ul>
      </li>
      <li class="has-children">
        <a href="#" class="nav-link">Wilayah</a>
        <ul class="dropdown">
          <li><a href="{{ route('wilayah') }}" class="nav-link">Kota Madya</a></li>
          <li><a href="{{ route('kecamatan') }}" class="nav-link">Kecamatan</a></li>
          <li><a href="{{ route('kelurahan') }}" class="nav-link">Kelurahan</a></li>
          {{-- <li><a href="#" class="nav-link">Wash your hands</a></li> --}}
        </ul>
      </li>
    {{-- <li><a href="symptoms.html" class="nav-link">Symptoms</a></li> --}}
    <li><a href="#" class="nav-link">About</a></li>


    <li><a href="#" class="nav-link">Artikel</a></li>
    {{-- <li><a href="contact.html" class="nav-link">Contact</a></li> --}}
    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
    </div>
</ul>