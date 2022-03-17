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
                            <li class="breadcrumb-item">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12  ">
                <div class="card card-primary p-1 ">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <div class="text-center mt-2 mb-2 p-1">
                        <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                            href="{{ url('/admin/product/addproduct') }}" role="button">Add<i class="fa fa-plus-circle"
                                aria-hidden="true"></i></a>&nbsp;
                        <a class="btn btn-danger bg-gradient-danger float-right btn-sm"
                            href="{{ url('/admin/product/trash') }}" role="button">Trash &nbsp;<i class="fa fa-trash"aria-hidden="true"></i></a>
                    </div>
                    <table id="myTable" class="display  table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center"> Sr No.</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>UPC</th>
                                <th>URL</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Color</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td><img src="{{ asset('storage/media/' . $product->image) }}" height="50" width="50">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->upc }}</td>
                                    <td>{{ $product->url }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->cname }}</td>
                                    <td>{{ $product->bname }}</td>
                                    <td>
                                        @if ($product->status == 'Y')
                                            <input data-id="{{ $product->id }}" class="toggle-class btn-xs"
                                                type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-size="sm" checked data-on="Active">
                                        @else
                                            <input data-id="{{ $product->id }}" class="toggle-class btn-xs"
                                                type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-size="sm" data-on="Active">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/product/edit', $product->id) }}"
                                            class="fas fa-pencil-alt"></a>
                                        <a href="{{ url('/admin/product/product_view', $product->url) }}"
                                            class="fas fa-eye"></a>
                                        <a href="javascript:void(0);" onclick="move_to_trash({{ $product->id }})"
                                            class="fas fa-trash-alt"></a>
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
        function move_to_trash(id) {
            if (confirm('are your sure do you want to delete !!!! ?')) {
                jQuery.ajax({
                    url: '/admin/product/move_trash',
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
                alert(id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/product/changestatus',
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
