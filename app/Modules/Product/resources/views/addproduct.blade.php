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
      <form method="post" action="/admin/product/addproduct" enctype="multipart/form-data">
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
                    <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/product/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <span id="lblError" style="color: red"></span>
                        <input type="text"class="form-control valid" id="replace" name="name">
                    <a href=" " > http//localhost/<span id="url"></span> </a>
                    <input type="hidden" class="form-control access_url" id="url" name="url" >
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Size<span class="text-danger">*</span></label>
                        <input type="text"class="form-control"  name="size" placeholder="Size">
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" name="brand_id" class="form-control">
                    <option selected >Select Category</option>
                    @foreach ($brands as $pro)
                    <option value="{{$pro->bid}}">{{$pro->bname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" name="color_id" class="form-control">
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
                      <input type="text" class="form-control" name="price" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                    <select id="inputideal" name="idealfor"  class="form-control">
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
                      <input type="text" class="form-control" name="upc" id="inlineFormInputGroup">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" name="stock" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <label>Discription<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div>
                        <textarea class="form-control" id="" name="discription" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                      </div>
                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                      <label>Main Image<span class="text-danger">*</span></label>
                     <input type="file" class="form-control" onchange="readURL(this);"   id="upload" name="image" >


                     <div class="image-area minipic mt-3 "><img id="imageResult" src="{{ asset('dist/img/imagepreview.jpg')}}" style="height:100px; width:100px; border:1px rgb(11, 12, 11); solid" >  </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-lg-9">
                    <div id="inputFormRow">
                        <label>Images<span class="text-danger">*</span></label>
                        {{-- <label class=" col-md-8 text-right">Sort<span class="text-danger">*</span></label> --}}
                        <div class="input-group mb-3">

                            <input type="file" name="subimage[1]" id="subupload" onchange="imagepreview(this);"  class="form-control m-input" autocomplete="off">
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
                    <div class=" mt-3"><img id="subimageresult" src="{{ asset('dist/img/imagepreview.jpg')}}" alt="" class="img-fluid rounded shadow-sm mx-auto " style="height:100px; width:100px; border:1px green solid;"></div>
                </div>
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
	 if (t.match(/ /g,)) {
	 t = t.replace(/\s+/g, '-');
     //   document.getElementById('url').innerHTML = t2
     }
    document.getElementById("url").innerHTML = t;
    console.log(t);
    $('.access_url').val(t);

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
        html += '<input type="file" name="subimage['+i+']"  class="form-control m-input " onchange="imagepreview(this);" autocomplete="off">';
        html += '<div class="col-lg-3">';
        html += '<input type="number" name="sort['+i+']" class="form-control m-input" autocomplete="off" placeholder="Sort Number">'
        html += '</div>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>';
        html += '</div>&nbsp;';

        html += '</div>';
        // html += '<div class=" mt-3">';
        html +='<img id="subimageresult" src="{{ asset('dist/img/imagepreview.jpg')}}" alt="" class="img-fluid rounded shadow-sm mx-auto " style="height:100px; width:100px; border:1px green solid;">';
       // html += '</div>';
        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
    //upload image preview
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//upload  multiple images preview
    function imagepreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#subimageresult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
{{-- megnify image --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.minipic').jqzoom({
                zoomType: 'standard',
                lens: true,
                preloadImages: false,
                alwaysOn: false,
                zoomHeight: 200,
                zoomWidth:200
            });
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.6.1/jquery.zoom.min.js"></script>
<script src="js/jquery-1.6.js"></script>
<script src="js/jquery.jqzoom-core.js"></script>
</html>
