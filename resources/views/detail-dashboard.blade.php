@extends('html.html')

@section('content')
    @include('components.navbar')

    @include('components.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Titik {{ $dataTerbaru->titik->nama }}</h1>
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
                                            {{ $dataTerbaru->turbidity }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">{{ $dataTerbaru->created_at->format('d F y') }}</span>
                                    <span
                                        class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('h:i:s') }}</span>
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
                                            {{ $dataTerbaru->ph }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">{{ $dataTerbaru->created_at->format('d F y') }}</span>
                                    <span
                                        class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('h:i:s') }}</span>
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
                                            {{ $dataTerbaru->temperature }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <h6 class="fs-4">Last Update</h6>
                                    <span class="small pt-1 fw-bold">{{ $dataTerbaru->created_at->format('d F y') }}</span>
                                    <span
                                        class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('h:i:s') }}</span>
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

@php
    $formattedData = $empatDataTerbaru->map(function ($item) {
        return [
            'turbidity' => $item->turbidity,
            'ph' => $item->ph,
            'temperature' => $item->temperature,
            'created_at' => $item->created_at->format('d F Y - H:i:s'),
        ];
    });
@endphp

@push('js')
    <script>
        const ctx = document.getElementById('reportschart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($formattedData->pluck('created_at')),
                datasets: [{
                        label: 'Turbidity',
                        data: @json($formattedData->pluck('turbidity')),
                        borderColor: 'rgb(255, 99, 132)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Water pH',
                        data: @json($formattedData->pluck('ph')),
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Water Temperature',
                        data: @json($formattedData->pluck('temperature')),
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
