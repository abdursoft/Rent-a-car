@extends('layout.home')

@section('title','Book your car')

@section('content')

    @include('components.front.breadcrumb')
    @include('components.front.booking')
    @include('components.front.service')

@endsection