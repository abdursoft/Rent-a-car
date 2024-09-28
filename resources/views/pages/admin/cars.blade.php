@extends('layout.admin')

@section('title','All cars')

@section('content')
    @include('components.admin.car.index')
    @include('components.user.tables.asset')
    @include('components.modals.car-add')
    @include('components.modals.car-edit')
    <script>
        $(window).on('load',async ()=> {
            await getCars();
        })
    </script>
@endsection