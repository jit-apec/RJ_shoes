<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Shoes Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Shoes Shop</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/' . Auth::user()->image) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
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
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    <ul class="nav ">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-palette nav-icon"></i>
                                <p>
                                    Colors
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/color/add') }}" class="nav-link">
                                        <i class=" fa fa-plus-square nav-icon"></i>
                                        <p>Add Color</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/color/displaycolor') }}" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>Colors</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav ">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-list-alt nav-icon"></i>
                                        <p>Category<i class="fas fa-angle-left right"></i> </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/admin/brand/addBrands') }}" class="nav-link">
                                                <i class="fa fa-plus-square nav-icon"></i>
                                                <p>Add Brand</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/admin/brand/display') }}" class="nav-link">
                                                <i class="fa fa-list nav-icon"></i>
                                                <p>Brand</p>
                                            </a>
                                        </li>

                                    </ul>
                                    <ul class="nav ">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-shoe-prints nav-icon"></i>
                                                <p>Products<i class="fas fa-angle-left right"></i></p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ url('/admin/product/addproduct') }}"
                                                        class="nav-link">
                                                        <i class="fa fa-plus-square nav-icon"></i>
                                                        <p>Add products</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ url('/admin/product/display') }}"
                                                        class="nav-link">
                                                        {{-- <i class="far fa-list-alt nav-icon"></i> --}}
                                                        <i class="fa fa-list nav-icon"></i>
                                                        <p>products</p>
                                                    </a>
                                                </li>
                                            </ul>

                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="nav-link ">
                                                <i class="nav-icon fa fa-power-off"></i>
                                                <p>Logout</p>
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                            </ul>
                        </li>
                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
