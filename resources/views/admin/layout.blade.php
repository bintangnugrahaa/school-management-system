<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School Management System</title>
  <base href="{{ asset('admincss') }}/" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  @yield('customCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img//logo-univpancasila.png" alt="Logo Universitas Pancasila" height="60" width="60">
    </div>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="dist/img/logo-univpancasila.png" alt="Logo Universitas Pancasila" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin SMS</span>
      </a>

      <div class="sidebar">

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

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-stream"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('academic-year.read') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Academic Year Mgmt
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('class.read') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Class Mgmt
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fee-head.read') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Fee Head Mgmt
                </p>
              </a>
            </li>
          </ul>
        </nav>

      </div>

    </aside>

    @yield('content')

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>


  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="plugins/chart.js/Chart.min.js"></script>

  <script src="plugins/sparklines/sparkline.js"></script>

  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>

  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="plugins/summernote/summernote-bs4.min.js"></script>

  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="dist/js/adminlte2167.js?v=3.2.0"></script>

  <script src="dist/js/demo.js"></script>

  <script src="dist/js/pages/dashboard.js"></script>
  @yield('customJs')
</body>

</html>