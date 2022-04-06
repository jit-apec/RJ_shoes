<div class="header-container header-color color">
    <div class="header_full">
        <div class="header">
            <div class="header-logo show-992">
                <a href="{{ url('/') }}" class="logo"> <img class="img-responsive"
                        src="{{ asset('assets/images/white_logo.png') }}" alt="" /></a>
            </div>
            <!--- .header-logo -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="header-config-bg">
                            <div class="header-wrapper-bottom">
                                <div class="custom-menu col-lg-12">
                                    <div class="header-logo hidden-992">
                                        <a href="{{ url('/') }}" class="logo"> <img
                                                class="img-responsive"
                                                src="{{ asset('assets/images/white_logo.png') }}" alt="" /></a>
                                    </div>
                                    <!--- .header-logo -->
                                    <div class="magicmenu clearfix">
                                        <ul class="nav-desktop sticker">
                                            <li class="level0 logo display"><a class="level-top"
                                                    href="{{ url('/') }}"><img alt="logo"
                                                        src="{{ asset('assets/images/white_logo.png') }}"></a>
                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/') }}"><span
                                                        class="icon-home fa fa-home"></span><span
                                                        class="icon-text">Home</span></a>

                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/products') }}"><span
                                                        class="icon-home fa fa-home"></span><span
                                                        class="icon-text">Product</span></a>

                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/product/cart') }}"><span
                                                        class="icon-home fa fa-home"></span><span
                                                        class="icon-text">Cart</span></a>

                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/myorder') }}"><span
                                                        class="icon-home fa fa-home"></span><span
                                                        class="icon-text">My Order</span></a>

                                            </li>
                                        </ul>
                                    </div>
                                    <!--- .magicmenu -->

                                </div>
                                <!--- .custom-menu -->
                            </div>
                            <!--- .header-wrapper-bottom -->
                        </div>
                        <!--- .header-config-bg -->
                    </div>
                    <!--- .row -->
                </div>
                <!--- .container -->
            </div>
            <!--- .header-bottom -->
            <div class="header-page clearfix">
                {{-- <div class="header-setting header-search">
                    <div class="settting-switcher">
                        <div class="dropdown-toggle">
                            <div class="icon-setting"><i class="icon-magnifier icons"></i></div>
                        </div>
                        <div class="dispaly-seach dropdown-switcher">
                            <form id="search_mini_form" action="#" method="get">
                                <div class="form-search clearfix">
                                    <input id="catsearch" type="hidden" name="cat" />
                                    <input id="search" type="text" name="q" class="input-text"
                                        placeholder="Search ..." />
                                    <select class="ddslick" id="cat" name="cat">
                                        <option value="">Categories</option>
                                        <option value="4">Men</option>

                                    </select>
                                    <button type="submit" title="Search" class="button"><span><span><i
                                                    class="icon-magnifier icons"></i></span></span></button>
                                </div>
                                <!--- .form-search -->
                            </form>
                            <!--- #search_mini_form -->
                        </div>
                    </div>
                </div> --}}
                <!--- .header-search -->
                <div class="header-setting">
                    <div class="settting-switcher">
                        <div class="dropdown-toggle">
                            <div class="icon-setting"><i class="icon-settings icons"></i></div>
                        </div>
                        <div class="dropdown-switcher">
                            <div class="top-links-alo">
                                <div class="header-top-link">
                                    <ul class="links">
                                        <li><a href="{{ url('/product/cart') }}">Cart</a>
                                        </li>
                                        <li><a href="{{ url('/myorder') }}">My Order</a>
                                        </li>
                                        <li>
                                            @if (Auth::check())
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="nav-link ">Logout
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}">Login

                                                </a>
                                            @endif
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <!--- .top-links-alo -->

                        </div>
                        <!--- .dropdown-switcher -->
                    </div>
                    <!--- .settting-switcher -->
                </div>
                <!--- .header-setting -->
                <div class="miniCartWrap">
                    <div class="mini-maincart">
                        <div class="cartSummary">
                            <div class="crat-icon">
                                <span class="icon-handbag icons"></span>
                                <p class="mt-cart-title">My Cart</p>
                            </div>
                        </div>
                        <!--- .cartSummary -->
                        <div class="mini-contentCart" style="display: none">
                            <div class="block-content">
                                <p class="block-subtitle">Recently added item(s)</p>
                                <ol id="cart-sidebar" class="mini-products-list clearfix">

                                    @php $total = 0 @endphp
                                    @foreach ($cartt as $items)
                                        @php $total += $items->quantity *  $items->product->price @endphp

                                        {{-- @php   echo $items->product->image; @endphp --}}
                                        <li class="item clearfix">
                                            <div class="cart-content-top">
                                                <a href="{{ url('/products', $items->product->url) }}"
                                                    title="{{ $items->product->name }}" class="product-image">
                                                    <img src="{{ asset('storage/media/' . $items->product->image) }}"
                                                        width="60" height="77" alt="Brown Arrows Cushion">
                                                </a>
                                                <div class="product-details">
                                                    <p class="product-name">
                                                        <a href="{{ url('/products', $items->product->url) }}"
                                                            title="{{ $items->product->name }}">{{ $items->product->name }}</a>
                                                    </p>
                                                    <strong>{{ $items->quantity }}</strong> x <span
                                                        class="price">₹{{ $items->product->price }}</span>
                                                    <p class="price"><strong>=
                                                            ₹{{ $items->quantity * $items->product->price }}
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                                <p class="subtotal"> <span class="label">Subtotal:</span> <span
                                        class="price">Total ₹{{ $total }}</span></p>
                                <div class="actions"> <a href="{{ url('/product/cart') }}"
                                        class="view-cart"> View cart </a> <a
                                        href="{{ url('/biling_address') }}">Checkout</a></div>
                            </div>
                        </div>
                        <!--- .mini-contentCart -->
                    </div>
                    <!--- .mini-maincart -->
                </div>
                <!--- .miniCartWrap -->
            </div>
            <!--- .header-page -->
        </div>
        <!--- .header -->
    </div>
    <!--- .header_full -->
</div>
