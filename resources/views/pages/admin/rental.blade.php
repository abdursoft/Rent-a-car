@extends('layout.admin')

@section('title','All Rents')

@section('content')
    @include('components.admin.rental.index')
    @include('components.user.tables.asset')
    @include('components.modals.rental-add')
    <script>
        $(window).on('load',async ()=> {
            await getRents();
        })
    </script>
@endsection