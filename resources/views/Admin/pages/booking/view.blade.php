
@extends('Admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bookings</h3>
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
                            {{-- <a href="{{ route('item.add') }}" class="btn btn-primary">Add</a> --}}
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date and time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->username}}</td>
                                        <td>{{ $booking->email}}</td>
                                        <td>{{ $booking->date_and_time}}</td>
                                        <td>
                                            <div class="d-inline">
                                                <form action="{{ route('booking.changeStatus', $booking->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select name="status" id="basicSelect" class="form-select">
                                                                <option value="pending" {{ $booking->status === "pending" ? "selected" : ""  }}>Pending</option>
                                                                <option value="progress" {{ $booking->status === "progress" ? "selected" : ""  }}>Progress</option>
                                                                <option value="confirmed" {{ $booking->status === "confirmed" ? "selected" : ""  }}>Confirmed</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('booking.show', $booking->id) }}" class="btn text-warning fs-5 fw-bold"><i class="bi bi-eye"></i></a>
                                            {{-- <a href="{{ route('booking.edit', $booking->id) }}" class="btn text-primary  fs-5 fw-bold"><i class="bi bi-pencil-square"></i></a> --}}
                                            <div class="d-inline">
                                                <form id="deleteForm{{$booking->id}}" action="{{route('booking.destroy', $booking->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                <button type="button" class="btn btn-md text-danger fs-5 fw-bold" onclick="showDeleteModal({{ $booking->id }})">
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