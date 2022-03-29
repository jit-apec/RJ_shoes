@extends('Frontend::common')

@section('content')
    <div class="page">
        <div class="main-container col2-left-layout ">
            <div class="breadcrumbs">
                <div class="container">
                    <ul>
                        <li class="home"> <a href="{{ url('/dashboard') }}" title="Go to Home Page">Home</a></li>
                        <li class="category4"> <strong>Men</strong></li>
                    </ul>
                </div>
            </div>
            @foreach ($products as $product)
                @section('title')
                    {{ $product->name }}
                @endsection
                <div class="container">
                    <div class="main">
                        <div class="row">
                            <div class="col-main col-lg-12">
                                <div class="product-view">
                                    <div class="product-essential">
                                        <div class="row">
                                            <form action="#" method="post" id="product_addtocart_form">
                                                <div class="product-img-box clearfix col-md-5 col-sm-5 col-xs-12">
                                                    <div class="product-img-content">
                                                        <div class="product-image example">
                                                            <div class="product-image-gallery zoom-box">

                                                                <img id="image-main"
                                                                    class="gallery-image visible img-responsive"
                                                                    src="{{ asset('storage/media/' . $product->image) }}"
                                                                    alt="Short Sleeve Dress" title="Short Sleeve Dress"
                                                                    style="height:450px; width:500px" />
                                                            </div>
                                                        </div>


                                                        <!--- .product-image-->
                                                        <div class="more-views">
                                                            <h2>More Views</h2>
                                                            <ul class="product-image-thumbs">
                                                                <li><a class="thumb-link zoom-box  " href="#" title=""
                                                                        data-image-index="0"> <img
                                                                            class="img-responsive sub_img"
                                                                            src="{{ asset('storage/media/' . $product->image) }}"
                                                                            alt="" /> </a>

                                                                    {{-- <a href="large.jpg" class="MagicZoom" data-options="zoomDistance: 150"><img src="small.jpg" /></a> --}}
                                                                </li>
                                                                @foreach ($subimage as $image)
                                                                    <li> <a class="thumb-link" href="#" title=""
                                                                            data-image-index="1"> <img
                                                                                class="img-responsive sub_img"
                                                                                src="{{ asset('storage/media/' . $image->images) }}"
                                                                                alt="" onclick="change(this.src)"
                                                                                id="sub_img" /> </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="container">

                                                        </div>

                                                        <!--- .more-views -->
                                                    </div>
                                                    <!--- .product-img-content-->
                                                </div>
                                                <!--- .product-img-box-->
                                                <div class="product-shop col-md-7 col-sm-7 col-xs-12">
                                                    <div class="product-shop-content">
                                                        <div class="product-name">
                                                            <h1>{{ $product->name }}</h1>
                                                        </div>

                                                        <div class="product-type-data">
                                                            <div class="price-box">

                                                                <p class="special-price"> <span
                                                                        class="price-label">Special
                                                                        Price</span> <span class="price">
                                                                        ₹{{ $product->price }}
                                                                    </span></p>
                                                            </div>
                                                            @if ($product->stock >= 5)

                                                                <p class="availability in-stock">Availability:
                                                                    <span>In stock</span>
                                                                </p>
                                                            @elseif ($product->stock >= 1 && $product->stock < 5)
                                                                <p class="availability out">Availability:
                                                                    <span style="color:red">{{ $product->stock }}
                                                                        left!</span>
                                                                @else
                                                                <p class="availability in-stock">Availability:
                                                                    <span >
                                                                        <h2 style="color:red">Sold Out
                                                                        </h2>
                                                                        <h4 style="color:red"> This item is currently out of stock</h4>
                                                                    </span>
                                                                </p>
                                                            @endif
                                                            <div class="products-sku"> <span
                                                                    class="text-sku">Product
                                                                    Code:{{ $product->upc }}</span></div>
                                                        </div>
                                                        <div class="short-description">
                                                            <h2>Short Description</h2>
                                                            <p>{{ $product->description }}</p>
                                                        </div>

                                                        <div class="last odd">
                                                            <h5> Size</h5>
                                                            <ol class="configurable-swatch-list configurable-size">
                                                                @foreach ($products as $p)
                                                                    <li> <a href="#" class="swatch-link" selected> <span
                                                                                class="swatch-label">
                                                                                {{ $p->size }}
                                                                            </span></a></li>
                                                                @endforeach
                                                            </ol>

                                                        </div>
                                                        @if ($product->stock > 0)
                                                        {
                                                            <div class="add-to-box">
                                                                <div class="product-qty">
                                                                    <label for="qty">Qty:</label>
                                                                    <div class="custom-qty"> <input type="text"
                                                                            name="qty" id="qty" maxlength="1" value="1"
                                                                            title="Qty" class="input-text qty"
                                                                            oninput="this.value = this.value.replace(/[^/1-5\s]/g, '').replace(/(\..*)\./g, '$1'); " />
                                                                        <button type="button" class="increase items"
                                                                            id="btnmax"
                                                                            onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && (qty < 5)) result.value++;return false;">
                                                                            <i class="fa fa-plus"></i> </button>
                                                                        <button type="button" class="reduced items"
                                                                            id="btnmin"
                                                                            onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;">
                                                                            <i class="fa fa-minus"></i></button>
                                                                    </div>
                                                                </div>

                                                                <div class="add-to-cart"> <button type="button"
                                                                        title="Add to Cart" class="button btn-cart"
                                                                        id="addtocart"
                                                                        onclick="quantity({{ $product->id }})"> <span>
                                                                            <span class="view-cart icon-handbag icons">Add
                                                                                to
                                                                                Cart</span> </span> </button></div>

                                                            </div>

                                                        }
                                                        @endif
                                                         {{-- @if (session()->has('status'))
                                                            <p style="color: green;font-size: 20px; font-weight: bold;">
                                                                {{ session('status') }}
                                                            </p>
                                                        @error('name')
                                                            <p style="color:red">{{ $message }} </p>
                                                        @enderror --}}

                                                            <div class="container">
                                                                @if (session()->has('success'))
                                                                    <div class="alert alert-success">
                                                                        {{-- {{ session('success') }} --}}
                                                                        {{ session()->get('message') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="addit">
                                                                <div class="alo-social-links clearfix">

                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!--- .product-shop-content-->
                                                </div>
                                                <!--- .product-shop-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--- .product-essential-->
                                    <div class="product-wapper-tab clearfix">
                                        <ul class="toggle-tabs">
                                            <li class="item active" target=".box-description">Description</li>


                                        </ul>
                                        <div class="product-collateral">
                                            <div class="box-collateral box-description active">
                                                <h2>Description</h2>
                                                <h2>Details</h2>
                                                <div class="std">
                                                    <p>{{ $product->description }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--- .product-wapper-tab-->
                                </div>
                                <!--- .product-view-->
                            </div>
                            <!--- .col-main-->
                        </div>
                        <!--- .row-->
                    </div>
                    <!--- .main-->
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            jQuery('.thumb-link').hover(function() {
                jQuery('#image-main').attr('src', jQuery(this).children('.sub_img').attr('src'));
            });
        });

        function quantity(id) {
            var quantity = jQuery('#qty').val();

            var change_url=$(this).parent().find('.change').val();
         //   var anchors = document.querySelectorAll('a[href*="google.com"]');
                Array.prototype.forEach.call(anchors, function (element, index) {
                    element.href = "http://stackoverflow.com";
                });
                die("test");
            jQuery.ajax({
                url: "/products/addcart",
                type: "get",
                datatype: "html",
                data: {
                    'id': id,
                    'quantity': quantity
                },
                // success: function(data) {
                //     console.log(data);
                //     console.log("Status Updated");
                // },
                // success: function(data) {
                //     //$('div.flash-message').html(data);
                //    // alert("Product Add successfully!");
                //    //alert( data);
                //     if(count(data)) {
                //         alert("Product Add successfully!");
                //     }
                //     else
                //     {
                //         alert("Product Add failed!");
                //     }

                // },
                success: function(data) {
                    if (data.status == true) {
                        swal("Product Add successfully!");
                        // toastr.success(data.message);
                        // $('body').find('.price-section').append(data.html);
                    } else {
                        //oastr.error(data.message);
                    }
                },

            })
        }
    </script>
@endsection
