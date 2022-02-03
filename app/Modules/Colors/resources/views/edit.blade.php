
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
                  <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/color/displaycolor')}}">Color</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
             <div class="d-flex justify-content-center m-5 pb-5">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Colors</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/color/displaycolor')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{url('/color/edit/'.$colors->id)}}" >
              @csrf
            {{-- @method('PUT') --}}

            <div class="card-body">
              <div class="form-group">
                <label for="name">Color Name</label>
                <input type="text" class="form-control" name="name" id="colorname"   value="{{$colors->name}}" placeholder="Enter color">
                @error('name')
                <p style="color:red">{{ $message }} </p>
                 @enderror
                <h5 id="colorcheck"></h5>
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
@include('admin.footer')
</body>
@include('admin.jquery')
<script type="text/javascript">
    $(document).ready(function(){
          $('#colorcheck').hide();
          var color_err = true;
          $('#colorname').keyup(function(){
                 colorname_check();
    });
    function colorname_check(){
    var color_val = $('#colorname').val();


    if(color_val.length ==''){
    //    console.log("hello");
        $('#colorcheck').show();
        $('#colorcheck').html("** fill this filled");
        $('#colorcheck').focus();
        $('#colorcheck').css("color","red");
        color_err = false;
        return false;
    }
    else
    {
       $('#colorcheck').hide();
    }
    var regex = /^[A-Za-z]+$/;
    if(!color_val.match(regex))
    {
        $('#colorcheck').show();
        $('#colorcheck').html("** Please input alphabet characters only");
        $('#colorcheck').focus();
        $('#colorcheck').css("color","red");
        color_err = false;
        return false;


    }
    else
    {
        $('#colorcheck').hide();
    }
    if((color_val.length <3) ||(color_val.length >10)){

        $('#colorcheck').show();
        $('#colorcheck').html("** color name legth must be between 3 and 10");
        $('#colorcheck').focus();
        $('#colorcheck').css("color","red");
        color_err = false;
        return false;
    }
    else
    {
         $('#colorcheck').hide();
    }
    }
     });

</script>

</html>

