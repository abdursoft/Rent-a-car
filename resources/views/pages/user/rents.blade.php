@extends('layout.home')

@section('title','Rent History')

@section('content')
    @include('components.front.breadcrumb')
    <section class="contact-us-wrap my-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('components.user.profile')
                </div>
                <div class="col-md-9">
                    @include('components.user.rents')
                </div>
            </div>
        </div>
    </section>

    <script>
        $(window).on('load',async ()=> {
            await renderTables();
        })
    </script>
@endsection