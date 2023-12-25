@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Obat</h3>
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
        <h5 class="card-title mb-0">Tabel Obat</h5>
        <a href="/drug/create" class="btn btn-success my-3">Tambah</a>
        <a onclick="window.print()" class="btn btn-secondary my-3">Print</a>
        <form action="/drug">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($drugs->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">No Obat</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th class="d-none d-md-table-cell">Bentuk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($drugs as $drug)
          <tr>
            <td>{{$loop->iteration + $drugs->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">{{$drug->id}}</td>
            <td>{{$drug->name}}</td>
            <td>{{$drug->type->name}}</td>
            <td class="d-none d-md-table-cell">{{$drug->form->name}}</td>
            <td>
              <a href="/drug/{{$drug->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/drug/{{$drug->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/drug/{{$drug->id}}" method="post" class="d-inline">
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
          Tabel obat masih kosong <a href="/drug/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah obat.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $drugs->links() }}
  </div>
</div>
@endsection