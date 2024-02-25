@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Rekam Pasien</h3>
<div class="row">
  <div class="col-md">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <form action="/record" method="post">
        @csrf
        <div class="row">
          <div class="col-md">
             <div class="mb-3">
              <label for="patient_id" class="form-label">No Pasien</label>
              <input type="number" class="form-control @error('patient_id') is-invalid @enderror" id="patient_id" name="patient_id" value="{{old('patient_id')}}">
              @error('patient_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="doctor_id" class="form-label">Dokter</label>
              @if ($doctors->count())
                <select class="form-select mb-3" name="doctor_id" id="doctor_id">
                  @foreach ($doctors as $doctor)
                    @if (old('doctor_id') == $doctor->id)
                      <option value="{{$doctor->id}}" selected>{{$doctor->name}}</option>
                      @else
                      <option value="{{$doctor->id}}">{{$doctor->name}}</option>        
                    @endif   
                  @endforeach
                </select>
              @else
                <div class="alert alert-secondary @error('doctor_id') alert-danger is-invalid @enderror" id="doctor_id" name="doctor_id" role="alert">
                  Tabel dokter masih kosong <a href="/doctor" class="alert-link"><strong class="text-success">Tambah</strong> tabel dokter</a> terlebih dahulu.
                </div>
                @error('doctor_id')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              @endif
            </div>
          </div>
          <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosa</label>
            <textarea class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" name="diagnosis" rows="2"></textarea>
            @error('diagnosis')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="allergy" class="form-label">Alergi</label>
            <input type="text" class="form-control @error('allergy') is-invalid @enderror" id="allergy" name="allergy" value="{{old('allergy')}}">
            @error('allergy')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2"></textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="height" class="form-label">Tinggi Badan (cm)</label>
              <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{old('height')}}">
              @error('height')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="blood" class="form-label">Golongan Darah</label>
              <input type="text" class="form-control @error('blood') is-invalid @enderror" id="blood" name="blood" value="{{old('blood')}}">
              @error('blood')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="weight" class="form-label">Berat Badan (kg)</label>
              <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight')}}">
              @error('weight')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="tension" class="form-label">Tekanan Darah (mmHg)</label>
              <input type="number" class="form-control @error('tension') is-invalid @enderror" id="tension" name="tension" value="{{old('tension')}}">
              @error('tension')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="operation" class="form-label">Tindakan</label>
            <textarea class="form-control @error('operation') is-invalid @enderror" id="operation" name="operation" rows="2"></textarea>
            @error('operation')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="drug_id" class="form-label">Obat</label>
            @if ($drugs->count())
              <select class="form-select mb-3" name="drug_id" id="drug_id">
                @foreach ($drugs as $drug)
                  @if (old('drug_id') == $drug->id)
                    <option value="{{$drug->id}}" selected>{{$drug->name}}</option>
                    @else
                    <option value="{{$drug->id}}">{{$drug->name}}</option>        
                  @endif   
                @endforeach
              </select>
            @else
              <div class="alert alert-secondary @error('drug_id') alert-danger is-invalid @enderror" id="drug_id" name="drug_id" role="alert">
                Tabel obat masih kosong <a href="/drug" class="alert-link"><strong class="text-success">Tambah</strong> tabel obat</a> terlebih dahulu.
              </div>
              @error('drug_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            @endif
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="care_id" class="form-label">Rawat</label>
              <select class="form-select mb-3" name="care_id" id="care_id">
                @foreach ($cares as $care)
                  @if (old('care_id') == $care->id)
                    <option value="{{$care->id}}" selected>{{$care->care}}</option>
                    @else
                    <option value="{{$care->id}}">{{$care->care}}</option>        
                  @endif   
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="bed_id" class="form-label">No Tempat Tidur</label>
              @if ($beds->count())
                <select class="form-select mb-3" name="bed_id" id="bed_id">
                  @foreach ($beds as $bed)
                    @if (old('bed_id') == $bed->id)
                      <option value="{{$bed->id}}" selected>{{$bed->id}}</option>
                      @else
                      <option value="{{$bed->id}}">{{$bed->id}}</option>        
                    @endif   
                  @endforeach
                </select>
              @else
                <div class="alert alert-secondary @error('bed_id') alert-danger is-invalid @enderror" id="bed_id" name="bed_id" role="alert">
                  Tabel tempat tidur masih kosong <a href="/bed" class="alert-link"><strong class="text-success">Tambah</strong> tabel tempat tidur</a> terlebih dahulu.
                </div>
                @error('bed_id')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              @endif
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="hospital" class="form-label">Nama RS Rujukan</label>
              <input type="text" class="form-control @error('hospital') is-invalid @enderror" id="hospital" name="hospital" value="{{old('hospital')}}">
              @error('hospital')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="outdate" class="form-label">Tanggal Keluar</label>
              <input type="date" class="form-control @error('outdate') is-invalid @enderror" id="outdate" name="outdate" value="{{old('outdate')}}">
              @error('outdate')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="mt-3 d-flex justify-content-end">
          <a class="btn btn-secondary me-1" href="/record">Kembali</i></a>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>  
        </form>
      </div>
    </div>
  </div>
</div>
@endsection