<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">Hi, {{Auth::user()->name}}
        {{-- Hi, {{Auth::user()->name}} --}}
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
        @if(Auth::user()->role->id == 1)
          <a href="{{ route('admin.password') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Ubah Password
          </a>
        @elseif(Auth::user()->role->id == 3)
        <a href="{{ route('petugas.password') }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Ubah Password
        </a>
        @endif
            <a class="dropdown-item has-icon" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{-- <i class="fas fa-sign-out-alt"></i> {{ __('Logout')}} --}}
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
    </div>
          </a>
        </div>
      </li>
    </ul>
  </nav>

