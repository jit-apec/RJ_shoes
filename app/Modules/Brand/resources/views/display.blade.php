@extends('admin.master')
@section('title')
 Brand
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
                            <li class="breadcrumb-item">Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-primary p-1">
                    <div class="card-header mt-2 mb-2 p-2">
                        <h3 class="card-title">Brand</h3>
                        {{-- <a class="btn btn-lg float-right "
                            href="{{ url('/admin/brand/add') }}">Add<i class="fa fa-plus-circle"aria-hidden="true"></i></a>&nbsp; --}}
                        <a class="float-right "style="width:10%"
                            href="{{ url('/admin/brand/trashbrand') }}" role="button"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Trash</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> id </th>
                                <th>Created By</th>
                                <th>Brand Name</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($list as $brand)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td>{{ $brand->username }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->updated_at }}</td>
                                    <td>
                                        @if ($brand->status == 'Y')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $brand->id }}"  class="toggle-class"{{ $brand->status ? 'checked' : '' }}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif

                                          @if ($brand->status == 'N')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $brand->id }}"  class="toggle-class"{{ $brand->status}}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/brand/editbrand', $brand->id) }}"
                                            class="fas fa-pencil-alt "></a>
                                        <a href="javascript:void(0);" onclick="move_to_trash({{ $brand->id }})"
                                            class="fas fa-trash-alt "></a>
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
                    url: "{{url('/admin/brand/movetrash')}}",
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
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{url('/admin/brand/changebrandstatus')}}",
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
