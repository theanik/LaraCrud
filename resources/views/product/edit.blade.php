@extends('layouts.backend.app')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('product.update',$product->id) }}">
                @method('PUT')
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input  value="{{ $product->name }}" name="name" type="text" class="form-control" id="" placeholder="Enter Name">
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Code</label>
                <input value="{{ $product->code }}" name="code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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