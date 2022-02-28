@extends('admin.master')
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
                            <li class="breadcrumb-item">Color</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-primary p-1">
                    <div class="card-header">
                        <h3 class="card-title">Colors</h3>
                    </div>
                    <div class="text-center mt-2 mb-2 p-1">
                        <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                            href="{{ url('/admin/color/add') }}">Add<i class="fa fa-plus-circle"aria-hidden="true"></i></a>&nbsp;
                        <a class="btn btn-danger bg-gradient-danger float-right btn-sm"
                            href="{{ url('/admin/color/trash') }}" role="button">Trash &nbsp;<i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> id </th>
                                <th>User Name</th>
                                <th>Color Name</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($colors as $col)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td>{{ $col->username }}</td>
                                    <td>{{ $col->name }}</td>
                                    <td>
                                        @if ($col->status == 'Y')
                                            <input data-id="{{ $col->id }}" class="toggle-class btn-xs" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-size="sm" checked data-on="Active">
                                        @else
                                            <input data-id="{{ $col->id }}" class="toggle-class btn-xs" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-size="sm" data-on="Active">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/color/edit/' . $col->id) }}" class="fas fa-pencil-alt"></a>
                                        <a href="javascript:void(0);" onclick="delete_Question({{ $col->id }})"
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
        function delete_Question(id) {
            if (confirm('are your sure do you want to delete !!!! ?')) {
                jQuery.ajax({
                    url: '/admin/color/movetotrash',
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
                    url: '/admin/color/changeStatus',
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