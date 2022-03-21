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
                                <td>Product Detail & comments</td>
                                <td>Add to cart</td>
                            </tr>
                        </thead>

                        @foreach ($cart as $item)
                        {{-- $total=0;
                        @php $total += $item->quantity *  $item->price @endphp --}}
                            <tbody >
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
                                                    <h3>{{ $item->name }}</h3   >
                                                        <textarea></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wish-list-control">
                                        ₹{{ $item->quantity *  $item->price }}
                                        <div class="number-input">
                                            <button type="button" class="minus" onclick="edit({{ $item->cid }})">-</button>
                                            <input type="number" value="{{ $item->quantity }}" name="" id="qty" onkeyup="edit({{ $item->cid }})" oninput="this.value = this.value.replace(/[^/1-5\s]/g, '').replace(/(\..*)\./g, '$1'); ">
                                            <button type="button" class="plus" onclick="edit({{ $item->cid }})">+</button>
                                        </div>
                                        {{-- <button type="button" class="btn-step">Remove</button> --}}
                                        <div class="edit_control"><button type="button" class="btn-step"
                                                onclick="#">Place
                                                Order</button></div>

                                    </td>
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
        function deleteietm($id) {
           // var quantity = jQuery('#qty').val();
          //  alert('remove product'.$id);
            jQuery.ajax({
                url: "/cart/delete",
                type: "get",
                datatype: 'html',
                data: {
                    'id': $id,
                    // 'quantity': quantity

                },
                success: function(data) {
                    console.log("prodeuct remove successful!!");
                    location.reload();
                }
            });
        }
        function edit($id) {
            var quantity = jQuery('#qty').val();

           // alert($id);
            jQuery.ajax({
                url: "/cart/edit",
                type: "get",
                datatype: 'html',
                data: {
                    'id': $id,
                    'quantity': quantity

                },
                success: function(data) {
                    console.log("prodeuct update successful!!");
                    

                }
            });
        }
    </script>
@endsection
