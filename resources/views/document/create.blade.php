@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Dokumen Dokter</h3>
<div class="row mb-3">
  <div class="col-md-8 col-xl">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Dokumen</h5>
      </div>
      <form action="/document" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
          <div class="mb-3">
            <label for="doctor_id" class="form-label">No Dokter</label>
            <input type="number" readonly class="form-control @error('doctor_id') is-invalid @enderror" id="doctor_id" name="doctor_id" autofocus value="{{$doctor}}">
            @error('doctor_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama Dokumen</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="document" class="form-label">Unggah Dokumen</label>
            <input class="form-control @error('document') is-invalid @enderror" type="file" id="document" name="document" value="{{old('document')}}">
            @error('document')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/doctor">Kembali</i></a>
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