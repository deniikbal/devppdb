@extends('layouts.student.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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

    <div class="card  bd-0 bd-md-x bd-md-y card-body mg-t-10 mb-2 bg-light">
        <div class="media">
            <span class="tx-color-05"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check wd-60 ht-60"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Verifikasi dan Melengkapi Data Pribadi</h6>
                <p class="tx-color-03 mg-b-0">- Periksa dengan seksama dan lengkapi data pribadi di laman ini. Jika terdapat
                    kesalahan data
                    <strong>nama</strong>, <strong>tempat lahir</strong>, <strong>tanggal lahir</strong>, dan <strong>jenis
                        kelamin</strong>, hanya dapat dilakukan perbaikan data di Dapodik melalui operator sekolah.
                </p>
                <p class="tx-color-03 mg-b-0">- Siswa dengan status aktif atau belum lulus mohon untuk menghubungi pihak
                    sekolah
                    untuk melakukan perbaikan data. Untuk siswa yang telah lulus dapat melakukan perbaikan data di <a href="http://nisn.data.kemdikbud.go.id">http://nisn.data.kemdikbud.go.id</a> dan memilih menu verifikasi
                    dan validasi lulusan.
                </p>
                <p class="tx-color-03 mg-b-0">- Setelah perbaikan data dilakukan Anda dapat menekan tombol <strong>Perbarui
                        Data</strong> untuk memperbarui
                    data Anda di laman ini. <span class="tx-danger">Jangan melakukan simpan permanen sebelum semua data yang
              tercantum benar</span>.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">Data Pribadi</div>
        <div class="card-body">
            <div class="container">
            <form action="{{route('student.profile', $student)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                    <div class="col-sm-6">
                        <input id="name" class="form-control" name="name" value="{{$student->name}}" type="text">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin: <span class="tx-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                            <option value="">--Pilih--</option>
                            @foreach($jenis_kelamin as $item)
                                <option
                                    value="{{$item}}" {{$item== old('jenis_kelamin',$student->jenis_kelamin) ? 'selected' : ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir: <span class="tx-danger">*</span></label>
                    <div class="col-sm-4">
                        <input id="lastname" class="form-control @error('tempat') is-invalid @enderror"  name="tempat"
                               type="text" value="{{old('tempat',$student->tempat)}}">
                        @error('tempat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir: <span class="tx-danger">*</span></label>
                    <div class="col-sm-4">
                        <input id="lastname" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                               type="date" value="{{ old('tanggal',$student->tanggal)}}">
                        @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK: <span class="tx-danger">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control @error('nik') is-invalid @enderror" name="nik" type="text"
                               value="{{ old('nik',$student->nik)}}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama: <span class="tx-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control select2 @error('agama') is-invalid @enderror" name="agama" id="">
                            <option value="">--Pilih--</option>
                            @foreach($agama as $item)
                                <option
                                    value="{{$item}}" {{$item== old('agama',$student->agama) ? 'selected' : ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No HP: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('nohp_siswa') is-invalid @enderror" name="nohp_siswa"
                               type="text" value="{{ $student->nohp_siswa===null ? old('nohp_siswa') : $student->nohp_siswa }}">
                        @error('nohp_siswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anak Ke-: <span class="tx-danger">*</span></label>
                    <div class="col-sm-1">
                        <input class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"
                               type="text" value="{{ $student->anak_ke===null ? old('anak_ke') : $student->anak_ke }}">
                        @error('anak_ke')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">Jumlah Saudara: <span class="tx-danger">*</span></label>
                    <div class="col-sm-1">
                        <input class="form-control @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara"
                               type="text" value="{{ $student->jumlah_saudara===null ? old('jumlah_saudara') : $student->jumlah_saudara }}">
                        @error('jumlah_saudara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tinggi Badan: <span class="tx-danger">*</span></label>
                    <div class="col-sm-1">
                        <input class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan"
                               type="text" value="{{ $student->tinggi_badan===null ? old('tinggi_badan') : $student->tinggi_badan }}">
                        @error('tinggi_badan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">Berat Badan: <span class="tx-danger">*</span></label>
                    <div class="col-sm-1">
                        <input class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan"
                               type="text" value="{{ $student->berat_badan===null ? old('berat_badan') : $student->berat_badan }}">
                        @error('berat_badan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hoby: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control select2 @error('hoby') is-invalid @enderror" name="hoby" id="">
                            <option value="">--Pilih--</option>
                            @foreach($hoby as $item)
                                <option
                                    value="{{$item}}" {{$item== old('hoby',$student->hoby) ? 'selected' : ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        @error('hoby')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">Cita - Cita: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control select2 @error('cita') is-invalid @enderror" name="cita" id="">
                            <option value="">--Pilih--</option>
                            @foreach($cita as $item)
                                <option
                                    value="{{$item}}" {{$item== old('cita',$student->cita) ? 'selected' : ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        @error('cita')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-3">
                        <button class="btn btn-success" type="submit">
                            <i data-feather="save"></i> Simpan Perubahan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{route('students.index')}}" class="btn btn-danger">
                <i data-feather="chevron-left"></i> Home</a>
            <a href="{{route('editsekolah', $student)}}" class="btn btn-primary {{$student->nik==Null ? 'disabled':''}}">
                Selanjutnya <i data-feather="chevron-right"></i></a>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap",
            });
        });
    </script>
@endsection

