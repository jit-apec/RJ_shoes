
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
             <div class="d-flex justify-content-center m-5 pb-5">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Colors</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{url('edit/'.$colors->id)}}" >
              @csrf
            {{-- @method('PUT') --}}

            <div class="card-body">
              <div class="form-group">
                <label for="name">Color Name</label>
                <input type="text" class="form-control" name="name" value="{{$colors->name}}" placeholder="Enter color">
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
</html>
