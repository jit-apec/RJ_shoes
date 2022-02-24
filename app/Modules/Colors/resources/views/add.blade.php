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
                            href="{{ url('/admin/color/displaycolor') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <form method="POST" action="addcolor" id="addcolor">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Color Name</label>
                                <input type="text" class="form-control" id="colorname" onfocusout="check_name()"
                                    name="name">
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
        $(document).ready(function() {
            $('#colorcheck').hide();
            var color_err = true;
            $('#colorname').keyup(function() {
                colorname_check();
            });
            function colorname_check() {
                var color_val = $('#colorname').val();
                if (color_val.length == '') {
                    $('#colorcheck').show();
                    $('#colorcheck').html("** fill this filled");
                    $('#colorcheck').focus();
                    $('#colorcheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#colorcheck').hide();
                }
                var regex = /^[A-Za-z]+$/;
                if (!color_val.match(regex)) {
                    $('#colorcheck').show();
                    $('#colorcheck').html("** Please input alphabet characters only");
                    $('#colorcheck').focus();
                    $('#colorcheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#colorcheck').hide();
                }
                if ((color_val.length < 3) || (color_val.length > 10)) {

                    $('#colorcheck').show();
                    $('#colorcheck').html("** color name legth must be between 3 and 10");
                    $('#colorcheck').focus();
                    $('#colorcheck').css("color", "red");
                    color_err = false;
                    return false;
                } else {
                    $('#colorcheck').hide();
                }
            }
        });
    </script>
@endsection
