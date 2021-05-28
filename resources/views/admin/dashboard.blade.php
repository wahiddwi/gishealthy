@extends('layouts.backend.master')
@section('title', 'Dashboard')

@section('content')

    <div class="section-body">
        <div class="card mt-4">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-3 col-6 mb-md-0 mb-4 text-center">
                    {{-- <div class="img-shadow flag-icon flag-icon-id"></div> --}}
                    @foreach ($allData as $data)
                    <div class="mt-2 font-weight-bold text-nowrap">Total Kasus</div>
                    
                    <div class="text-small text-muted">{{$data->total_kasus}}</div>
                </div>
                <div class="col-sm-3 col-6 mb-md-0 mb-4 text-center">
                    {{-- <div class="img-shadow flag-icon flag-icon-ps"></div> --}}
                    <div class="mt-2 font-weight-bold text-nowrap">Positif</div>
                    <div class="text-small text-muted"><span class="text-primary"></span> {{ $data->jumlah_positif }}</div>
                </div>
                <div class="col-sm-3 col-6 text-center">
                    {{-- <div class="img-shadow flag-icon flag-icon-sy"></div> --}}
                    <div class="mt-2 font-weight-bold text-nowrap">Sembuh</div>
                    <div class="text-small text-muted"><span class="text-danger"></span> {{ $data->jumlah_sembuh }}</div>
                  </div>
                  <div class="col-sm-3 col-6 text-center">
                      {{-- <div class="img-shadow flag-icon flag-icon-my"></div> --}}
                      <div class="mt-2 font-weight-bold text-nowrap">Meninggal</div>
                    <div class="text-small text-muted">{{ $data->jumlah_meninggal }}</div>
                </div>
                @endforeach
            </div>
              <br><br>
              <div id="container" style="width: 990px"></div>
            </div>
          </div>
        </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
<script>
    
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
@push('after-script')
<script src="https://code.highcharts.com/highcharts.js"></script>
@endpush
