@extends('Frontend::product_master')
@section('content')
    <link rel="stylesheet" type="text/css" href="assets/styles/styles.css" media="all" />
    <div class="allproduct">
        <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color product-grid" id="product-grid">
            <div class="page-title category-title">
                <h1>Men</h1>
            </div>
            <p class="category-image"><img src="assets/images/categories_grid_1.jpg" alt="Men" title="Men"></p>
            <div class="category-products grid-display" id="grid-display">
                <div class="toolbar">
                    <div class="sorter">
                        <p class="view-mode"> <label>View as:</label> <a href="#" title="Grid" id="grid_view" class="grid active"> <i
                                    class="icon-grid icons"></i> </a>
                            <a href="#" id="list_view" title="List" class="redirectjs list"> <i class="icon-list icons"></i>
                            </a>
                        </p>
                        <div class="sort-by">
                            <label>Sort By</label>
                            <select>
                                <option value="position" selected="selected"> Position</option>
                                <option value="name"> Name</option>
                                <option value="price"> Price</option>
                            </select>
                            <a href="#" title="Set Descending Direction"><img src="assets/images/i_asc_arrow.gif"
                                    alt="Set Descending Direction" class="v-middle"></a>
                        </div>
                        <div class="limiter">
                            <label>Show</label>
                            <select>
                                <option value="9" selected="selected"> 9</option>
                                <option value="12"> 12</option>
                                <option value="15"> 15</option>
                            </select>
                        </div>
                        <div class="pager">
                            <div class="pages">
                                <strong>Page:</strong>
                                <ol>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li class="bor-none"> <a class="next i-next" href="#" title="Next"> <i
                                                class="fa fa-angle-right">&nbsp;</i> </a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- .toolbar-->
                <ul class="products-grid row products-grid--max-3-col last odd listview" id="listdisp">
                    @foreach ($products as $product)
                        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item item-list">
                            <div class="category-products-grid">
                                <div class="images-container">
                                    <div class="product-hover">
                                        {{-- <span class="sticker top-left"><span class="labelnew">New</span></span> --}}
                                        <a href="{{ url('/user', $product->url) }}" title="Configurable Product"
                                            class="product-image">
                                            <img id="product-collection-image-8" class="img-responsive"
                                                src="{{ asset('storage/media/' . $product->image) }}" alt="" height="355"
                                                width="278">
                                            <span class="product-img-back"> <img class="img-responsive"
                                                    src="{{ asset('storage/media/' . $product->image) }}" alt=""
                                                    height="355" width="278"> </span>
                                        </a>
                                    </div>
                                    <div class="actions-no hover-box">
                                        <div class="actions">
                                            <button type="button" title="Add to Cart"
                                                class="button btn-cart pull-left"><span><i
                                                        class="icon-handbag icons"></i><span>Add to
                                                        Cart</span></span></button>
                                            <ul class="add-to-links pull-left">
                                                <li class="pull-left"><a href="#" title="Add to Wishlist"
                                                        class="link-wishlist"><i class="icon-heart icons"></i>Add to
                                                        Wishlist</a></li>
                                                <li class="pull-left"><a href="#" title="Add to Compare"
                                                        class="link-compare"><i class="icon-bar-chart icons"></i>Add to
                                                        Compare</a></li>
                                                <li class="link-view pull-left"> <a title="Quick View" href="#"
                                                        class="link-quickview"><i class="icon-magnifier icons"></i>Quick
                                                        View</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info products-textlink clearfix">
                                    <h2 class="product-name"><a href="{{ url('/user', $product->url) }}"
                                            title="Configurable Product">{{ $product->name }}</a></h2>

                                    <div class="price-box"> <span class="regular-price"> <span class="price">
                                                ₹{{ $product->price }}</span></span>
                                        </span></div>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:80%"></div>
                                        </div>
                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="display">
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
@section('custom_scripts')
    <script>

        function save() {

            var a = document.getElementById('minimum').value;
            localStorage.setItem("min", a);
            var b = document.getElementById('maximum').value;
            localStorage.setItem("max", b);


        }

        function displaylist() {
            var minimum = document.getElementById("minimum");
            var maximum = document.getElementById("maximum");
            minimum.value = localStorage.getItem("min");
            maximum.value = localStorage.getItem("max");
            //jQuery('.product-list').hide();
        }


    </script>
@endsection
