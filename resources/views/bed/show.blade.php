@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Detail</strong> Tempat Tidur</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$bed->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$bed->updated_at->diffForHumans()}}</small> 
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
          <label for="id_bed" class="form-label">No Tempat Tidur</label>
          <input type="number" class="form-control" id="id_bed" name="id_bed" value="{{$bed->id_bed}}" readonly>
        </div>
        <div class="mb-3">
          <label for="building_id" class="form-label">Gedung</label>
          <input type="text" class="form-control" id="building_id" name="building_id" value="{{$bed->building}}" readonly>
        </div>
        <div class="mb-3">
          <label for="room_id" class="form-label">Ruangan</label>
          <input type="text" class="form-control" id="room_id" name="room_id" value="{{$bed->room}}" readonly>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary" href="/bed">Kembali</i></a>
          <a class="btn btn-warning mx-1" href="/bed/{{$bed->id_bed}}/edit">Ubah</i></a>
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
                    <form action="/bed/{{$bed->id_bed}}" method="post" class="mx-1">
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