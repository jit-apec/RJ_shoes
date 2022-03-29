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
                                    <div class="step-process-item active"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon icon-notebook"></i><span
                                            class="text">Order Review</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item "><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                        <!--- .checkout-step-process --->

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
                                    <tbody>
                                        <tr>
                                            <td class="name">Product name here</td>
                                            <td>£220.00</td>
                                            <td>1</td>
                                            <td class="price">£220.00</td>
                                        </tr>
                                        <tr>
                                            <td class="name">Product name here</td>
                                            <td>£220.00</td>
                                            <td>1</td>
                                            <td class="price">£220.00</td>
                                        </tr>
                                        <tr>
                                            <td class="name">Product name here</td>
                                            <td>£220.00</td>
                                            <td>1</td>
                                            <td class="price">£220.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table-order table-order-review-bottom">

                                    <tr>
                                        <td class="first large" width="80%">Total Payment</td>
                                        <td class="price large" width="20%">£540.00</td>
                                    </tr>
                                    <tfoot>
                                        <td colspan="2">

                                            <div class="right">
                                                {{-- <input type="button" value="Back" class="btn-step"> --}}
                                                <a class="btn-step btn-highligh"
                                                    href="{{ url('/shiping_address') }}">Back</a>
                                                <a class="btn-step btn-highligh" href="{{ url('/payment') }}">Place
                                                    Holder</a>
                                                {{-- <input type="button" value="Place Holder" class="btn-step btn-highligh"> --}}
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
                                            <p><strong>John Doe</strong><br>
                                                abc<br>
                                                Street number, AZ.Bulding, NY, USA <br>
                                                New York, 1000<br>
                                                +91 234 567 89
                                            </p>
                                    </li>
                                    <li>
                                        <div class="title-step">Shipping Address
                                            <!-- <a href="#">CHANGE</a></div> -->
                                            <p><strong>John Doe</strong><br>
                                                abc<br>
                                                Street number, AZ.Bulding, NY, USA <br>
                                                New York, 1000<br>
                                                +91 234 567 89
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
