{{-- <form method="POST" action="ff">
    @csrf
  <label for="name">name</label>
  <input type="text" name="name" placeholder="name">
  <input type="submit" value="submit">
</form> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  {{-- <link rel="stylesheet" href="cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

    {{-- <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>



  <style>

.toggle-btn {
    width: 40px;
    height: 21px;
    background: grey;
    border-radius: 50px;
    padding: 3px;
    cursor: pointer;
    -webkit-transition: all 0.3s 0.1s ease-in-out;
    -moz-transition: all 0.3s 0.1s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s 0.1s ease-in-out
}

.toggle-btn>.inner-circle {
    width: 15px;
    height: 15px;
    background: #fff;
    border-radius: 50%;
    -webkit-transition: all 0.3s 0.1s ease-in-out;
    -moz-transition: all 0.3s 0.1s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s 0.1s ease-in-out
}

.toggle-btn.active {
    background: rgb(6, 175, 105) !important
}

.toggle-btn.active>.inner-circle {
    margin-left: 19px
}
</style>
</head>
<body class="hold-transition sidebar-mini">
    @include('admin.header')
    @include('admin.sidebar')
    <div class="wrapper">
        <div class="content-wrapper">
             <div class="d-flex justify-content-center m-5 pb-5">
    <div class="col-md-12 ">
        <!-- general form elements -->
        <div class="card card-primary p-4">
          <div class="card-header">
            <h3 class="card-title">Colors</h3>
          </div>
          <div class="text-center mt-3 mb-3 p-2">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " data-toggle="modal" data-target="#myModal">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;

            <a class="btn btn-danger bg-gradient-danger float-right btn-sm" href="#" role="button">Trash &nbsp;<i class="fa fa-trash" aria-hidden="true"></i></a>
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
                              <input type="text" class="form-control" name="name" placeholder="Enter color">
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
                              &nbsp; &nbsp; &nbsp; &nbsp;
                              <input class="form-check-input" type="radio"name="status"  value="T">
                              <label class="form-check-label" for="flexRadioDefault2">
                               T
                              </label>
                            </div>
                            {{-- <div class="form-group">
                                <label for="name"></label>
                                <input type="hidden" class="form-control" value=" {{ Auth::user()->id }}"name="user_id" placeholder="Enter color">
                              </div> --}}
                          </div>
                          <!-- /.card-body -->



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" onclick='tabDisp()' class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- /.card-header -->
            <table id="myTable" class="display">
                <thead>
                    <tr>

                        <th> id </th>
                        <th>user id</th>
                        <th>Color Name</th>
                        <th>Status</th>

                        <th>action</th>
                        {{-- <th>Created Date</th>
                        <th> Updated Date</th> --}}
                    </tr>
                </thead>
                <tbody id="bodyData">


                {{-- </tbody> --}}
                     @foreach ($colors as $col)
                    <tr>


                            <td>{{$col->id}}</td>
                            <td>{{$col->user_id}}</td>

                            <td>{{$col->name}}</td>
                            {{-- <td class="text-center">
                                <div class="toggle-btn">
                                    <input data-id="{{$col->status}}" type="checkbox" class="toggle-class" {{$col->status?'checked':''}}>
                                    <div class="inner-circle"></div>
                                </div>
                            </td> --}}
                             <td>
                                <input data-id="{{$col->id}}" class="toggle-class  btn-sm" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Y" data-size="sm" data-off="N" {{ $col->status ?'checked':''}}>
                             </td>
                            <td>

                                <a href="{{url('edit/'.$col->id)}}" class="fas fa-pencil-alt"></a>
                                {{-- <button type="button" class=""></button> --}}


                                <a href="{{url('delete/'.$col->id)}}" class="fas fa-trash-alt"></a>
                                {{-- <button type="button" value="{{$col->id}}" class="delete_color fas fa-trash-alt" onclick="delet_color()"></button> --}}
                            </td>
                            {{-- <td>
                                <input data-id="{{$col->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $col->status ? 'checked' : '' }}>
                             </td> --}}
                            {{-- <td class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" >
                                <label class="custom-control-label" for="customSwitches"></label>


                            </td> --}}
                            {{-- {{-- <td>{{$col->created_at}}</td>
                            <td>{{$col->updated_at}}</td> --}}




                     </tr>
                    @endforeach
                </tbody>
            </table>
        {{-- @foreach ($colors as col )
                        {{$col->name}}
                    @endforeach --}}
          <!-- form start -->
            @include('admin.footer')
          </div>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

{{-- <script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? Y : N;
          var color_id = $(this).data('id');
          alert(color_id);
          alert(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'color_id':color_id},
              success: function(data){
                console.log('success')
              }
          });
      });
    });
    $(document).ready(function(){

        $('.toggle-btn').click(function() {
          $(this).toggleClass('active').siblings().removeClass('active');
        });

    });

     </script> --}}
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );


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
  </script>
</body>
</html>
