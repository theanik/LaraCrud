@extends('layouts.backend.app')
@section('title','Sales')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sales Table</h3>
        <div class="card-tools">
        <a href=" {{ route('sales.create') }}" class="btn btn-success"> <i class="fas fa-shopping-cart"></i> Sale</a>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Sales Quantity</th>
              <th>Sale Price</th>
              <th>Total Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($sales as $key=>$sale)
                <tr>
                    <td>{{ $sale->id}}</td>
                    {{-- <td>{{ $sale->products->name}}</td> --}}
                    <td>{{ $sale->quantity}}</td>
                    <th> {{ $sale->purchases->sale_price }} </th>
                    <td>{{ $sale->t_price}}</td>
                    <td>
                        
                        <a onclick="deletepurchases({{ $sale->id }})" type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        <form id="delete-form-{{ $sale->id }}"
                            style="dispaly:none"
                                action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                  </tr>
                  {{-- {{$sale->purchases->sale_price}} --}}
                  {{ $sale->products }}
              @endforeach
            
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  @push('js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script>

        function deletepurchases(id){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
               event.preventDefault();
               document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
                )
            }
            })
        }
       
    
    </script>
  @endpush
@endsection