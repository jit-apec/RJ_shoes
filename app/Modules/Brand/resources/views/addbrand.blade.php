<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.css')
</head>
<body class="hold-transition sidebar-mini">
    @include('admin.header')
    @include('admin.sidebar')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-1">
                    <div class="col-sm-6">
                      <h1 class="m-0">Add Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('display')}}">Brand</a></li>
                        <li class="breadcrumb-item active">Add</li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
             <div class="d-flex justify-content-center">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Brand</h3>
          </div>
          <div class="text-center mt-0 mb-0 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="addbrand">
              @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Brand">
              </div>

              <label> Status</label>
              <div class="form-check">


                <input class="form-check-input" type="radio" name="status"  value="Y" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Y
                </label>
                &nbsp; &nbsp; &nbsp; &nbsp;
                <input class="form-check-input" type="radio" name="status"  value="N">
                <label class="form-check-label" for="flexRadioDefault2">
                 N
                </label>

              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer " align="center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form></div>
        </div>
    </div>
</div>
</div>
    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
