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
                      <h1 class="m-0">Add Colors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('displaycolor')}}">Color</a></li>
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
            <h3 class="card-title">Add Colors</h3>
          </div>
          <div class="text-center mt-0 mb-0 p-1">
            <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/displaycolor')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="addcolor" id="addcolor">
              @csrf


            <div class="card-body">
              <div class="form-group">
                <label for="name">Color Name</label>
                {{-- <input type="text" class="form-control" id="colorname" onfocusout="check_name()" name="name" placeholder="Enter color"> --}}
                <input type="text" class="form-control" id="colorname" onfocusout="check_name()" name="name">

                {{-- <input type="text" onfocusout="check_name()" id="colorname"> --}}
                {{-- <input type="text" id="name"  id="colorname" onkeyup="myFunction()"> --}}
                @error('name')
                <p style="color:red">{{ $message }} </p>
                 @enderror
                 <span id="user-availability-status1" style="font-size:12px;"></span>
                <h5 id="colorcheck"></h5>
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
 @include('admin.jquery')
 </body>
 <script>
    function decryptfun() {
      var pass = "hjubjbjhdgyuwj";
      var encrtoken = "abcdefghijklmn";

      //var p = lib.decrypt(encrtoken, atob(pass)); //USE THIS IN YOUR CASE
      var p = "test"; //just for example
      alert(p);
    }
  </script>
<script >

    function check_name() {
            consol.log("1");
			$("#loaderIcon").show();
			jQuery.ajax({
			url: "check_availability",
			data:'name='+$("#colorname").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status1").html(data);
			 $("#loaderIcon").hide();
			},
			error:function (){}
			});
			}



 }
</script>



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
