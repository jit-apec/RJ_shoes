
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
                      <h1 class="m-0">Edit Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{url('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('display')}}">Color</a></li>
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
            <h3 class="card-title">Edit Brand</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{url('edit/'.$brand->id)}}" >
              @csrf
            {{-- @method('PUT') --}}

            <div class="card-body">
              <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" name="name" value="{{$brand->name}}" required>
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
</html>

