@extends('admin.master')
@section('title')
 Colors
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
                            <li class="breadcrumb-item">Color</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-primary p-2">
                    <div class="card-header  mt-2 mb-2 p-2">
                        <h2 class="card-title">Colors</h2>

                        {{-- <a class=" float-right "
                            href="{{ url('/admin/color/add') }}">Add<i class="fa fa-plus-circle"aria-hidden="true"></i></a>&nbsp; --}}
                        <a class="float-right " style="width:10%"
                            href="{{ url('/admin/color/trash') }}" role="button"> <i class="fa fa-trash"
                                aria-hidden="true"></i>&nbsp; Trash</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> id </th>
                                <th>Created By</th>
                                <th>Color Name</th>
                                <th>Updated</th>
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
                                    <td>{{ $col->updated_at }}</td>
                                    <td>
                                        @if ($col->status == 'Y')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $col->id }}"  class="toggle-class"{{ $col->status ? 'checked' : '' }}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif

                                          @if ($col->status == 'N')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $col->id }}"  class="toggle-class"{{ $col->status}}>
                                            <div class="slider round"></div>
                                          </label>
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
                    url: "{{url('/admin/color/movetotrash')}}",
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
                    url: "{{url('/admin/color/changeStatus')}}",
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
