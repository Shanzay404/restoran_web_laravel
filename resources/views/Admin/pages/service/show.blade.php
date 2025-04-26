
@extends('Admin.layout.layout')
@section('content')
{{-- <div class="page-heading"> --}}
    <div class="page d-flex justify-content-center align-items-center flex-column" >
        <div class="row "  style="width:;">
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
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="title" class="fw-bold mb-2">Title</label>
                                                <p>{{$service->title }}</p>
                                                <label for="detail" class="form-label fw-bold">Icon</label>
                                                <p class="py-0">{{ $service->icon }}</p>
                                                <label for="detail" class="form-label fw-bold">Detail</label>
                                                <p class="py-0">{!! $service->detail !!}</p>
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