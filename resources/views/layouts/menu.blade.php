<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Menu</li>
    <li class="nav-item">
      <a href="/dashboard" class="nav-link @if(Request::segment(1)== 'dashboard') active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/lapor-diri" class="nav-link @if(Request::segment(1)== 'lapor-diri') active @endif">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Lapor Diri
        </p>
      </a>
    </li>

    @if(auth()->user()->role == 'superadmin')
    <li class="nav-header">Setting</li>
    
    <li class="nav-item">
      <a href="/user" class="nav-link @if(Request::segment(1)== 'user') active @endif">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Manajemen User
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/master-data/kecamatan" class="nav-link @if(Request::segment(2)== 'kecamatan') active @endif">
        <i class="nav-icon fas fa-tag"></i>
        <p>
          Kecamatan
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/master-data/kelurahan" class="nav-link @if(Request::segment(2)== 'kelurahan') active @endif">
        <i class="nav-icon fas fa-tag"></i>
        <p>
          Kelurahan
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/master-data/tempat_test" class="nav-link @if(Request::segment(2)== 'tempat_test') active @endif">
        <i class="nav-icon fas fa-tag"></i>
        <p>
          Tempat Test
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/master-data/formstatus" class="nav-link @if(Request::segment(2)== 'formstatus') active @endif">
        <i class="nav-icon fas fa-tag"></i>
        <p>
          Status Form
        </p>
      </a>
    </li>
    
    @endif
  </ul>
</nav>
<!-- /.sidebar-menu -->