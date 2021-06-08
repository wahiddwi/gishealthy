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
        <h2 style="text-align:center; margin-top:-30px">{{ $post->judul }}</h2>
    </div>

    <table style="margin-top: 30px;" width="640px">
        <tbody>
            <tr>
                <td align="center"><img src="{{ asset($post->gambar) }}" width="200"></td>
                </tr>
                <tr>
                <td>{{ $post->created_at->format('d-m-Y') }}</td>
                </tr>
                <tr>
                <td>{{ $post->user->name }}</td>
                </tr>
                <tr>
                    <hr>
                <td>{!!$post->body!!}</td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td align="right">Jakarta, {{ \Carbon\Carbon::now()->format('d - m - Y') }}</td>
                </tr>
                <tr>
                <td align="right">Author,</td>
                </tr>
                <tr>
                <td align="right"></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                  <td align="right"><b><u>Nama Terang</u></b></td>
                </tr>
        </tbody>
        </table>


</table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>
