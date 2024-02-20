@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Tempat Tidur</h3>
<div class="row">
  <div class="col-md">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <form action="/bed" method="post">
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">No Tempat Tidur</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" name="id" autofocus value="{{old('id')}}">
            @error('id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="building" class="form-label">Gedung</label>
            <input type="text" class="form-control @error('building') is-invalid @enderror" id="building" name="building" autofocus value="{{old('building')}}">
            @error('building')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="room" class="form-label">Ruangan</label>
            <input type="text" class="form-control @error('room') is-invalid @enderror" id="room" name="room" autofocus value="{{old('room')}}">
            @error('room')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/bed">Kembali</i></a>
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