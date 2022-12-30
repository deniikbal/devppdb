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
            <span class="tx-color-05"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture wd-60 ht-60"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Unggah Pasfoto</h6>
                <p class="tx-color-03 mg-b-0">Unggah pasfoto terbaru Anda sesuai dengan ketentuan.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10 shadow-sm">
        <div class="card-body ">
            <div class="row">
                <div class="col">
                    <p>Pasfoto yang diunggah harus memenuhi ketentuan sebagai berikut.</p>

                    <div class="row row-sm">
                        <div class="col-8">
                            <ul>
                                <li>Pasfoto harus <strong>berwarna</strong> dengan latar belakang polos berwarna apa saja.</li>
                                <li>File pasfoto bertipe <strong>JPG/JPEG/PNG</strong>.</li>
                                <li>Ukuran minimal file pasfoto adalah <strong>80 KB</strong>.</li>
                                <li>Ukuran maksimal file pasfoto adalah <strong>300 KB</strong>.</li>
                                <li>Orientasi pasfoto adalah <strong>vertikal/portrait</strong>.</li>
                                <li>Posisi badan dan kepala tegak sejajar menghadap kamera.</li>
                                <li>Kualitas foto harus tajam dan fokus.</li>
                                <li>Tidak ada bagian kepala yang terpotong dan wajah terlihat jelas.</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            @if($student->foto==null)
                            <img id="image" src="{{ asset('assets/img/pp.jpg') }}" style="width: 150px;height: 200px"
                                 class="img-thumbnail" alt="Responsive image">
                            @else
                                <img id="image" src="{{ asset('storage/' . $student->foto) }}" style="width: 150px;height: 200px"
                                     class="img-thumbnail" alt="Responsive image">
                            @endif
                        </div>
                    </div>

                    <p>Unggah pasfoto Anda pada form ini dan tekan tombol<strong>Unggah</strong>.
                        Kemudian lanjutkan ke langkah berikutnya untuk melakukan penyesuaian pasfoto.</p>
                    <form method="post" action="{{route('uploadphoto', $student)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="oldfile" value="{{ $student->foto }}">
                        <div class="form-group row">
                            <div class="col-12 col-md-10 col-sm-9">
                                <input name="foto" type="file" accept="image/x-png,image/jpeg,image/jpg"
                                       class="form-control @error('foto') is-invalid @enderror">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-2 col-sm-3 mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i data-feather="upload"></i> Unggah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="card-footer d-flex justify-content-between">
                <a href="{{route('editparent', $student)}}" class="btn btn-danger">
                    <i data-feather="chevron-left"></i> Sebelumnya</a>
                <a href="{{route('prestasi', $student)}}" class="btn btn-primary {{$student->foto==Null ? 'disabled':''}}">
                    Selanjutnya <i data-feather="chevron-right"></i></a>
            </div>
        </div>
    </div>
@endsection
