<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css');
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.1/angular.min.js"></script> --}}
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
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
      <form method="post" action="" enctype="multipart/form-data">
          @csrf
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
                        <input type="text" ng-model="name" class="form-control" id='amount' onKeyUp="javascript: replacetext('amount'); " >
                    <a href=" " > http//localhost/<span ng-bind="name"></span> </a>
                        <i class="fas fa-edit"></i>
                    </div>
                </div>
                {{-- <div ng-app="myAppTrim">
                  <div ng-controller="myControllerTrim">
                    <button type="button" ng-click="trimDemo()">Click Hear For Trim</button>
                    <p  data-ng-bind-html="" > {{resultTrim}}</p>
                    <p ng-bind="resultTrim"></p>
                  </div>
                </div> --}}

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" class="form-control">
                    <option selected>Select Category</option>
                    @foreach ($brands as $pro)
                    <option value="{{$pro->bid}}">{{$pro->bname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" class="form-control">
                    <option selected>Select Color</option>
                    @foreach ($colors as $pro)
                    <option value="{{$pro->cid}}">{{$pro->cname}}</option>
                    @endforeach
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
                    <select id="inputideal"  class="form-control">
                      <option selected>Select Gender</option>
                      <option>Men</option>
                      <option>Women</option>
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
            <hr>
            <div class="form-row">
                <div class="col-lg-6">
                    <div id="inputFormRow">
                        <label>Images<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">

                            <input type="file" name="title[]" class="form-control m-input" autocomplete="off">
                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button>
                </div>
            </div>
            <hr>
            <div class="from-row">
                <div align="center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

        </div>
      </div></form>
    </section>
</div>
@include('admin.footer');
</body>
@include('admin.jquery');
<script type="text/javascript">

  function replacetext(i) {
  var val = document.getElementById(i).value;
  if (val.match(/ /g)) {
  val = val.replace(/\s+/g, '-');
  document.getElementById(i).value=val;
  }
  }

  </script>
  <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="title[]" class="form-control m-input" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

</html>
