<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Services</h5>
        <h1 class="mb-5">Explore Our Services</h1>
    </div>
     

    <div class="row g-4">
        @foreach ($services as $service)
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded py-4" style="height: 258px;">
                <div class="p-4"  style="height: 100%;padding-bottom: 10px;overflow: hidden;">
                    <i class="{{ $service->icon }} text-primary mb-4"></i>
                    <h5>{{ $service->title }}</h5>
                    <p>{!! $service->detail !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>