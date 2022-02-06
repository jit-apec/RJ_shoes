
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
    <div class="col-md-12 ">
        <!-- general form elements -->

        <div class="card card-danger p-2">
            <div class="card-header">
              <h3 class="card-title">Trash Product</h3>
            </div>
            <div class="text-center mt-2 mb-2 p-1">
              <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/product/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

            </div>

          <!-- /.card-header -->
            <table id="myTable" class="display">
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
                        {{-- <th>Created Date</th>
                        <th> Updated Date</th> --}}
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{$data}} --}}
                   {{-- {{ $count=0;}} --}}
                     @php  $count=0; @endphp
                     @foreach ($product as $product)
                    <tr>

                            <td class="text-center">{{$count+=1}}</td>
                            <td><img src="{{ asset('dist/img/' .$product->image ) }}" height="50" width="50"></td>
                            <td>{{$product->name}}</td>

                            <td>{{$product->upc}}</td>
                            <td>{{$product->url}}</td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->cname}}</td>

                            <td>{{$product->bname}}</td>
                            {{-- <td>{{$product->username}}</td> --}}
                            {{-- <td>{{$col->created_at}}</td>
                            <td>{{$col->updated_at}}</td> --}}
                            <td>
                                <a href="#"  onclick="restore_Product({{$product->id}})" class="fas fa-trash-restore-alt " style='font-size:24px'></a>&nbsp;&nbsp;
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
{{-- @endsection --}}
@include('admin.footer')
</div>
 @include('admin.jquery')
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
</body>
</html>
