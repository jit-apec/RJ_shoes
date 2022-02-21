
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

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">Product</li>

                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
             <div class="d-flex justify-content-center">
    <div class="col-md-12  ">
        <!-- general form elements -->
        <div class="card card-primary p-1 ">
          <div class="card-header">
            <h3 class="card-title">Product</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right "  href="{{ url('/admin/product/addproduct') }}" role="button">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;
            {{-- <a class="btn btn-success bg-gradient-success  btn-sm float-right "  href="{{ url('/admin/product/addproduct') }}">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp; --}}

            <a class="btn btn-danger bg-gradient-danger float-right btn-sm"
             href="{{ url('/admin/product/trash') }}" role="button">Trash &nbsp;<i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>

          <!-- /.card-header -->
            <table id="myTable" class="display  table-responsive">
                <thead>
                    <tr>

                        <th class="text-center"> Sr No.</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>UPC</th>
                        <th>URL</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Category</th>
                        <th>Status</th>
                        {{-- <th>Created Date</th>
                        <th> Updated Date</th> --}}
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{$products}} --}}
                   {{-- {{ $count=0;}} --}}
                        @php  $count=0; @endphp
                        @foreach ($products as $product)
                        <tr>

                                <td class="text-center">{{$count+=1}}</td>
                                <td><img src="{{asset('storage/media/'.$product->image) }}" height="50" width="50"></td>
                                <td>{{$product->name}}</td>

                                <td>{{$product->upc}}</td>
                                <td>{{$product->url}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->cname}}</td>

                                <td>{{$product->bname}}</td>
                                {{-- <td>{{$product->username}}</td> --}}


                                <td>
                                @if ($product->status == 'Y')
                                    <input data-id="{{$product->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" checked data-on="Active" >
                                @else
                                    <input data-id="{{$product->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" data-on="Active" >
                                @endif
                                </td>
                                {{-- <td>{{$col->created_at}}</td>
                                <td>{{$col->updated_at}}</td> --}}
                                <td>

                                <a href="{{url('/admin/product/edit',$product->id)}}" class="fas fa-pencil-alt"></a>
                                <a href="{{url('/admin/product/product_view',$product->url)}}" class="fas fa-eye"></a>
                                <a href="javascript:void(0);" onclick="move_to_trash({{$product->id}})" class="fas fa-trash-alt"></a>

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
function move_to_trash(id){
        if(confirm('are your sure do you want to delete !!!! ?')){
        jQuery.ajax({
            url:'/admin/product/move_trash',
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
              url: '/admin/product/changestatus',
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
