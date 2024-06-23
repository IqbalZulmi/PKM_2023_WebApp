@extends('html.html')

@section('content')
    @include('components.navbar')

    @include('components.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Point {{ $latestData->titik->nama }} Detail </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <livewire:detail-dashboard :id_titik="$id_titik">
            </div>
        </section>

    </main><!-- End #main -->
    @include('components.footer')
@endsection
