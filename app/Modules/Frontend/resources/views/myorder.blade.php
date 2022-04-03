@extends('Frontend::common')
@section('title')
    Order Review
@endsection
@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="main-container col1-layout content-color color">
                <div class="breadcrumbs">
                    <div class="container">
                        <ul>
                            <li class="home"> <a href="{{url('/')}}" title="Go to Home Page">Home</a></li>
                            <li> <strong>My Orders</strong></li>
                        </ul>
                    </div>
                </div>
                <!--- .breadcrumbs-->

                <div class="woocommerce">
                    <div class="container">
                        <div class="content-top">
                            <h2>MY Order</h2>

                        </div>

                            <ul class="row">
                                <li class="col-md-9 col-padding-right">
                                    <table class="table-order table-order-review">
                                        <thead>
                                            <tr>
                                                <td width="68">Product Name</td>
                                                <td width="14">price</td>
                                                <td width="14">QTY</td>
                                                <td width="14">Total</td>
                                            </tr>
                                        </thead>

                                        @foreach ($product as $product)

                                            <tbody>
                                                <tr>

                                                    <td class="name">{{ $product->name }}</td>
                                                    <td>₹{{ $product->price }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td class="price">₹{{ $product->quantity * $product->price }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <table class="table-order table-order-review-bottom">
                                        <tr>
                                            <td class="first large" width="80%">Total Payment</td>
                                            <td class="price large" width="20%">₹</td>

                                        </tr>

                                    </table>
                                </li>
                                <li class="col-md-3">
                                    <ul class="step-list-info">
                                        <li>
                                            <div class="title-step">Billing Address
                                                <!-- <a href="#">CHANGE</a></div> -->
                                                @foreach ($billing_address as $address)
                                                @endforeach
                                                <p><strong>{{ $address->first_name }}
                                                        {{ $address->last_name }}</strong><br>
                                                    {{ $address->address }}<br>Pin Code:
                                                    {{ $address->pincode }}<br>Contect no:
                                                    {{ $address->phone_number }}
                                                </p>
                                        </li>
                                        <li>
                                            <div class="title-step">Shipping Address
                                                <!-- <a href="#">CHANGE</a></div> -->
                                                @foreach ($shiping_address as $address)
                                                @endforeach
                                                <p><strong>{{ $address->first_name }}
                                                        {{ $address->last_name }}</strong><br>
                                                    {{ $address->address }}<br>Pin Code:
                                                    {{ $address->pincode }}<br>Contect no:
                                                    {{ $address->phone_number }}
                                                </p>
                                        </li>

                                        <li>
                                            <div class="title-step">Payment Method
                                                <!-- <a href="#">CHANGE</a> -->
                                            </div>
                                            <p>Cash On delivary</p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        <div class="line-bottom"></div>
                    </div>
                    <!--- .container-->
                </div>
                <!--- .woocommerce-->
            </div>
            <!--- .main-container -->
        </div>
        <!--- .page -->
    </div>
    <!--- .wrapper -->
@endsection
@section('custom_scripts')
@endsection
