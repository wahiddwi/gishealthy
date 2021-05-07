<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        table, th, td, tr {
            border: 1px solid black;
            align:"center"
        }
    </style>
</head>
<body>
    <div style="display:flex;">
        {{-- <img style="display:block" src="{{asset('assets/img/logo.png')}}" width="50" height="50" alt=""> --}}
        <h5 style="display:block; margin-left: 250px; font-size: 20px">Laporan Data Kecamatan</h5>
    </div>
   <div style="width: 100%">
    <table style="width: 100%" class="table table-striped table-bordered table-md">
        <thead>
              <tr>
                  <th>No.</th>
                  <th>Nama Kecamatan</th>
                  <th>Nama Wilayah</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($kecamatan as $no => $k)
              <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->wilayah->nama }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
</body>
</html>