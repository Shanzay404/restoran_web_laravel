@extends('Frontend.Layout.layout')

@section('header')
<div class="container my-5 py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
            <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
            <a href="{{ route('index.booking') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
        </div>
        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
            <img class="img-fluid" src="/Frontend/img/hero.png" alt="">
        </div>
    </div>
</div>
@endsection

@section('content')
        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
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
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">

           @include('Frontend.includes.about-us')

        </div>
        <!-- About End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">

            @include('Frontend.includes.food-menu')

        </div>
        <!-- Menu End -->


        <!-- Reservation Start -->
        
        @include('Frontend.includes.reservation')

        <!-- Reservation end -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">

           @include('Frontend.includes.team-members')
           
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">

           @include('Frontend.includes.testimonials')
           
        </div>
        <!-- Testimonial End -->
        
    
@endsection