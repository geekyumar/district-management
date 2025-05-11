<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>District Management | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


  @include('templates.sidebar')

<div class="content-wrapper" style="min-height: 1401.48px;">


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
    <h1 class="ml-3">Welcome to District Management System!</h1>
    <h5 class="ml-3">Check the sidebar for options.</h5>
    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          
          <!-- /.card-header -->
           
          
<form method="get" action="{{ url('/admin/work-status') }}">
  <div class="card-body">
    
    <!-- Title -->
    <div class="row mb-3">
      <div class="col-md-12">
        <h5>Total List of Work and Status</h5>
      </div>
    </div>

    <!-- Work Status Table -->
    <div class="row">
      <div class="col-md-12">
        <div class="card-body table-responsive p-0 pt-2">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Complaint ID</th>
                <th>User Name</th>
                <th>Complaint Type</th>
                <th>Assigned To</th>
                <th>Instructions</th>
                <th>Assigned Date</th>
                <th>Status</th>
                <th>Last Updated</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row 1 -->
              <tr>
                <td>CMP001</td>
                <td>John Doe</td>
                <td>Water</td>
                <td>Worker A</td>
                <td>Fix broken pipe</td>
                <td>2024-09-25</td>
                <td><span class="badge bg-warning">In Progress</span></td>
                <td>2024-09-26</td>
              </tr>

              <!-- Example Row 2 -->
              <tr>
                <td>CMP002</td>
                <td>Jane Smith</td>
                <td>Electricity</td>
                <td>Worker B</td>
                <td>Check transformer</td>
                <td>2024-09-24</td>
                <td><span class="badge bg-success">Resolved</span></td>
                <td>2024-09-25</td>
              </tr>

              <!-- More rows to be loaded dynamically -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</form>


          

              
                <!--<!--<label>Position</label>
                  <select class="select2" data-placeholder="Select a Department" name="position" style="width: 100%;">
                    <option disabled selected>Select Position</option>
                    <option>HR</option>
                    <option>IT (Developer)</option>
                    <option>Marketing</option>
                    <option>Sales</option>
                    <option>Finance</option>
                    <option>Auditing</option>
                  </select>
                </div>
                 /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!--<div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label>Source</label>
                  <select class="form-control select2" data-placeholder="Select an Employment Type" name="employment_type" style="width: 100%;">
                    <option selected disabled>Select Source</option>
                    <option>Job Board</option>
                    <option>Referral</option>
                  </select>
                </div>
            </div>
                <!-- /.form-group -->
                <!--<br>
                  <div class="form-group">
                    <label for="fieldsToInclude">Fields to Include</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="applicantName" name="fieldsToInclude[]" value="applicantName">
                        <label class="form-check-label" for="applicantName">
                            Applicant Name
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dateApplied" name="fieldsToInclude[]" value="dateApplied">
                        <label class="form-check-label" for="dateApplied">
                            Date Applied
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status" name="fieldsToInclude[]" value="status">
                        <label class="form-check-label" for="status">
                            Status
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="source" name="fieldsToInclude[]" value="source">
                        <label class="form-check-label" for="source">
                            Source
                        </label>
                    </div>
                </div>
                <!-- /.form-group -->
              </section></div>
  
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
