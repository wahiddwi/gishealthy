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
    <div style="display: flex; align-items: center; margin-bottom:-30px">
        {{-- pakai ini kalau di hosting src="./donasi_assets/assets/img/logo.png" --}}
        <img  src="{{ltrim(public_path('logo.png'),'/')}}" height="80" width="80">
        <div>
            <h2 style="text-align:center;">Laporan Data Rumah Sakit</h2>
            <h4 style="text-align:center;">Periode 2020/2021</h4>
        </div>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
              <tr>
                <th>No.</th>
                <th>Nama Layanan</th>
                <th>Alamat</th>
                <th>No. Telpon</th>
                <th>Jumlah Kamar Tersedia</th>
                {{-- <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kota Madya</th> --}}
              </tr>
        </thead>
        <tbody>
            @foreach ($laykes as $l)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $l->nama_rumahsakit }}</td>
                <td>{{ $l->alamat }}</td>
                <td>{{ $l->no_telpon }}</td>
                <td>{{App\Kamar::where('id_rumahsakit',$l->id)->where('status',false)->count()}} Kamar</td>
                {{-- <td>{{ $l->kelurahan->nama }}</td>
                <td>{{ $l->kecamatan->nama }}</td>
                <td>{{ $l->wilayah->nama }}</td> --}}
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
        <td align="right">Petugas Rumah Sakit</td>
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
