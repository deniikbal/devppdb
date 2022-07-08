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
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="card card-body">
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah User</h6>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                        <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 badge badge-secondary"> User</h3>
                    </div>
                    <div class="chart-three">
                        <div id="flotChart6" class="flot-chart ht-30"></div>
                    </div><!-- chart-three -->
                </div>
            </div><!
        </div>
    </div>
@endsection
