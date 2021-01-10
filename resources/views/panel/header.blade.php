<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

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
  </ul>
</nav>
<!-- /.navbar -->