@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Obat</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Gambar</h5>
      </div>
      <div class="card-body text-center">
        <div class="card-body text-center">
          <form action="/drug" method="post" enctype="multipart/form-data">
            @csrf
          <img id="img-preview" src="{{asset('img/default-drug.png')}}" class="img-fluid mb-2"  width="128" height="128">
        </div>
          <label for="image" class="form-label">Unggah Gambar</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
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
            <label for="id" class="form-label">No Obat</label>
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
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="2">{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{old('stock')}}">
            @error('stock')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Jenis</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}">
            @error('type')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="form" class="form-label">Bentuk</label>
            <input type="text" class="form-control @error('form') is-invalid @enderror" id="form" name="form" value="{{old('form')}}">
            @error('form')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/drug">Kembali</i></a>
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