<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Menu</a>
    </li> --}}
  </ul>

  <!-- SEARCH FORM -->
  {{-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> --}}

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false" v-pre>
      @if (Auth::user()->role === 'admin')
      {{ 'Admin' }}
      @elseif(Auth::user()->role === 'student')
      {{ auth()->user()->student->student_fullname }}
      @elseif(Auth::user()->role === 'teacher')
      {{ auth()->user()->teacher->teacher_fullname }}
      @endif
    </a>
    <div class="image pr-4">
      <img src="
      @if (auth()->user()->role === 'teacher')
      {{ URL::asset(auth()->user()->teacher->teacher_image)}}
      @elseif(auth()->user()->role === 'student')
      {{ URL::asset(auth()->user()->student->student_image)}}
      @else
      {{ URL::asset('img/profile-user.png') }}
      @endif
      " class="img-circle elevation-2" width="35px" height="35px" alt="User Image">
    </div>

    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
    </div> --}}
  </ul>
</nav>
<!-- /.navbar -->