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
        <img  src="{{ltrim(public_path('logo.png'),'/')}}" height="80" width="100">
        <div>
            <h2 style="text-align:center;">Laporan Data Detail Pasien</h2>
            <h4 style="text-align:center;">Periode 2020/2021</h4>
        </div>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Status</th>
                <th>Tanggal Masuk</th>
                {{-- <th>Action</th> --}}
              </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
            <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->nama_pasien }}</td>
            <td>{{ $p->jenis_kelamin }}</td>
            <td>{{ $p->usia }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->created_at->format('d - m - Y') }}</td>
              @endforeach
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
