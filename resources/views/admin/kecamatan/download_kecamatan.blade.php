<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped table-bordered table-md">
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
</body>
</html>