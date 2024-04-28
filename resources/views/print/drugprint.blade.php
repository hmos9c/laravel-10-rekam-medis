<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Sanas Febriyan">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<link rel="icon" href="{{asset('img/logo.png')}}"/>
	<title>{{$title}} | RS Cijantung</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
            padding: 2rem;
            margin: 2rem;
        }
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 1mm;
      margin-left: 1rem;
    }
    .no-print
    {
      margin-bottom: 1rem;
      margin-left: 1rem;
    }
  </style>
</head>
<body>
  <h1 style="margin-left: 1rem">Semua Obat RS Cijantung</h1>
  <button class="no-print" onclick="window.print()" >Print</button>
  @if ($drugs->count())
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>No Obat</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Bentuk</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($drugs as $drug)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$drug->id}}</td>
            <td>{{$drug->name}}</td>
            <td>{{$drug->type}}</td>
            <td>{{$drug->form}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
</body>
</html>