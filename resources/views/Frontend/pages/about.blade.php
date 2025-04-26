@extends('Frontend.Layout.layout')

@section('header')
    @include('Frontend.includes.header')
@endsection
        <!-- Navbar & Hero End -->

@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        @include('Frontend.includes.about-us')
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-xxl pt-5 pb-3">
        @include('Frontend.includes.team-members')
    </div>
    <!-- Team End -->
@endsection

        
