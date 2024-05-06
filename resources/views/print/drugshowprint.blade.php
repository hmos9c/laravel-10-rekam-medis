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
      .no-print, h3{
        margin-bottom: 1rem;
        margin-left: 1rem;
      }
      input, textarea{
        border: none;
      }
    </style>
  </head>
<body>
<h3 class="mb-3">Data Obat</h3>
<button class="no-print" onclick="window.print()" >Print</button>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Gambar</h5>
      </div>
      <div class="card-body text-center">
        @if ($drug->image)
          <img src="{{asset('storage/' . $drug->image)}}" alt="{{$drug->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default-drug.png')}}" alt="{{$drug->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$drug->name}}</h5>
        <div class="text-muted mb-2">{{$drug->type}}</div>
      </div>
    </div>
  </div>
  <div class="col-md-8 col-xl-9">
    <div class="card mb-2">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <div class="mb-2">
          <label for="id" >No Obat :</label>
          <input type="id"  id="id" name="id" value="{{$drug->id_drug}}" readonly>
        </div>
        <div class="mb-2">
          <label for="name">Nama :</label>
          <input type="text" id="name" name="name" value="{{$drug->name}}" readonly>
        </div>
        <div class="mb-2">
          <label for="description">Deskripsi :</label>
          <div class="">
            <textarea name="description" id="description" cols="80" rows="1" readonly>{{$drug->description}}</textarea>
          </div>
        </div>
        <div class="mb-2">
          <label for="type">Jenis :</label>
          <input type="text" id="type" name="type" value="{{$drug->type}}" readonly>
        </div>
        <div class="mb-2">
          <label for="form">Bentuk : </label>
          <input type="text" id="form" name="form" value="{{$drug->form}}" readonly>
        </div>
        <div class="mb-2">
          <label for="stock">Stok :</label>
          <input type="text" id="stock" name="stock" value="{{$drug->stock}}" readonly>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>