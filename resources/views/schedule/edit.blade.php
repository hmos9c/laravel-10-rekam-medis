@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Ubah</strong> Jadwal Dokter</h3>
<div class="row">
  <div class="col-md">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="card-title mb-0">Data</h5>
      </div>
      <div class="card-body">
        <form action="/schedule/{{$schedule->id}}" method="post">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="doctor_id" class="form-label">No Dokter</label>
            <input type="text" class="form-control @error('doctor_id') is-invalid @enderror" id="doctor_id" name="doctor_id" autofocus value="{{old('doctor_id', $schedule->doctor->id)}}">
            @error('doctor_id')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Jam</label>
            <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{old('time', $schedule->time)}}">
            @error('time')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="day_id" class="form-label">Hari</label>
              <select class="form-select mb-3" name="day_id" id="day_id">
                @foreach ($days as $day)
                  @if (old('day_id', $schedule->day->id) == $day->id)
                    <option value="{{$day->id}}" selected>{{$day->name}}</option>
                  @else
                    <option value="{{$day->id}}">{{$day->name}}</option>        
                  @endif   
                @endforeach
              </select>
          </div>
          <div class="mt-3 d-flex justify-content-end">
              <a class="btn btn-secondary me-1" href="/schedule">Kembali</i></a>
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>  
          </form>
      </div>
    </div>
  </div>
</div>
@endsection