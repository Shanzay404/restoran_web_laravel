@extends('Admin.layout.layout')
@section('content')
<div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ isset($about) ? 'Edit' : 'Add' }} - About</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ isset($about) ? route('about.update', $about->id) : route('about.store') }}" 
                              method="POST" 
                              class="form form-vertical">
                            @csrf
                            @if(isset($about))
                                @method('PUT')
                            @endif
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="experience" class="required">Experience</label>
                                            <input type="number" id="experience"
                                                   class="form-control my-1" 
                                                   name="experience"
                                                   placeholder="Experience" 
                                                   value="{{ old('experience', $about->experience ?? '') }}">
                                            <small class="text-danger">
                                                @error('experience') {{ $message }} @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="description" class="required">Description</label>
                                        <textarea name="description" id="summernote" class="form-control">
                                            {{ old('description', $about->description ?? '') }}
                                        </textarea>
                                        <small class="text-danger">
                                            @error('description') {{ $message }} @enderror
                                        </small>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            {{ isset($about) ? 'Update' : 'Create' }}
                                        </button>
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
