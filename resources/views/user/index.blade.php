@extends('layouts.index')
@section('main')
<h1 class="h3 mb-3"><strong>Analisis</strong> Pengguna</h1>
@if(session()->has('userLogin'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('userLogin') }}
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
        <h5 class="card-title mb-0">Tabel Pengguna</h5>
        <a href="/user/create" class="btn btn-success my-3">Tambah</a>
        <form action="/user">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari.." autofocus name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      @if ($users->count())
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th>No</th>
            <th class="d-none d-md-table-cell">Nama</th>
            <th>email</th>
            <th class="d-none d-md-table-cell">Peran</th>
            <th class="d-none d-md-table-cell">Terakhir Diubah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{$loop->iteration + $users->firstItem() - 1}}</td>
            <td class="d-none d-md-table-cell">{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td class="d-none d-md-table-cell">{{$user->role}}</td>
            <td class="d-none d-md-table-cell">{{$user->updated_at->diffForHumans()}}</td>
            <td>
              <a href="/user/{{$user->id}}" class="btn btn-info btn-sm"><i data-feather="eye"></i></a>
							<a href="/user/{{$user->id}}/edit" class="btn btn-warning btn-sm"><i data-feather="edit"></i></a>
              <form action="/user/{{$user->id}}" method="post" class="d-inline">
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
          Tabel pengguna masih kosong <a href="/user/create" class="alert-link">klik tombol <strong class="text-success">Tambah</strong></a> untuk menambah pengguna.
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $users->links() }}
  </div>
</div>
@endsection