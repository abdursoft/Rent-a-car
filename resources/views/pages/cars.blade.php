@extends('layout.home')

@section('title','Find your cars')

@section('content')
    @include('components.front.breadcrumb')
    @include('components.front.cars')

    <script>
        $(window).on('load',async () => {
            await getCarType();
            await getCarBrand();
            await carPaginator();
        })
    </script>

@endsection