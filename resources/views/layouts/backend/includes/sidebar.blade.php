<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      {{-- <a href="index.html">Gishealthy</a> --}}
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{asset('assets/img/logo.png')}}" alt="" width="20%">
            <p style="color:grey">Gishealthy</p></a>
          </div>
      <div class="sidebar-brand sidebar-brand-sm">
        {{-- <a href="index.html">St</a> --}}
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{asset('assets/img/logo.png')}}" alt="" width="60%">
        </a>
      </div>
      <ul class="sidebar-menu">
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop-medical"></i><span>Layanan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.laykes.index') }}">Layanan Kesehatan</a></li>
            <li><a class="nav-link" href="{{ route('admin.tenagamedis.index') }}">Tenaga Kesehatan</a></li>
            <li><a class="nav-link" href="{{ route('admin.data_rumahsakit') }}">Data Rumah Sakit</a></li>
            <li><a class="nav-link" href="{{ route('admin.rs_kelurahan') }}">Rumah Sakit (Kelurahan)</a></li>
            <li><a class="nav-link" href="{{ route('admin.rs_kecamatan') }}">Rumah Sakit (Kecamatan)</a></li>
            <li><a class="nav-link" href="{{ route('admin.rs_kota') }}">Rumah Sakit (Kota)</a></li>
            @if (Auth::user()->role->id == 1)
            <li><a class="nav-link" href="#">Tenaga Medis (Kelurahan)</a></li>
            <li><a class="nav-link" href="#">Tenaga Medis (Kecamatan)</a></li>
            <li><a class="nav-link" href="#">Tenaga Medis (Kota)</a></li>
                
            @endif
          </ul>
        </li>
        {{-- <li class="menu-header">Starter</li> --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-compass"></i> <span>Pemetaan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.pemetaan_rs') }}">Pemetaan Rumah Sakit</a></li>
            <li><a class="nav-link" href="{{ route('admin.rute') }}">Cari Rute Rumah Sakit</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-asia"></i> <span>Wilayah</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.wilayah.index')}}">wilayah</a></li>
            <li><a class="nav-link" href="{{route('admin.kecamatan.index')}}">Kecamatan</a></li>
            <li><a class="nav-link" href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
          </ul>
        </li>
        @if (Auth::user()->role->id == 1)

        <li><a class="nav-link" href="{{ route('admin.post.index') }}"><i class="fab fa-blogger"></i> <span>Artikel</span></a></li>
                
            @endif
        <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-user-cog"></i> <span>User</span></a></li>
        {{-- <li class="menu-header">Master Data</li> --}}
        {{-- <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-compass"></i> <span>Master Data</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Detail Kecamatan</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Detail Kelurahan</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Data Rumah Sakit</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Data Artikel</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Data Tenaga Medis</a></li>
          </ul>
        </li> --}}
      </ul>
</aside>