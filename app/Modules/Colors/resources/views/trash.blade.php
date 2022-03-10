@extends('admin.master')
@section('title')
 Colors
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/color/displaycolor') }}">Color</a></li>
                            <li class="breadcrumb-item active">Trash</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-danger p-2">
                    <div class="card-header">
                        <h3 class="card-title">Trash Colors</h3>
                    </div>
                    <div class="text-center mt-2 mb-2 p-1">
                        <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                            href="{{ url('/admin/color/displaycolor') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th>username</th>
                                <th>Color Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $col)
                                <tr>
                                    <td>{{ $col->id }}</td>
                                    <td>{{ $col->username }}</td>
                                    <td>{{ $col->name }}</td>
                                    <td>
                                        <a href="#" onclick="restore_status({{ $col->id }})"
                                            class="fas fa-trash-restore-alt " style='font-size:24px'></a>&nbsp;&nbsp;
                                        <a href="{{ url('#') }}" class="fas fa-trash-alt" style='font-size:24px'></a>
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
        function restore_status(id) {
            if (confirm('are your sure!! do  you want to Restore?')) {
                jQuery.ajax({
                    url: '/admin/color/restore',
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
