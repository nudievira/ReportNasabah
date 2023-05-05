<style>
  .dropdown-menu {
      max-height: 400px;
      width: 500px;
      overflow-y: auto;
  }
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown" >
        <a id="iconNotification" class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="margin-right: 50%">
          <i class="far fa-bell"></i>
            <span id="countNotification" class="badge badge-success navbar-badge" style="display: none; font-size: 0.5em;">0</span>
        </a>
        <div id="dropdownNotification" class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <a href="#" class="dropdown-item" style="height: 20px;">
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0);" class="dropdown-item dropdown-footer find-all">Lihat semua pemberitahuan</a>
        </div>
    </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> {{$online->Name}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{route('profile-index', ['id' => $online->id])}}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profile
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="{{route('auth-logout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>