@extends('layouts.backend.app')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('category.update',$category->id) }}">
                @method('PUT')
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input  value="{{ $category->name }}" name="name" type="text" class="form-control" id="" placeholder="Enter Name">
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