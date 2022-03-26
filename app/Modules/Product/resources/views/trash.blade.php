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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/product/')}}">Product</a></li>
                            <li class="breadcrumb-item active">Trash</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-danger p-2">
                    <div class="card-header mt-2 mb-2 p-1">
                        <h3 class="card-title">Trash Product</h3>
                    
                        <a class="btn  btn-lg float-right "
                            href="{{ url('/admin/product/') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</a>&nbsp;
                    </div>
                    <table id="myTable" class="display">
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
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($product as $product)
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
                                        <a href="#" onclick="restore_product({{ $product->id }})"
                                            class="fas fa-trash-restore-alt fa-2x " style='font-size:24px'></a>&nbsp;&nbsp;
                                        {{-- <a href="{{ url('delete/') }}" class="fas fa-trash-alt" style='font-size:24px'></a> --}}
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
        function restore_product(id) {
            if (confirm('are your sure!! do  you want to Restore?')) {
                jQuery.ajax({
                    url: "{{url('/admin/product/restore')}}",
                    type: 'GET',
                    data: {
                        'id': id
                    },
                    success: function(result) {
                        console.log("Status Changed successfully ");
                        window.location.reload();
                    }
                });
            }
        }
    </script>
@endsection
