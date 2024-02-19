<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="/">
      <span class="align-middle">RS Cijantung</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Data
      </li>

      <li class="sidebar-item {{Request::is('dashboard')?'active':''}}">
        <a class="sidebar-link" href="/dashboard">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>

      @if (auth()->user()->role == 'Admin')
      <li class="sidebar-item {{Request::is('employee*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/employee">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pegawai</span>
        </a>
      </li>
      

      <li class="sidebar-item {{Request::is('doctor*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/doctor">
          <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Dokter</span>
        </a>
      </li>
      @endif

      <li class="sidebar-item {{Request::is('patient*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/patient">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pasien</span>
        </a>
      </li>

      @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Dokter')
      <li class="sidebar-header">
        Obat & Jenis
      </li>

      {{-- <li class="sidebar-item {{Request::is('type*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/type">
          <i class="align-middle" data-feather="package"></i> <span class="align-middle">Jenis Obat</span>
        </a>
      </li>

      <li class="sidebar-item {{Request::is('form*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/form">
          <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Bentuk & Sediaan</span>
        </a>
      </li> --}}

      <li class="sidebar-item {{Request::is('drug*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/drug">
          <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Obat</span>
        </a>
      </li>
      @endif

      @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Pegawai')
      <li class="sidebar-header">
        Ruangan & Kamar
      </li>

      {{-- <li class="sidebar-item {{Request::is('building*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/building">
          <i class="align-middle" data-feather="home"></i> <span class="align-middle">Gedung</span>
        </a>
      </li>

      <li class="sidebar-item {{Request::is('room*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/room">
          <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Ruangan</span>
        </a>
      </li> --}}

      <li class="sidebar-item {{Request::is('bed*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/bed">
          <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Tempat Tidur</span>
        </a>
      </li>
      @endif

      <li class="sidebar-header">
        Rekam
      </li>

      @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Dokter')
      <li class="sidebar-item {{Request::is('schedule*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/schedule">
          <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Jadwal</span>
        </a>
      </li>
      @endif

      <li class="sidebar-item {{Request::is('record*') ? 'active' : ''}}">
        <a class="sidebar-link" href="/record">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">Rekam Pasien</span>
        </a>
      </li>

      @if (auth()->user()->role === 'Admin')
      <li class="sidebar-header">
        Administrasi
      </li>

      <li class="sidebar-item {{Request::is('user*')?'active':''}}">
        <a class="sidebar-link" href="/user">
          <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Pengguna</span>
        </a>
      </li>
      @endif
    </ul>
  <div class="py-5"></div>
  </div>
</nav>