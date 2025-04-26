
@extends('Admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Food Categories</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end mx-3">
                            <a href="{{ route('category.add') }}" class="btn btn-primary">Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Tag</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <i class="{{ $category->icon }} text-primary" style="font-size: 1.5rem;"></i>
                                        </td>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->tag->name}}</td>
                                        <td>{{ $category->user->name}}</td>
                                        <td>
                                            <div class="d-inline">
                                                <form id="changeStatus{{$category->id}}" action="{{route('category.changeStatus', $category->id)}}" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                    <button type="button" class="btn btn-sm btn-{{ $category->status === 'active' ? 'primary' : 'dark'}}" 
                                                    onclick="confirmStatusChange({{ $category->id }}, '{{  $category->status === 'active' ? 'In-Active':'Active' }}')">{{ $category->status === "active"? "Active":"In Active"}}</button>
                                                </form>
                                            </div>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn text-primary  fw-bold" style="font-size: 15px;"><i class="bi bi-pencil-square"></i></a>
                                            <div class="d-inline">
                                                <form id="deleteForm{{$category->id}}" action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                <button type="button" class="btn btn-md text-danger fw-bold" style="font-size: 15px;" onclick="showDeleteModal({{ $category->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                </form>
                                            </div>
                                         </td>                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


<!-- Bootstrap Modal for delete Category Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
    <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    Are you sure you want to delete this? This action cannot be undone.
    </div>
    <div class="modal-footer">
    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
    </div>
</div>
</div>
</div>


<script>
  
    function showDeleteModal(Id) {
        $('#deleteModal').modal('show');
        document.getElementById('confirmDeleteButton').onclick = function () {
        document.getElementById('deleteForm' + Id).submit();
    };
}
function confirmStatusChange(categoryId, status) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to change the status to " + status,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If Ok is clicked, submit the form
                document.getElementById('changeStatus' + categoryId).submit();
            } else {
                // If Cancel is clicked, just close the alert
                Swal.close();
            }
        });
    }


</script>



@endsection