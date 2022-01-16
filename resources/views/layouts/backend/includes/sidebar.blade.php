<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      {{-- <a href="index.html">Gishealthy</a> --}}
      @if (Auth::user()->role->id == 1)
        <a href="{{ route('admin.dashboard') }}">
          @elseif(Auth::user()->role->id == 3)
          <a href="{{ route('petugas.dashboard') }}">
      @endif
          <img src="{{asset('assets/img/logo.png')}}" alt="" width="20%">
            <p style="color:grey">Gishealthy</p></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        {{-- <a href="index.html">St</a> --}}
        @if (Auth::user()->role->id == 1)
          <a href="{{ route('admin.dashboard') }}">
          @elseif(Auth::user()->role->id == 3)
          <a href="{{ route('petugas.dashboard') }}">
        @endif
          <img src="{{asset('assets/img/logo.png')}}" alt="" width="60%">
        </a>
      </div>
      <ul class="sidebar-menu">
        @if(Auth::user()->role->id == 1)
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        @elseif(Auth::user()->role->id == 3)
        <li><a class="nav-link" href="{{ route('petugas.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        @endif
        @if (Auth::user()->role->id == 3)
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop-medical"></i><span>Layanan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('petugas.laykes.index') }}">Rumah Sakit</a></li>
            {{-- <li><a class="nav-link" href="{{ route('admin.tenagamedis.index') }}">Tenaga Medis</a></li> --}}
            {{-- <li><a class="nav-link" href="{{ route('petugas.data_rumahsakit') }}">Data Rumah Sakit</a></li> --}}
            <li><a class="nav-link" href="{{ route('petugas.rs_kelurahan') }}">Rumah Sakit (Kelurahan)</a></li>
            <li><a class="nav-link" href="{{ route('petugas.rs_kecamatan') }}">Rumah Sakit (Kecamatan)</a></li>
            <li><a class="nav-link" href="{{ route('petugas.rs_kota') }}">Rumah Sakit (Kota)</a></li>
            {{-- <li><a class="nav-link" href="{{ route('admin.tenagamedis-kelurahan') }}">Tenaga Medis (Kelurahan)</a></li>
            <li><a class="nav-link" href="{{ route('admin.tenagamedis-kecamatan') }}">Tenaga Medis (Kecamatan)</a></li>
            <li><a class="nav-link" href="{{ route('admin.tenagamedis-kota') }}">Tenaga Medis (Kota)</a></li> --}}
          </ul>
        </li>
        {{-- <li class="menu-header">Starter</li> --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-compass"></i> <span>Pemetaan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('petugas.pemetaan') }}">Pemetaan Rumah Sakit</a></li>
            <li><a class="nav-link" href="{{ route('petugas.rute') }}">Cari Rute Rumah Sakit</a></li>
            <li><a class="nav-link" href="{{ route('petugas.pemetaanCovid') }}">Pemetaan Covid-19</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hospital-user"></i> <span>Pasien</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('petugas.pasien.index') }}">Data Pasien</a></li>
            {{-- <li><a class="nav-link" href="{{ route('petugas.pasien_allData') }}">Data Kasus</a></li> --}}
            <li><a class="nav-link" href="{{ route('petugas.pasien_wilayah') }}">Pasien (Kotamadya)</a></li>
            <li><a class="nav-link" href="{{ route('petugas.pasien-kecamatan') }}">Pasien (Kecamatan)</a></li>
            <li><a class="nav-link" href="{{ route('petugas.pasien-kelurahan') }}">Pasien (Kelurahan)</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hospital-user"></i> <span>Kamar</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('petugas.kamar.index') }}">Kamar</a></li>
              <li><a class="nav-link" href="{{ route('petugas.jenis_kamar.index') }}">Jenis Kamar</a></li>
              {{-- <li><a class="nav-link" href="{{ route('petugas.info_kamar.index') }}">Info Kamar</a></li> --}}
            </ul>
          </li>

        <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-user-cog"></i> <span>User</span></a></li>
        @endif
        @if(Auth::user()->role->id == 1)
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-asia"></i> <span>Wilayah</span></a>
          <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{route('admin.wilayah.index')}}">Kota</a></li>
            <li><a class="nav-link" href="{{route('admin.kecamatan.index')}}">Kecamatan</a></li> --}}
            <li><a class="nav-link" href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user()->role->id == 1)
        <li><a class="nav-link" href="{{ route('admin.post.index') }}"><i class="fab fa-blogger"></i> <span>Artikel</span></a></li>
        @elseif(Auth::user()->role->id == 3)
        <li><a class="nav-link" href="{{ route('petugas.post.index') }}"><i class="fab fa-blogger"></i> <span>Artikel</span></a></li>
        @endif
        @if(Auth::user()->role->id == 1)
        <li><a class="nav-link" href="{{ route('admin.register') }}"><i class="fas fa-user-plus"></i> <span>Register</span></a></li>
        @endif
      </ul>
</aside>
