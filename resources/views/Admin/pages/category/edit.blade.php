<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            // Create a temporary URL for the selected file and update the image preview
            document.getElementById('image-preview').src = URL.createObjectURL(file);
        }
    }
</script>
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="card" style="width:70%; justify-content-center">
                    <div class="card-header">
                        <h4 class="card-title">Edit</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('category.update', $category->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="categoryName" class="required">Name</label>
                                                <input type="text" id="categoryName"
                                                    class="form-control my-1" name="name"
                                                    placeholder="Category Name" value="{{ $category->name }}">
                                                    <small class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="icon" class="form-label required">Icon</label>
                                                {{-- <input class="form-control" type="file" id="icon" name="icon" accept="image/*" onchange="previewImage(event)"> --}}
                                                <input type="text" id="icon" class="form-control" name="icon" placeholder="Enter Icon class" value="{{ $category->icon }}">
                                                <small class="text-danger">
                                                    @error('icon')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="required mb-1">Tag</label>
                                            <div class="form-group">
                                                <select class="choices form-select" name="tag">
                                                    @foreach ($tags as $tag)
                                                        @if ($category->tag->id === $tag->id)
                                                            {{ $selected = "selected"  }}
                                                        @else
                                                            {{ $selected = ""  }}
                                                        @endif
                                                        <option value="{{ $tag->id }}" {{$selected}}>{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">
                                                    @error('tag')
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

  
{{-- </div> --}}
@endsection