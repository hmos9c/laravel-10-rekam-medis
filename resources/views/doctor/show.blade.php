@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Dokter</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        @if ($doctor->image)
          <img src="{{asset('storage/' . $doctor->image)}}" alt="{{$doctor->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default.png')}}" alt="{{$doctor->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$doctor->name}}</h5>
        <div class="text-muted mb-2">{{$doctor->specialist}}</div>
        <div>
          <a class="btn btn-secondary btn-sm" href="/doctorprint/{{$doctor->id_doctor}}" target="_blank"><i data-feather="printer"></i></a>
          @if (auth()->user()->role == 'Admin')
          <a class="btn btn-warning btn-sm" href="/doctor/{{$doctor->id_doctor}}/edit"><i data-feather="edit"></i></a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#comfirmModal"><i data-feather="trash-2"></i></a>
          @endif
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$doctor->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$doctor->updated_at->diffForHumans()}}</small> 
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
        <div class="mb-3">
          <label for="id_doctor" class="form-label">No Dokter</label>
          <input type="number" class="form-control" id="id_doctor" name="id_doctor" value="{{$doctor->id_doctor}}" readonly>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$doctor->name}}" readonly>
        </div>
        <div class="mb-3">
          <label for="specialist" class="form-label">Spesialis</label>
          <input type="text" class="form-control" id="specialist" name="specialist" value="{{$doctor->specialist}}" readonly>
        </div>
        <div class="mb-3">
          <label for="phonenumber" class="form-label">Telepon</label>
          <input type="number" class="form-control" id="phonenumber" name="phonenumber" value="{{$doctor->phonenumber}}" readonly>
        </div>
        <div class="mb-3">
          <label for="accepted" class="form-label">Tanggal Diterima</label>
          <input type="date" class="form-control" id="accepted" name="accepted" value="{{$doctor->accepted}}" readonly>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Alamat</label>
          <textarea class="form-control" name="address" id="address" rows="2" readonly>{{$doctor->address}}</textarea>
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Jenis Kelamin</label>
          <input type="text" class="form-control" id="gander" name="gande" value="{{$doctor->gender->gender}}" readonly>
        </div>
        <div class="mb-3">
          @if(session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="row">
            <div class="col-lg d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Dokumen Dokter</h5>
                  @if (auth()->user()->role == 'Admin')
                  <a href="/document/create/{{$doctor->id_doctor}}" class="btn btn-success my-3">Tambah</a>
                  @endif
                </div>
                @if ($documents->count())
                <table class="table table-hover my-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th class="d-none d-md-table-cell">Nama</th>
                      <th class="d-none d-md-table-cell">Dokumen</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($documents as $document)
                    <tr>
                      <td>{{$loop->iteration + $documents->firstItem() - 1}}</td>
                      <td class="d-none d-md-table-cell">{{$document->name}}</td>
                      <td class="d-none d-md-table-cell"><a href="{{ asset('storage/' . $document->document) }}" target="_blank" class="btn btn-success btn-sm">Unduh Dokumen</a></td>
                      <td> 
                        @if (auth()->user()->role == 'Admin')			
                        <form action="/document/{{$document->id_document}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus?')"><i data-feather="trash-2"></i></button>
                        </form>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <div class="d-flex justify-content-center mb-2">
                  <div class="alert alert-secondary col-11" role="alert">
                    Tabel dokumen masih kosong 
                    @if (auth()->user()->role == 'Admin')
                    <a href="/document/create/{{$doctor->id_doctor}}" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a>
                    @else
                      Hanya Admin 
                    @endif
                    untuk menambah dokumen.
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="d-flex justify-content-center">
              {{ $documents->links() }}
            </div>
          </div>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary" href="/doctor">Kembali</i></a>
          @if (auth()->user()->role == 'Admin')
          <a class="btn btn-warning mx-1" href="/doctor/{{$doctor->id_doctor}}/edit">Ubah</i></a>
          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#comfirmModal">Hapus</a>
          @endif
          <div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="text-danger modal-title fs-5" id="staticBackdropLabel"><strong>Konfirmasi</strong></p>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                  <p class="text-success">Anda yakin menghapus?
                    <form action="/doctor/{{$doctor->id_doctor}}" method="post" class="mx-1">
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