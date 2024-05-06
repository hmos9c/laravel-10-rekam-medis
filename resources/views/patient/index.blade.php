@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Pasien</h3>
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
  <div class="col-lg d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h5 class="card-title mb-0">Tabel Pasien</h5>
        <a href="/patient/create" class="btn btn-success my-3">Tambah</a>
        <a href="/patientprint" target="_blank" class="btn btn-secondary my-3">Print</a>
        <form action="/patient">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($patients->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">Foto</th>
            <th class="d-none d-md-table-cell">NIK</th>
            <th>Nama</th>
            <th>No Handphone</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($patients as $patient)
          <tr>
            <td>{{$loop->iteration + $patients->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">
              @if ($patient->image)
              <img src="{{asset('storage/' . $patient->image)}}" alt="{{$patient->name}}" width="50" height="50" />
            @else
              <img src="{{asset('img/default.png')}}" alt="{{$patient->name}}" class="img-fluid rounded-circle mb-2" width="50" height="50" >
            @endif
            </td>
            <td class="d-none d-md-table-cell">{{$patient->id_patient}}</td>
            <td>{{$patient->name}}</td>
            <td>{{$patient->phonenumber}}</td>
            <td>
              <a href="/patient/{{$patient->id_patient}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/patient/{{$patient->id_patient}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/patient/{{$patient->id_patient}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus?')"><i data-feather="trash-2"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="d-flex justify-content-center mb-2">
        <div class="alert alert-secondary col-11" role="alert">
          Tabel pasien masih kosong <a href="/patient/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah pasien.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $patients->links() }}
  </div>
</div>
@endsection