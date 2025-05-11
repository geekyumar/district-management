    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a href="/logout" class="p-10" >Logout</a>
      </li>
    </ul>

  </nav>
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">District Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 d-flex">
        <div class="info">
          <h4 class="text-white">{{ auth()->user()->name }}</h4>
          <p class="text-white">{{ auth()->user()->email }}</p>
          <p class="text-white">{{ auth()->user()->role }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Complaints
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/complaints/list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Complaints</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/complaints/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create a Complaint</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/complaints/status') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complaint Status</p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Municipal Works
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/municipal-works/list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Works</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/municipal-works/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Work</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Workers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/application-forms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List My Work</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/application-forms/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Status</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Realtime Metrics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/recruitment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Overview</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
