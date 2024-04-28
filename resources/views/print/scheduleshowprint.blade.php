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
<h3 class="mb-3">Data Jadwal Dokter</h3>
<button class="no-print" onclick="window.print()" >Print</button>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        @if ($schedule->doctor->image)
          <img src="{{asset('storage/' . $schedule->doctor->image)}}" alt="{{$schedule->doctor->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default.png')}}" alt="{{$schedule->doctor->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$schedule->doctor->name}}</h5>
        <div class="text-muted mb-2">{{$schedule->doctor->specialist}}</div>
      </div>
    </div>
  </div>
  <div class="col-md-8 col-xl-9">
    <div class="card mb-2">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <div class="mb-2">
              <label for="day">Hari :</label>
              <input type="text" id="day" name="day" value="{{$schedule->day->name}}" readonly>
            </div>
            <div class="mb-2">
              <label for="id">No Dokter :</label>
              <input type="number" id="id" name="id" value="{{$schedule->doctor->id}}" readonly>
            </div>
            <div class="mb-2">
              <label for="phonenumber">No Handphone :</label>
              <input type="number" id="phonenumber" name="phonenumber" value="{{$schedule->doctor->phonenumber}}" readonly>
            </div>
            <div class="mb-2">
              <label for="accepted">Tanggal Diterima :</label>
              <input type="date" id="accepted" name="accepted" value="{{$schedule->doctor->accepted}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="time">Jam :</label>
              <input type="text" id="time" name="time" value="{{$schedule->time}}" readonly>
            </div>
            <div class="mb-2">
              <label for="name">Nama :</label>
              <input type="text" id="name" name="name" value="{{$schedule->doctor->name}}" readonly>
            </div>
            <div class="mb-2">
              <label for="specialist">Spesialis :</label>
              <input type="text" id="specialist" name="specialist" value="{{$schedule->doctor->specialist}}" readonly>
            </div>
            <div class="mb-2">
              <label for="gender">Jenis Kelamin :</label>
              <input type="text" id="gande" name="gande" value="{{$schedule->doctor->gender->gender}}" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>