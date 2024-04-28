@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Rekam Pasien</h3>
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
        <h5 class="card-title mb-0">Tabel Rekam Pasien</h5>
        <a href="/record/create" class="btn btn-success my-3">Tambah</a>
        <a href="/recordprint" target="_blank" class="btn btn-secondary my-3">Print</a>
        <form action="/record">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($records->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">No Rekam Pasien</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th class="d-none d-md-table-cell">Tanggal Masuk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($records as $record)
          <tr>
            <td>{{$loop->iteration + $records->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">{{$record->id}}</td>
            <td>{{$record->patient->name}}</td>
            <td>{{$record->doctor->name}}</td>
            <td class="d-none d-md-table-cell">{{$record->patient->dateofentry}}</td>
            <td>
              <a href="/record/{{$record->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/record/{{$record->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/record/{{$record->id}}" method="post" class="d-inline">
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
          Tabel rekam pasien masih kosong <a href="/record/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah rakam pasien.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $records->links() }}
  </div>
</div>
@endsection