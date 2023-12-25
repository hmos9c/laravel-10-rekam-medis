@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Bentuk Obat</h3>
<div class="row">
  <div class="col-md">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <form action="/form" method="post">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Bentuk Obat</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{old('name')}}">
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
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/form">Kembali</i></a>
              <button type="submit" class="btn btn-success">Tambah</button>
          </div>  
          </form>
      </div>
    </div>
  </div>
</div>
@endsection