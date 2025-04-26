
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" style="height: 100%;">
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
                                        <div class="col-6">
                                            <div class="d-flex justify-content-center align-items-center" style="height: 80%">
                                                <img src="{{ file_exists(public_path('food_icons/'.$item->icon))
                                                ? asset('food_icons/'.$item->icon)
                                                : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjf8KEchalHXDschnJIH0wZGSC9iM5BuSLZQ&s' }}"
                                                alt="Product Image"
                                                style="height: 200px; border-radius:0%;">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title" class="fw-bold mb-2">Title</label>
                                                <p>{{$item->name }}</p>
                                                <label for="title" class="fw-bold mb-2">Price</label>
                                                <p>{{$item->price }}</p>
                                                <label for="title" class="fw-bold mb-2">Category</label>
                                                <p>{{$item->category->name }}</p>
                                                <label for="detail" class="form-label fw-bold">Description</label>
                                                <p class="py-0">{!! $item->description !!}</p>
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