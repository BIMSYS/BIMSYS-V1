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

        {{-- Role Student --}}
        @if (Auth::user()->role === 'student')
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <div class="student">
          <li class="nav-item">
            {{-- <a href="{{ route('admin.user.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user text-primary"></i>
            <p>
              Users
            </p>
            </a>

            <a href="{{ route('admin.lesson.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-reader text-primary"></i>
              <p>
                Lesson
              </p>
            </a>

            <a href="{{ route('admin.module.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open text-primary"></i>
              <p>
                Module
              </p>
            </a> --}}
          </li>
          {{-- @if (request()->is("profile/$auth->id") || request()->is("profile/$auth->id/*"))
          <li class="nav-item active">
            @else
          <li class="nav-item">
            @endif

            @if (request()->is("profile/$auth->id") || request()->is("profile/$auth->id/*"))
            <a href="#" class="nav-link active">
              @else
              <a href="#" class="nav-link">
                @endif

                <i class="nav-icon far fa-user"></i>
                <p>
                  Profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('profile', ['auth' => $auth->id]) }}"
          class="nav-link{{ request()->is("profile/$auth->id") ? ' active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>About Me</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile.edit', ['auth' => $auth->id]) }}"
              class="nav-link{{ request()->is("profile/$auth->id/edit") ? ' active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('password.edit', ['auth' => $auth->id]) }}"
              class="nav-link{{ request()->is("profile/$auth->id/password") ? ' active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Password</p>
            </a>
          </li>
      </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
  </div> --}}
  @elseif(Auth::user()->role === 'teacher')
  <div class="teacher">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview menu-open">
        <a href="{{ route('teacher.lesson.index') }}"
          class="nav-link {{ request()->is('teacher/lesson') ? 'active' : '' }}">
          <i class="nav-icon fas fa-book-reader"></i>
          <p>
            Lessons
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
        {{-- <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('teacher.lesson.index') }}"
              class="nav-link {{ request()->is('teacher/lesson') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Lessons List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Modules</p>
            </a>
          </li>
        </ul> --}}
      </li>
    </ul>
  </div>
  @else
  <div class="admin">
    <li class="nav-item">
      <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Users
        </p>
      </a>

      <a href="{{ route('admin.lesson.index') }}" class="nav-link {{ request()->is('admin/lesson') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-reader"></i>
        <p>
          Lesson
        </p>
      </a>

      <a href="{{ route('admin.module.index') }}" class="nav-link {{ request()->is('admin/module') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
          Module
        </p>
      </a>
    </li>
  </div>
  @endif
  </ul>
  </nav>
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

</aside>