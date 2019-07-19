@extends('layouts.backend.app')
@section('title','Sale')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
@endpush
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Sales</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('sales.store') }}">
              @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Select Product</label>
                      <select data-validation="required" name="rproduct_id" class="form-control">
                        @foreach ($pruchases as $pruchases)
                      <option value="{{$pruchases->id}}">{{$pruchases->product->name}}</option>
                        @endforeach
                        </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input name="quantity" data-validation="number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Quantity">
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

