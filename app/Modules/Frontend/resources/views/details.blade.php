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
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" style="width:60%"></div>
                                                            </div>
                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span
                                                                    class="separator">|</span> <a href="#">Add Your
                                                                    Review</a></p>
                                                        </div>
                                                        <div class="product-type-data">
                                                            <div class="price-box">
                                                                <p class="old-price"> <span
                                                                        class="price-label">Regular
                                                                        Price:</span> <span class="price">
                                                                        ₹{{ $product->price }}
                                                                    </span></p>
                                                                <p class="special-price"> <span
                                                                        class="price-label">Special
                                                                        Price</span> <span class="price">
                                                                        ₹{{ $product->price }}
                                                                    </span></p>
                                                            </div>

                                                            @if ($product->stock == 0)
                                                                <p class="availability out">Availability:
                                                                    <span style="color:red">Out of stock</span>
                                                                @else
                                                                <p class="availability in-stock">Availability:
                                                                    <span>In stock</span>
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
                                                                                class="swatch-label" >
                                                                                {{ $p->size }}
                                                                            </span></a></li>
                                                                @endforeach
                                                            </ol>

                                                        </div>
                                                        <div class="add-to-box">
                                                            <div class="product-qty">
                                                                <label for="qty">Qty:</label>
                                                                <div class="custom-qty"> <input type="text" name="qty"
                                                                        id="qty" min="1" max="5" value="1" title="Qty"
                                                                        class="input-text qty" /> <button type="button"
                                                                        class="increase items"
                                                                        onclick="var result = document.getElementById('qty');   var qty = result.value; if( !isNaN( qty )) result.value++;return false;">
                                                                        <i class="fa fa-plus"></i> </button> <button
                                                                        type="button" class="reduced items"
                                                                        onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button></div>
                                                            </div>
                                                            <div class="add-to-cart"> <button type="button"
                                                                    title="Add to Cart" class="button btn-cart"
                                                                    onclick="productAddToCartForm.submit(this)"> <span>
                                                                        <span class="view-cart icon-handbag icons">Add to
                                                                            Cart</span> </span> </button></div>
                                                            <ul class="add-to-links">
                                                                <li> <a href="#" rel="tooltip" title="Add to Wishlist"
                                                                        onclick="productAddToCartForm.submitLight(this, this.href); return false;"
                                                                        class="link-wishlist"> <i
                                                                            class="icon-heart icons"></i>
                                                                        Add to Wishlist </a></li>
                                                                <li> <a href="#" class="link-compare"
                                                                        title="Add to Compare">
                                                                        <i class="icon-bar-chart icons"></i> Add to Compare
                                                                    </a>
                                                                </li>
                                                            </ul>
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
                                            <li class="item " target=".box-additional">Additional Information</li>

                                        </ul>
                                        <div class="product-collateral">
                                            <div class="box-collateral box-description active">
                                                <h2>Description</h2>
                                                <h2>Details</h2>
                                                <div class="std">
                                                    <p>{{ $product->description }}</p>
                                                </div>
                                            </div>
                                            <div class="box-collateral box-additional">
                                                <h2>Additional Information</h2>
                                                <h2>Additional Information</h2>
                                                <table class="data-table" id="product-attribute-specs-table">
                                                    <col width="25%" />
                                                    <col />
                                                    <tbody>
                                                        <tr>
                                                            <th class="label">Type</th>
                                                            <td class="data">Dresses</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="label">Occasion</th>
                                                            <td class="data">Career</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
    <script>
        var options1 = {
            width: 400,
            zoomWidth: 500,
            offset: {
                vertical: 0,
                horizontal: 10
            }
        };
        // If the width and height of the image are not known or to adjust the image to the container of it
        var options2 = {
            fillContainer: true,
            offset: {
                vertical: 0,
                horizontal: 10
            }
        };
        new ImageZoom(document.getElementById("img-container"), options2);
        const change = src => {
            document.getElementById('main').src = src
            alert(src);
        }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <script src="{{ asset('assets/scripts/jquery.jqZoom.js') }}"></script>
    <script>
        $(function() {
            $(".visible").jqZoom({
                selectorWidth: 10,
                selectorHeight: 10,
                viewerWidth: 800,
                viewerHeight: 500,
            });

        })

        $(document).ready(function() {
            jQuery('.thumb-link').hover(function() {
                jQuery('#image-main').attr('src', jQuery(this).children('.sub_img').attr('src'));
            });


        });
    </script>
    {{-- <script>
        jQuery(document).ready(function() {
            jQuery('.parent').css('width', jQuery('img').width());
            jQuery('img').parent().zoom({
                magnify: 3,
                target: ('.contain').get(0)
            });
        });
    </script> --}}
@endsection
