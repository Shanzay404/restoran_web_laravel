@extends('Frontend.Layout.layout')
@section('header')
    @include('Frontend.includes.header')
@endsection

@section('content')
<div class="container-xxl pt-5 pb-3">
    @include('Frontend.includes.team-members')
 </div>
    
@endsection