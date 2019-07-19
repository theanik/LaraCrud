@extends('layouts.backend.app')
@section('title','Add new User')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add New User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('user.store') }}">
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="" placeholder="Enter Name" data-validation="length alphanumeric" 
                data-validation-length="3-12" 
                data-validation-error-msg="User name has to be an alphanumeric value (3-12 chars)">
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" data-validation="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                data-validation="length" data-validation-length="min8">
              </div>
              
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
</div>
<div class="col-md-2"></div>
@endsection