<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="../../dist/img/logo servvo bulat-01.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Klik Servvo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-header">EXAMPLES</li> --}}
        <li class="nav-item">
          <a href="#" class="nav-link  {{Route::is('dashboard-index') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#"
            class="nav-link {{Route::is('relawan-index', 'relawan-view') ? 'active' : ''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Relawan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#"
            class="nav-link {{Route::is('pendaftaran-index', 'pendaftaran-view') ? 'active' : ''}}">
            <i class="nav-icon fas fa-plus-square"></i>
            <p>
              Pendaftaran Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#"
            class="nav-link {{Route::is('pemasangan-index', 'pemasangan-view') ? 'active' : ''}}">
            <i class="nav-icon fas fa-fire-extinguisher"></i>
            <p>
              Pemasangan Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#"
            class="nav-link {{Route::is('laporan-index', 'laporan-view') ? 'active' : ''}}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{Route::is('dataUser-index', 'dataRelawan-index', 'dataPendaftaran-index','dataPemasangan-index','dataLaporan-index') ? 'active' : ''}}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Laporan Data Apar
              <i class="fas fa-angle-left right"
                class="nav-link {{Route::is('dataUser-index', 'dataRelawan-index', 'dataPendaftaran-index') ? 'active' : ''}}"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>