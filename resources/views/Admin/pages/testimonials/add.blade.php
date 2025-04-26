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
                            <form action="{{ route('testimonial.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message" class="form-label required">Message</label>
                                                <textarea id="summernote" name="message">{{ old('message') }}</textarea>
                                                <small class="text-danger">
                                                    @error('message')
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