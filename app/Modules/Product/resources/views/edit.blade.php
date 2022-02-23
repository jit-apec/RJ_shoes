<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css');
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.1/angular.min.js"></script> --}}
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> --}}

  <style>
    input:invalid {
  border: red solid 1px;
}

/* input:invalid:required {
  background-image: linear-gradient(to right, pink, lightgreen);
} */
</style>
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
                <li class="breadcrumb-item">Edit</li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <section class="content">
      <form method="post" action="{{url('/admin/product/edit/'.$product->id)}}" enctype="multipart/form-data" id="validation">

          @csrf
      <div class="container-fluid">
        <div class="card card-primary ">
            <div class="card-header">
            <h3 class="card-title">Update Product</h3>


            </div>

            <!-- /.card-header -->
            <div class="card-body">
                @if (session()->has('status'))
                <div class="text-success" >   {{session('status')}}</div>
                @endif
                <div class="text-center mt-0 mb-0 p-1">
                    <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/product/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row" >
                    <div class="col-md-6" >

                        <label for="name">Name<span class="text-danger">*</span></label>
                        <span id="lblError" style="color: red"></span>
                        <input type="text"class="form-control valid" id="replace"  value="{{$product->name}}"  name="name"
                        oninput="this.value = this.value.replace(/[^A-Za-z/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" title="Special Charactor is Not allowd">
                    <a href=" " > http//localhost/<span id="url"></span> </a>
                    <input type="hidden" class="form-control access_url" id="url" name="url" >

                    </div>
                    <div class="col-md-6">
                        <label for="name">Size<span class="text-danger">*</span>
                            @error('size')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror</label>
                        <input type="text"class="form-control"  name="size" value="{{$product->size}}" placeholder="Size"pattern="[A-Za-z0-9_]{1,5}"  oninput="this.value = this.value.replace(/[^/A-Za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" title=" Max 5 Charactor">
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" name="brand_id" class="form-control"  disabled>
                    @foreach ($brands as $brand)
                    <option value="" >{{$brand->bname}}</option>
                    <option value="{{$brand->bid}}">{{$brand->bname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" id="color_id" name="color_id" class="form-control">
                    <option value="">Select Color</option>
                    @foreach ($colors as $color)
                        <option  value="{{$color->cid}}" @if($color->cid == $product->color_id) selected @endif>{{$color->cname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                      </div>
                      <input type="text" class="form-control" name="price"value="{{$product->price}}"  id="inlineFormInputGroup" id=""pattern="[0-9]{1,5}" oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" title="max 6 digit. " >
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                    <select id="inputideal" name="idealfor" value="{{$product->idealfor}}"  class="form-control">
                      <option value="">{{$product->idealfor}}</option>
                      <option>Men</option>
                      <option>Women</option>
                      <option>Child</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputupc">UPC<span class="text-danger">*</span></label>
                    @error('upc')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-tag"></i></div>
                      </div>
                      <input type="text" class="form-control" name="upc" value="{{$product->upc}}" disabled>
                      {{-- <input type="hidden" class="form-control" name="upc" value="{{$product->upc}}"> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" name="stock" value="{{$product->stock}}" id="inlineFormInputGroup"  placeholder="eg.12345"pattern="[0-9]{1,5}"  oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" title="only 6 Digit Allowed" >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <label>description<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        {{-- <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div> --}}
                        <textarea class="form-control"name="description" rows="3" placeholder="This Box has a Limit of 1000 Chars" pattern="[A-Za-z0-9_]{0,1000}" title="Special charactor is not allowd">{{$product->description}}</textarea>
                        {{-- <textarea  rows="3" cols="30" name="bgraphy"value="{{$product->description}}"class="form-control"></textarea> --}}
                      </div>
                </div>
                <div class="col-sm-6">
                    <label>Main Image</label>
                    <div class="form-group">

                      <img src="{{asset('storage/media/'.$product->image) }}" onerror="" alt="Missing Image" style="height:50px; width:50px; border:1px rgb(145, 172, 145) solid;" >
                     <input type="file" class="form-control" value="{{$product->image}}" name="image" accept=".png, .jpg, .jpeg" required>
                    </div>
                </div>
            </div>
            <hr>
            {{-- <div class="form-row">
                <div class="col-lg-9">
                    <div id="inputFormRow">
                        <label>Images</label>
                        <div class="input-group mb-3">

                            <input type="file" name="subimage[1]" class="form-control m-input" autocomplete="off">
                            <div class="col-lg-3">
                                 <input type="number" name="sort[1]" class="form-control m-input" autocomplete="off"  placeholder="Sort number">
                            </div>

                            <div class="input-group-append">
                                <button id="addRow" type="button" class="btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                </div>
            </div> --}}
            <div class="multiple_img_list pb-3">
                <p>Select Multiple Images</p>

                @foreach($images as $image)
                    <div class="more_img">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="file" name="sub_img[]"  onchange="readURLSubimg(this);"  class="form-control moreImgInp @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept=".png, .jpg, .jpeg" accept="image/*"/>
                                            <input class="form-control  @error('img_id') is-invalid @enderror img_id" value="{{$image->id}}" name="img_id[]" type="hidden">
                                            @error('sub_img')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img alt="Product Image" id="sub_image" src="{{asset('storage/media/'.$image->images) }}" class="img-thumbnail sub_image"  onerror="this.onerror=null;this.src='{{asset('storage/media/no_image1.png') }}'">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control  @error('sort') is-invalid @enderror" value="{{$image->sort}}" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number" id="{{$image->id}}">
                                    @error('sort')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button name="add_img" id="add_img" type="button" class="  btn btn-success add_img"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add &nbsp;</button>
                                <button name="remove_img"  id="{{$image->id}}" type="button" class="btn btn-danger remove_img"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="more_img" style="display:none">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="file" name="sub_img[]" id="sub_img[]"  class="form-control @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                                        @error('sub_img')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img  id="sub_image" class="img-thumbnail sub_image"  onerror="this.onerror=null;this.src='{{asset('storage/media/no_image1.png') }}'">
                                    {{-- onerror="this.{{asset('storage/media/'.no_image.png) }}"  --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input class="form-control @error('sort') is-invalid @enderror" value="" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number">
                                @error('sort')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button name="add_img" id="add_img" type="button" class="  btn btn-success add_img"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add &nbsp;</button>
                            <button name="remove_img"  id="remove_img" type="button" class="btn btn-danger remove_img"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
                        </div>
                    </div>
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
{{-- Url replce  --}}
<script type="text/javascript">
  $('#replace').on('keyup keypress click change',function() {
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
        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });


        function readURL(input) {
            console.log(input.files)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLSubimg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $ (input).parent().parent().parent().find('.sub_image').attr('src',e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function () {
            //image add and remove
            if ($(".multiple_img_list >div").length == 1){
                $('.more_img').show();
            }
            $('.multiple_img_list').on('click','.add_img',function () {
                var $obj = $(this).closest('.more_img').clone();
                $obj.find('input').val('').end().insertAfter($(this).closest('.more_img'));
                if ($(".multiple_img_list >div").length != 1){
                    $('.remove_img').show();
                }
            });
            $('.multiple_img_list').on('click','.remove_img',function () {
                if ($(".multiple_img_list >div").length > 1){
                    $(this).closest('.more_img').remove();
                }
                if ($(".multiple_img_list >div").length == 1){
                    $('.remove_img').hide();
                    $('.more_img').show();
                }
            });
            $('.multiple_img_list').on('keypress','#sort',function (e) {
                var keyCode = e.charCode;
                console.log(e.keyCode);
                // if ( (97 != backspace || keyCode ==space ) && (97 < zero || 97 > nine)) {
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
                    return false;
                }
            });
        });

  </script>
{{-- validation --}}
  <script>
    $(document).ready(function () {
      $("#validation").validate({
              rules: {
                  name:{
                          required:true,
                          remote:{
                                  url: '/admin/products/checkurl',
                                  type: "GET",
                                  data: {
                                      colorname: function () {
                                          return $( ".valid" ).val();
                                      }
                                  },
                              }
                        },
                color_id:{
                required:true,
                },
                brand_id:{
                        required:true,
                },
                idealfor:{
                        required:true,
                },
            },
          messages:{
                name:{
                        required:"Name Field is required.",
                        remote:"Name is already teken",
                    },
                  }
      });
    });
  </script>

</html>
