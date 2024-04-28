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
<h3 class="mb-3">Data Pasien</h3>
<button class="no-print" onclick="window.print()" >Print</button>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        @if ($patient->image)
          <img src="{{asset('storage/' . $patient->image)}}" alt="{{$patient->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default.png')}}" alt="{{$patient->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$patient->name}}</h5>
        <div class="text-muted mb-2">{{$patient->job}}</div>
      </div>
    </div>
  </div>
  <div class="col-md-8 col-xl-9">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <div class="mb-2">
              <label for="id">NIK :</label>
              <input type="number" id="id" name="id" value="{{$patient->id}}" readonly>
            </div>
            <div class="mb-2">
              <label for="name">Nama :</label>
              <input type="text" id="name" name="name" value="{{$patient->name}}" readonly>
            </div>
            <div class="mb-2">
              <label for="city">Tempat Lahir :</label>
              <input type="text" id="city" name="city" value="{{$patient->city}}" readonly>
            </div>
            <div class="mb-2">
              <label for="dateofbirth">Tanggal Lahir :</label>
              <input type="date" id="dateofbirth" name="dateofbirth" value="{{$patient->dateofbirth}}" readonly>
            </div>
            <div class="mb-2">
              <label for="gender">Jenik Kelamin :</label>
              <input type="text" id="gender" name="gender" value="{{$patient->gender->gender}}" readonly>
            </div>
            <div class="mb-2">
              <label for="religion">Agama :</label>
              <input type="text" id="religion" name="religion" value="{{$patient->religion->name}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="status">Status Menikah :</label>
              <input type="text" id="status" name="status" value="{{$patient->status->status}}" readonly>
            </div>
            <div class="mb-2">
              <label for="job">Perkerjaan :</label>
              <input type="text" id="job" name="job" value="{{$patient->job}}" readonly>
            </div>
            <div class="mb-2">
              <label for="nationality">nationality :</label>
              <input type="text" id="nationality" name="nationality" value="{{$patient->nationality->nationality}}" readonly>
            </div>
            <div class="mb-2">
              <label for="dateofentry">Tanggal Masuk :</label>
              <input type="date" id="dateofentry" name="dateofentry" value="{{$patient->dateofentry}}" readonly>
            </div>
            <div class="mb-2">
              <label for="phonenumber">No Handphone :</label>
              <input type="number" id="phonenumber" name="phonenumber" value="{{$patient->phonenumber}}" readonly>
            </div>
            <div class="mb-2">
              <label for="email">Email :</label>
              <input type="email" id="email" name="email" value="{{$patient->email}}" readonly>
            </div>
          </div>
          <div class="mb-2">
            <label for="address">Alamat :</label>
            <div class="">
              <textarea name="address" id="address" cols="80" rows="1" readonly>{{$patient->address}}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>