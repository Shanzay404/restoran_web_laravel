
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="required">Name</label>
                                                <input type="text" id="name"
                                                    class="form-control my-1" name="name"
                                                    placeholder="Enter Full Name" value="{{ $member->name }}">
                                                    <small class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="designation" class="required">Designation</label>
                                                <input type="text" id="designation"
                                                    class="form-control my-1" name="designation"
                                                    placeholder="Enter Designation" value="{{ $member->designation }}">
                                                    <small class="text-danger">
                                                        @error('designation')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image" class="form-label mb-1 required">Image</label>
                                                <input class="form-control" type="file" id="formFile" name="image" accept="image/*" onchange="previewImage(event)">
                                                <small class="text-danger">
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            {{-- <div  class="mt-2"></div> --}}
                                            <img id="image-preview" src="{{ file_exists(public_path('team_members/'.$member->image))
                                            ? asset('team_members/'.$member->image)
                                            : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjf8KEchalHXDschnJIH0wZGSC9iM5BuSLZQ&s' }}"
                                            alt="Product Image"
                                            style="height: 200px; width:200px; margin-top:30px;">
                                        
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </div>
               


    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                // Create a temporary URL for the selected file and update the image preview
                document.getElementById('image-preview').src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection