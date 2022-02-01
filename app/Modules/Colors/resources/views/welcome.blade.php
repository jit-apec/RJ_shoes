
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
                      <h1 class="m-0" >Colors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">Color</li>
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
            <h3 class="card-title">Colors</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " data-toggle="modal" data-target="#myModal">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;

            <a class="btn btn-danger bg-gradient-danger float-right btn-sm"
             href="{{ url('trash') }}" role="button">Trash &nbsp;<i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="addcolors" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addcolors">Add Colors</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="addcolor">
                            @csrf


                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">Color Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter color">
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
                        <th>Color Name</th>
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
                     @foreach ($colors as $col)

                    <tr>

                            <td class="text-center">{{$count+=1}}</td>

                            <td>{{$col->username}}</td>

                            <td>{{$col->name}}</td>
                            {{-- <td class="text-center">
                                <div class="toggle-btn">
                                    <input data-id="{{$col->status}}" type="checkbox" class="toggle-class" {{$col->status?'checked':''}}>
                                    <div class="inner-circle"></div>
                                </div>
                            </td> --}}
                             <td>
                            @if ($col->status == 'Y')
                                <input data-id="{{$col->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" checked data-on="Active" >
                             @else
                                <input data-id="{{$col->id}}" class="toggle-class btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-size="sm" data-on="Active" >
                            @endif
                             </td>
                            {{-- <td>{{$col->created_at}}</td>
                            <td>{{$col->updated_at}}</td> --}}
                            <td>

                            <a href="{{url('edit/'.$col->id)}}" class="fas fa-pencil-alt"></a>
                                {{-- <button type="button" class=""></button> --}}
                            <a href="javascript:void(0);" onclick="delete_Question({{$col->id}})" class="fas fa-trash-alt"></a>
                                {{-- <button type="button" value="{{$col->id}}" class="delete_color fas fa-trash-alt" onclick="delet_color()"></button> --}}
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
@include('admin.jquery')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

function delete_Question(id){
        if(confirm('are your sure do you want to delete !!!! ?')){
        jQuery.ajax({
            url:'movetotrash',
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
              url: '/changeStatus',
              data: {'status': status, 'id': id},
              success: function(data){
               console.log(data.success)
              }
          });
      })
    })

    $(document).ready(function() {
        
    })
  </script>
</body>
</html>
