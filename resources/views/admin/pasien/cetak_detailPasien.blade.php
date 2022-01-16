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
            <h2 style="text-align:center;">Laporan Data Detail Pasien</h2>
            <h4 style="text-align:center;">Periode 2020/2021</h4>
        </div>
    </div>


    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <tbody>
            <tr>
                <th>NIK</th>
                <th>{{ $pasien->nik }}</th>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>{{$pasien->nama_pasien}}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>{{$pasien->jenis_kelamin}}</td>
            </tr>
            <tr>
              <td>Usia</td>
              <td>{{$pasien->usia}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{$pasien->alamat}}</td>
            </tr>
            <tr>
                <td>No. Telpon</td>
                <td>{{$pasien->no_telpon}}</td>
              </tr>
            <tr>
              <td>Status Pasien</td>
              <td>{{$pasien->status}}</td>
            </tr>
            <tr>
                <td>Nama Rumah Sakit</td>
                <td>{{$pasien->laykes->nama_rumahsakit}}</td>
            </tr>
            <tr>
                <td>Jenis Kamar</td>
                <td>{{$pasien->kamar->jenis_kamar->jenis_kamar}}</td>
            </tr>
            <tr>
                <td>No. Kamar</td>
                <td>{{$pasien->kamar->no_kamar}}</td>
            </tr>
            <tr>
              <td>Tanggal Masuk</td>
              <td>{{$pasien->created_at->format('d - m - Y')}}</td>
            </tr>
            <tr>
                <td>Tanggal Keluar</td>
                @if ($pasien->tanggal_keluar == null)
                    <td>{{$pasien->tanggal_keluar}}</td>
                @else
                    <td>{{$pasien->updated_at->format('d - m - Y')}}</td>
                @endif
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
