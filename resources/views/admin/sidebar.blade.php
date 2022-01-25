<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
 </form>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            {{-- <a href="#" class="d-block">Alex</a> --}}
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
                <a href="{{url('admin.master')}}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
                <ul class="nav ">
                     <li class="nav-item">
                    {{-- <a href="" class="nav-link ">
                    <i class="fas fa-palette nav-icon"></i>
                    <p>Colors</p>
                    </a> --}}
                    <a href="#" class="nav-link">
                        <i class="fas fa-palette nav-icon"></i>
                        <p>
                        Colors
                        <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{url('welcome')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Color</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{url('displaycolor')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Colors</p>
                            </a>
                            </li>

                 </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
