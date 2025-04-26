<style>
    
.choices[data-type*='select-one'] {
  cursor: pointer;
  margin-bottom: 5px !important;
}
input[type='file']{
    margin-bottom: 5px !important;
}
</style>
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" >
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="required">Name</label>
                                                <input type="text" id="name"
                                                    class="form-control my-1" name="name"
                                                    placeholder="Enter Item name" value="{{ $item->name}}">
                                                    <small class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="price" class="required">Price</label>
                                                <input type="text" id="price"
                                                    class="form-control my-1" name="price"
                                                    placeholder="Enter Item price" value="{{ $item->price}}">
                                                    <small class="text-danger">
                                                        @error('price')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="service_icon" class="form-label required">Icon</label>
                                                <input class="form-control" type="file" id="formFile" name="icon"accept="image/*" onchange="previewImage(event)" />
                                                <small class="text-danger">
                                                    @error('icon')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="required mb-2">Category</label>
                                            <div class="form-group">
                                                <select class="choices form-select mb-0" name="category" style="margin-bottom: 0px !important;">
                                                    <option value="" selected>Select Category</option> 
                                                    @foreach ($categories as $category)
                                                    @if ($item->category_id === $category->id)
                                                        {{ $selected = "selected"  }}
                                                    @else
                                                        {{ $selected = ""  }}
                                                    @endif
                                                    <option value="{{ $category->id }}" {{$selected}}>{{ $category->name }}</option>
                                                @endforeach
                                                </select>
                                                <small class="text-danger">
                                                    @error('category')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description" class="form-label required">Description</label>
                                                <textarea id="summernote" name="description">{{ $item->description }}</textarea>
                                                <small class="text-danger">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img id="image-preview" src="{{ file_exists(public_path('food_icons/'.$item->icon))
                                            ? asset('food_icons/'.$item->icon)
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