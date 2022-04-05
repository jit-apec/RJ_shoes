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
                                <li class="col-md-12 col-padding-right">
                                    <table class="table-order table-order-review">
                                        <thead>
                                            <tr>
                                                <td  width="14">Sr. No</td>
                                                <td width="14">Quantity</td>
                                                <td width="14"> Total price</td>
                                                <td width="68">Order Date</td>
                                                <td width="14">Status</td>
                                                <td width="14">View </td>
                                            </tr>
                                        </thead>
                                        @php  $count=0; @endphp
                                        @foreach ($order as $key=>$value)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $count += 1}}</td>
                                                    <td>{{ $value->quantity }}</td>
                                                    <td>₹{{ $value->total_price }}</td>
                                                    <td >{{ $value->created_at }}</td>
                                                    {{-- <td>{{ $value->order_status }}</td> --}}
                                                    <td class="text-center" style="color:gray;">
                                                        <div class="dropdown action-label ">
                                                            <a class="custom-badge status-blue " href="#" name='STATUS' id="STATUS"
                                                                aria-expanded="false">
                                                                @switch ( $value->order_status)
                                                                    @case (1)
                                                                        <span style="background-color:rgb(19, 170, 77); color:rgb(252, 250, 250);">
                                                                            Success </span>
                                                                    @break
                                                                    @default
                                                                        <span style="background-color:rgb(216, 65, 65); color:rgb(252, 250, 250);">
                                                                            Cancel</span>
                                                                @endswitch
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ url('/order/order_details',$value->id) }}" class="fa fa-eye fa-1x"></a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
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
