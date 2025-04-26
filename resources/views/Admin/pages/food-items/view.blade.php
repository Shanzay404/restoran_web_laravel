
@extends('Admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Food Items</h3>
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
                            <a href="{{ route('item.add') }}" class="btn btn-primary">Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ file_exists(public_path('food_icons/'.$item->icon))
                                            ? asset('food_icons/'.$item->icon)
                                            : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjf8KEchalHXDschnJIH0wZGSC9iM5BuSLZQ&s' }}"
                                            alt="Product Image"
                                            style="height: 30px; width:30px; border-radius:50%;">
                                        </td>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $item->price}}</td>
                                        <td>{{ $item->category->name}}</td>
                                        <td>
                                            <a href="{{ route('item.show', $item->id) }}" class="btn text-warning fs-5 fw-bold"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('item.edit', $item->id) }}" class="btn text-primary  fs-5 fw-bold"><i class="bi bi-pencil-square"></i></a>
                                            <div class="d-inline">
                                                <form id="deleteForm{{$item->id}}" action="{{route('item.destroy', $item->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                <button type="button" class="btn btn-md text-danger fs-5 fw-bold" onclick="showDeleteModal({{ $item->id }})">
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
    </script>
    
    
@endsection