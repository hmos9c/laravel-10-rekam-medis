@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Ruangan</h3>
<div class="row">
  <div class="col-md">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <form action="/room" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">No Ruangan</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" name="id" autofocus value="{{old('id')}}">
            @error('id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="building_id" class="form-label">Gedung</label>
            @if ($buildings->count())
              <select class="form-select mb-3" name="building_id" id="building_id">
                @foreach ($buildings as $building)
                  @if (old('building_id') == $building->id)
                    <option value="{{$building->id}}" selected>{{$building->name}}</option>
                  @else
                    <option value="{{$building->id}}">{{$building->name}}</option>        
                  @endif   
                @endforeach
              </select>
            @else
              <div class="alert alert-secondary @error('building_id') alert-danger is-invalid @enderror" id="building_id" name="building_id" role="alert">
                Tabel gedung masih kosong <a href="/building" class="alert-link"><strong class="text-success">Tambah</strong> tabel gedung</a> terlebih dahulu.
              </div>
              @error('building_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            @endif
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/room">Kembali</i></a>
              <button type="submit" class="btn btn-success">Tambah</button>
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