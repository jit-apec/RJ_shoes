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
                                        <div id="price-range" class="slider-ui" slider-min="0" slider-max="10000"
                                            slider-min-start="0" slider-max-start="10000"></div>
                                    </div>
                                    <form action="/filter/price" id="price_filter" class="price-range-form" method="POST">
                                        @csrf
                                        Min &nbsp;₹<input type="text" class="range_value range_value_min"
                                            target="#price-range" name="minimum" id="minimum"  onchange="save();"/>
                                        -
                                        ₹<input type="text" class="range_value range_value_max" target="#price-range"
                                            name="maximum" id="maximum" /> Max &nbsp; <br><br>
                                        <div class="text-right">
                                            <input type="submit" class="btn-submit text-center" value="ok"
                                                onclick="save();">
                                        </div>
                                    </form>
                                </dd>
                                <dt class="odd">By Brands</dt>
                                <dd class="odd">
                                    <ul style="" class="nav-accordion">
                                        <li class="level0 level-top"><a href="#"
                                                class="level-top"><span>Hermes</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Dolce &
                                                    Gabbana</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Louis
                                                    Vuitton</span></a></li>
                                        <li class="level0 level-top"><a href="#"
                                                class="level-top"><span>Versace</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Hug
                                                    Boss</span></a></li>
                                    </ul>
                                </dd>
                                <dt class="even">By Colors</dt>
                                <dd class="even">
                                    <ol class="configurable-swatch-list">
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">Black(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">Blue(4)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">Blue(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">Indigo(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">orange(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">pink(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <span class="count">Red(4)</span>
                                            </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">Taupe(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                </span> <span class="count">yellow(2)</span> </a></li>
                                    </ol>
                                </dd>
                                <dt class="last odd">By Size</dt>
                                <dd class="last odd">
                                    <ol class="configurable-swatch-list configurable-size">
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> L
                                                </span></a></li>
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> M
                                                </span></a></li>
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> S
                                                </span></a></li>
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> XL
                                                </span></a></li>
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> XS
                                                </span></a></li>
                                        <li> <a href="#" class="swatch-link"> <span class="swatch-label"> XXL
                                                </span></a></li>
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
