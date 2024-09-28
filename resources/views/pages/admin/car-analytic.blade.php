@extends('layout.admin')

@section('title', $car->name)

@section('content')
    @include('components.admin.car.analytics')
    @include('components.user.tables.asset')
    <script>
        $(window).on('load',async ()=> {
            await renderTable('#rentTable');
        })
    </script>
@endsection