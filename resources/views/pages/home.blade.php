@extends('layout.home')

@section('title','Rent your cars')

@section('content')

    @include('components.front.hero')
    @include('components.front.rental-process')
    @include('components.front.pricing')
    @include('components.front.contact-phone')
    @include('components.front.service')

@endsection