@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Jenis Obat</h3>
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
        <h5 class="card-title mb-0">Tabel Jenis Obat</h5>
        <a href="/type/create" class="btn btn-success my-3">Tambah</a>
        <form action="/type">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($types->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Di Buat</th>
            <th class="d-none d-md-table-cell">Terakhir Diubah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($types as $type)
          <tr>
            <td>{{$loop->iteration + $types->firstItem() - 1}}</td>
            <td>{{$type->name}}</td>
            <td>{{$type->created_at->diffForHumans()}}</td>
            <td class="d-none d-md-table-cell">{{$type->updated_at->diffForHumans()}}</td>
            <td>
              <a href="/type/{{$type->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/type/{{$type->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/type/{{$type->id}}" method="post" class="d-inline">
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
          Tabel jenis obat masih kosong <a href="/type/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah jenis obat.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $types->links() }}
  </div>
</div>
@endsection