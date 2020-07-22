<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Erstate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Project
              </p>
            </a>
          </li> --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allProject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddProject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>

            </ul>
          </li>

          {{-- // product menu  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allProduct') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddProduct') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end product menu --}}

          {{-- // customer menu  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allCustomer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddCustomer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Customer</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end customer menu --}}

          {{-- // Employee menu  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allEmployee') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Employee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddEmployee') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Employee</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end Employee menu --}}

           {{-- // Vendor menu  --}}
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Vendor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allVendor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Vendor</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddVendor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Vendor</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end Vendor menu --}}

           {{-- // Sales menu  --}}
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allSales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Sales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddSales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Sales</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end Sales menu --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>