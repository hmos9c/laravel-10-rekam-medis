@extends('layouts.index')
@section('main')
<h1 class="h3 mb-3"><strong>Analisis</strong> Dasbor</h1>
<div class="row">
    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
          <div class="card-header">
            <h5 class="card-title mb-0">Jumlah Rekam Pasien</h5>
          </div>
          <div class="card-body py-3">
            <div class="chart chart-sm">
              <canvas id="chartjs-dashboard-line"></canvas>
            </div>
          </div>
        </div>
      </div> 

<input id="jan" type="hidden" value="{{$jan->count()}}">
<input id="feb" type="hidden" value="{{$feb->count()}}">
<input id="mar" type="hidden" value="{{$mar->count()}}">
<input id="apr" type="hidden" value="{{$apr->count()}}">
<input id="may" type="hidden" value="{{$may->count()}}">
<input id="jun" type="hidden" value="{{$jun->count()}}">
<input id="jul" type="hidden" value="{{$jul->count()}}">
<input id="aug" type="hidden" value="{{$aug->count()}}">
<input id="sep" type="hidden" value="{{$sep->count()}}">
<input id="oct" type="hidden" value="{{$oct->count()}}">
<input id="nov" type="hidden" value="{{$nov->count()}}">
<input id="dec" type="hidden" value="{{$dec->count()}}">

    <div class="col-xl-6 col-xxl-7">
      <div class="card flex-fill w-100">
        <div class="card-header">
          <h5 class="card-title mb-0">Jumlah Rawat</h5>
        </div>
        <div class="card-body d-flex">
          <div class="align-self-center w-100">
            <div class="py-3">
              <div class="chart chart-xs">
                <canvas id="chartjs-dashboard-pie"></canvas>
              </div>
            </div>

            <table class="table mb-0">
              <tbody>
                <tr>
                  <td>Rawat Inap</td>
                  <td class="text-end">{{$rawatinap->count()}}</td>
                  <input id="rawatinap" type="hidden" name="rawatinap" value="{{$rawatinap->count()}}">
                </tr>
                <tr>
                  <td>Rawat Jalan</td>
                  <td class="text-end" value='{{$rawatjalan->count()}}'>{{$rawatjalan->count()}}</td>
                  <input id="rawatjalan" type="hidden" name="rawatjalan" value="{{$rawatjalan->count()}}">
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="row">
        <div class="col-md">
            <div class="card">
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
            </div>
            <div class="card">
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
            </div>
        </div>
        <div class="col-md">
            <div class="card">
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
            </div>
            <div class="card">
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
            </div>
        </div>
        <div class="col-md">
            <div class="card">
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
            </div>
            <div class="card">
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
            </div>
        </div>
    </div>
@endsection