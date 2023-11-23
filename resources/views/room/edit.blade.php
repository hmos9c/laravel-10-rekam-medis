@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Ubah</strong> Ruangan</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="h6 card-title">Aktifitas</h5>
          <p>
            <i data-feather="file-plus"></i><small> Dibuat {{$room->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$room->updated_at->diffForHumans()}}</small> 
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
        <form action="/room/{{$room->id}}" method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">Nomor Gedung</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{old('id', $room->id)}}">
            @error('id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $room->name)}}">
            @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="building_id" class="form-label">Gedung</label>
            <select class="form-select mb-3" name="building_id" id="building_id">
              @foreach ($buildings as $building)
                @if (old('building_id', $room->building_id) == $building->id)
                  <option value="{{$building->id}}" selected>{{$building->name}}</option>
                  @else
                  <option value="{{$building->id}}">{{$building->name}}</option>        
                @endif   
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{old('description', $room->description)}}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/room">Kembali</i></a>
              <button type="submit" class="btn btn-success">Ubah</button>
            </div>  
          </form>
      </div>
    </div>
  </div>
</div>
<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('#img-preview'); 
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFEvent){
      imgPreview.src = oFEvent.target.result;
    }
  }
</script>
@endsection