@extends('layouts.frontend.master')
@push('page-styles')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!--Leaflet CSS-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<!--Routing Machine CSS-->
<link rel="stylesheet" href="{{ asset('assets/leaflet-routing-machine/dist/leaflet-routing-machine.css') }}">
<!--Leaflet JS-->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin="">
</script>
<!--Routing Machine Js-->
<script src="{{ asset('assets/leaflet-routing-machine/dist/leaflet-routing-machine.js') }}"></script>
<script src="{{ asset('assets/leaflet-routing-machine/examples/Control.Geocoder.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

@section('title', 'Dashboard')

@section('content')
    <!--Header-->
    <div class="hero-v1">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mr-auto text-center text-lg-left">
            <span class="d-block subheading">Covid-19 Awareness</span>
            <h1 class="heading mb-3">Stay Safe & Stay Home</h1>
            <p class="mb-5"></p>
            <br>
            {{-- <p class="mb-4"><a href="#statistik" class="btn btn-primary">How to prevent</a></p> --}}

          </div>
          <div class="col-lg-6">
            <figure class="illustration">
              <img src="{{ asset('frontend/images/illustration.png') }}" alt="Image" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-6"></div>
        </div>
      </div>
    </div>

<div class="site-section stats" >
    <div class="container">
      <div class="row mb-3">
        <div class="col-lg-7 text-center mx-auto">
          <h2 class="section-heading">Statistik Kasus Covid-19</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="data">
        @foreach ($allData as $data)
            <span class="icon text-primary">
              <span class="flaticon-virus"></span>
            </span>
            <strong class="d-block number">{{ $data->jumlah_positif }}</strong>
            <span class="label">Kasus Positif</span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="data">
            <span class="icon text-primary">
              <span class="flaticon-virus"></span>
            </span>
            <strong class="d-block number">{{ $data->jumlah_meninggal }}</strong>
            <span class="label">Kasus Meninggal</span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="data">
            <span class="icon text-primary">
              <span class="flaticon-virus"></span>
            </span>
            <strong class="d-block number">{{ $data->jumlah_sembuh }}</strong>
            <span class="label">Kasus Sembuh</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


  <div class="site-section">
    <div class="container">
      <div id="container"></div>
    </div>
  </div>

  {{-- <div class="container pb-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="feature-v1 d-flex align-items-center">
          <div class="icon-wrap mr-3">
            <span class="flaticon-protection"></span>
          </div>
          <div>
            <h3>Protection</h3>
            <span class="d-block">Lorem ipsum dolor sit.</span>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="feature-v1 d-flex align-items-center">
          <div class="icon-wrap mr-3">
            <span class="flaticon-patient"></span>
          </div>
          <div>
            <h3>Prevention</h3>
            <span class="d-block">Lorem ipsum dolor sit.</span>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="feature-v1 d-flex align-items-center">
          <div class="icon-wrap mr-3">
            <span class="flaticon-hand-sanitizer"></span>
          </div>
          <div>
            <h3>Treatments</h3>
            <span class="d-block">Lorem ipsum dolor sit.</span>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="feature-v1 d-flex align-items-center">
          <div class="icon-wrap mr-3">
            <span class="flaticon-virus"></span>
          </div>
          <div>
            <h3>Symptoms</h3>
            <span class="d-block">Lorem ipsum dolor sit.</span>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

<!--map rumah sakit-->
  {{-- <div class="site-section bg-primary-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 text-center mx-auto">
          <h2 class="section-heading">Daftar Layanan Kesehatan</h2>
          <div id="mapid" style="height: 400px;"></div>
      </div>
    </div>
  </div> --}}

  {{-- <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 mx-auto text-center">
          <span class="subheading">What you need to do</span>
          <h2 class="mb-4 section-heading">Rute</h2>
          <p>Mencari rute terdekat menuju rumah sakit tujuan</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 ">
          <div class="row mt-5 pt-5">
            <div class="col-lg-6 do ">
              <h3>You should do</h3>
              <ul class="list-unstyled check">
                <li>Stay at home</li>
                <li>Wear mask</li>
                <li>Use Sanitizer</li>
                <li>Disinfect your home</li>
                <li>Wash your hands</li>
                <li>Frequent self-isolation</li>
              </ul>
            </div>
            <div class="col-lg-6 dont ">
              <h3>You should avoid</h3>
              <ul class="list-unstyled cross">
                <li>Avoid infected people</li>
                <li>Avoid animals</li>
                <li>Avoid handshaking</li>
                <li>Aviod infected surfaces</li>
                <li>Don't touch your face</li>
                <li>Avoid droplets</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="{{ asset('frontend/images/protect.png') }}" alt="Image" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-12 text-center mx-auto">
        <div id="mapid" style="height: 95vh; margin:0"></div>
      </div>
    </div>
  </div> --}}


  {{-- <div class="site-section bg-primary-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4 section-heading">Symptoms of Coronavirus</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex officia quas, modi sit eligendi numquam!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 mb-4">
          <div class="symptom d-flex">
            <div class="img">
              <img src="{{ asset('frontend/images/symptom_high-fever.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <h3>High Fever</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum ipsum repellendus animi modi iure provident, cupiditate perferendis voluptatem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="symptom d-flex">
            <div class="img">
              <img src="{{ asset('frontend/images/symptom_cough.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <h3>Cough</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ullam illo laborum repellendus vel esse dolor, sunt exercitationem.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="symptom d-flex">
            <div class="img">
              <img src="{{ asset('frontend/images/symptom_sore-troath.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <h3>Sore Troath</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum esse voluptatum, vel inventore at! Ullam, libero reiciendis amet?</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-4">
          <div class="symptom d-flex">
            <div class="img">
              <img src="{{ asset('frontend/images/symptom_headache.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <h3>Headache</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem voluptatem ratione veniam rerum qui quibusdam reprehenderit quis.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-md-center">
        <div class="col-lg-10">
          <div class="note row">

            <div class="col-lg-8 mb-4 mb-lg-0"><strong>Stay at home and call your doctor:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, eaque.</div>
            <div class="col-lg-4 text-lg-right">
              <a href="#" class="btn btn-primary"><span class="icon-phone mr-2 mt-3"></span>Help line</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <!--Artikel-->
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4 section-heading">Artikel</h2>
          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex officia quas, modi sit eligendi numquam!</p> --}}
        </div>
      </div>

      <div class="row">
      @foreach ($posts as $post)
      <div class="col-lg-4">
          <div class="post-entry card" style="width: 17rem;">
            <a href="{{ route('post.artikelDetail', $post->id) }}" class="thumb">
              <span class="date">{{$post->created_at->diffForHumans()}}</span>
              <img src="{{ asset($post->gambar) }}" alt="Image" class="img-fluid card-img-top">
            </a>
            <div class="post-meta text-center card-body">
              <a href="">
                <span class="icon-user"></span>
                <span>{{$post->user->name}}</span>
              </a>
            </div>
            <h3><a href="{{ route('post.artikelDetail', $post->id) }}">{{ $post->judul }}</a></h3>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <script>
    //highchart
    Highcharts.chart('container', {

    title: {
        text: 'Grafik Penyebaran Covid-19'
    },

    subtitle: {
        text: 'Source: Gishealthy'
    },

    yAxis: {
        title: {
            text: 'Jumlah kasus Covid-19'
        }
    },

    xAxis: {
        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'Total Kasus',
        data: {!!$total_kasus!!}
    }, {
        name: 'Positif',
        data: {!!$total_positif!!}
    }, {
        name: 'Sembuh',
        data: {!!$total_sembuh!!}
    }, {
        name: 'Meninggal',
        data: {!!$total_meninggal!!}
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 400
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

    });

    </script>
@endsection
