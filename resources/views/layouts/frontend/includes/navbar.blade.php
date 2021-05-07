<header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-xl-2">
          <div class="sidebar-brand">
              <a href="/">
                <img src="{{asset('assets/img/logo.png')}}" alt="" width="50%">
            </div>
        </div>

        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <!--navbar-->
            @include('layouts.frontend.includes.sidebar')
          </nav>
        </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

      </div>
    </div>

  </header>