@extends('Frontend.Layout.layout')

@section('header')
    @include('Frontend.includes.header')
@endsection

@section('content')
<div class="container-xxl py-5">
    @include('Frontend.includes.food-menu')
</div>
@endsection