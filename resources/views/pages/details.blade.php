@extends('layout.home')

@section('title','Find your cars')

@section('content')
    @include('components.front.breadcrumb')
    @include('components.front.car_details')

@endsection