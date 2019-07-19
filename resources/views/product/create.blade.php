@extends('layouts.backend.app')
@section('title','Add new Product')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
@endpush
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('product.store') }}">
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input name="name" data-validation="required" type="text" class="form-control" id="" placeholder="Enter Name">
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Code</label>
                <input name="code" data-validation="required" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group form-float">
                  {{-- <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}"> --}}
                      <label for="category">Select Category</label>
                      <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                      <option value="{{ $category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                        
                  {{-- </div> --}}
              </div>
              
              {{-- @foreach($categories as $category)
            <li>{{ $category }}</li>
              @endforeach --}}
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
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/i18n/defaults-*.min.js"></script>
@endpush
@endsection

