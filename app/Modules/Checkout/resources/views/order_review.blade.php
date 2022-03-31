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
                            <li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
                            <li> <strong>Checkout</strong></li>
                        </ul>
                    </div>
                </div>
                <!--- .breadcrumbs-->

                <div class="woocommerce">
                    <div class="container">
                        <div class="content-top">
                            <h2>Checkout</h2>
                            <p>Need to Help? Call us: +9 123 456 789 or Email: <a
                                    href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
                        </div>
                        <div class="checkout-step-process">
                            <ul>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step2.html"
                                            class="redirectjs  step-icon fa fa-check"></i><span
                                            class="text">Address</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i class="fa fa-check step-icon"></i><span
                                            class="text">Shipping</span></div>
                                </li>

                                <li>
                                    <div class="step-process-item "><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon fa fa-check"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item active"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon icon-notebook"></i><span
                                            class="text">Order Review</span></div>
                                </li>
                            </ul>
                        </div>
                        <!--- .checkout-step-process --->
                        <form name="checkout" method="post"
                        action="{{url('/order')}}">
                        @csrf
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
                                        @php $total = 0; $quantity_total = 0; @endphp
                                        @foreach ($product as $product)
                                        @php $total += $product->quantity *  $product->price @endphp
                                        @php $quantity_total = $quantity_total+ $product->quantity @endphp

                                    $items[]={{$product->quantity}}

                                        <tbody>
                                            <tr>
                                                <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                                <input type="hidden" name="quantity[]" value="{{$product->quantity}}">
                                                <input type="hidden" name="total_quantity" value="{{$quantity_total}}">
                                                <input type="hidden" name="price[]" value="{{$product->quantity * $product->price}}">

                                                <td class="name">{{$product->name}}</td>
                                                <td>₹{{$product->price}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td class="price">₹{{$product->quantity * $product->price}}</td>    
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <table class="table-order table-order-review-bottom">
                                        <tr>
                                            <td class="first large" width="80%">Total Payment</td>
                                            <td class="price large" width="20%">₹{{ $total }}</td>
                                            <input type="hidden" name="total_price" value="{{ $total }}">
                                        </tr>
                                        <tfoot>
                                            <td colspan="2">

                                                <div class="right">
                                                    {{-- <input type="button" value="Back" class="btn-step"> --}}
                                                    <a class="btn-step btn-highligh"
                                                        href="{{ url('/payment') }}">Back</a>
                                                    {{-- <a class="btn-step btn-highligh" href="{{ url('') }}">Place
                                                        Holder</a> --}}
                                                    <input type="submit" value="Place Holder" class="btn-step btn-highligh">
                                                </div>
                                            </td>
                                        </tfoot>
                                    </table>
                                </li>
                                <li class="col-md-3">
                                    <ul class="step-list-info">
                                        <li>
                                            <div class="title-step">Billing Address
                                                <!-- <a href="#">CHANGE</a></div> -->
                                                @foreach ($billing_address as $address)
                                                @endforeach
                                                <p><strong>{{$address->first_name}} {{$address->last_name}}</strong><br>
                                                    {{$address->address}}<br>Pin Code:
                                                {{$address->pincode}}<br>Contect no:
                                                {{$address->phone_number}}
                                                </p>
                                        </li>
                                        <li>
                                            <div class="title-step">Shipping Address
                                                <!-- <a href="#">CHANGE</a></div> -->
                                                @foreach ($shiping_address as $address)
                                                @endforeach
                                                <p><strong>{{$address->first_name}} {{$address->last_name}}</strong><br>
                                                    {{$address->address}}<br>Pin Code:
                                                {{$address->pincode}}<br>Contect no:
                                                {{$address->phone_number}}
                                                </p>
                                        </li>

                                        <li>
                                            <div class="title-step">Payment Method
                                                <!-- <a href="#">CHANGE</a> -->
                                            </div>
                                            <p>Check / Money order</p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </form>
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
