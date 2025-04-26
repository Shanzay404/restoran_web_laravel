
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
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
                                        <div class="col-6">
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
                                        <div class="col-6">
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
                                        <div class="col-6">
                                            <div id="image-preview" class="mt-2"></div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                          <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Create</button>
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
        const imagePreview = document.getElementById('image-preview');
        imagePreview.innerHTML = ''; // Clear previous image

        const file = event.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.alt = 'Selected Image Preview';
            img.style.maxWidth = '200px';
            img.style.height = '200px';
            img.style.marginTop = '30px';
            imagePreview.appendChild(img);
        }
    }
</script>

@endsection