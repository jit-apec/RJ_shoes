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

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/brand/display')}}">Brand</a></li>
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
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/brand/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="addbrand">
              @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" name="name" id="brandname" placeholder="Enter Brand">
                @error('name')
                <p style="color:red">{{ $message }} </p>
                 @enderror
                <h5 id="namecheck"></h5>
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
@include('admin.jquery')</body>
<script type="text/javascript">
    $(document).ready(function(){
          $('#namecheck').hide();
          var color_err = true;
          $('#brandname').keyup(function(){
                 brandname_check();
    });
    function brandname_check(){
    var color_val = $('#brandname').val();


    if(color_val.length ==''){
    //    console.log("hello");
        $('#namecheck').show();
        $('#namecheck').html("** fill this filled");
        $('#namecheck').focus();
        $('#namecheck').css("color","red");
        color_err = false;
        return false;
    }
    else
    {
       $('#namecheck').hide();
    }
    var regex = /^[A-Za-z]+$/;
    if(!color_val.match(regex))
    {
        $('#namecheck').show();
        $('#namecheck').html("** Please input alphabet characters only");
        $('#namecheck').focus();
        $('#namecheck').css("color","red");
        color_err = false;
        return false;


    }
    else
    {
        $('#namecheck').hide();
    }
    if((color_val.length <3) ||(color_val.length >10)){

        $('#namecheck').show();
        $('#namecheck').html("** color name legth must be between 3 and 10");
        $('#namecheck').focus();
        $('#namecheck').css("color","red");
        color_err = false;
        return false;
    }
    else
    {
         $('#namecheck').hide();
    }
    }
     });

</script>

</html>
