@extends('Frontend::common')
@section('title')
    Cart
@endsection
@section('content')
    <div class="page">
        <div class="main-container col1-layout content-color color">
            <div class="breadcrumbs">
                <div class="container">
                    <ul>
                        <li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
                        <li> <strong>My Cart</strong></li>
                    </ul>
                </div>
            </div>
            <!--- .breadcrumbs-->

            <div class="container">
                <div class="content-top no-border">
                    <h2>My Cart</h2>



                </div>
                @if (Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <div class="table-responsive-wrapper">
                    <table class="table-order table-wishlist ">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Product Detail </td>
                                <td>Add to cart</td>
                            </tr>
                        </thead>
                        @php $total = 0 @endphp
                        @foreach ($cart as $item)
                            @php $total += $item->quantity *  $item->price @endphp
                            <tbody>
                                <tr>
                                    <td>

                                        <button type="button" class="button-remove" id="remove"
                                            onclick="deleteietm({{ $item->cid }})"><i
                                                class="icon-close"></i></button>
                                    </td>
                                    <td>
                                        <table class="table-order-product-item">
                                            <tr>
                                                <td><a href="{{ url('/product', $item->url) }}"><img height="100" width="100"
                                                        src="{{ asset('storage/media/' . $item->image) }}" /></a></td>
                                                <td>
                                                    <a href="{{ url('/product', $item->url) }}">
                                                        <h3>{{ $item->name }}</h3>
                                                    </a>

                                                    <h4>Cart id:{{ $item->cid }}</h4>
                                                    <h5> product id:{{ $item->id }}</h5>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wish-list-control">
                                        <div id="price" class="price">₹{{ $item->quantity * $item->price }}</div>
                                        <div class="number-input quantity">
                                            <button type="button" class="minus items"
                                                value="{{ $item->id }}">-</button>
                                            <input type="text" value="{{ $item->quantity }}" class="qty"
                                                maxlength="1"name="qty"
                                                oninput="this.value = this.value.replace(/[^/1-5\s]/g, '').replace(/(\..*)\./g, '$1'); ">
                                            <button type="button" class="plus items"
                                                value="{{ $item->id }}">+</button>
                                            <input type="hidden" name="product_price" id="{{ $item->price }}">

                                        </div>
                                    </td>
                                    {{-- <td>
                                        <div class="add-to-box">
                                            <div class="product-qty">
                                                <label for="qty">Qty:</label>
                                                <div class="custom-qty"> <input type="text" name="qty"
                                                        id="qty" maxlength="1" value="1" title="Qty"
                                                        class="input-text qty"
                                                        oninput="this.value = this.value.replace(/[^/1-5\s]/g, '').replace(/(\..*)\./g, '$1'); " />
                                                    <button type="button" class="increase items" id="btnmax"
                                                        onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty < 5) result.value++;return false;">
                                                        <i class="fa fa-plus"></i> </button>
                                                    <button type="button" class="reduced items" id="btnmin"
                                                        onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;">
                                                        <i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart"> <button type="button"
                                                    title="Add to Cart" class="button btn-cart"
                                                    id="addtocart" onclick="quantity({{ $item->id }})"> <span>
                                                        <span class="view-cart icon-handbag icons">Add
                                                            to
                                                            Cart</span> </span> </button></div>

                                        </div>
                                    </td> --}}

                                </tr>
                            </tbody>
                            {{-- <tr>
                                <div class="edit_control"><button type="button" class="btn-step"
                                    onclick="#">Place
                                    Order</button></div>

                            {{-- </tr> --}}
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right">
                                <h3><strong>Total ₹{{ $total }}</strong></h3>
                                <span class="Amount"></span>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <button type="button" class="btn-step float-center" onclick="#">Place
                                    Order</button>
                            </td>
                        </tr>

                    </table>
                    <div class="form-group">

                    </div>
                    <!--- .table-responsive-wrapper-->
                </div>
                <!--- .container-->
            </div>
            <!--- .main-container -->
        </div>
    @endsection
    @section('custom_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function deleteietm(id) {
                // alert(id);
                jQuery.ajax({
                    url: "/cart/delete",
                    type: "get",
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        swal("prodeuct remove successful!!");
                        location.reload();
                    }
                });
            }
            jQuery('.plus ,.minus ,.qty').on('click change', function() {
                var total = 0;
                var id = $(this).val();
                var quantity = $(this).parent().find('.qty').val();
                var price = jQuery(this).parent().parent().find('.price');
                var tprice= jQuery(this).parent().find("input[name='product_price']").attr('id');
               // alert(tprice);
                total =total + tprice*quantity;
                if(total)
                {
                    $(".Amount").text(total);
                }
                console.log(id);
                console.log(quantity);
                jQuery.ajax({
                    url: "/cart/edit",
                    type: "get",
                    data: {
                        'id': id,
                        'quantity': quantity,
                        price: jQuery(this).parent().find("input[name='product_price']").attr('id'),
                    },
                    success: function(response) {
                        swal("prodeuct update successful!!");
                        price.html(response.price);
                        location.reload();
                    },
                });
            });
            $(document).ready(function() {

                $('.plus').click(function(e) {
                    e.preventDefault();
                    var incre_value = $(this).parents('.quantity').find('.qty').val();
                    var value = parseInt(incre_value, 6);
                    value = isNaN(value) ? 1 : value;
                    if (value <= 5) {
                        $(this).parents('.quantity').find('.qty').val(value);
                    }
                });
                $('.minus').click(function(e) {
                    e.preventDefault();
                    var decre_value = $(this).parents('.quantity').find('.qty').val();
                    var value = parseInt(decre_value, 1);
                    value = isNaN(value) ? 1 : value;
                    // alert(decre_value);
                    if (value >= 1) {
                        // value-;
                        $(this).parents('.quantity').find('.qty').val(value);
                    }
                });
            });
        </script>
    @endsection
