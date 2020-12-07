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
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @if (request()->is("profile/$student->id") || request()->is("profile/$student->id/*"))
        <li class="nav-item active">
          @else
        <li class="nav-item">
          @endif

          @if (request()->is("profile/$student->id") || request()->is("profile/$student->id/*"))
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
                <a href="{{ route('profile', ['student' => $student->id]) }}"
                  class="nav-link{{ request()->is("profile/$student->id") ? ' active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Me</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile.edit', ['student' => $student->id]) }}"
                  class="nav-link{{ request()->is("profile/$student->id/edit") ? ' active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('password.edit', ['student' => $student->id]) }}"
                  class="nav-link{{ request()->is("profile/$student->id/password") ? ' active' : '' }}">
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
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>