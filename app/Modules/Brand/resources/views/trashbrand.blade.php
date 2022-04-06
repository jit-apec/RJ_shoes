@extends('admin.master')
@section('title')
 Brand
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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/brand/') }}">Brand</a></li>
                            <li class="breadcrumb-item active">Trash</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-danger p-2">
                    <div class="card-header mt-2 mb-2 p-2">
                        <h3 class="card-title">Trash Brand</h3>

                        <a class=" float-right  "
                            href="{{ url('/admin/brand/') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back</a>&nbsp;
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th> Sr No </th>
                                <th>Created by</th>
                                <th>Color Name</th>
                                <th>Updated</th>
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
                                        <a href="#" onclick="restore_Brand({{ $brand->id }})"class="fas fa-trash-restore-alt "style='font-size:20px'></a>&nbsp;&nbsp;
                                        <a href="" onclick="delete_brand({{$brand->id}})" class="fas fa-trash-alt" style='font-size:20px'></a>
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
        function restore_Brand(id) {
            if (confirm('are your sure!! do  you want to Restore?')) {
                jQuery.ajax({
                    url: "{{url('/admin/brand/restorebrand')}}",
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
        function delete_brand(id) {
            if (confirm('are your sure!! do  you want to Permanently Delete?')) {
                jQuery.ajax({
                    url: "{{url('/admin/brand/delete')}}",
                    type: 'get',
                    data: {
                        'id': id
                    },
                    success: function(result) {
                        console.log("Record delete successfully!");
                       // window.location.reload();
                    }
                });
            }
        }
    </script>
@endsection
