<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css');
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- /.navbar -->
  @include('admin.header');
  @include('admin.sidebar');

  @yield('content');

    @include('admin.footer');
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.jquery');
</body>
</html>
