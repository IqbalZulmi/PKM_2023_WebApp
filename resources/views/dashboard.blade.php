@extends('html.html')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')\

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                @forelse ($dataTitik as $index => $data)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Last Update :
                                    @if ($data->sensor->isNotEmpty())
                                        {{ \Carbon\Carbon::parse($data->sensor->sortByDesc('created_at')->first()->created_at)->format('H:i | d/m/Y') }}
                                    @else
                                        No sensors available
                                    @endif
                                </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-motherboard"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $data->nama }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-main" href="{{ route('dashboardDetailPage',['id_titik' => $data->id]) }}">
                                        More Detail
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No Point Available
                @endforelse
            </div>
        </section>

    </main><!-- End #main -->
    @include('components.footer')
@endsection
