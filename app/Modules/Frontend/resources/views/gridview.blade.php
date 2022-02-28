@extends('Frontend::product_master')
@section('content')
    <link rel="stylesheet" type="text/css" href="assets/styles/styles.css" media="all" />
    <ul class="products-grid row products-grid--max-3-col last odd">
        @foreach ($product as $product)
        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
            <div class="category-products-grid">
                <div class="images-container">
                    <div class="product-hover">
                        <span class="sticker top-left"><span class="labelnew">New</span></span>
                        <a href="{{ url('/user', $product->url) }}" title="Configurable Product" class="product-image">
                            <img id="product-collection-image-8" class="img-responsive"
                                src="{{ asset('storage/media/' . $product->image) }}" alt="" height="355" width="278">
                            <span class="product-img-back"> <img class="img-responsive"
                                    src="{{ asset('storage/media/' . $product->image) }}" alt="" height="355" width="278"> </span>
                        </a>
                    </div>
                    <div class="actions-no hover-box">
                        <div class="actions">
                            <button type="button" title="Add to Cart" class="button btn-cart pull-left"><span><i
                                        class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
                            <ul class="add-to-links pull-left">
                                <li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i
                                            class="icon-heart icons"></i>Add to Wishlist</a></li>
                                <li class="pull-left"><a href="#" title="Add to Compare" class="link-compare"><i
                                            class="icon-bar-chart icons"></i>Add to Compare</a></li>
                                <li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i
                                            class="icon-magnifier icons"></i>Quick View</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-info products-textlink clearfix">
                    <h2 class="product-name"><a href="{{ url('/user', $product->url) }}" title="Configurable Product">{{$product->name}}</a></h2>
                    <ul class="configurable-swatch-list configurable-swatch-color clearfix">
                        <li class="option-blue is-media"> <a href="javascript:void(0)" name="blue"
                                class="swatch-link swatch-link-92 has-image" title="blue"> <span class="swatch-label">
                                    <img src="assets/images/blue.png" alt="blue" height="15" width="15"> </span> </a></li>
                        <li class="option-red is-media"> <a href="javascript:void(0)" name="red"
                                class="swatch-link swatch-link-92 has-image" title="red"> <span class="swatch-label"> <img
                                        src="assets/images/red.png" alt="red" height="15" width="15"> </span> </a></li>
                    </ul>
                    <div class="price-box"> <span class="regular-price"> <span class="price">
                        ₹{{$product->price}}</span></span>
                        </span></div>
                    <div class="ratings">
                        <div class="rating-box">
                            <div class="rating" style="width:80%"></div>
                        </div>
                        <span class="amount"><a href="#">1 Review(s)</a></span>
                    </div>
                </div>
            </div>

        </li>
        @endforeach
    </ul>
    <!--- .products-grid-->

    <div class="page-nav-bottom">
        <div class="left">Items 13 to 24 of 38 total</div>
        <div class="right">
            <ul class="page-nav-category">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a class="selected" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!--- .page-nav-bottom-->
    </div>
    <!--- .category-products-->
    </div>
    <!--- .col-main-->
    </div>
    <!--- .row-->
    </div>
    <!--- .main-->
    </div>
    <!--- .container-->
    </div>
    <!--- .main-container -->
@endsection
