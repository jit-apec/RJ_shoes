@extends('Frontend::common')
@section('title')
Products
@endsection
@section('content')
    <div class="main-container col2-left-layout ">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="{{ url('/dashboard') }}" title="Go to Home Page">Home</a></li>
                    <li class="category4"> <strong>Products</strong></li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 left-color color">
                        <div class="block block-layered-nav block-layered-nav--no-filters">
                            <div class="block-title"> <strong><span>Shop By</span></strong></div>
                            <div class="block-content toggle-content">
                                <p class="block-subtitle block-subtitle--filter">Filter</p>
                                <dl id="narrow-by-list">
                                    <dt class="even">By Price</dt>
                                    <dd class="even">
                                        <div class="slider-ui-wrap">
                                            <div id="price-range" class="slider-ui" slider-min="0" slider-max="25000"
                                                slider-min-start="0" slider-max-start="25000"></div>
                                        </div>
                                        <form action="" id="price_filter" class="price-range-form" method="">
                                            @csrf
                                            Min &nbsp;₹<input type="text" class="range_value range_value_min"
                                                target="#price-range" name="minimum" id="minimum" />
                                            To
                                            ₹<input type="text" class="range_value range_value_max" target="#price-range"
                                                name="maximum" id="maximum" /> Max &nbsp; <br><br>
                                            <div class="text-right">
                                                <input type="submit" class="btn-submit text-center" value="ok" id="onsubmit"
                                                    onclick="save();">
                                            </div>
                                        </form>
                                    </dd>
                                    <dt class="odd">By Brands</dt>
                                    <dd class="odd">
                                        @foreach ($brand as $brands)
                                            <ul style="" class="nav-accordion">
                                                <li>
                                                    <input type="checkbox" id="category" name="brand"
                                                        value="{{ $brands->id }}">
                                                    <span>{{ $brands->name }}</span>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </dd>
                                    <dt class="even">By Colors</dt>
                                    <dd class="even">

                                        <ol class="configurable-swatch-list">

                                            @foreach ($color as $colors)
                                                <li> <input type="checkbox" id="checkbox" name="color"
                                                        value="{{ $colors->id }}">
                                                    <span class="count">{{ $colors->name }}</span>
                                                </li>
                                            @endforeach

                                        </ol>

                                    </dd>
                                    <dt class="last odd">By Size</dt>
                                    <dd class="last odd">

                                        <ol class="configurable-swatch-list configurable-size">
                                            @foreach ($products as $p)
                                                <li><input type="checkbox" id="size" name="color" class="swatch-link"
                                                        value="{{ $p->size }}"> <span class="swatch-label">
                                                        {{ $p->size }}
                                                    </span></li>
                                            @endforeach
                                        </ol>

                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!--- .block-layered-nav-->

                        <div class="magicproduct_active magicproduct mage-custom">

                            <div class="content-products" data-margin="30" data-slider="null"
                                data-options='{"480":"1","640":"1","768":"1","992":"1","993":"1"}'>
                                <div class="mage-magictabs mc-saleproduct">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- .sidebar-->
                    <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color product-grid"
                        id="product-grid">
                        <div class="page-title category-title">
                            <h1></h1>
                        </div>
                        <p class="category-image"><img src="assets/images/categories_grid_1.jpg" alt="Men" title="Men">
                        </p>
                        <div class="category-products grid-display" id="grid-display">
                            <div class="toolbar">
                                <div class="sorter">
                                    <p class="view-mode"> <label>View as:</label>
                                        <a title="Grid" id="grid_view" class="grid active"> <i class="icon-grid icons"
                                                id="grid_view"></i> </a>
                                        <a id="list_view" title="List" class="redirectjs list"> <i
                                                class="icon-list icons"></i>
                                        </a>
                                    </p>
                                    <div class="sort-by">
                                        <label>Sort By</label>
                                        <select id="sort_by" name="sort_by">
                                            <option value="name"> Position</option>
                                            <option value="name"> Name</option>
                                            <option value="price"> Price</option>
                                        </select>
                                    </div>
                                    <div class="sort-by">
                                        <label>Order By</label>
                                        <select id="order_by" name="order_by">
                                            <option value="ASC"> Position</option>
                                            <option value="ASC"> Acending</option>
                                            <option value="DESC"> Decending</option>
                                        </select>

                                    </div>
                                    <div class="limiter">
                                        <label>Show</label>
                                        <select id="show_product" name="show_product">
                                            <option value="5" selected="selected"> 5</option>
                                            <option value="10"> 10</option>
                                            <option value="20"> 20</option>
                                            <option value="50"> 50</option>
                                            <option value="100"> 100</option>
                                        </select>
                                    </div>
                                    {{-- <div class="pager">
                                        <div class="pages">
                                            <strong>Page:</strong>
                                            <ol>
                                                <li class="current">1</li>
                                                <li><a href="#">2</a></li>
                                                <li class="bor-none"> <a class="next i-next" href="#" title="Next">
                                                        <i class="fa fa-angle-right">&nbsp;</i> </a></li>
                                            </ol>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <!--- .toolbar-->
                            <div id="content">

                            </div>
                                {{-- <div class="d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div> --}}
                            {{-- <div class="page-nav-bottom">
                                <div class="left">Items 13 to 24 of 38 total</div>
                                <div class="right" id="pagination">
                                    <ul class="page-nav-category">
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a class="selected" href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>

                                    </ul>
                                </div>
                            </div> --}}
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
@endsection
@section('custom_scripts')
    <script>
        var color = [];
        var brand = [];
        var size = [];
        jQuery('input#checkbox').click(function() {

            if (jQuery(this).is(':checked')) {
                var colors = jQuery(this).val()
                color.push(colors);
            } else {
                var colors = jQuery(this).val()
                color.pop(colors);
            }
            price_filter();
        })
        jQuery('input#category').click(function() {

            if (jQuery(this).is(':checked')) {
                var brands = jQuery(this).val()
                brand.push(brands);
            } else {
                var brands = jQuery(this).val()
                brand.pop(brands);
            }
            console.log(brand);
            price_filter();

        })
        jQuery('input#size').click(function() {

            if (jQuery(this).is(':checked')) {
                var sizes = jQuery(this).val()
                size.push(sizes);
            } else {
                var sizes = jQuery(this).val()
                size.pop(sizes);
            }
            console.log(size);
            price_filter();

        })
        function price_filter() {
            var minimum = jQuery('#minimum').val();
            var maximum = jQuery('#maximum').val();
            var sort_by = jQuery('#sort_by').val();
            var order_by = jQuery('#order_by').val();
            var show_product = jQuery('#show_product').val();
            jQuery.ajax({
                url: "{{ url('/products/price') }}",
                type: "get",
                datatype: 'html',
                data: {
                    view: jQuery('#grid_view').hasClass('active'),
                    'brand': brand,
                    'color': color,
                    'size': size,
                    'sort_by': sort_by,
                    'order_by': order_by,
                    'show_product': show_product,
                    'minimum': minimum,
                    'maximum': maximum,
                },
                success: function(data) {
                    jQuery("#content").html(data);
                }
            });
        }
        jQuery(document).ready(function() {
            price_filter();
        });
        jQuery('#grid_view').on("click", function() {

            jQuery("#grid_view").removeClass('redirectjs list').addClass('grid active');
            jQuery("#list_view").removeClass('grid active').addClass('redirectjs list');

            price_filter();
        });
        jQuery('#list_view').on("click", function() {

            jQuery("#list_view").removeClass('redirectjs list').addClass('grid active');
            jQuery("#grid_view").removeClass('grid active').addClass('redirectjs list');

            price_filter();
        });
        jQuery("#onsubmit").click(function(e) {
            e.preventDefault();
            price_filter();
        });
        jQuery("#sort_by, #order_by, #show_product").on("click", function() {
            price_filter();
        });

        
</script>
@endsection
