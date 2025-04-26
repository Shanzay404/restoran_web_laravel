
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="row" style="width: 60% !important;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('tag.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="required">Name</label>
                                                <input type="text" id="name"
                                                    class="form-control my-1" name="name"
                                                    placeholder="Enter Tag Name">
                                                    <small class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </small>
                                            </div>
                                        </div>
                                      <div class="col-12 d-flex justify-content-end">
                                            {{-- <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">back</button> --}}
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
               
{{-- </div> --}}
@endsection