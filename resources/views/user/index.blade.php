@extends('layouts.backend.app')
@section('title','User')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User Table</h3>
        <div class="card-tools">
        <a href=" {{ route('user.create') }}" class="btn btn-success"> <i class="fas fa-user-plus"></i> Add New User </a>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $key=>$user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                   
                      <td>
                        <a href=" {{ route('user.edit',$user->id) }}" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a onclick="deleteUser({{ $user->id }})" type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        <form id="delete-form-{{ $user->id }}"
                            style="dispaly:none"
                                action="{{ route('user.destroy',$user->id) }}" method="POST">
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

        function deleteUser(id){
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