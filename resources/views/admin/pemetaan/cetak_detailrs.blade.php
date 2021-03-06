<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css">

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
        <img  src="{{ltrim(public_path('logo.png'),'/')}}" height="80" width="100">
        <div>
            <h2 style="text-align:center;">Laporan Data Detail Rumah Sakit</h2>
            <h4 style="text-align:center;">Periode 2020/2021</h4>
        </div>
    </div>


    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
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
                <td>Jumlah Kamar Tersedia</td>
                <td>{{App\Kamar::where('id_rumahsakit',$laykes->id)->where('status',false)->count()}} Kamar</td>
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
                <td>Tanggal Input</td>
                <td>{{$laykes->created_at->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td>Tanggal Update</td>
                <td>{{$laykes->updated_at->format('d-m-Y')}}</td>
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
