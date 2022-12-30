@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row row-xs">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Siswa</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$jumlahsiswa}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="badge badge-danger">Siswa</span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart3" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Lulus</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 badge badge-success"> Siswa</h3>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart4" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Tidak Lulus</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 badge badge-danger"> Siswa</h3>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart5" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
            </div><!-- col -->
            @php
            $user = \App\Models\User::where('role', '=', 'siswa')->get();
            $countuser = $user->count();
            @endphp
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah User</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$countuser}}</h3>
                        <p class="tx-11 tx-color-03 mg-b-0"><span class="badge badge-danger">User</span></p>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart6" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-xs">
            <div class="col-sm-4 mt-10">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 mt-10">
                <div class="card">
                    <div class="card-body">
                        <canvas id="BarChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
        //setup
        const data = {
            labels: [
                'Perempuan',
                'Laki-laki',
            ],
            datasets: [{
                label: 'Jenis Kelamin',
                data: [
                    @foreach($gender as $gen)
                        {{$gen}},
                    @endforeach
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        };
        //Config doughnut
        const config = {
            type: 'doughnut',
            data,
            options : {
                plugins: {
                    datalabels:{
                        color: 'dark',
                    }
                }
            },
            plugins: [ChartDataLabels],
        };
        //Render donat
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        //setup Bar
        const data2 = {
            labels: [
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
            ],
            datasets: [{
                label: 'Pendaftar Tahun 2021',
                data: [7,19,27,31,59,91,48,55,26,65,178,32],
                backgroundColor: 'rgb(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Pendaftar Tahun 2022',
                data: [@foreach($daftar as $daf)
                    {{$daf->data}},
                    @endforeach,],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
                }
                ]};
        //config bar
        const config2 = {
            type: 'bar',
            data:data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    datalabels:{
                        color: 'blue',
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        //Render bar chart
        const BarChart = new Chart(
            document.getElementById('BarChart'),
            config2
        );
    </script>
@endsection


