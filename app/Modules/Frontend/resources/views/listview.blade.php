<ol class="products-list" id="products-list">
    @foreach ($products as $product)
        <li class="item odd">
            <div class="row">
                <div class="col-mobile-12 col-xs-5 col-md-4 col-sm-4 col-lg-4">
                    <div class="products-list-container">
                        <div class="images-container">
                            <div class="product-hover">
                                {{-- <span class="sticker top-left"><span class="labelnew">New</span></span> --}}
                                <a href="{{ url('/product', $product->url) }}" title="" class="product-image">
                                    <img id="product-collection-image-8" class="img-responsive"
                                        src="{{ asset('storage/media/' . $product->image) }}" width="278" height="355"
                                        alt="">
                                    <span class="product-img-back">
                                        <img class="img-responsive"
                                            src="{{ asset('storage/media/' . $product->image) }}" width="278"
                                            height="355" alt="">
                                    </span>
                                </a>
                                <div class="product-hover-box">
                                    <a class="detail_links" href="{{ url('/product', $product->url) }}"></a>
                                    <div class="link-view"> <a title="Quick View" href="#"
                                            class="link-quickview"><i class="icon-magnifier icons"></i>Quick
                                            View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-shop col-mobile-12 col-xs-7 col-md-8 col-sm-8 col-lg-8">
                    <div class="f-fix">
                        <div class="product-primary products-textlink clearfix">
                            <h2 class="product-name"><a href="{{ url('/product', $product->url) }}"
                                    title="Configurable Product">{{ $product->name }}</a>
                            </h2>
                            <div class="price-box"> <span class="regular-price"> <span
                                        class="price">₹{{ $product->price }}</span> </span></div>
                        </div>
                        <div class="desc std">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="product-secondary actions-no actions-list clearfix">
                            <p class="action"><button type="button" title="Add to Cart"
                                    class="button btn-cart pull-left"><span><i class="icon-handbag icons"></i><span>Add
                                            to
                                            Cart</span></span></button></p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
    <!--- .item-->

</ol>
