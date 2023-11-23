@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Ubah</strong> Tempat Tidur</h3>
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
        <form action="/bed/{{$bed->id}}" method="post">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">Nomor Tempat Tidur</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{old('id', $bed->id)}}">
            @error('id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="room_id" class="form-label">Bentuk</label>
            <select class="form-select mb-3" name="room_id" id="room_id">
              @foreach ($rooms as $room)
                @if (old('room_id', $bed->room_id) == $room->id)
                  <option value="{{$room->id}}" selected>{{$room->name}}</option>
                  @else
                  <option value="{{$room->id}}">{{$room->name}}</option>        
                @endif   
              @endforeach
            </select>
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/bed">Kembali</i></a>
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