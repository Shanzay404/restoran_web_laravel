
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="card" style="width:70%; justify-content-center">
                    <div class="card-header">
                        <h4 class="card-title">Add</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="categoryName" class="required">Name</label>
                                                <input type="text" id="categoryName"
                                                    class="form-control my-1" name="name"
                                                    placeholder="Category Name" value="{{ old('name') }}">
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
                                                <input type="text" id="icon" class="form-control" name="icon" placeholder="Enter Icon class" value="{{ old('icon') }}">
                                                <small class="text-danger">
                                                    @error('icon')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="required mb-1">Tag</label>
                                            <div class="form-group">
                                                <select class="choices form-select" name="tag">
                                                    <option selected disabled value="">Select tag</option>
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
               


@endsection