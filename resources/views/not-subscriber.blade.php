@extends('html.html')


@section('content')
    @include('components.navbar')

    @include('components.sidebar')

    <main id="main" class="main">
        <div class="container">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('assets/img/not-available.svg') }}" alt="">
                <div class="text-center">
                    <h3>Akun Anda belum terdaftar sebagai Subscriber.</h3>
                    <p>Mohon hubungi pengelola untuk upgrade akun Anda.</p>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
@endsection
