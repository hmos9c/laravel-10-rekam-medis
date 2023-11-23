@extends('layouts.index')
@section('main')
<h1 class="h3 mb-3"><strong>Analisis</strong> Dasbor</h1>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <a href="/employee" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Pegawai</h5>
                            </div>
    
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{$employees->count()}}</h1>
                    </div>
                </a>
            </div>
            <div class="card">
							<a href="/bed" class="text-decoration-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Tempat Tidur</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="clipboard"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{$beds->count()}}</h1>
                </div>
							</a>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
							<a href="/doctor" class="text-decoration-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Dokter</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user-plus"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{$doctors->count()}}</h1>
                </div>
							</a>
            </div>
            <div class="card">
							<a href="/drug" class="text-decoration-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Obat</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="truck"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{$drugs->count()}}</h1>
                </div>
							</a>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
							<a href="/patient" class="text-decoration-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Pasien</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{$patients->count()}}</h1>
                </div>
							</a>
            </div>
            <div class="card">
							<a href="/record" class="text-decoration-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Rekam Pasien</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="book"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{$records->count()}}</h1>
                </div>
							</a>
            </div>
        </div>
    </div>
@endsection