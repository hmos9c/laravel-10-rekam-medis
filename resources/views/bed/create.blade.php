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
            <label for="room_id" class="form-label">Ruangan</label>
            @if ($rooms->count())
              <select class="form-select mb-3" name="room_id" id="room_id">
                @foreach ($rooms as $room)
                  @if (old('room_id') == $room->id)
                    <option value="{{$room->id}}" selected>{{$room->name}}</option>
                  @else
                    <option value="{{$room->id}}">{{$room->name}}</option>        
                  @endif   
                @endforeach
              </select>
            @else
              <div class="alert alert-secondary @error('room_id') alert-danger is-invalid @enderror" id="room_id" name="room_id" role="alert">
                Tabel gedung masih kosong <a href="/room" class="alert-link"><strong class="text-success">Tambah</strong> tabel gedung</a> terlebih dahulu.
              </div>
              @error('room_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            @endif
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