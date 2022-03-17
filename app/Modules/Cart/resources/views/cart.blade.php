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
                    <div class="wish-list-notice"><i class="icon-check"></i>Product with Variants has been added to your
                        wishlist. <a href="#">Click here</a> to continue shopping.</div>
                </div>

                <div class="table-responsive-wrapper">
                    <table class="table-order table-wishlist">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Product Detail & comments</td>
                                <td>Add to cart</td>
                            </tr>
                        </thead>
                        @foreach ($product as $item)


                        <tbody>
                            <tr>
                                <td><button type="button" class="button-remove"><i class="icon-close"></i></button>
                                </td>
                                <td>
                                    <table class="table-order-product-item">
                                        <tr>
                                            <td><img height="100" width="100" src="{{ asset('storage/media/1644317906.jpg') }}" /></td>
                                            <td>
                                                <p>FEETWELL SHOES</p>
                                                <textarea></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="wish-list-control">
                                    ₹2499.00  {{-- {{$item->product_id}} --}}
                                    <div class="number-input">
                                        <button type="button" class="minus">-</button>
                                        <input type="number" value="1" name="" id="">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                    <button type="button" class="btn-step">ADD TO CART</button>
                                    <div class="edit_control"><button type="button" class="btn-edit"><i
                                                class="icon-note"></i> Edit</button></div>
                                </td>
                            </tr>
                        </tbody>
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
