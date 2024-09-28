<!-- MAIN SIDEBAR START -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
        <img src="{{asset('images/car-logo1.png')}}" alt="RentaCar Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">RentaCar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/commentor-item1.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $admin->name ?? 'Admin' ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline d-none">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin/dashboard" class="nav-link  {{$page_index == 'dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/dashboard/car" class="nav-link  {{$page_index == 'cars' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Cars
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/dashboard/rental" class="nav-link  {{$page_index == 'rental' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Rental
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/dashboard/customer" class="nav-link  {{$page_index == 'customer' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Customer
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/dashboard/contact" class="nav-link  {{$page_index == 'contact' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contacts
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-check nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/dashboard/settings" class="nav-link  {{$page_index == 'settings' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/logout" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Logout</p>
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
<!-- MAIN SIDEBAR END -->
