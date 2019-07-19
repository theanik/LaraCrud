@extends('layouts.backend.app')
@section('title','Purchass')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
@endpush
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Purchases</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('purchases.store') }}">
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Select Product</label>
                      <select name="product_id" class="form-control">
                        @foreach ($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                        </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Quantity</label>
                <input name="quantity" data-validation="required" data-validation="number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Quantity">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Retail Price</label>
                <input name="r_price" type="text" data-validation="required" data-validation="number" class="form-control" id="exampleInputEmail1" placeholder="Product Quantity">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Sale Price</label>
                <input name="s_price" type="text" data-validation="required" data-validation="number" class="form-control" id="exampleInputEmail1" placeholder="Product Quantity">
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

