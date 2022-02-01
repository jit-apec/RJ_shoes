
<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.css')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  /> --}}

     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')

        {{-- @extends('admin.master');

        @section('content'); --}}
        <div class="content-wrapper" >
            <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0" >Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">Brand</li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
             <div class="d-flex justify-content-center">
    <div class="col-md-12 ">
        <!-- general form elements -->
        <div class="card card-primary p-1">
          <div class="card-header">
            <h3 class="card-title">Brand</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " data-toggle="modal" data-target="#myModal">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;

            <a class="btn btn-danger bg-gradient-danger float-right btn-sm"
             href="{{ url('trashbrand') }}" role="button">Trash &nbsp;<i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="addbrand" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addbrand">Add Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="addbrand">
                            @csrf


                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">Brand Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand">
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



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- /.card-header -->
            <table id="myTable" class="display">
                <thead>
                    <tr>

                        <th class="text-center"> id </th>
                        <th>User Name</th>
                        <th>Brand Name</th>
                        <th>Status</th>
                        {{-- <th>Created Date</th>
                        <th> Updated Date</th> --}}
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{$data}} --}}
                   {{-- {{ $count=0;}} --}}
                     @php  $count=0; @endphp
                     @foreach ($list as $brand)
                    <tr>

                            <td class="text-center">{{$count+=1}}</td>

                            <td>{{$brand->username}}</td>

                            <td>{{$brand->name}}</td>
                             <td>
                            @if ($brand->status == 'Y')
                                <input data-id="{{$brand->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" checked data-on="Active" >
                             @else
                                <input data-id="{{$brand->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" data-on="Active" >
                            @endif
                             </td>
                            {{-- <td>{{$col->created_at}}</td>
                            <td>{{$col->updated_at}}</td> --}}
                            <td>

                            <a href="{{url('editbrand',$brand->id)}}" class="fas fa-pencil-alt"></a>
                            <a href="javascript:void(0);" onclick="move_to_brand({{$brand->id}})" class="fas fa-trash-alt"></a>
                            </td>
                     </tr>

                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
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

function move_to_brand(id){
        if(confirm('are your sure do you want to delete !!!! ?')){
        jQuery.ajax({
            url:'movetrash',
            type:'GET',
            data:{'id':id},
            success:function(result){
            console.log("Status Updated");
            window.location.reload();
            }
        });
    }
    }

</script>
<script>

    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'Y' : 'N';
          var id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: 'changebrandstatus',
              data: {'status': status, 'id': id},
              success: function(data){
               console.log(data.success)
              }
          });
      })
    })
  </script>
</body>
</html>
