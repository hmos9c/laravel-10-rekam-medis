@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Pegawai</h3>
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
        <h5 class="card-title mb-0">Tabel Pegawai</h5>
        <a href="/employee/create" class="btn btn-success my-3">Tambah</a>
        <a onclick="window.print();" class="btn btn-secondary my-3">Print</a>
        <form action="/employee">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($employees->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">No Pegawai</th>
            <th>Nama</th>
            <th class="d-none d-md-table-cell">Jabatan</th>
            <th class="d-none d-md-table-cell">No Handphone</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employees as $employee)
          <tr>
            <td>{{$loop->iteration + $employees->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td class="d-none d-md-table-cell">{{$employee->position}}</td>
            <td class="d-none d-md-table-cell">{{$employee->phonenumber}}</td>
            <td>
              <a href="/employee/{{$employee->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/employee/{{$employee->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/employee/{{$employee->id}}" method="post" class="d-inline">
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
          Tabel pegawai masih kosong <a href="/employee/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah pegawai.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $employees->links() }}
  </div>
</div>
@endsection