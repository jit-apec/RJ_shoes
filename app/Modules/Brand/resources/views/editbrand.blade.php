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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/brand/display') }}">Color</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center m-5 pb-5">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Brand</h3>
                    </div>
                    <div class="text-center mt-0 mb-0 p-1">
                        <a class="btn btn-success bg-gradient-success  btn-sm float-right "
                            href="{{ url('/admin/brand/display') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>&nbsp;
                    </div>
                    <form method="POST" action="{{ url('/admin/brand/editbrand/' . $brand->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control" name="name" id="brandname"
                                    value="{{ $brand->name }}" required>
                                <div>
                                    @if (session()->has('status'))
                                        <p style="color: green;font-size: 20px; font-weight: bold;">
                                            {{ session('status') }}
                                        </p>
                                    @endif
                                    @error('name')
                                        <p style="color:red">{{ $message }} </p>
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
        $(document).ready(function() {
            $('#namecheck').hide();
            var color_err = true;
            $('#brandname').keyup(function() {
                brandname_check();
            });
            function brandname_check() {
                var color_val = $('#brandname').val();
                if (color_val.length == '') {
                    $('#namecheck').show();
                    $('#namecheck').html("fill this filled");
                    $('#namecheck').focus();
                    $('#namecheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#namecheck').hide();
                }
                var regex = /^[A-Za-z]+$/;
                if (!color_val.match(regex)) {
                    $('#namecheck').show();
                    $('#namecheck').html("Please input characters only");
                    $('#namecheck').focus();
                    $('#namecheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#namecheck').hide();
                }
                if ((color_val.length < 3) || (color_val.length > 10)) {

                    $('#namecheck').show();
                    $('#namecheck').html("color name legth must be between 3 and 10");
                    $('#namecheck').focus();
                    $('#namecheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#namecheck').hide();
                }
            }
        });
    </script>
@endsection
