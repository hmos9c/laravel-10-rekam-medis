<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>
  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
          <i class="align-middle" data-feather="settings"></i>
        </a>
        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
          @if (auth()->user()->image)
            <img src="{{asset('storage/' . auth()->user()->image)}}" alt="{{auth()->user()->name}}" class="avatar img-fluid rounded me-1"/>
          @else
            <img src="{{asset('img/default.png')}}" alt="{{auth()->user()->name}}" class="avatar img-fluid rounded me-1">
          @endif
            <span class="text-dark">{{auth()->user()->name}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="/user/{{auth()->user()->id}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
          @if (auth()->user()->role == 'Admin')
          <a class="dropdown-item" href="/user/{{auth()->user()->id}}/edit"><i class="align-middle me-1" data-feather="user"></i> Ganti Password</a>
          @endif
          <div class="dropdown-divider"></div>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="align-middle me-1" data-feather="log-out"></i> Log out</button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>