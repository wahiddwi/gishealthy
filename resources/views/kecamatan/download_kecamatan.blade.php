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
        <h2 style="text-align:center; margin-top:-30px">Laporan Data Kecamatan</h2>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
              <tr>
                <th>No.</th>
                <th>Nama Kecamatan</th>
                <th>Nama Wilayah</th>
                <th>Created At</th>
                <th>Updated At</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($kecamatan as $k)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->nama }}</td>
              <td>{{ $k->wilayah->nama }}</td>
              <td>{{ $k->created_at }}</td>
              <td>{{ $k->updated_at }}</td>
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
        <td align="right">Petugas Kecamatan</td>
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
