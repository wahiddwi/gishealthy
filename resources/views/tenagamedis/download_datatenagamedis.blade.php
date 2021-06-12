<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css">

        /* table, th, td, tr {
            border: 1px solid black;
            align:"center"
        } */

        @page {
            margin: 0cm 0cm;
        }
        body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                color: #000;
            }


        table tr th{
            font-size: 15px;
        }

        table tr td{
            font-size: 12px;
        }
        p {
            font-size: 12px;

        }
    </style>
</head>
<body>
    {{-- <div style="display:flex;"> --}}
        <div>
        {{-- <img style="display:block" src="{{asset('assets/img/logo.png')}}" width="50" height="50" alt=""> --}}
        {{-- <h5 style="display:block; margin-left: 250px; font-size: 20px">Laporan Data Kecamatan</h5> --}}
        <img style="" src="{{ltrim(public_path('assets/img/logo.png'),'/')}}" height="auto" width="120">
        <h2 style="text-align:center; margin-top:-30px">Laporan Data Tenaga Medis</h2>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
              <tr>
                <th>No.</th>
                <th>Jumlah Tenaga Medis</th>
                <th>Nama Rumah Sakit</th>
              </tr>
              
        </thead>
        <tbody>
            @foreach ($tenagamedis as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->jumlah_tenaga_medis }}</td>
                <td>{{ $data->laykes->nama_rumahsakit }}</td>
            </tr>
        @endforeach
      </tbody>
  </table>

<table style="margin-top: 30px" width="640px">
    <tr>
        <td align="right">Jakarta, {{ \Carbon\Carbon::now()->format('d - m - Y') }}</td>
    </tr>
    <tr>
        <td align="right">Dilaporkan Oleh,</td>
    </tr>
    <tr>
        <td align="right">Petugas Dinas Kesehatan</td>
    </tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
        <td align="right">..................................
            </td>
    </tr>
</table>


</body>
</html>
