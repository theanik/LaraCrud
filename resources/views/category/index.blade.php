@extends('layouts.backend.app')
@section('title','Category')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Category Table</h3>
        <div class="card-tools">
        <a href=" {{ route('category.create') }}" class="btn btn-success"> <i class="fas fa-plus-square"></i> Add New category</a>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categories as $key=>$category)
                <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{ $category->name}}</td>
                    <td>
                        <a href=" {{ route('category.edit',$category->id) }}" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a onclick="deletecategory({{ $category->id }})" type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        <form id="delete-form-{{ $category->id }}"
                            style="dispaly:none"
                                action="{{ route('category.destroy',$category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                  </tr>
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

        function deletecategory(id){
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