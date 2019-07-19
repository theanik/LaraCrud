@extends('layouts.backend.app')
@section('title','Purchases')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Purchases Table</h3>
        <div class="card-tools">
        <a href=" {{ route('purchases.create') }}" class="btn btn-success"> <i class="fas fa-shopping-bag"></i> Add New purchases</a>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Retail Price</th>
              <th>Sale Price Price</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($purchases as $key=>$purchases)
                <tr>
                    <td>{{ $purchases->id}}</td>
                    <td>{{ $purchases->product->name}}</td>
                    <td>{{ $purchases->product_quantity}}</td>
                    <td>{{ $purchases->retail_price}}</td>
                    <td>{{ $purchases->sale_price}}</td>
                    <td>
                        {{-- <a href=" {{ route('purchases.edit',$purchases->id) }}" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a> --}}
                        <a onclick="deletepurchases({{ $purchases->id }})" type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        <form id="delete-form-{{ $purchases->id }}"
                            style="dispaly:none"
                                action="{{ route('purchases.destroy',$purchases->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                  </tr>
                  {{-- {{ $purchases->product}} --}}
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