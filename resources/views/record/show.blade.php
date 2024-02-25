@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Rekam Pasien</h3>
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
        <div class="text-muted mb-2">{{$record->patient->phonenumber}}</div>
        <div>
          <a class="btn btn-secondary btn-sm" onclick="window.print()"><i data-feather="printer"></i></a>
          <a class="btn btn-warning btn-sm" href="/record/{{$record->id}}/edit"><i data-feather="edit"></i></a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#comfirmModal"><i data-feather="trash-2"></i></a>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$record->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$record->updated_at->diffForHumans()}}</small> 
          </p>
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
          <div class="mb-3">
            <label for="id" class="form-label">No Rekam Pasien</label>
            <input type="number" class="form-control" id="id" name="id" value="{{$record->id}}" readonly>
          </div>
          <div class="col-md">
             <div class="mb-3">
              <label for="name_patient" class="form-label">Nama Pasien</label>
              <input type="text" class="form-control" id="name_patient" name="name_patient" value="{{$record->patient->name}}" readonly>
            </div>
             <div class="mb-3">
              <label for="dateofbirth" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$record->patient->dateofbirth}}" readonly>
            </div>
             <div class="mb-3">
              <label for="gender_patient" class="form-label">Jenis Kelamin</label>
              <input type="text" class="form-control" id="gender_patient" name="gender_patient" value="{{$record->patient->gender->gender}}" readonly>
            </div>
            <div class="mb-3">
              <label for="job" class="form-label">Perkerjaan</label>
              <input type="text" class="form-control" id="job" name="job" value="{{$record->patient->job}}" readonly>
            </div>
            <div class="mb-3">
              <label for="phonenumber_patient" class="form-label">No Handphone</label>
              <input type="number" class="form-control" id="phonenumber_patient" name="phonenumber_patient" value="{{$record->patient->phonenumber}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="name_doctor" class="form-label">Nama Dokter</label>
              <input type="text" class="form-control" id="name_doctor" name="name_doctor" value="{{$record->doctor->name}}" readonly>
            </div>
            <div class="mb-3">
              <label for="specialist" class="form-label">Spesialis</label>
              <input type="text" class="form-control" id="specialist" name="specialist" value="{{$record->doctor->specialist}}" readonly>
            </div>
            <div class="mb-3">
              <label for="phonenumber_doctor" class="form-label">No Handphone</label>
              <input type="number" class="form-control" id="phonenumber_doctor" name="phonenumber_doctor" value="{{$record->doctor->phonenumber}}" readonly>
            </div>
          </div>
           <div class="mb-3">
            <label for="address_patient" class="form-label">Alamat</label>
            <textarea class="form-control" id="address_patient" name="address_patient" rows="2" readonly>{{$record->patient->address}}</textarea>
          </div>
          <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosa</label>
            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="2" readonly>{{$record->diagnosis}}</textarea>
          </div>
          <div class="mb-3">
            <label for="allergy" class="form-label">Alergi</label>
            <input type="text" class="form-control" id="allergy" name="allergy" value="{{$record->allergy}}" readonly>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="2" readonly>{{$record->description}}</textarea>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="height" class="form-label">Tinggi Badan</label>
              <input type="text" class="form-control" id="height" name="height" value="{{$record->height}} cm" readonly>
            </div>
            <div class="mb-3">
              <label for="blood" class="form-label">Golongan Darah</label>
              <input type="text" class="form-control" id="blood" name="blood" value="{{$record->blood}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="weight" class="form-label">Berat Badan</label>
              <input type="text" class="form-control" id="weight" name="weight" value="{{$record->weight}} kg" readonly>
            </div>
            <div class="mb-3">
              <label for="tension" class="form-label">Tekanan Darah</label>
              <input type="text" class="form-control" id="tension" name="tension" value="{{$record->tension}} mmHg" readonly>
            </div>
          </div>
          <div class="mb-3">
            <label for="operation" class="form-label">Tindakan</label>
            <textarea class="form-control" id="operation" name="operation" rows="2" readonly>{{$record->operation}}</textarea>
          </div>
          <div class="mb-3">
            <label for="drug" class="form-label">Obat</label>
            <input type="text" class="form-control" id="drug" name="drug" value="{{$record->drug->name}}" readonly>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="care" class="form-label">Rawat</label>
              <input type="text" class="form-control" id="care" name="care" value="{{$record->care->care}}" readonly>
            </div>
            <div class="mb-3">
              <label for="bed_id" class="form-label">No Tempat Tidur</label>
              <input type="number" class="form-control" id="bed_id" name="bed_id" value="{{$record->bed->id}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="hospital" class="form-label">Nama RS Rujukan</label>
              <input type="text" class="form-control" id="hospital" name="hospital" value="{{$record->hospital}}" readonly>
            </div>
            <div class="mb-3">
              <label for="outdate" class="form-label">Tanggal Keluar</label>
              <input type="date" class="form-control" id="outdate" name="outdate" value="{{$record->outdate}}" readonly>
            </div>
          </div>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary" href="/record">Kembali</i></a>
          <a class="btn btn-warning mx-1" href="/record/{{$record->id}}/edit">Ubah</i></a>
          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#comfirmModal">Hapus</a>
          <div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="text-danger modal-title fs-5" id="staticBackdropLabel"><strong>Konfirmasi</strong></p>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                  <p class="text-success">Anda yakin menghapus?
                    <form action="/record/{{$record->id}}" method="post" class="mx-1">
                      @method('delete')
                      @csrf
                      <button type="submit" class="badge bg-danger text-white border-0">Ya</button>
                    </form>
                    <p>
                      <a class="badge bg-secondary text-white" data-bs-dismiss="modal">Tidak</a>
                    </p>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection