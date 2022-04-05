@extends('Frontend::common')
@section('title')
    Order View
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="{{url('/')}}" title="Go to Home Page">Home</a></li>
                    <li> <strong>My Orders</strong></li>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <div class="page">
                <div class="main-container col1-layout content-color color">
                    <!-- Main content -->
                    <div class="woocommerce">
                            <div class="container">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> RJ Shoes

                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    @php
                                        $b_address_data = getBillingAddress($address->billing_id);

                                    @endphp
                                    <b> Billing Address</b>
                                    @foreach ($b_address_data as $billing)
                                    <address>
                                        {{$billing->first_name }} <br>
                                        {{$billing->address}}<br>
                                        Pincode {{$billing->pincode}} <br>
                                        Phone: {{$billing->phone_number}}<br>
                                        Email:{{$billing->email}}
                                    </address>
                                    @endforeach
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    @php
                                    $s_address_data = getShippingAddress($address->shipping_id);
                                @endphp
                                    <b> Shipping Address</b>
                                    @foreach ($s_address_data as $billing)
                                    <address>
                                        {{$billing->first_name }} {{$billing->last_name}}<br>
                                        {{$billing->address}}<br>
                                        Pincode {{$billing->pincode}} <br>
                                        Phone: {{$billing->phone_number}}<br>
                                        Email:{{$billing->email}}
                                    </address>
                                    @endforeach
                                </div>
                                <div class="col-sm-4 invoice-col">

                                    <b>Order ID:{{$order->id}}</b><br>
                                    <b>Order Date:{{$order->created_at}}</b><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr. no</th>
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Qty</th>
                                                    <th>color</th>
                                                    <th>Brand</th>
                                                    <th>size</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            @php $count=0; @endphp
                                        @foreach ($order_details as $key=>$value)
                                        {{-- {{dd($key, $value)}} --}}
                                        <tbody>
                                            <tr>
                                                <td>{{ $count += 1}}</td>
                                                <td>{{$value->name}}</td>
                                                <td><img src="{{ asset('storage/media/' . $value->image) }}" height="50" width="50"></td>
                                                <td>{{$value->quantity}}</td>
                                                <td>{{$value->color_name}}</td>
                                                <td>{{$value->brand_name}}</td>
                                                <td>{{$value->size}}</td>
                                                <td>₹{{$value->total_price}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                <table>
                                    <div class=" text-right" >
                                        <div >
                                        <p ><h3>Amount:₹{{$order->total_price}}</h3></p>
                                        </div>
                                    </div>
                                </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <p>Case On Delivery</p>

                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print text-right">
                                <div class="col-12">

                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"  onclick="window.print()">
                                        <i class="fa fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('custom_scripts')
@endsection
