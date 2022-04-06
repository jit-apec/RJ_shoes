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
                    <div class="card-header mt-2 mb-2 p-2">
                        <h3 class="card-title ">Orders</h3>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> Sr No.</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Total Quantity</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
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
                                    {{-- <td class="text-center">{{ $order->order_status }}</td> --}}
                                    <td class="text-center" style="color:gray;">
                                        <div class="dropdown action-label ">
                                            <a class="custom-badge status-blue " href="#" 
                                                aria-expanded="false">
                                                @switch ($order->order_status)
                                                    @case ('Success')
                                                        <span style="color:rgb(23, 158, 113);">
                                                            Success</span>
                                                    @break

                                                    @case ('On The Way')
                                                        <span style="color:rgb(220, 235, 12);">
                                                            On The Way</span>
                                                    @break

                                                    @case ('Cancel')
                                                        <span style="color:rgb(235, 21, 21);">
                                                            Cancel</span>
                                                    @break

                                                    @default
                                                        <span style="color:rgb(29, 29, 187);">
                                                            Order in Process</span>
                                                @endswitch
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/order/order_view', $order->order_id) }}"
                                            class="fas fa-eye "></a>
                                        <a href="{{ url('/admin/order/edit', $order->order_id) }}"
                                            class="fas fa-edit "></a>
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
@endsection
