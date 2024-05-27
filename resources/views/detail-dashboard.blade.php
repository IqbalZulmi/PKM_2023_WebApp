@extends('html.html')

@section('content')
    @include('components.navbar')

    @include('components.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Titik 1</h1>
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
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Turbidity Sensor</h5>
                            <div class="d-flex align-items-center">
                                <div class='semi-circle d-flex justify-content-center align-items-end'>
                                    <div class="text-circle d-flex justify-content-center align-items-center">
                                        <div class="h4 mt-3">
                                            74%
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">12 May 2024</span>
                                    <span class="text-muted small pt-2 ps-1">02:00:00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Water pH</h5>
                            <div class="d-flex align-items-center">
                                <div class='semi-circle d-flex justify-content-center align-items-end'>
                                    <div class="text-circle d-flex justify-content-center align-items-center">
                                        <div class="h4 mt-3">
                                            74%
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">12 May 2024</span>
                                    <span class="text-muted small pt-2 ps-1">02:00:00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Water Temperature</h5>
                            <div class="d-flex align-items-center">
                                <div class='semi-circle d-flex justify-content-center align-items-end'>
                                    <div class="text-circle d-flex justify-content-center align-items-center">
                                        <div class="h4 mt-3">
                                            74%
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">12 May 2024</span>
                                    <span class="text-muted small pt-2 ps-1">02:00:00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Reports <span>/Today</span></h5>

                            <!-- Line Chart -->
                            <div>
                                <canvas id="reportschart"></canvas>
                            </div>
                        </div>

                    </div>
                </div><!-- End Reports -->
            </div>
        </section>

    </main><!-- End #main -->
    @include('components.footer')
@endsection

@push('js')
    <script>
        const ctx = document.getElementById('reportschart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['00:00:00', '06:00:00', '12:00:00', '18:00:00'],
                datasets: [{
                        label: 'Turbidity',
                        data: [12, 19, 3, 5, 2, 3],
                        borderColor: 'rgb(255, 99, 132)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Water pH',
                        data: [8, 14, 5, 2, 10, 7],
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Water Temperature',
                        data: [15, 10, 8, 6, 3, 4],
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 1,
                        fill: false
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animations: {
                    tension: {
                        duration: 2000,
                        easing: 'easeOutQuad',
                        from: 2,
                        to: 0,
                    }
                },
            }
        });
    </script>
@endpush
