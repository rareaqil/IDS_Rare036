<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ auth()->user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    {{--
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
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          @if($menu == 'home')
          <a href="/dashboard" class="nav-link active">
            <i class="nav-icon fas fa-homet"></i>
            <p>
              Home
              <i class=""></i>
            </p>
          </a>
          @else
          <a href="/dashboard" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
              <i class=""></i>
            </p>
          </a>
          @endif
        </li>
        @if($menu == 'customer')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Customer
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @else
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Customer
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @endif
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if($submenu == 'customer_v1')
              <a href="/customer_v1" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer V1</p>
              </a>
              @else
              <a href="/customer_v1" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer V1</p>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if($submenu == 'customer_v2')
              <a href="/customer_v2" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer V2</p>
              </a>
              @else
              <a href="/customer_v2" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer V2</p>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if($submenu == 'tabel_customer')
              <a href="/customer" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Tabel Customer</p>
              </a>
              @else
              <a href="/customer" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tabel Customer</p>
              </a>
              @endif
            </li>
          </ul>
        </li>

        @if($menu == 'barcode')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-barcode"></i>
            <p>
              Barcode
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @else
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-barcode"></i>
            <p>
              Barcode
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @endif
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if($submenu == 'barcode')
              <a href="/barcode" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Tabel Barcode</p>
              </a>
              @else
              <a href="/barcode" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tabel Barcode</p>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if($submenu == 'scan')
              <a href="/scan" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Scan</p>
              </a>
              @else
              <a href="/scan" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Scan</p>
              </a>
              @endif
            </li>
          </ul>
        </li>

        @if($menu == 'toko')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>
              Geo
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @else
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>
              Geo
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @endif
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if($submenu == 'tabel_toko')
              <a href="/toko" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Toko</p>
              </a>
              @else
              <a href="/toko" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Toko</p>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if($submenu == 'tambah_kunjungan')
              <a href="/tambahKunjungan" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kunjungan</p>
              </a>
              @else
              <a href="/tambahKunjungan" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kunjungan</p>
              </a>
              @endif
            </li>
          </ul>
        </li>

        @if($menu == 'pengguna')
        <li class="nav-item menu-open">
          <a href="/excel" class="nav-link active">
            <i class="nav-icon fas fa-file-excel"></i>
            <p>
              Excel
            </p>
          </a>
          @else
        <li class="nav-item menu">
          <a href="/excel" class="nav-link ">
            <i class="nav-icon fas fa-file-excel"></i>
            <p>
              Excel
            </p>
          </a>
          @endif
        </li>

        @if($menu == 'scoreboard')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Score Board
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @else
        <li class="nav-item menu">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Score Board
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @endif
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if($submenu == 'controller')
              <a href="/scoreboard/controller" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Controller</p>
              </a>
              @else
              <a href="/scoreboard/controller" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Controller</p>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if($submenu == 'client')
              <a href="/scoreboard/client" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Client</p>
              </a>
              @else
              <a href="/scoreboard/client" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Client</p>
              </a>
              @endif
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
              <i class="fas fa-sign-out-alt"></i>

              <p>Log Out</p>
            </a>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>