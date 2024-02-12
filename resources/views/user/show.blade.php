@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Pengguna</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        @if ($user->image)
          <img src="{{asset('storage/' . $user->image)}}" alt="{{$user->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default.png')}}" alt="{{$user->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$user->name}}</h5>
        <div class="text-muted mb-2">{{$user->email}}</div>
        <div>
          @if (auth()->user()->role == 'Admin')
          <a class="btn btn-warning btn-sm" href="/user/{{$user->id}}/edit"><i data-feather="edit"></i></a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#comfirmModal"><i data-feather="trash-2"></i></a>
          @endif
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$user->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$user->updated_at->diffForHumans()}}</small> 
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
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Peran</label>
          <input type="role" class="form-control" id="role" name="role" value="{{$user->role}}" readonly>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          @if (auth()->user()->role == 'Admin')
          <a class="btn btn-secondary" href="/user">Kembali</i></a>
          <a class="btn btn-warning mx-1" href="/user/{{$user->id}}/edit">Ubah</i></a>
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
                    <form action="/user/{{$user->id}}" method="post" class="mx-1">
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
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection