<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <div class="mb-2 d-flex justify-content-center brand-link">
    <a href="{{ route('home') }}" class="">
      <img src="{{ URL::asset('/img/logo.png') }}" alt="BIMSYS Logo" class="brand-image " style="opacity: .8">
    </a>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        {{-- Role Student --}}
        @if (Auth::user()->role === 'student')
        <div class="student">
          <li class="nav-item">
            <a href="{{ route('student.lesson.index') }}"
              class="nav-link {{ request()->is('student/lesson') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-reader"> </i>
              <p>
                Lessons
              </p>
            </a>
          </li>
        </div>

        @elseif(Auth::user()->role === 'teacher')
        <div class="teacher">
          <li class="nav-item">
            <a href="{{ route('teacher.lesson.index') }}"
              class="nav-link {{ request()->is('teacher/lesson') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-reader"> </i>
              <p>
                Lessons
              </p>
            </a>
          </li>
        </div>
        @else
        <div class="admin">
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}"
              class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>

            <a href="{{ route('admin.lesson.index') }}"
              class="nav-link {{ request()->is('admin/lesson') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Lesson
              </p>
            </a>

            <a href="{{ route('admin.module.index') }}"
              class="nav-link {{ request()->is('admin/module') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Module
              </p>
            </a>
          </li>
        </div>
        @endif

        @php
        $role = auth()->user()->role
        @endphp
        <li class="nav-header"><strong>USER</strong></li>
        @if ($role != 'admin')
        <li class="nav-item">
          <a href="{{ route("profile.$role") }}" class="nav-link {{ request()->is("$role/profile") ? 'active' : '' }}">
            <i class="nav-icon fas fa-id-card"></i>
            Profile
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

</aside>