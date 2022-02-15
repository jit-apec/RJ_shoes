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
      <form method="post" action="{{url('/admin/product/edit/'.$product->id)}}" enctype="multipart/form-data">

          @csrf
      <div class="container-fluid">
        <div class="card card-primary ">
            <div class="card-header">
            <h3 class="card-title">Update Product</h3>

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
                    <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/product/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row" >
                    <div class="col-md-6" >

                        <label for="name">Name<span class="text-danger">*</span></label>
                        <span id="lblError" style="color: red"></span>
                        <input type="text"class="form-control valid" id="replace"  value="{{$product->name}}"  name="name">
                    <a href=" " > http//localhost/<span id="url"></span> </a>
                    <input type="hidden" class="form-control access_url" id="url" name="url" >
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Size<span class="text-danger">*</span></label>
                        <input type="text"class="form-control"  name="size" value="{{$product->size}}" placeholder="Size">
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" name="brand_id" class="form-control"  disabled>
                    @foreach ($brands as $brand)
                    <option selected >{{$brand->bname}}</option>
                    <option value="{{$brand->bid}}">{{$brand->bname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" id="color_id" name="color_id" class="form-control">
                    <option selected>Select Color</option>
                    @foreach ($colors as $color)
                        <option  value="{{$color->cid}}" @if($color->cid == $product->color_id) selected @endif>{{$color->cname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                      </div>
                      <input type="text" class="form-control" name="price"value="{{$product->price}}"  id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                    <select id="inputideal" name="idealfor" value="{{$product->idealfor}}"  class="form-control">
                      <option selected>{{$product->idealfor}}</option>
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
                      <input type="text" class="form-control" name="upc" value="{{$product->upc}}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" name="stock" value="{{$product->stock}}" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <label>description<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div>
                        <textarea class="form-control"name="description" rows="3" placeholder="This Box has a Limit of 1000 Chars">{{$product->description}}</textarea>
                        {{-- <textarea  rows="3" cols="30" name="bgraphy"value="{{$product->description}}"class="form-control"></textarea> --}}
                      </div>
                </div>
                <div class="col-sm-6">
                    <label>Main Image</label>
                    <div class="form-group">

                      <img src="{{asset('storage/media/'.$product->image) }}" onerror="this.src='./assets/img/user.jpg';" alt="Missing Image" style="height:100px; width:100px; border:1px green solid;">
                     <input type="file" class="form-control" value="{{$product->image}}" name="image">
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-lg-9">
                    <div id="inputFormRow">
                        <label>Images</label>
                        {{-- <label class=" col-md-8 text-right">Sort<span class="text-danger">*</span></label> --}}
                        <div class="input-group mb-3">

                            <input type="file" name="subimage[1]" class="form-control m-input" autocomplete="off">
                            <div class="col-lg-3">
                                 <input type="number" name="sort[1]" class="form-control m-input" autocomplete="off"  placeholder="Sort number">
                            </div>

                            <div class="input-group-append">
                                <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <label>Sort<span class="text-danger">*</span></label>
                        <input type="number" name="title[]" class="form-control m-input" autocomplete="off">
                        </div> --}}
                    </div>

                    <div id="newRow"></div>
                    {{-- <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button> --}}
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
  $('#replace').keyup(function() {
    var dInput = this.value;
	var t=dInput.toLowerCase();
	 if (t.match(/ /g)) {
	 t = t.replace(/\s+/g, '-');
     //   document.getElementById('url').innerHTML = t2
     }
    document.getElementById("url").innerHTML = t;
    console.log(t);
    $('.access_url').val(t);
});
  </script>
  {{-- name only allow characters and space --}}
   <script type="text/javascript">
    $(function () {
        $(".valid").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("#lblError").html("");

            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[a-zA-Z\s]+$/;
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");
            }

            return isValid;
        });
    });
</script>

  <script type="text/javascript">
    // add row
    var i = 1;
    $("#addRow").click(function () {
        ++i;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="subimage['+i+']" class="form-control m-input" autocomplete="off">';
        html += '<div class="col-lg-3">';
        html += '<input type="number" name="sort['+i+']" class="form-control m-input" autocomplete="off" placeholder="Sort Number">'
        html += '</div>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>';
        html += '</div>&nbsp;';

        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

</html>
