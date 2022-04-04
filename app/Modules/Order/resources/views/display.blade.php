@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12  ">
                <div class="card card-primary p-1 ">
                    <div class="card-header mt-2 mb-2 p-1">
                        <h3 class="card-title ">Order</h3>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> Sr No.</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Total Quantity</th>
                                <th class="text-center">total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($order as $order)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td class="text-center">{{ $order->first_name }}</td>
                                    <td class="text-center">{{ $order->last_name }}</td>
                                    <td class="text-center">{{ $order->quantity }}</td>
                                    <td class="text-center">{{ $order->total_price }}</td>
                                    <td class="text-center" style="color:gray;">
                                        <div class="dropdown action-label ">
                                            <a class="custom-badge status-blue " href="#" name='STATUS' id="STATUS"
                                                aria-expanded="false">
                                                @switch ($order->status)
                                                    @case (1)
                                                        <span style="background-color:rgb(19, 170, 77); color:rgb(252, 250, 250);">
                                                            Approved</span>
                                                    @break
                                                    @default
                                                        <span style="background-color:rgb(216, 65, 65); color:rgb(252, 250, 250);">
                                                            Declined</span>
                                                @endswitch
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/order/order_view',$order->order_id) }}" class="fas fa-eye "></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#STATUSTAB").find("a[name='STATUS']").each(function() {
                var a = $(this).text();
                a = a.trim();
                $(this).css("color", "white");
                if (a == "Approved") {
                    $(this).css("background", "#06c455");
                } else if (a == "Declined") {
                    $(this).css("background", "#ff654a");
                } else if (a == "New") {
                    $(this).css("background", "#055be6");
                } else {
                    $(this).css("background", "#c4067b");
                }
            });


        });
    </script>
@endsection
