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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/color/') }}">Color</a></li>
                            <li class="breadcrumb-item active">Trash</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-danger p-2 ">
                    <div class="card-header p-2 mt-2 mb-2">
                        <h3 class="card-title">Trash Colors</h3>
                        <a class=" btn-lg float-right"
                            href="{{ url('/admin/color/') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <table id="myTable" class="display ">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th>Create by</th>
                                <th>Color Name</th>
                                <th>Updated </th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $col)
                                <tr>
                                    <td>{{ $col->id }}</td>
                                    <td>{{ $col->username }}</td>
                                    <td>{{ $col->name }}</td>
                                    <td>{{ $col->updated_at }}</td>
                                    <td>
                                        <a href="#" onclick="restore_status({{ $col->id }})"
                                            class="fas fa-trash-restore-alt fa-2x " style='font-size:24px'></a>&nbsp;&nbsp;
                                        {{-- <a href="{{ url('#') }}" class="fas fa-trash-alt" style='font-size:24px'></a> --}}
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
                    url: "{{url('/admin/color/restore')}}",
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
