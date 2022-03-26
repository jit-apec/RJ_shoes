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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/color/') }}">Color</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary  p-1">
                    <div class="card-header mt-2 mb-2 p-1">
                        <h3 class="card-title">Edit Colors</h3>
                   
                        <a class="btn   btn-sm float-right "
                            href="{{ url('/admin/color/') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <form method="POST" action="{{url('/admin/color/edit/'.$colors->id)}}" id="addcolor">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Color Name</label>
                                <input type="text" class="form-control" name="name" id="colorname"
                                    value="{{ $colors->name }}" placeholder="Enter color" oninput="this.value = this.value.replace(/[^/A-Za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');">
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
        $("#addcolor").validate({
           rules: {
               name: {

                   required: true,
                   minlength: 2,
                   maxlength: 15,
                //    remote:{
                //        url:"{{url('/admin/color/uniquename')}}",
                //        type:"GET",
                //        Data:{
                //            colorname: function(){

                //                return $("#name").val();

                //            }
                //        }
                //    },

               },
           },

           messages: {

               name: {
                   required: "Name field is required",
                   remote:"The Name has already been taken!!!",
               },

           },

       });
   </script>

@endsection
