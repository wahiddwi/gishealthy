@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')

    <div class="section-body">
        <div class="card mt-4">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-3 col-6 mb-md-0 mb-4 text-center">
                    <div class="img-shadow flag-icon flag-icon-id"></div>
                    <div class="mt-2 font-weight-bold text-nowrap">Provinsi</div>
                    @foreach ($data as $dataCovid)
                        
                    <div class="text-small text-muted">{{ $dataCovid['attributes']['Provinsi'] }}</div>
                </div>
                <div class="col-sm-3 col-6 mb-md-0 mb-4 text-center">
                    <div class="img-shadow flag-icon flag-icon-ps"></div>
                    <div class="mt-2 font-weight-bold text-nowrap">Positif</div>
                    <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ $dataCovid['attributes']['Kasus_Posi'] }}</div>
                </div>
                <div class="col-sm-3 col-6 text-center">
                    <div class="img-shadow flag-icon flag-icon-sy"></div>
                    <div class="mt-2 font-weight-bold text-nowrap">Sembuh</div>
                    <div class="text-small text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> {{ $dataCovid['attributes']['Kasus_Semb'] }}</div>
                  </div>
                  <div class="col-sm-3 col-6 text-center">
                      <div class="img-shadow flag-icon flag-icon-my"></div>
                      <div class="mt-2 font-weight-bold text-nowrap">Meninggal</div>
                    <div class="text-small text-muted">{{ $dataCovid['attributes']['Kasus_Meni'] }}</div>
                </div>
                @endforeach
            </div>
              <br><br>
              <div id="container"></div>
            </div>
          </div>
        </div>
    <link rel="stylesheet" href="{{asset('assets/css/chart.css')}}">
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
    text: 'Source: covid19.bnpb.go.id'
},

yAxis: {
    title: {
        text: 'Number of Employees'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Total Kasus',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
    name: 'Positif',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
    name: 'Sembuh',
    data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
    name: 'Meninggal',
    data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
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
    
{{-- @endsection --}}
@endsection
