@extends('layouts.student.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DAFTAR SISWA BARU</li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="card card-body tx-white bg-warning mb-2">
        <div class="media">
            <span class="tx-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle wd-60 ht-60"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10 tx-white tx-bold">Data siswa belum terverifikasi</h6>
                <p class="tx-white-03 mg-b-0">Anda belum melakukan simpan permanen. Mohon memeriksa dan mengisikan data dengan
                    seksama dan pastikan data Anda sudah benar sebelum melakukan simpan permanen.</p>
            </div>
        </div><!-- media -->
    </div>

    <div class="card card-body mg-t-10 mb-2">
        <div class="media">
            <span class="tx-color-04"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture wd-60 ht-60"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Unggah Pasfoto</h6>
                <p class="tx-color-03 mg-b-0">Unggah pasfoto terbaru Anda sesuai dengan ketentuan.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10  mb-5">
        <div class="card-header">
            Prestasi Siswa

        </div>
        <div class="card-body ">
            <div class="container">
                <div class="d-flex justify-content-center">
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;}
                .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                .tg .tg-0lax{text-align:left;vertical-align:top}
            </style>
            <table class="tg mb-5">
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tg-0lax">File Akte Lahir</td>
                    <td class="tg-0lax">
                        <button class="btn btn-danger">Upload</button>
                        <button class="btn btn-danger">View</button>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0lax">File oke</td>
                    <td class="tg-0lax">
                        <button class="btn btn-danger">Upload</button>
                        <button class="btn btn-danger">View</button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{route('editphoto', $student)}}" class="btn btn-danger">
                <i data-feather="chevron-left"></i> Sebelumnya</a>
            <a href="{{route('files', $student)}}" class="btn btn-primary">
                Selanjutnya <i data-feather="chevron-right"></i></a>
        </div>
    </div>
@endsection
