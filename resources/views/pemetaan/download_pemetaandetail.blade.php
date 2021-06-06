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
        <h2 style="text-align:center; margin-top:-30px">Laporan Detail Layanan Kesehatan</h2>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <tbody>
            <tbody>
                <tr>
                  <th>Nama Rumah Sakit</th>
                  <th>{{ $laykes->nama_rumahsakit }}</th>
                </tr>
              <tr>
                <td>Alamat</td>
                <td>{{$laykes->alamat}}</td>
              </tr>
              <tr>
                <td>Kelurahan</td>
                <td>{{$laykes->kelurahan->nama}}</td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>{{$laykes->kecamatan->nama}}</td>
              </tr>
              <tr>
                <td>Kota Madya</td>
                <td>{{$laykes->wilayah->nama}}</td>
              </tr>
              <tr>
                <td>No. Telpon</td>
                <td>{{$laykes->no_telpon}}</td>
              </tr>
              <tr>
                <td>Latitude</td>
                <td>{{$laykes->latitude}}</td>
              </tr>
              <tr>
                <td>Longitude</td>
                <td>{{$laykes->longitude}}</td>
              </tr>
              <tr>
                <td>Jumlah Kamar</td>
                <td>{{$laykes->jumlah_kamar}}</td>
              </tr>
              <tr>
                <td>User</td>
                <td>{{$laykes->user->name}}</td>
              </tr>
              <tr>
                <td>Created At</td>
                <td>{{$laykes->created_at}}</td>
              </tr>
              <tr>
                <td>Updated At</td>
                <td>{{$laykes->updated_at}}</td>
            </tr>
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
