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

                        {{-- <a class="btn  btn-lg float-right " href="{{ url('/admin/product/addproduct') }}"
                            role="button">Add<i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;
                        <a class="btn float-right btn-lg" href="{{ url('/admin/product/trash') }}" role="button">Trash &nbsp;<i
                                class="fa fa-trash" aria-hidden="true"></i></a> --}}
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> Sr No.</th>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Total Quantity</th>
                                <th>total Price</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                       <tbody>
                           {{-- @php  $count=0; @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td><img src="{{ asset('storage/media/' . $product->image) }}" height="50" width="50">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->upc }}</td>
                                    <td><a href="{{ url('/product', $product->url) }}">{{ $product->url }}</a></td>

                                    <td>
                                        @if ($product->status == 'Y')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $product->id }}"  class="toggle-class"{{ $product->status ? 'checked' : '' }}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif

                                          @if ($product->status == 'N')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $product->id }}"  class="toggle-class"{{ $product->status}}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/product/edit', $product->id) }}"
                                            class="fas fa-pencil-alt "></a>
                                        <a href="{{ url('/product', $product->url) }}" class="fas fa-eye "></a>
                                        <a href="javascript:void(0);" onclick="move_to_trash({{ $product->id }})"
                                            class="fas fa-trash-alt "></a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function move_to_trash(id) {
            if (confirm('are your sure do you want to delete !!!! ?')) {
                jQuery.ajax({
                    url: "{{ url('/admin/product/move_trash') }}",
                    type: 'GET',
                    data: {
                        'id': id
                    },
                    success: function(result) {
                        console.log("Status Updated");
                        window.location.reload();
                    }
                });
            }
        }
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 'Y' : 'N';
                var id = $(this).data('id');
               // alert(id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ url('/admin/product/changestatus') }}",
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection
