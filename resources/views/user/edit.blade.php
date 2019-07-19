@extends('layouts.backend.app')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('user.update',$user->id) }}">
            @method('PUT')
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input value={{ $user->name }} data-validation="length alphanumeric" 
                data-validation-length="3-12" 
                data-validation-error-msg="User name has to be an alphanumeric value (3-12 chars)" name="name" type="text" class="form-control" id="" placeholder="Enter Name" >
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input value={{ $user->email }} data-validation="email" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name = "password" type="password" data-validation="strength" 
                data-validation-strength="6" data-validation-length="6" data-validation-error-msg="At least 6 character" class="form-control" id="exampleInputPassword1" placeholder="Password">
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