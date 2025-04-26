
@extends('Admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Team Members</h3>
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
                            {{-- <a href="{{ route('member.add') }}" class="btn btn-primary">Add</a> --}}
                            <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#primary" style="box-shadow: none;">
                            Add
                        </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                    <tr>
                                        <td>
                                            <img src="{{ file_exists(public_path('team_members/'.$member->image))
                                            ? asset('team_members/'.$member->image)
                                            : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjf8KEchalHXDschnJIH0wZGSC9iM5BuSLZQ&s' }}"
                                            alt="Product Image"
                                            style="height: 30px; width:30px; border-radius:50%;">
                                        </td>
                                        <td>{{ $member->name}}</td>
                                        <td>{{ $member->designation}}</td>
                                        <td>
                                            <a href="{{ route('member.edit', $member->id) }}" class="btn text-primary  fs-5 fw-bold"><i class="bi bi-pencil-square"></i></a>
                                            <div class="d-inline">
                                                <form id="deleteForm{{$member->id}}" action="{{route('member.destroy', $member->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                <button type="button" class="btn btn-md text-danger fs-5 fw-bold" onclick="showDeleteModal({{ $member->id }})">
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



{{-- modal start --}}
<div class="modal-primary me-1 mb-1 d-inline-block">


    <!--primary theme Modal -->
    <div class="modal fade text-left" id="primary" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel160"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">
                        Add
                    </h5>
                    <button type="button" class="close"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="required">Name</label>
                                        <input type="text" id="name"
                                            class="form-control my-1" name="name"
                                            placeholder="Enter Full Name" value="{{ old('name') }}">
                                            <small class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="designation" class="required">Designation</label>
                                        <input type="text" id="designation"
                                            class="form-control my-1" name="designation"
                                            placeholder="Enter Designation" value="{{ old('designation') }}">
                                            <small class="text-danger">
                                                @error('designation')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image" class="required form-label mb-1">Image</label>
                                        <input class="form-control" type="file" id="formFile" name="image" accept="image/*" onchange="previewImage(event)">
                                        <small class="text-danger">
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="image-preview" class="mt-2"></div>
                                </div>
                                {{-- <div class="col-12 d-flex justify-content-end">
                                  
                                </div> --}}
                            
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        Create
                    </button>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal ends--}}


<script>
    function showDeleteModal(Id) {
        $('#deleteModal').modal('show');
        document.getElementById('confirmDeleteButton').onclick = function () {
        document.getElementById('deleteForm' + Id).submit();
    };
}

function previewImage(event) {
        const imagePreview = document.getElementById('image-preview');
        imagePreview.innerHTML = ''; // Clear previous image

        const file = event.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.alt = 'Selected Image Preview';
            img.style.maxWidth = '100px';
            img.style.height = '100px';
            img.style.marginTop = '20px';
            img.style.marginBottom = '20px';
            imagePreview.appendChild(img);
        }
    }

      // Laravel session check for errors
    //   @if ($errors->any())
    //     document.addEventListener('DOMContentLoaded', function () {
    //         // Automatically show modal if there are validation errors
    //         var modal = new bootstrap.Modal(document.getElementById('primary'));
    //         modal.show();
    //     });
    // @endif


    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('primary'));
            modal.show();
        });
    @endif
    
</script>




@endsection