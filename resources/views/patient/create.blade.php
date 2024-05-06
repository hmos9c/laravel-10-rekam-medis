@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Pasien</h3>
<div class="row">
  <div class="col-md-4 col-xl-3">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Profil</h5>
      </div>
      <div class="card-body text-center">
        <div class="card-body text-center">
          <form action="/patient" method="post" enctype="multipart/form-data">
          @csrf
          <img id="img-preview" src="{{asset('img/default.png')}}" class="img-fluid rounded-circle mb-2"  width="128" height="128">
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
        <div class="row">
          <div class="col-md">
            <div class="mb-3">
              <label for="id_patient" class="form-label">NIK</label>
              <input type="number" class="form-control @error('id_patient') is-invalid @enderror" id="id_patient" name="id_patient" autofocus value="{{old('id_patient')}}">
              @error('id_patient')
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
              <label for="city" class="form-label">Tempat Lahir</label>
              <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{old('city')}}">
              @error('city')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="dateofbirth" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
              @error('dateofbirth')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="gender_id" class="form-label">Jenis Kelamin</label>
              <select class="form-select mb-3" name="gender_id" id="gender_id">
                @foreach ($genders as $gender)
                  @if (old('gender_id') == $gender->id_gender)
                    <option value="{{$gender->id_gender}}" selected>{{$gender->gender}}</option>
                    @else
                    <option value="{{$gender->id_gender}}">{{$gender->gender}}</option>        
                  @endif   
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="religion_id" class="form-label">Agama</label>
              <select class="form-select mb-3" name="religion_id" id="religion_id">
                @foreach ($religions as $religion)
                  @if (old('religion_id') == $religion->id_religion)
                    <option value="{{$religion->id_religion}}" selected>{{$religion->name}}</option>
                  @else
                  <option value="{{$religion->id_religion}}">{{$religion->name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="status_id" class="form-label">Status Menikah</label>
              <select class="form-select mb-3" name="status_id" id="status_id">
                @foreach ($statuses as $status)
                  @if (old('status_id') == $status->id_status)
                    <option value="{{$status->id_status}}" selected>{{$status->status}}</option>
                  @else
                  <option value="{{$status->id_status}}">{{$status->status}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="job" class="form-label">Perkerjaan</label>
              <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" value="{{old('job')}}">
              @error('job')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nationality_id" class="form-label">Kewarganegaraan</label>
              <select class="form-select mb-3" name="nationality_id" id="nationality_id">
                @foreach ($nationalities as $nationality)
                  @if (old('nationality_id') == $nationality->id_nationality)
                    <option value="{{$nationality->id_nationality}}" selected>{{$nationality->nationality}}</option>
                  @else
                  <option value="{{$nationality->id_nationality}}">{{$nationality->nationality}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="phonenumber" class="form-label">No handphone</label>
              <input type="number" class="form-control @error('phonenumber') is-invalid @enderror" id="phonenumber" name="phonenumber" value="{{old('phonenumber')}}">
              @error('phonenumber')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
              @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="2">{{old('address')}}</textarea>
            @error('address')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mt-3 d-flex justify-content-end">
            <a class="btn btn-secondary me-1" href="/patient">Kembali</i></a>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>  
        </form>
        </div>
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