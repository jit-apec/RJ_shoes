@extends('admin.master')
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
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Colors</h3>
                    </div>
                    <div class="text-center mt-0 mb-0 p-1">
                        <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                            href="{{ url('/admin/color/displaycolor') }}"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <form method="POST" action="addcolor" id="addcolor">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Color Name</label>
                                <input type="text" class="form-control" id="colorname" name="name"
                                    oninput="this.value = this.value.replace(/[^/A-Za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');">
                                <div>
                                    @if (session()->has('status'))
                                        <p style="color: green;font-size: 20px; font-weight: bold;">
                                            {{ session('status') }}
                                        </p>
                                    @endif
                                    @error('name')
                                        <p style="color:red" align="right">{{ $message }} </p>
                                    @enderror
                                    <h5 id="namecheck"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer " align="center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $("#addcolor").validate({
            rules: {
                name: {

                    required: true,
                    minlength: 2,
                    maxlength: 15,
                    remote: {
                        url: '/admin/color/uniquename',
                        type: "GET",
                        Data: {
                            colorname: function() {

                                return $("#name").val();

                            }
                        }



                    },

                },
            },

            messages: {

                name: {
                    required: "Name field is required",
                    remote: "The Name has already been taken!!!",
                },

            },

        });
    </script>
@endsection
