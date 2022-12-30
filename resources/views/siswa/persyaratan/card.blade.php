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
    <div class="card bd-0 bd-md-x bd-md-y card-body mg-t-10 mb-2">
        <div class="media">
            <span class="tx-color-05"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open wd-60 ht-60"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Upload Persyaratan</h6>
                <p class="tx-color-05 mg-b-0">Silahkan Upload Ijazah SD, Kartu Keluarga dan Akte Lahir.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-danger d-flex justify-content-end">
            <a href="" class="btn btn-primary btn-outline-primary text-white"><i data-feather="refresh-cw"></i> Refresh</a>
        </div>
        <div class="card-body">
            <div class="container d-flex justify-content-center">
                <style type="text/css">
                    .tg  {border-collapse:collapse;border-spacing:0;}
                    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg .tg-0lax{text-align:left;vertical-align:center}
                </style>
                <table class="tg">
                    <thead>
                    <tr>
                        <th class="tg-0lax">
                            <span class="text-uppercase badge badge-primary font-weight-bold">Ijazah SD</span><br>
                            Upload ijazah SD dalam format file JPG,JPEG. Ijazah SD diperlukan untuk verifikasi data di aplikasi DAPODIK.
                        </th>
                        <th class="tg-0lax">
                            <a href="{{route('ijazah', $student->id)}}" class="btn btn-sm btn-danger">
                                <i data-feather="upload"></i> Upload</a>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#viewijazah{{$student->id}}">
                                <i data-feather="eye"></i> View</button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="tg-0lax" style="width: 500px">
                            <span class="text-uppercase badge badge-primary font-weight-bold">Kartu Keluarga</span><br>
                            Upload Kartu Keluarga dalam format file JPG,JPEG. Ijazah SD diperlukan untuk verifikasi data di aplikasi DAPODIK.
                        </td>
                        <td class="tg-0lax">
                            <a href="{{route('kk', $student->id)}}" class="btn btn-sm btn-danger">
                                <i data-feather="upload"></i> Upload</a>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#viewkk{{$student->id}}">
                                <i data-feather="eye"></i> View</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">
                            <span class="text-uppercase badge badge-primary font-weight-bold">Akte Lahir</span><br>
                            Upload Akte Lahir dalam format file JPG,JPEG. Ijazah SD diperlukan untuk verifikasi data di aplikasi DAPODIK.
                        </td>
                        <td class="tg-0lax">

                            <a href="{{route('akte', $student->id)}}" class="btn btn-sm btn-danger">
                                <i data-feather="upload"></i> Upload</a>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#viewakte{{$student->id}}">
                                <i data-feather="eye"></i> View</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @include('siswa.persyaratan.modal.viewijazah')
                @include('siswa.persyaratan.modal.viewkk')
                @include('siswa.persyaratan.modal.viewakte')
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{route('prestasi', $student)}}" class="btn btn-danger">
                <i data-feather="chevron-left"></i> Sebelumnya</a>
            <a href="{{route('verifikasisiswa', $student)}}" class="btn btn-primary {{$student->ijazah==Null ? 'disabled':''}}">
                Selanjutnya <i data-feather="chevron-right"></i></a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
        );
        const inputElement = document.querySelector('input[id="ijazah"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: `<span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1'
        });

        FilePond.setOptions({
            server: {
                url:'/upload/{{$student->id}}',
                headers : {
                    'X-CSRF-TOKEN':'{{csrf_token()}}',
                }
            }
        });
    </script>
@endsection


