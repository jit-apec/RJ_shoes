<ul class="products-grid row products-grid--max-3-col last odd listview" id="listdisp">
    @foreach ($products as $product)
        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item item-list">
            <div class="category-products-grid">
                <div class="images-container">
                    <div class="product-hover">
                        {{-- <span class="sticker top-left"><span class="labelnew">New</span></span> --}}
                        <a href="{{ url('/product', $product->url) }}" title="Configurable Product"
                            class="product-image">
                            <img id="product-collection-image-8" class="img-responsive"
                                src="{{ asset('storage/media/' . $product->image) }}" alt="" height="355"
                                width="278">
                            <span class="product-img-back"> <img class="img-responsive"
                                    src="{{ asset('storage/media/' . $product->image) }}" alt="" height="355"
                                    width="278"> </span>
                        </a>
                    </div>
                    <div class="actions-no hover-box ">
                        <div class="actions">
                            <button type="button" title="Add to Cart" class="button btn-cart "><span><i
                                        class="icon-handbag icons"></i><span>Add to
                                        Cart</span></span></button>
                            {{-- <ul class="add-to-links pull-left">


                                <li class="link-view pull-left"> <a title="Quick View" href="{{ url('/user', $product->url) }}"
                                        class="link-quickview"><i class="icon-magnifier icons"></i>Quick
                                        View</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="product-info products-textlink clearfix">
                    <h2 class="product-name"><a href="{{ url('/user', $product->url) }}"
                            title="Configurable Product">{{ $product->name }}</a></h2>

                    <div class="price-box"> <span class="regular-price"> <span class="price">
                                ₹{{ $product->price }}</span></span>
                        </span></div>
                        {{-- <div class=" hover-box ">
                            <div class="actions">
                                <button type="button" title="Add to Cart" class="button btn-cart "><span><i
                                            class="fa fa-shopping-cart fa-3x"aria-hidden="true"></i><span>Add to
                                            Cart</span></span></button>
                            </div>
                        </div> --}}
                </div>
            </div>
            <div class="display">
            </div>
        </li>
    @endforeach

</ul>
<div class="d-flex justify-content-center">
    {{$products->render()}}
</div>
