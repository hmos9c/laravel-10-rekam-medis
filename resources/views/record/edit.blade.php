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
        <form action="/record/{{$record->id_record}}" method="post">
        @method('put')
        @csrf
        <div class="row">
          <div class="mb-3">
            <label for="dateofentry" class="form-label">Tanggal dan Jam Masuk</label>
            <input type="datetime-local" class="form-control @error('dateofentry') is-invalid @enderror" id="dateofentry" name="dateofentry" value="{{old('dateofentry', $record->dateofentry)}}">
            @error('dateofentry')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-md">
             <div class="mb-3">
              <label for="patient_id" class="form-label">No Pasien</label>
              <input type="number" class="form-control" id="patient_id" name="patient_id" value="{{$record->patient->id_patient}}" readonly>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="doctor_id" class="form-label">Dokter</label>
              <select class="form-select mb-3" name="doctor_id" id="doctor_id">
                @foreach ($doctors as $doctor)
                  @if (old('doctor_id', $record->doctor->id_doctor) == $doctor->id_doctor)
                    <option value="{{$doctor->id_doctor}}" selected>{{$doctor->name}}</option>
                    @else
                    <option value="{{$doctor->id_doctor}}">{{$doctor->name}}</option>        
                  @endif   
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosa</label>
            <textarea class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" name="diagnosis" rows="2">{{old('diagnosis', $record->diagnosis)}}</textarea>
            @error('diagnosis')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="allergy" class="form-label">Alergi</label>
            <input type="text" class="form-control @error('allergy') is-invalid @enderror" id="allergy" name="allergy" value="{{old('allergy', $record->allergy)}}">
            @error('allergy')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{old('description', $record->description)}}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="height" class="form-label">Tinggi Badan (cm)</label>
              <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{old('height', $record->height)}}">
              @error('height')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="blood" class="form-label">Golongan Darah</label>
              <input type="text" class="form-control @error('blood') is-invalid @enderror" id="blood" name="blood" value="{{old('blood', $record->blood)}}">
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
              <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight', $record->weight)}}">
              @error('weight')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="tension" class="form-label">Tekanan Darah (mmHg)</label>
              <input type="number" class="form-control @error('tension') is-invalid @enderror" id="tension" name="tension" value="{{old('tension', $record->tension)}}">
              @error('tension')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="operation" class="form-label">Tindakan</label>
            <textarea class="form-control @error('operation') is-invalid @enderror" id="operation" name="operation" rows="2">{{old('operation', $record->operation)}}</textarea>
            @error('operation')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="drug_id" class="form-label">Obat 1</label>
            <select class="form-select mb-3" name="drug_id" id="drug_id">
              @foreach ($drugs as $drug)
                @if (old('drug_id', $record->drug->id_drug) == $drug->id_drug)
                  <option value="{{$drug->id_drug}}" selected>{{$drug->name}}</option>
                  @else
                  <option value="{{$drug->id_drug}}">{{$drug->name}}</option>        
                @endif   
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="drug2" class="form-label">Obat 2</label>
            <select class="form-select mb-3" name="drug2" id="drug2">
              @foreach ($drugs as $drug)
                @if (old('drug2', $record->drug->id_drug) == $drug->id_drug)
                  <option value="{{$record->drug2}}" selected>{{$record->drug2}}</option>
                  @else
                  <option value="{{$drug->name}}">{{$drug->name}}</option>        
                @endif   
              @endforeach
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="drug3" class="form-label">Obat 3</label>
            <select class="form-select mb-3" name="drug3" id="drug3">
              @foreach ($drugs as $drug)
                @if (old('drug3', $record->drug->id_drug) == $drug->id_drug)
                  <option value="{{$record->drug3}}" selected>{{$record->drug3}}</option>
                  @else
                  <option value="{{$drug->name}}">{{$drug->name}}</option>        
                @endif   
              @endforeach
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="drug4" class="form-label">Obat 4</label>
            <select class="form-select mb-3" name="drug4" id="drug4">
              @foreach ($drugs as $drug)
                @if (old('drug4', $record->drug->id_drug) == $drug->id_drug)
                  <option value="{{$record->drug4}}" selected>{{$record->drug4}}</option>
                  @else
                  <option value="{{$drug->name}}">{{$drug->name}}</option>        
                @endif   
              @endforeach
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="care_id" class="form-label">Rawat</label>
              <select class="form-select mb-3" name="care_id" id="care_id">
                @foreach ($cares as $care)
                  @if (old('care_id', $record->care->id_care) == $care->id_care)
                    <option value="{{$care->id_care}}" selected>{{$care->care}}</option>
                    @else
                    <option value="{{$care->id_care}}">{{$care->care}}</option>        
                  @endif   
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="bed_id" class="form-label">No Tempat Tidur</label>
              <select class="form-select mb-3" name="bed_id" id="bed_id">
                @foreach ($beds as $bed)
                  @if (old('bed_id', $record->bed->id_bed) == $bed->id_bed)
                    <option value="{{$bed->id_bed}}" selected>{{$bed->room}}</option>
                    @else
                    <option value="{{$bed->id_bed}}">{{$bed->room}}</option>        
                  @endif   
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md">
            <div class="mb-3">
              <label for="hospital" class="form-label">Nama RS Rujukan</label>
              <input type="text" class="form-control @error('hospital') is-invalid @enderror" id="hospital" name="hospital" value="{{old('hospital', $record->hospital)}}">
              @error('hospital')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="outdate" class="form-label">Tanggal dan Jam Keluar</label>
              <input type="datetime-local" class="form-control @error('outdate') is-invalid @enderror" id="outdate" name="outdate" value="{{old('outdate', $record->outdate)}}">
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
          <button type="submit" class="btn btn-success">Ubah</button>
        </div>  
        </form>
      </div>
    </div>
  </div>
</div>
@endsection