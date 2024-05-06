@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Ubah</strong> Pegawai</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        <div class="card-body text-center">
          @if ($drug->image)
          <img src="{{asset('storage/' . $drug->image)}}" alt="{{$drug->name}}" id="img-preview" class="img-fluid mb-2"  width="128" height="128">
          @else
          <img id="img-preview" src="{{asset('img/default-drug.png')}}" class="img-preview img-fluid mb-2"  width="128" height="128">
          @endif
        </div>
        <form action="/drug/{{$drug->id_drug}}" method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
        <input type="hidden" name="oldImage" value="{{$drug->image}}">
          <label for="image" class="form-label">Unggah Gambar</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
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
            <label for="id_drug" class="form-label">Nomor Obat</label>
            <input type="number" class="form-control @error('id_drug') is-invalid @enderror" id="id_drug" name="id_drug" value="{{old('id_drug', $drug->id_drug)}}">
            @error('id_drug')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $drug->name)}}">
            @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="2">{{old('description', $drug->description)}}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Jenis</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type', $drug->type)}}">
            @error('type')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="form" class="form-label">Bentuk</label>
            <input type="text" class="form-control @error('form') is-invalid @enderror" id="form" name="form" value="{{old('form', $drug->form)}}">
            @error('form')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{old('stock', $drug->stock)}}">
            @error('stock')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="expired" class="form-label">Kadaluarsa</label>
            <input type="date" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired" value="{{old('expired', $drug->expired)}}">
            @error('expired')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/drug">Kembali</i></a>
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