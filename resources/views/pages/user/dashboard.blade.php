@extends('layout.home')

@section('title','Welcome Back')

@section('content')
    @include('components.front.breadcrumb')
    <section class="contact-us-wrap my-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('components.user.profile')
                </div>
                <div class="col-md-9">
                    @include('components.user.cards')
                </div>
            </div>
        </div>
    </section>

    <script>
        $(window).on('load',async ()=> {
            await getProfile();
            await getRents();
        })
    </script>
@endsection