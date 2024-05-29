@extends('html.html')

@push('css')
    <style>
        .tanggal {
            background-color: var(--third-color);
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            function updateFilterDisplay(filterValue) {
                let filterText = '';
                switch (filterValue) {
                    case 'hari_ini':
                        filterText = 'Today';
                        break;
                    case 'kemarin':
                        filterText = 'Yesterday';
                        break;
                    case 'bulan_ini':
                        filterText = 'This Month';
                        break;
                    case 'bulan_lalu':
                        filterText = 'Last Month';
                        break;
                    case 'tahun_ini':
                        filterText = 'This Year';
                        break;
                    case 'tahun_lalu':
                        filterText = 'Last Year';
                        break;
                    case 'custom':
                        filterText = 'Custom';
                        break;
                    default:
                        filterText = 'All';
                        break;
                }
                $('#filter-display').text('Filter: ' + filterText);
            }

            $('#filter').val('hari_ini').trigger('change');

            updateFilterDisplay($('#filter').val())

            $('#filter').change(function() {
                if ($(this).val() === 'custom') {
                    $('#custom-input').show();
                } else {
                    $('#custom-input').hide();
                    updateFilterDisplay($('#filter').val());
                    table.draw();
                }
            });

            $('#titik').change(function() {
                table.draw();
                updateFilterDisplay($('#filter').val());
            });

            $('#tanggal_mulai, #tanggal_akhir').change(function() {
                table.draw();
                updateFilterDisplay($('#filter').val());
            });

            const table = $('.data-table').DataTable({
                info: true,
                lengthMenu: [25, 50, 100],
                dom: '<"d-flex flex-wrap mb-2"B><"row"<"col-sm-6 d-flex justify-content-center justify-content-sm-start mb-2 mb-sm-0"l><"col-sm-6 d-flex justify-content-center justify-content-sm-end"f>>rtp',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i class="bi bi-clipboard-check"></i> Copy',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="bi bi-file-earmark-spreadsheet"></i> Excel',
                        titleAttr: 'Excel',
                        filename: 'Sensors Report',
                        title: 'Sensors Report'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                        titleAttr: 'PDF',
                        filename: 'Sensors Report',
                        title: 'Sensors Report'
                    }
                ]
            });



            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const filterValue = $('#filter').val();
                const titikValue = $('#titik').val();
                const tanggalMulai = $('#tanggal_mulai').val();
                const tanggalAkhir = $('#tanggal_akhir').val();
                const rowDate = new Date(data[1]);
                const rowTitik = data[2];

                let valid = true;

                // Filter by date
                if (filterValue) {
                    const today = new Date();
                    const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
                    const endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    const startOfLastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                    const endOfLastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
                    const startOfYear = new Date(today.getFullYear(), 0, 1);
                    const endOfYear = new Date(today.getFullYear(), 11, 31);
                    const startOfLastYear = new Date(today.getFullYear() - 1, 0, 1);
                    const endOfLastYear = new Date(today.getFullYear() - 1, 11, 31);

                    switch (filterValue) {
                        case 'hari_ini':
                            valid = rowDate.toDateString() === today.toDateString();
                            break;
                        case 'kemarin':
                            const yesterday = new Date(today);
                            yesterday.setDate(today.getDate() - 1);
                            valid = rowDate.toDateString() === yesterday.toDateString();
                            break;
                        case 'bulan_ini':
                            valid = rowDate >= startOfMonth && rowDate <= endOfMonth;
                            break;
                        case 'bulan_lalu':
                            valid = rowDate >= startOfLastMonth && rowDate <= endOfLastMonth;
                            break;
                        case 'tahun_ini':
                            valid = rowDate >= startOfYear && rowDate <= endOfYear;
                            break;
                        case 'tahun_lalu':
                            valid = rowDate >= startOfLastYear && rowDate <= endOfLastYear;
                            break;
                        case 'custom':
                            if (tanggalMulai && tanggalAkhir) {
                                const startDate = new Date(tanggalMulai);
                                const endDate = new Date(tanggalAkhir);

                                valid = rowDate >= startDate && rowDate <= endDate;
                            }
                    }
                }

                // Filter by titik
                if (titikValue && titikValue !== '') {
                    valid = valid && rowTitik === $('#titik option:selected').text();
                }

                return valid;
            });

            table.draw();

        });
    </script>
@endpush


@section('content')
    @include('components.navbar')

    @include('components.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sensors Report</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboardPage') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Sensors-Report</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pt-3">

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center pe-2">
                                        <select name="filter" id="filter" class="form-select">
                                            <option value="hari_ini">Today</option>
                                            <option value="kemarin">Yesterday</option>
                                            <option value="bulan_ini">This Month</option>
                                            <option value="bulan_lalu">Last Month</option>
                                            <option value="tahun_ini">This Year</option>
                                            <option value="tahun_lalu">Last Year</option>
                                            <option value="all">All</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <select name="titik" id="titik" class="form-select">
                                            <option value="" disabled selected>Choose Point</option>
                                            <option value="">All</option>
                                            @forelse ($dataTitik as $index =>$data)
                                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                            @empty
                                                <option value="" disabled>No Point Available</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-1 border tanggal" id="tanggal">
                                    <span id="filter-display"></span>
                                </div>
                            </div>
                            <div class="row mb-3" id="custom-input" style="display: none;">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table data-table table-striped table-hover border table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Point Name</th>
                                            <th scope="col">Water Turbidity</th>
                                            <th scope="col">Water pH</th>
                                            <th scope="col">Water Temperature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataSensor as $index => $data)
                                            <tr>
                                                <td>
                                                    <a href="" class="link-primary" data-bs-toggle="modal"
                                                        data-bs-target="#detail{{ $data->id }}">
                                                        {{ $data->id }}
                                                    </a>
                                                </td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>{{ $data->titik->nama }}</td>
                                                <td>{{ $data->turbidity }}</td>
                                                <td>{{ $data->ph }}</td>
                                                <td>{{ $data->temperature }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- @foreach ($dataBilling as $index => $data)
        @php
            \Carbon\Carbon::setLocale('id');
            $jamMulai = \Carbon\Carbon::parse($data->jam_mulai)->isoFormat('dddd, DD MMMM YYYY | HH:mm:ss');
            $jamSelesai = \Carbon\Carbon::parse($data->jam_selesai)->isoFormat('dddd, DD MMMM YYYY | HH:mm:ss');
        @endphp
        <div class="modal fade" id="detail{{ $data->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Detail Billing</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID Billing</td>
                                    <td>{{ $data->id }}</td>
                                </tr>
                                <tr>
                                    <td>Lapangan</td>
                                    <td>{{ $data->lapangan->jenis_lapangan->jenis_lapangan }} | {{ $data->lapangan->nama_lapangan }}</td>
                                </tr>
                                <tr>
                                    <td>Paket Lapangan</td>
                                    <td>{{ $data->paket_lapangan->nama_paket }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Mulai</td>
                                    <td>{{ $jamMulai }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Selesai</td>
                                    <td>{{ $jamSelesai }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <span class="badge {{ $data->status != 'selesai' ? 'bg-warning' : 'bg-success' }} text-white">{{ $data->status }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>{{ $data->catatan ?? 'Tidak ada catatan tersimpan' }}</td>
                                </tr>
                                <tr>
                                    <td>Total Biaya</td>
                                    <td>{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-main">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    @include('components.footer')
@endsection
