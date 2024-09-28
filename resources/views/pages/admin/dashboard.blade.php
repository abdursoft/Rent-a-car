@extends('layout.admin')

@section('title','Admin Dashboard')

@section('content')
    @include('components.admin.dashboard')
    <script>
        $(window).on('load',async ()=> {
            // await getCustomer();
        })
    </script>
@endsection