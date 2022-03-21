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

                <div class="table-responsive-wrapper">
                    <table class="table-order table-wishlist ">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Product Detail </td>
                                <td>Add to cart</td>
                            </tr>
                        </thead>

                        @foreach ($cart as $item)
                            {{-- $total=0;
                        @php $total += $item->quantity *  $item->price @endphp --}}
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
                                                <td><img height="100" width="100"
                                                        src="{{ asset('storage/media/' . $item->image) }}" /></td>
                                                <td>
                                                    <a href="{{ url('/user', $item->url) }}">
                                                        <h3>{{ $item->name }}</h3>
                                                    </a>

                                                    <h4>Cart id:{{ $item->cid }}</h4>
                                                    <h5> product id:{{ $item->id }}</h5>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wish-list-control">
                                       <div id="price" >₹{{ $item->quantity * $item->price }}</div>
                                        <div class="number-input">
                                            <button type="button" class="minus items"
                                                value="{{ $item->id }}">-</button>
                                            <input type="text" maxlength="1" value="{{ $item->quantity }}" name=""
                                                class="qty"
                                                oninput="this.value = this.value.replace(/[^/1-5\s]/g, '').replace(/(\..*)\./g, '$1'); ">
                                            <button type="button" class="plus items"
                                                value="{{ $item->id }}">+</button>
                                        </div>
                                        {{-- <button type="button" class="btn-step">Remove</button> --}}
                                        {{-- <div class="edit_control"><button type="button" class="btn-step"
                                                onclick="#">Place
                                                Order</button></div> --}}
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
                                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                            </tr> --}}
                        @endforeach

                    </table>
                </div>
                <!--- .table-responsive-wrapper-->
            </div>
            <!--- .container-->
        </div>
        <!--- .main-container -->
    </div>
@endsection
@section('custom_scripts')
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
                    console.log("prodeuct remove successful!!");
                  //  location.reload();
                }
            });
        }
        jQuery('.plus ,.minus ,.qty').on('click change', function() {
            var id = $(this).val();
            var quantity = $(this).parent().find('.qty').val();
            console.log(id);
            console.log(quantity);
            jQuery.ajax({
                url: "/cart/edit",
                type: "get",
                datatype: 'html',
                data: {
                    'id': id,
                    'quantity': quantity
                },
                success: function(data) {
                    console.log("prodeuct update successful!!");

                }
                // $("#refresh").click(function(e) {
                //     $("#randomdiv").load("index.php")
                //     e.preventDefault();
                //  });
        });


        });
        // jQuery('.plus ,.minus ,.qty').on('click', function() {

        //     let x = document.getElementByClass(".qty").value;

        //     if (isNaN(x) || x < 1 || x > 5) {
        //         console.log("Input not valid");
        //     } else {
        //         console.log("Input OK");
        //     }

        //    // document.getElementById("demo").innerHTML = text;
        // }

    </script>
@endsection
