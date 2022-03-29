@extends('Frontend::common')
@section('title')
    Shipping Address
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
                        <!--- .content-top-->
                        <div class="checkout-step-process">
                            <ul>
                                <li>
                                    <div class="step-process-item "><i data-href="checkout-step2.html"
                                            class="redirectjs  step-icon fa fa-check"></i><span
                                            class="text">Address</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item active"><i class="step-icon-truck step-icon"></i><span
                                            class="text">Shipping</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon icon-notebook"></i><span
                                            class="text">Order Review</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                        <!--- .checkout-step-process --->
                        <form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout"
                            action="#" enctype="multipart/form-data">
                            <ul class="row">
                                <li class="col-md-9">
                                    <div class="checkout-info-text">
                                        <h3>Shipping Address</h3>
                                    </div>

                                    <ul class="row">
                                        <li class="col-md-6">
                                            <p class="form-row validate-required" id="first_name_field">
                                                <label for="first_name" class="">First Name <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="first_name"
                                                    id="first_name" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="form-row validate-required" id="last_name_field">
                                                <label for="last_name" class="">Last Name <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="last_name"
                                                    id="last_name" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-12  col-left-12">
                                            <p class="form-row  validate-required validate-email" id="email">
                                                <label for="email" class="">Email ID <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="email"
                                                    id="email" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-12  col-left-12">
                                            <p class="form-row  validate-required validate-email" id="#">
                                                <label for="Address" class="">Address <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <textarea name="address" cols="102" rows="4" id="address"></textarea>
                                            </p>
                                        </li>

                                        <li class="col-md-6">
                                            <p class="form-row address-field validate-postcode woocommerce-validated"
                                                id="pincode_field">
                                                <label for="pincode" class="">Pin code <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="pincode"
                                                    id="pincode" value="">
                                            </p>
                                        </li>

                                        <li class="col-md-6">
                                            <p class="form-row validate-required validate-phone woocommerce-validated"
                                                id="phone_number_field">
                                                <label for="phone_number" class="">Phone number <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="phone_number"
                                                    id="phone_number" placeholder="" value="">
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="checkout-col-footer">
                                        <a class="btn-step btn-highligh" href="{{ url('/biling_address') }}">Back</a>
                                        <a class="btn-step" href="{{ url('/order_review') }}">Continue</a>
                                        {{-- <input type="button" value="Continue" class="btn-step"> --}}
                                        <div class="note">(<span>*</span>) Required fields</div>
                                    </div>
                                    <!--- .checkout-col-footer--->
                                </li>

                            </ul>
                        </form>
                        <!--- form.checkout--->
                        <div class="line-bottom"></div>
                    </div>
                    <!--- .container--->
                </div>
                <!--- .woocommerce--->
            </div>
            <!--- .main-container -->
        </div>
        <!--- .page -->
    </div>
    <!--- .wrapper -->
@endsection
@section('custom_scripts')
@endsection