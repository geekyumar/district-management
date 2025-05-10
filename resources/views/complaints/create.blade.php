<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jobs List - Hexaware</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('templates.sidebar')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1401.48px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Create a Complaint</b></h1>
          </div>
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
        <form method="post" action="{{ url('/complaints/create') }}" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <!-- Complaint Type Dropdown -->
            <div class="col-md-6" data-select2-id="9">
                <div class="form-group" data-select2-id="8">
                    <label>Complaint Type</label>
                    <select class="form-control select2 select2-hidden-accessible" name="complaint_type" style="width: 100%;" required="" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option disabled="" selected="" data-select2-id="3">Select a complaint type</option>
                        <option data-select2-id="13">Water</option>
                        <option data-select2-id="14">Road</option>
                        <option data-select2-id="15">Electricity</option>
                        <option data-select2-id="16">Sanitation</option>
                    </select>
                </div>
            </div>

            <!-- District Dropdown -->
            <!-- District Dropdown -->
<div class="col-md-6">
    <div class="form-group">
        <label>District</label>
        <select class="form-control select2 select2-hidden-accessible" name="district" style="width: 100%;" required="" data-select2-id="4" tabindex="-1" aria-hidden="true">
            <option disabled="" selected="" data-select2-id="6">Select a district</option>
            <option>Ariyalur</option>
            <option>Chengalpattu</option>
            <option>Chennai</option>
            <option>Coimbatore</option>
            <option>Cuddalore</option>
            <option>Dharmapuri</option>
            <option>Dindigul</option>
            <option>Erode</option>
            <option>Kallakurichi</option>
            <option>Kancheepuram</option>
            <option>Karur</option>
            <option>Krishnagiri</option>
            <option>Madurai</option>
            <option>Mayiladuthurai</option>
            <option>Nagapattinam</option>
            <option>Namakkal</option>
            <option>Nilgiris</option>
            <option>Perambalur</option>
            <option>Pudukkottai</option>
            <option>Ramanathapuram</option>
            <option>Ranipet</option>
            <option>Salem</option>
            <option>Sivaganga</option>
            <option>Tenkasi</option>
            <option>Thanjavur</option>
            <option>Theni</option>
            <option>Thoothukudi (Tuticorin)</option>
            <option>Tiruchirappalli</option>
            <option>Tirunelveli</option>
            <option>Tirupathur</option>
            <option>Tiruppur</option>
            <option>Tiruvallur</option>
            <option>Tiruvannamalai</option>
            <option>Tiruvarur</option>
            <option>Vellore</option>
            <option>Viluppuram</option>
            <option>Virudhunagar</option>
        </select>
      </div>
</div>


            <!-- Town/City -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Town/City</label>
                    <input type="text" class="form-control" name="town" placeholder="Enter town or city name" required="">
                </div>
            </div>

            <!-- Pin Code -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pin Code</label>
                    <input type="text" class="form-control" name="pin_code" placeholder="Enter pin code" pattern="\d{5,6}" required="">
                </div>
            </div>

            <!-- Street Name -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Street Name</label>
                    <input type="text" class="form-control" name="street" placeholder="Enter street name">
                </div>
            </div>

            <!-- Location Link -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Google Maps Location Link</label>
                    <input type="url" class="form-control" name="location_link" placeholder="Paste Google Maps link to the location">
                </div>
            </div>

            <!-- Complaint Description -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Complaint Description</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter complaint details" required=""></textarea>
                </div>
            </div>

            <!-- File Upload -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload File (Optional)</label>
                    <input type="file" class="form-control-file" name="attachment">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit Complaint</button>
            </div>
        </div>
    </div>
</form>


            
                <!-- /.form-group -->
                
            <!-- /.row -->

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row -->
      </section></div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
