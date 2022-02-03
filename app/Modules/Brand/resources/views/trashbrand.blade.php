<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.css')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-1">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('displaycolor')}}">Color</a></li>
                        <li class="breadcrumb-item active">Trash</li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
             <div class="d-flex justify-content-center">
    <div class="col-md-12 ">
        <!-- general form elements -->
        <div class="card card-danger p-2">
          <div class="card-header">
            <h3 class="card-title">Trash Colors</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

          </div>

          <!-- /.card-header -->
            <table id="myTable" class="display">
                <thead>
                    <tr>

                        <th> Sr No </th>
                        <th>username</th>
                        <th>Color Name</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @php  $count=0; @endphp
                    @foreach ($list as $brand)
                   <tr>

                           <td class="text-center">{{$count+=1}}</td>

                           <td>{{$brand->username}}</td>

                           <td>{{$brand->name}}</td>
                            <td>
                                <a href="#"  onclick="restore_Brand({{$brand->id}})" class="fas fa-trash-restore-alt " style='font-size:24px'></a>&nbsp;&nbsp;
                                <a href="{{url('delete/')}}" class="fas fa-trash-alt" style='font-size:24px'></a>
                            </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>
@include('admin.footer')
</div>
     <!-- jQuery -->
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
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
{{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );


</script>

<script>
function restore_Brand(id){
        if(confirm('are your sure!! do  you want to Restore?')){
        jQuery.ajax({
            url:'restorebrand',
            type:'GET',
            data:{'id':id},
            success:function(result){
            console.log("Status Changed successfully ");
            window.location.reload();
            }
        });
    }
    }
  </script>
</body>
</html>
