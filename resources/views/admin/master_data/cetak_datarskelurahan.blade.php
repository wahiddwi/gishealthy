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
    <div>
        <img src="{{ public_path('logo.png') }}" height="auto" width="120">
        <h2 style="text-align:center; margin-top:-30px">Laporan Data Rumah Sakit Per Kelurahan</h2>
    </div>

    <table style="text-align: center; margin-top: 50px;" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
              <tr>
                <th>No.</th>
                <th>Kelurahan</th>
                <th>Jumlah Rumah Sakit Rujukan</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($rskelurahan as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->jumlah }}</td>
                    {{-- <td class="text-center">
                        <a href="" class="btn btn-sm btn-info fa fa-eye"></a>
                        <a href="" class="btn btn-sm btn-danger fas fa-file-pdf"></a>
                    </td> --}}
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
