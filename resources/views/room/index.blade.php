@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Ruangan</h3>
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
        <h5 class="card-title mb-0">Tabel Ruangan</h5>
        <a href="/room/create" class="btn btn-success my-3">Tambah</a>
        <form action="/room">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($rooms->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">No Ruangan</th>
            <th>Nama</th>
            <th>Gedung</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rooms as $room)
          <tr>
            <td>{{$loop->iteration + $rooms->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">{{$room->id}}</td>
            <td>{{$room->name}}</td>
            <td>{{$room->building->name}}</td>
            <td>
              <a href="/room/{{$room->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/room/{{$room->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/room/{{$room->id}}" method="post" class="d-inline">
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
          Tabel ruangan masih kosong <a href="/room/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah ruangan.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $rooms->links() }}
  </div>
</div>
@endsection