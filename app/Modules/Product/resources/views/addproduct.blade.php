@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/product/display') }}">Product</a>
                            </li>
                            <li class="breadcrumb-item">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form method="post" action="/admin/product/addproduct" enctype="multipart/form-data" id="validation">
                @csrf
                <div class="container-fluid">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="text-success"> {{ session('status') }}</div>
                            @endif
                            <div class="text-center mt-0 mb-0 p-1">
                                <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                                    href="{{ url('/admin/product/display') }}"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> Back</a>&nbsp;
                            </div>
                            <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                            <div class="row">
                                <input type="hidden" class=" access_url" id="url">
                                <div class="col-md-6">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    @error('name')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    @error('url')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <span id="lblError" style="color: red"></span>
                                    <span id="lblErrorediturl" style="color: red"></span>
                                    <input type="text" class="form-control valid" id="replace" name="name"
                                        placeholder="Enter Name"
                                        oninput="this.value = this.value.replace(/[^A-Za-z/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                        data-error="#errname"><span id="errname"></span><br>
                                    <a href="#"> http//localhost/<span id="url" name="url"></span> </a>
                                    <input type="text" class="border  border-0 text-primary  input-sm access_url"
                                        id="edit_url" name="url">
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Size<span class="text-danger">*</span> </label>
                                    @error('size')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <input type="text" class="form-control" name="size" id="size"
                                        placeholder="Enter Shoes Size" pattern="[A-Za-z0-9_]{1,5}"
                                        oninput="this.value = this.value.replace(/[^/A-Za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                        data-error="#errsize"><span id="errsize"></span>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="brand_id">Category<span class="text-danger">*</span></label>
                                    @error('brand_id')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="inputcategory" name="brand_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($brands as $pro)
                                            <option value="{{ $pro->bid }}">{{ $pro->bname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputcolor">color<span class="text-danger">*</span></label>
                                    @error('color_id')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="inputcolor" name="color_id" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach ($colors as $pro)
                                            <option value="{{ $pro->cid }}">{{ $pro->cname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                                    @error('price')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                        </div>

                                        <input type="text" class="form-control" name="price" placeholder=" Enter Price"
                                            id="" pattern="[0-9]{1,6}"data-error="#errprice"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                           >

                                    </div>
                                    <span id="errprice"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                                    @error('idealfor')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="inputideal" name="idealfor" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option>Men</option>
                                        <option>Women</option>
                                        <option>Child</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputupc">UPC<span class="text-danger">*</span></label>
                                    @error('upc')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-tag"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="upc" id=""
                                            placeholder="eg.123456789123" pattern="[0-9]{12,12}" data-error="#errupc"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                           >

                                    </div>
                                    <span id="errupc"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                                    @error('stock')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="stock" id="" pattern="[0-9]{1,6}"
                                        oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" data-error="#errstock">

                                    </div>
                                    <span id="errstock"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Description</label>
                                    <div class="input-group mb-2">
                                        <textarea class="form-control" id="" name="discription" rows="3"
                                            placeholder="This Box has a Limit of 1000 Chars" pattern="[A-Za-z0-9_]{0,1000}"
                                            title="Special charactor is not Allowed"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Main Image</label>
                                        @error('image')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                        <input type="file" class="form-control" onchange="readURL(this);" id="upload"
                                            name="image" accept="image/*">
                                        <div class="image-area minipic mt-3 ">
                                            <img id="imageResult" src="{{ asset('dist/img/imagepreview.jpg') }}"
                                                style="height:50px; width:50px; border:1px rgb(11, 12, 11); solid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <div id="inputFormRow">
                                        <label>Multiple Image</label>
                                        @error('subimage[]')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                        @error('sort')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                        <div class="input-group mb-3">
                                            <input type="file" name="subimage[1]" id="subupload"
                                                onchange="imagepreview(this);" class="form-control m-input"
                                                autocomplete="off" accept="image/*">
                                            <div class="col-lg-3">
                                                <input type="number" name="sort[1]" class="form-control m-input"
                                                    autocomplete="off" placeholder="Sort number" pattern="[0-9]{1,2}"
                                                    oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                                    title="only 1- 9 Digit Allowed">
                                            </div>
                                            <div class="input-group-append">
                                                <button id="addRow" type="button" class="btn btn-success ">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Images
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newRow"></div>
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
                </div>
            </form>
        </section>
    </div>
@endsection
@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/test.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $('#replace, #edit_url').on('keyup keypress click change', function() {
            var dInput = this.value;
            var t = dInput.toLowerCase();
            if (t.match(/ /g, )) {
                t = t.replace(/\s+/g, '-');
            }
            document.getElementById("url").innerHTML = t;
            console.log(t);
            $('.access_url').val(t);

        });

        $(function() {
            $("#edit_url").keypress(function(e) {
                var keyCode = e.keyCode || e.which;
                $("#lblErrorediturl").html("");
                var regex = /^[a-zA-Z\s]+$/;
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $("#lblErrorediturl").html("Special charactor are not allowed");
                }
                return isValid;
            });
        });

        var i = 1;
        $("#addRow").click(function() {
            ++i;
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="file" name="subimage[' + i +
                ']"  class="form-control m-input " onchange="imagepreview(this);" autocomplete="off"  id="subupload" accept=".png, .jpg, .jpeg" >';
            html += '<div class="col-lg-3">';
            html += '<input type="number" name="sort[' + i +
                ']" class="form-control m-input"maxlength="2" autocomplete="off" placeholder="Sort Number" pattern="[0-9]{1,2}" title="Enter only Number.">'
            html += '</div>';
            html += '<div class="input-group-append">';
            html +=
                '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>';
            html += '</div>&nbsp;';

            html += '</div>';
            $('#newRow').append(html);
        });

        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        function imagepreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#subimageresult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('upload').onfocusout = function() {
            var image = document.getElementById('upload').value;
            if (image != '') {
                var checkimg = image.toLowerCase();
                if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)) {
                    alert("Please Select jpg,png File");
                    document.getElementById('upload').value = "";

                }
                var image = document.getElementById('upload');
                var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
                if (size > 2) {
                    alert("Please Select Size Less Than 2 MB");
                    document.getElementById('upload').value = "";

                }
            }

        }


        document.getElementById('subupload').onfocusout = function() {
            var image = document.getElementById('subupload').value;
            if (image != '') {
                var checkimg = image.toLowerCase();
                if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)) {
                    alert("Please Select jpg,png File");
                    document.getElementById('subupload').value = "";

                }
                var image = document.getElementById('subupload');
                var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
                if (size > 2) {
                    alert("Please Select Size Less Than 2 MB");
                    document.getElementById('subupload').value = "";

                }
            }

        }
        jQuery(function($) {
            var validator = $('#validation').validate({
                rules: {
                    name: {
                        required: true,
                        remote: {
                            url: '/admin/products/checkurl',
                            type: "GET",
                            data: {
                                colorname: function() {
                                    return $(".valid").val();
                                }
                            },
                        }
                    },
                    size:{
                        required: true,
                        maxlength:5,
                    },
                    brand_id:{
                        required: true,
                    },
                    color_id:{
                        required: true,
                    },
                    price: {
                        required: true,
                        minlength:2,
                        maxlength:6,
                    },
                    idealfor: {
                        required: true,
                    },

                    upc: {
                        required: true,
                        minlength:12,
                        maxlength:12,
                    },
                    stock:{
                        required: true,
                        maxlength:6,
                    },

                },
                messages: {
                },
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    </script>
@endsection
