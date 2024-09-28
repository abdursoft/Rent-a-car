@extends('layout.admin')

@section('title','All customers')

@section('content')
    @include('components.admin.customer.index')
    @include('components.user.tables.asset')
    @include('components.modals.customer-add')
    <script>
        $(window).on('load',async ()=> {
            await getCustomer();
        })
    </script>
@endsection