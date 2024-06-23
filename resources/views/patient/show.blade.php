@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Pasien</h3>
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
        <div>
          <a class="btn btn-secondary btn-sm" href="/patientprint/{{$patient->id_patient}}" target="_blank"><i data-feather="printer"></i></a>
          <a class="btn btn-warning btn-sm" href="/patient/{{$patient->id_patient}}/edit"><i data-feather="edit"></i></a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#comfirmModal"><i data-feather="trash-2"></i></a>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$patient->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$patient->updated_at->diffForHumans()}}</small> 
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
          <div class="col-md">
            <div class="mb-3">
              <label for="id_patient" class="form-label">NIK</label>
              <input type="number" class="form-control" id="id_patient" name="id_patient" value="{{$patient->id_patient}}" readonly>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$patient->name}}" readonly>
            </div>
            <div class="mb-3">
              <label for="city" class="form-label">Tempat Lahir</label>
              <input type="text" class="form-control" id="city" name="city" value="{{$patient->city}}" readonly>
            </div>
            <div class="mb-3">
              <label for="dateofbirth" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$patient->dateofbirth}}" readonly>
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Jenik Kelamin</label>
              <input type="text" class="form-control" id="gender" name="gender" value="{{$patient->gender->gender}}" readonly>
            </div>
            <div class="mb-3">
              <label for="religion" class="form-label">Agama</label>
              <input type="text" class="form-control" id="religion" name="religion" value="{{$patient->religion->name}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="status" class="form-label">Status Menikah</label>
              <input type="text" class="form-control" id="status" name="status" value="{{$patient->status->status}}" readonly>
            </div>
            <div class="mb-3">
              <label for="job" class="form-label">Perkerjaan</label>
              <input type="text" class="form-control" id="job" name="job" value="{{$patient->job}}" readonly>
            </div>
            <div class="mb-3">
              <label for="nationality" class="form-label">nationality</label>
              <input type="text" class="form-control" id="nationality" name="nationality" value="{{$patient->nationality->nationality}}" readonly>
            </div>
            <div class="mb-3">
              <label for="dateofentry" class="form-label">Tanggal Masuk</label>
              <input type="date" class="form-control" id="dateofentry" name="dateofentry" value="{{$patient->dateofentry}}" readonly>
            </div>
            <div class="mb-3">
              <label for="phonenumber" class="form-label">No Handphone</label>
              <input type="number" class="form-control" id="phonenumber" name="phonenumber" value="{{$patient->phonenumber}}" readonly>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$patient->email}}" readonly>
            </div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" name="address" id="address" rows="2" readonly>{{$patient->address}}</textarea>
          </div>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary" href="/patient">Kembali</i></a>
          <a class="btn btn-warning mx-1" href="/patient/{{$patient->id_patient}}/edit">Ubah</i></a>
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
                    <form action="/patient/{{$patient->id_patient}}" method="post" class="mx-1">
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
  <div class="card-body">
    <div class="mb-3">
      <div class="row">
        <div class="col-lg d-flex">
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">Rekam Pasien</h5>
              <a href="" class="btn btn-success my-3">Tambah</a>
            </div>
            @if ($records->count())
            <table class="table table-hover my-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th class="d-none d-md-table-cell">Tanggal Periksa</th>
                  <th class="d-none d-md-table-cell">Dokter</th>
                  <th class="d-none d-md-table-cell">Rawat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                <tr>
                  <td>{{$loop->iteration + $records->firstItem() - 1}}</td>
                  <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($record->dateofentry)->format('d/m/Y')}}</td>
                  <td class="d-none d-md-table-cell">{{$record->doctor->name}}</td>
                  <td class="d-none d-md-table-cell">{{$record->care->care}}</td>
                  <td class="d-none d-md-table-cell"><a href="/record/{{$record->id_record}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center mb-2">
              <div class="alert alert-secondary col-11" role="alert">
                Tabel rekam pasien masih kosong 
                <a href="" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a>
                untuk menambah rekam pasien.
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="d-flex justify-content-center">
          {{ $records->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection