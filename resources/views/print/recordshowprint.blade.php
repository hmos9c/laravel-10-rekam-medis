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
        @if ($record->patient->image)
          <img src="{{asset('storage/' . $record->patient->image)}}" alt="{{$record->patient->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default.png')}}" alt="{{$record->patient->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$record->patient->name}}</h5>
        <div class="text-muted mb-2">{{$record->patient->job}}</div>
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
          <div class="mb-2">
            <label for="id">No Rekam Pasien :</label>
            <input type="number" id="id" name="id" value="{{$record->id}}" readonly>
          </div>
          <div class="col-md">
             <div class="mb-2">
              <label for="name_patient">Nama Pasien :</label>
              <input type="text" id="name_patient" name="name_patient" value="{{$record->patient->name}}" readonly>
            </div>
             <div class="mb-2">
              <label for="dateofbirth">Tanggal Lahir :</label>
              <input type="date" id="dateofbirth" name="dateofbirth" value="{{$record->patient->dateofbirth}}" readonly>
            </div>
             <div class="mb-2">
              <label for="gender_patient">Jenis Kelamin :</label>
              <input type="text" id="gender_patient" name="gender_patient" value="{{$record->patient->gender->gender}}" readonly>
            </div>
            <div class="mb-2">
              <label for="job">Perkerjaan :</label>
              <input type="text" id="job" name="job" value="{{$record->patient->job}}" readonly>
            </div>
            <div class="mb-2">
              <label for="phonenumber_patient">No Handphone :</label>
              <input type="number" id="phonenumber_patient" name="phonenumber_patient" value="{{$record->patient->phonenumber}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="name_doctor">Nama Dokter :</label>
              <input type="text" id="name_doctor" name="name_doctor" value="{{$record->doctor->name}}" readonly>
            </div>
            <div class="mb-2">
              <label for="specialist">Spesialis :</label>
              <input type="text" id="specialist" name="specialist" value="{{$record->doctor->specialist}}" readonly>
            </div>
            <div class="mb-2">
              <label for="phonenumber_doctor">No Handphone :</label>
              <input type="number" id="phonenumber_doctor" name="phonenumber_doctor" value="{{$record->doctor->phonenumber}}" readonly>
            </div>
          </div>
           <div class="mb-2">
            <label for="address_patient">Alamat :</label>
            <div class="">
              <textarea id="address_patient" name="address_patient" cols="80" rows="1" readonly>{{$record->patient->address}}</textarea>
            </div>
          </div>
          <div class="mb-2">
            <label for="diagnosis">Diagnosa :</label>
            <div class="">
              <textarea id="diagnosis" name="diagnosis" cols="80" rows="1" readonly>{{$record->diagnosis}}</textarea>
            </div>
          </div>
          <div class="mb-2">
            <label for="allergy">Alergi :</label>
            <input type="text" id="allergy" name="allergy" value="{{$record->allergy}}" readonly>
          </div>
          <div class="mb-2">
            <label for="description">Deskripsi :</label>
            <div class="">
              <textarea id="description" name="description" cols="80" rows="1" readonly>{{$record->description}}</textarea>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="height">Tinggi Badan :</label>
              <input type="text" id="height" name="height" value="{{$record->height}} cm" readonly>
            </div>
            <div class="mb-2">
              <label for="blood">Golongan Darah :</label>
              <input type="text" id="blood" name="blood" value="{{$record->blood}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="weight">Berat Badan :</label>
              <input type="text" id="weight" name="weight" value="{{$record->weight}} kg" readonly>
            </div>
            <div class="mb-2">
              <label for="tension">Tekanan Darah :</label>
              <input type="text" id="tension" name="tension" value="{{$record->tension}} mmHg" readonly>
            </div>
          </div>
          <div class="mb-2">
            <label for="operation">Tindakan :</label>
            <div class="">
              <textarea id="operation" name="operation" cols="80" rows="1" readonly>{{$record->operation}}</textarea>
            </div>
          </div>
          <div class="mb-2">
            <label for="drug">Obat :</label>
            <input type="text" id="drug" name="drug" value="{{$record->drug->name}}" readonly>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="care">Rawat :</label>
              <input type="text" id="care" name="care" value="{{$record->care->care}}" readonly>
            </div>
            <div class="mb-2">
              <label for="bed_id">No Tempat Tidur :</label>
              <input type="number" id="bed_id" name="bed_id" value="{{$record->bed->id}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-2">
              <label for="hospital">Nama RS Rujukan :</label>
              <input type="text" id="hospital" name="hospital" value="{{$record->hospital}}" readonly>
            </div>
            <div class="mb-2">
              <label for="outdate">Tanggal Keluar :</label>
              <input type="date" id="outdate" name="outdate" value="{{$record->outdate}}" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>