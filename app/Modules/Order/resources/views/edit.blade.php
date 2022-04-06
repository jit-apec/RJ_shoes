@extends('admin.master')
@section('title')
 Order
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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/order/') }}">Order</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary  p-1">
                    <div class="card-header mt-2 mb-2 p-2">
                        <h3 class="card-title">Update Order</h3>
                        <a class="float-right "
                            href="{{ url('/admin/order/') }}"><i class="fa fa-arrow-left"aria-hidden="true"></i> Back</a>&nbsp;
                    </div>
                    <form method="post" action="{{url('/admin/order/edit',$status->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group ">
                                    <label for="inputideal">Change Status<span class="text-danger">*</span></label>
                                    <select id="inputideal" name="status" value="{{$status->order_status}}"
                                        class="form-control">
                                        <option selected>{{$status->order_status}}</option>
                                        <option>On the Way</option>
                                        <option>success</option>
                                        <option>Cancel</option>
                                    </select>
                                </div>
                            </div>
                            @if (session()->has('status'))
                            <p style="color: green;font-size: 20px; font-weight: bold;">
                                {{ session('status') }}
                            </p>
                        @endif
                        @error('name')
                            <p style="color:red">{{ $message }} </p>
                        @enderror
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
