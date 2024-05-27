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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Update : 13/02/2004</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-motherboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Titik 1</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-main">
                                    More Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    @include('components.footer')
@endsection
