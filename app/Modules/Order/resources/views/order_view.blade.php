@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> RJ Shoes
                                        <small class="float-right">Date: @php echo date('Y-m-d'); @endphp</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                   <b> Billing Address</b>
                                   @foreach ($billing_address as $billing)
                                    <address>
                                       {{$billing->first_name }} {{$billing->last_name}}<br>
                                        {{$billing->address}}<br>
                                        Pincode {{$billing->pincode}} <br>
                                        Phone: {{$billing->phone_number}}<br>
                                        Email:{{$billing->email}}
                                    </address>
                                    @endforeach
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                   <b> Shipping Address</b>
                                   @foreach ($shiping_address as $billing)
                                   <address>
                                      {{$billing->first_name }} {{$billing->last_name}}<br>
                                       {{$billing->address}}<br>
                                       Pincode {{$billing->pincode}} <br>
                                       Phone: {{$billing->phone_number}}<br>
                                       Email:{{$billing->email}}
                                   </address>
                                   @endforeach
                                </div>
                                @foreach ($payment as $payment)
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #007612</b><br>
                                    <br>
                                    <b>Order ID:</b> 4F3S8J<br>
                                    <b>Payment Due:</b>@php echo date_format($payment->created_at,'d/m/Y')@endphp<br>
                                </div>
                                @endforeach
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
                                        @foreach ($order as $order)
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{$order->name}}</td>
                                                <td><img src="{{ asset('storage/media/' . $order->image) }}" height="50" width="50"></td>
                                                <td>{{$order->quantity}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>₹{{$order->sub_total}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
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
                                    {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

                                    {{-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                        handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p> --}}
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due:  @php echo date_format($payment->created_at,'d/m/Y')@endphp</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:60%"><h3><strong>Total:</strong></h3></th>
                                                <td class="text-left"><b>₹{{$order->tot_price}}</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">

                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"  onclick="window.print()">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
@endsection
