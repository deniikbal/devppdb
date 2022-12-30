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
                <h6 class="mg-b-10">Verifikasi Data Riwayat Sekolah Terakhir</h6>
                <p class="tx-color-05 mg-b-0">Periksa dengan seksama dan data sekolah terakhir Anda di laman ini. Jika terdapat kesalahan data, lakukan perbaikan.
                    Siswa dengan status aktif atau belum lulus mohon untuk menghubungi pihak sekolah untuk melakukan perbaikan data. Untuk siswa yang telah lulus dapat melakukan perbaikan data di <a href="http://nisn.data.kemdikbud.go.id">http://nisn.data.kemdikbud.go.id</a> dan memilih menu verifikasi dan validasi lulusan.
                    Setelah perbaikan data dilakukan Anda dapat menekan tombol <strong>Perbarui Data</strong> untuk memperbarui data Anda di laman ini.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">Riwayat Sekolah</div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('updatesekolah', $student->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NISN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                   type="text" value="{{ $student->nisn===null ? old('nisn') : $student->nisn }}">
                            @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Asal Sekolah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control select2" name="asal_sekolah" required>
                                <option value="">--Pilih--</option>
                            @foreach($schools as $item)
                                <option value="{{$item->name}}"{{ $item->name==old('asal_sekolah',$student->asal_sekolah) ? 'selected' : '' }}>{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NPSN Sekolah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('npsn') is-invalid @enderror" name="npsn"
                                   type="text" value="{{ $student->npsn===null ? old('npsn') : $student->npsn }}">
                            @error('npsn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi SMP/MTs: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('provinsi_sekolah') is-invalid @enderror" name="provinsi_sekolah"
                                   type="text" value="{{ $student->provinsi_sekolah===null ? old('provinsi_sekolah') : $student->provinsi_sekolah }}">
                            @error('provinsi_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-3 col-form-label">Kabupaten SMP/MTs: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('kabupaten_sekolah') is-invalid @enderror" name="kabupaten_sekolah"
                                   type="text" value="{{ $student->kabupaten_sekolah===null ? old('kabupaten_sekolah') : $student->kabupaten_sekolah }}">
                            @error('kabupaten_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan SMP/MTs: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('kecamatan_sekolah') is-invalid @enderror" name="kecamatan_sekolah"
                                   type="text" value="{{ $student->kecamatan_sekolah===null ? old('kecamatan_sekolah') : $student->kecamatan_sekolah }}">
                            @error('kecamatan_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-3 col-form-label">Desa / Kelurahan SMP/MTs: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('desa_sekolah') is-invalid @enderror" name="desa_sekolah"
                                   type="text" value="{{ $student->desa_sekolah===null ? old('desa_sekolah') : $student->desa_sekolah }}">
                            @error('desa_sekolah')
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
            <a href="{{route('students.edit', $student)}}" class="btn btn-danger">
                <i data-feather="chevron-left"></i> Sebelumnya</a>
            <a href="{{route('editparent', $student)}}" class="btn btn-primary {{$student->nisn==Null ? 'disabled':''}}">
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
