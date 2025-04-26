
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
                            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title" class="required">Title</label>
                                                <input type="text" id="title"
                                                    class="form-control my-1" name="title"
                                                    placeholder="Enter Service title" value="{{ $service->title }}">
                                                    <small class="text-danger">
                                                        @error('title')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="service_icon" class="form-label mb-1 required">Icon</label>
                                                <input type="text" id="icon"
                                                class="form-control my-1" name="icon"
                                                placeholder="Enter Icon class" value="{{ $service->icon }}">
                                                <small class="text-danger">
                                                    @error('icon')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="detail" class="form-label required">Detail</label>
                                                <textarea id="summernote" name="detail">{{ $service->detail }}</textarea>
                                                <small class="text-danger">
                                                    @error('detail')
                                                        {{ $message }}
                                                    @enderror
                                                </small>

                                            </div>
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