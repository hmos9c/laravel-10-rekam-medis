@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Ubah</strong> Dokter</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        <div class="card-body text-center">
          @if ($doctor->image)
          <img src="{{asset('storage/' . $doctor->image)}}" alt="{{$doctor->name}}" id="img-preview" class="img-fluid rounded-circle mb-2"  width="128" height="128">
          @else
          <img id="img-preview" src="{{asset('img/default.png')}}" class="img-preview img-fluid rounded-circle mb-2"  width="128" height="128">
          @endif
        </div>
        <form action="/doctor/{{$doctor->id_doctor}}" method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
        <input type="hidden" name="oldImage" value="{{$doctor->image}}">
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
            <i data-feather="file-plus"></i><small> Dibuat {{$doctor->created_at->diffForHumans()}}</small> 
          </p>
          <p>
            <i data-feather="edit"></i><small> Diubah {{$doctor->updated_at->diffForHumans()}}</small> 
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
            <label for="id_doctor" class="form-label">No Dokter</label>
            <input type="number" class="form-control @error('id_doctor') is-invalid @enderror" id="id_doctor" name="id_doctor" value="{{old('id_doctor', $doctor->id_doctor)}}">
            @error('id_doctor')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $doctor->name)}}">
            @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="specialist" class="form-label">Spesialis</label>
            <input type="text" class="form-control @error('specialist') is-invalid @enderror" id="specialist" name="specialist" value="{{old('specialist', $doctor->specialist)}}">
            @error('specialist')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="phonenumber" class="form-label">Telepon</label>
            <input type="number" class="form-control @error('phonenumber') is-invalid @enderror" id="phonenumber" name="phonenumber" value="{{old('phonenumber', $doctor->phonenumber)}}">
            @error('phonenumber')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="accepted" class="form-label">Tanggal Diterima</label>
            <input type="date" class="form-control @error('accepted') is-invalid @enderror" id="accepted" name="accepted" value="{{old('accepted', $doctor->accepted)}}">
            @error('accepted')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="2">{{old('address', $doctor->address)}}</textarea>
            @error('address')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="gender_id" class="form-label">Jenis Kelamin</label>
            <select class="form-select mb-3" name="gender_id" id="gender_id">
              @foreach ($genders as $gender)
                @if (old('gender_id', $doctor->gender_id) == $gender->id_gender)
                  <option value="{{$gender->id_gender}}" selected>{{$gender->gender}}</option>
                  @else
                  <option value="{{$gender->id_gender}}">{{$gender->gender}}</option>        
                @endif   
              @endforeach
            </select>
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/doctor">Kembali</i></a>
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