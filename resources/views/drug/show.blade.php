@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Obat</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Gambar</h5>
      </div>
      <div class="card-body text-center">
        @if ($drug->image)
          <img src="{{asset('storage/' . $drug->image)}}" alt="{{$drug->name}}" class="img-fluid mb-2" width="128" height="128" />
        @else
          <img src="{{asset('img/default-drug.png')}}" alt="{{$drug->name}}" class="img-fluid mb-2" width="128" height="128" >
        @endif
        <h5 class="card-title mb-0">{{$drug->name}}</h5>
        <div class="text-muted mb-2">{{$drug->type}}</div>
        <div>
          <a class="btn btn-secondary btn-sm" href="/drugprint/{{$drug->id_drug}}" target="_blank"><i data-feather="printer"></i></a>
          <a class="btn btn-warning btn-sm" href="/drug/{{$drug->id_drug}}/edit"><i data-feather="edit"></i></a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#comfirmModal"><i data-feather="trash-2"></i></a>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$drug->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$drug->updated_at->diffForHumans()}}</small> 
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
          <label for="id_drug" class="form-label">No Obat</label>
          <input type="number" class="form-control" id="id_drug" name="id_drug" value="{{$drug->id_drug}}" readonly>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$drug->name}}" readonly>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Desktipsi</label>
          <textarea class="form-control" name="description" id="description" rows="2" readonly>{{$drug->description}}</textarea>
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Jenis</label>
          <input type="text" class="form-control" id="type" name="type" value="{{$drug->type}}" readonly>
        </div>
        <div class="mb-3">
          <label for="form" class="form-label">Bentuk</label>
          <input type="text" class="form-control" id="form" name="form" value="{{$drug->form}}" readonly>
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Stok</label>
          <input type="number" class="form-control" id="stock" name="stock" value="{{$drug->stock}}" readonly>
        </div>
        <div class="mb-3">
          <label for="expired" class="form-label">Kadaluarsa</label>
          <input type="date" class="form-control" id="expired" name="expired" value="{{$drug->expired}}" readonly>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary" href="/drug">Kembali</i></a>
          <a class="btn btn-warning mx-1" href="/drug/{{$drug->id_drug}}/edit">Ubah</i></a>
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
                    <form action="/drug/{{$drug->id_drug}}" method="post" class="mx-1">
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