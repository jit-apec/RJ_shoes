<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css');
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.1/angular.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- /.navbar -->
  @include('admin.header');

  @include('admin.sidebar');

  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/admin/product/display')}}">Product</a></li>
                <li class="breadcrumb-item">Add</li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary ">
            <div class="card-header">
            <h3 class="card-title">Add Product</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="text-center mt-0 mb-0 p-1">
                    <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/brand/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row" ng-app="">
                    <div class="col-md-12">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" ng-model="name" class="form-control" placeholder="">
                    <a href=" " > http//localhost/<span ng-bind="name"></span> </a>
                        <i class="fas fa-edit"></i>
                    </div>
                </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" class="form-control">
                    <option selected>Select Category</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" class="form-control">
                    <option selected>Select Color</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                    <select id="inputideal" class="form-control">
                      <option selected>Select Gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Child</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputupc">UPC<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-tag"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <!-- text input -->
                    {{-- <div class="form-group">
                      <label>Discription<span class="text-danger">*</span></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                    </div> --}}
                    <label>Discription<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                      </div>
                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                      <label>Main Image<span class="text-danger">*</span></label>
                     <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </section>
</div>
@include('admin.footer');
</body>
@include('admin.jquery');
</html>
