@extends('admin.master')
@section('title')
 Product
@endsection
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
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/product/') }}">Product</a>
                            </li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form method="post" action="{{ url('/admin/product/edit/' . $product->id) }}" enctype="multipart/form-data"
                id="validation">
                @csrf
                <div class="container-fluid">
                    <div class="card card-primary ">
                        <div class="card-header  mt-0 mb-0 p-2">
                            <h3 class="card-title">Update Product</h3>

                            <a class="float-right "
                            href="{{ url('/admin/product/') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="text-success"> {{ session('status') }}</div>
                            @endif

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
                                    <input type="text" class="form-control valid" id="replace"
                                        value="{{ $product->name }}" name="name"
                                        oninput="this.value = this.value.replace(/[^A-Za-z/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                        data-error="#errname"><span id="errname"></span><br>
                                    <a href=" "> http//localhost/<span id="url"></span> </a>
                                    <input type="text" class="border  border-0 text-primary  input-sm access_url"
                                        id="edit_url" value="{{$product->url}}" name="url">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Size<span class="text-danger">*</span>
                                        @error('size')
                                            <strong>{{ $message }}</strong>
                                        @enderror</label>
                                    <input type="text" class="form-control" name="size" value="{{ $product->size }}"
                                        placeholder="Size" pattern="[A-Za-z0-9_]{1,5}"
                                        oninput="this.value = this.value.replace(/[^/A-Za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                       data-error="#errsize"><span id="errsize"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputcategory">Category<span class="text-danger">*</span></label>
                                    @error('brand_id')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="inputcategory" name="brand_id" class="form-control" disabled>
                                        @foreach ($brands as $brand)
                                            <option value="">{{ $brand->bname }}</option>
                                            <option value="{{ $brand->bid }}">{{ $brand->bname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputcolor">color<span class="text-danger">*</span></label>
                                    @error('color_id')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="inputcolor" id="color_id" name="color_id" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->cid }}"
                                                @if ($color->cid == $product->color_id) selected @endif>{{ $color->cname }}
                                            </option>
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
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $product->price }}" id="inlineFormInputGroup" id=""
                                            pattern="[0-9]{1,5}"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                            data-error="#errprice"><span id="errprice"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                                    <select id="inputideal" name="idealfor" value="{{ $product->idealfor }}"
                                        class="form-control">
                                        <option selected>{{ $product->idealfor }}</option>
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
                                        <input type="text" class="form-control" name="upc" value="{{ $product->upc }}"disabled>
                                    </div>
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
                                        <input type="text" class="form-control" name="stock"
                                            value="{{ $product->stock }}" id="inlineFormInputGroup"
                                            placeholder="eg.12345" pattern="[0-9]{1,5}"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                           data-error="#errstock"><span id="errstock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>description<span class="text-danger">*</span></label>
                                    @error('description')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <textarea class="form-control" name="description" rows="3"
                                            placeholder="This Box has a Limit of 1000 Chars" pattern="[A-Za-z0-9_]{0,1000}"
                                            title="Special charactor is not allowd">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Main Image</label>
                                    @error('image')
                                    <strong>{{ $message }}</strong>
                                @enderror
                                    <div class="form-group">
                                        <img src="{{ asset('storage/media/' . $product->image) }}" onerror=""
                                            alt="Missing Image"
                                            style="height:50px; width:50px; border:1px rgb(145, 172, 145) solid;">
                                        <input type="file" class="form-control" value="{{ $product->image }}"
                                            name="image" accept=".png, .jpg, .jpeg">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="multiple_img_list pb-3">
                                <p>Select Multiple Images</p>
                                @foreach ($images as $image)
                                    <div class="more_img">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="file" name="sub_img[]"
                                                                onchange="readURLSubimg(this);"
                                                                class="form-control moreImgInp @error('sub_img') is-invalid @enderror"
                                                                data-iconname="fa fa-cloud-upload"
                                                                data-buttonname="btn-secondary" accept=".png, .jpg, .jpeg"
                                                                accept="image/*" />
                                                            <input
                                                                class="form-control  @error('img_id') is-invalid @enderror img_id"
                                                                value="{{ $image->id }}" name="img_id[]" type="hidden">
                                                            @error('sub_img')
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img alt="Product Image" id="sub_image"
                                                            src="{{ asset('storage/media/' . $image->images) }}"
                                                            class="img-thumbnail sub_image"
                                                            onerror="this.onerror=null;this.src='{{ asset('storage/media/no_image1.png') }}'">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control  @error('sort') is-invalid @enderror"
                                                        value="{{ $image->sort }}" name="sort[]" type="text" id="sort"
                                                        maxlength="2" onkeypress="if(this.value.length==2);"
                                                        placeholder="Sort Number" id="{{ $image->id }}">
                                                    @error('sort')
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button name="add_img" id="add_img" type="button"
                                                    class="  btn btn-success add_img"><i class="fa fa-plus-circle"
                                                        aria-hidden="true"></i> Add &nbsp;</button>
                                                <button name="remove_img" id="{{ $image->id }}" type="button"
                                                    class="btn btn-danger remove_img"><i
                                                        class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
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
                                                        <input type="file" name="sub_img[]" id="sub_img[]"
                                                            class="form-control @error('sub_img') is-invalid @enderror"
                                                            data-iconname="fa fa-cloud-upload"
                                                            data-buttonname="btn-secondary" accept="image/*" />
                                                        @error('sub_img')
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <img id="sub_image" class="img-thumbnail sub_image"
                                                        onerror="this.onerror=null;this.src='{{ asset('storage/media/no_image1.png') }}'">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input class="form-control @error('sort') is-invalid @enderror" value=""
                                                    name="sort[]" type="text" id="sort" maxlength="2"
                                                    onkeypress="if(this.value.length==2);" placeholder="Sort Number">
                                                @error('sort')
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button name="add_img" id="add_img" type="button"
                                                class="  btn btn-success add_img"><i class="fa fa-plus-circle"
                                                    aria-hidden="true"></i> Add &nbsp;</button>
                                            <button name="remove_img" id="remove_img" type="button"
                                                class="btn btn-danger remove_img"><i
                                                    class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
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
        $('#replace,#edit_url').on('keyup keypress click change', function() {
            var dInput = this.value;
            var t = dInput.toLowerCase();
            if (t.match(/ /g)) {
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
    </script>
    <script type="text/javascript">
        var i = 1;
        $("#addRow").click(function() {
            ++i;
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="file" name="subimage[' + i +
                ']"  class="form-control m-input " onchange="imagepreview(this);" autocomplete="off">';
            html += '<div class="col-lg-3">';
            html += '<input type="number" name="sort[' + i +
                ']" class="form-control m-input" autocomplete="off" placeholder="Sort Number">'
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
            console.log(input.files)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLSubimg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent().parent().parent().find('.sub_image').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function() {
            if ($(".multiple_img_list >div").length == 1) {
                $('.more_img').show();
            }
            $('.multiple_img_list').on('click', '.add_img', function() {
                var $obj = $(this).closest('.more_img').clone();
                $obj.find('input').val('').end().insertAfter($(this).closest('.more_img'));
                if ($(".multiple_img_list >div").length != 1) {
                    $('.remove_img').show();
                }
            });
            $('.multiple_img_list').on('click', '.remove_img', function() {
                if ($(".multiple_img_list >div").length > 1) {
                    $(this).closest('.more_img').remove();
                }
                if ($(".multiple_img_list >div").length == 1) {
                    $('.remove_img').hide();
                    $('.more_img').show();
                }
            });
            $('.multiple_img_list').on('keypress', '#sort', function(e) {
                var keyCode = e.charCode;
                console.log(e.keyCode);
                if ((keyCode != 8 || keyCode == 32) && (keyCode < 48 || keyCode > 57)) {
                    return false;
                }
            });
        });

        jQuery(function($) {
            var validator = $('#validation').validate({
                rules: {
                    name: {
                        required: true,
                        // remote: {
                        //     url: "{{url('/admin/products/checkurl')}}",
                        //     type: "GET",
                        //     data: {
                        //         colorname: function() {
                        //             return $(".valid").val();
                        //         }
                        //     },
                        // }
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
