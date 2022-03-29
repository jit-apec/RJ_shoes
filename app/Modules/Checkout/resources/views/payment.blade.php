@extends('Frontend::common')
@section('title')
    Payment Gateway
@endsection
@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="main-container col1-layout content-color color">
                <div class="breadcrumbs">
                    <div class="container">
                        <ul>
                            <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
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
                                    <div class="step-process-item"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon fa fa-check"></i><span
                                            class="text">Order Review</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item active"><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                        <!--- .checkout-step-process --->

                        <div class="checkout-info-text">
                            <h3>Delivery</h3>
                        </div>

                        <div class="checkout-info-text">
                            <h3>Payment Method</h3>
                        </div>
                        <div class="content-radio">
                            <input type="radio" name="payment-radio" checked id="pr1">
                            <label for="pr1" class="label-radio">Cash On delivary</label>
                            <p>Pay for the package when you recieve it.</p>
                        </div>
                        <div class="content-radio">
                            <input type="radio" name="payment-radio" id="pr2">
                            <label for="pr2" class="label-radio">Credit Card</label>
                            <p>Pay with a credit card</p>
                        </div>
                        <div class="content-radio">
                            <input type="radio" name="payment-radio" id="pr3">
                            <label for="pr3" class="label-radio">Paypal</label>
                            <p>Pay via paypal</p>
                        </div>
                        <div class="content-radio">
                            <input type="radio" name="payment-radio" id="pr4">
                            <label for="pr4" class="label-radio">Other Payment Gateway</label>
                            <p>Pay via other payment gateway</p>
                        </div>
                        <div class="checkout-col-footer">
                            <a class="btn-step " href="{{ url('/order_review') }}">Back</a>
                            {{-- <input type="button" value="Back" class="btn-step"> --}}
                            <input type="button" value="Continue" class="btn-step btn-highligh">
                        </div>
                        <div class="line-bottom"></div>
                    </div>
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
