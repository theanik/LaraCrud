@extends('layouts.backend.app')
@section('title','Add new Category')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('category.store') }}">
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="">Category Name</label>
                <input name="name" data-validation="required" type="text" class="form-control" id="" placeholder="Enter Name">
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