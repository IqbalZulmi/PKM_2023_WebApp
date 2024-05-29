<div wire:poll.5000ms class="row">
    <!-- Turbidity -->
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
                        <span class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('H:i:s') }}</span>
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
                        <span class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('H:i:s') }}</span>
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
                        <span class="text-muted small pt-2 ps-1">{{ $dataTerbaru->created_at->format('H:i:s') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- End Sales Card -->
    <!-- Reports -->
    <div class="col-12" wire:ignore>
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


@push('js')
    <script>
        var chartData = JSON.parse('{!! $formattedData !!}');
        console.log(chartData);
        document.addEventListener('livewire:init', function() {
            const ctx = document.getElementById('reportschart');
            let chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.label,
                    datasets: [{
                            label: 'Turbidity',
                            data: chartData.turbidity,
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1,
                            fill: false
                        },
                        {
                            label: 'Water pH',
                            data: chartData.ph,
                            borderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1,
                            fill: false
                        },
                        {
                            label: 'Suhu Air',
                            data: chartData.temperature,
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

                }
            });

            Livewire.on('refreshChart', event => {
                var chartData = JSON.parse(event);
                console.log(chartData);
                chart.data.labels = chartData.label;
                chart.data.datasets[0].data = chartData.turbidity;
                chart.data.datasets[1].data = chartData.ph;
                chart.data.datasets[2].data = chartData.temperature;
                chart.update();
            });

            setInterval(() => {
                @this.call('refreshDataChart');
            }, 5000);
        });
    </script>
@endpush
