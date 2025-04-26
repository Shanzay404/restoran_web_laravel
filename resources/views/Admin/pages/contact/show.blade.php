
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" >
        <div class="row "  style="width:100%;">
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h4 class="card-title">Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title" class="fw-bold mb-2">Name</label>
                                                <p>{{$contact->name }}</p>
                                                <label for="title" class="fw-bold mb-2">Email</label>
                                                <p>{{$contact->email }}</p>
                                                <label for="title" class="fw-bold mb-2">Subject</label>
                                                <p>{{$contact->subject }}</p>
                                                <label for="detail" class="form-label fw-bold">Message</label>
                                                <p class="py-0">
                                                {{$contact->message}}
                                               </p>
                                            </div>
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