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
                <h6 class="mg-b-10">Verifikasi Data Orang Tua</h6>
                <p class="tx-color-06 mg-b-0">Lengkapi Data Orang Tua dengan benar sesuai data yang ada di kartu
                keluarga.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">Data Orang Tua</div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('updateparent', $student->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Kartu Keluarga: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input id="name" class="form-control @error('nokk') is-invalid @enderror" name="nokk"
                                   value="{{$student->nokk===null ? old('nokk') : $student->nokk }}" type="text">
                            @error('nokk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('namaayah') is-invalid @enderror" name="namaayah"
                                   value="{{$student->namaayah===null ? old('namaayah') : $student->namaayah }}" type="text">
                            @error('namaayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">NIK Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('nikayah') is-invalid @enderror" name="nikayah"
                                   value="{{$student->nikayah===null ? old('nikayah') : $student->nikayah }}" type="text">
                            @error('nikayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun Lahir Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                                   value="{{$student->tahun_ayah===null ? old('tahun_ayah') : $student->tahun_ayah }}" type="text">
                            @error('tahun_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Pendidikn Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('pendidikan_ayah') is-invalid @enderror" name="pendidikan_ayah">
                                <option value="">--Pilih--</option>
                                @foreach($pendidikan as $item)
                                    <option value="{{$item}}" {{$item== old('pendidikan_ayah',$student->pendidikan_ayah) ? 'selected' : ''}}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pekerjaan Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah">
                                <option value="">--Pilih--</option>
                                @foreach($pekerjaan as $item)
                                    <option value="{{$item}}" {{ $item==old('pekerjaan_ayah',$student->pekerjaan_ayah) ? 'selected' : '' }}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('nokk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Penghasilan Ayah: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('penghasilan_ayah') is-invalid @enderror" name="penghasilan_ayah">
                                <option value="">--Pilih--</option>
                                @foreach($penghasilan as $item)
                                    <option value="{{$item}}" {{ $item==old('penghasilan_ayah',$student->penghasilan_ayah) ? 'selected' : '' }}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('penghasilan_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                                   value="{{$student->nama_ibu===null ? old('nama_ibu') : $student->nama_ibu }}" type="text">
                            @error('nama_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">NIK Ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('nik_ibu') is-invalid @enderror" name="nik_ibu"
                                   value="{{$student->nik_ibu===null ? old('nik_ibu') : $student->nik_ibu}}" type="text">
                            @error('nik_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun Lahir Ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control @error('tahun_ibu') is-invalid @enderror" name="tahun_ibu"
                                   value="{{$student->tahun_ibu===null ? old('tahun_ibu') : $student->tahun_ibu }}" type="text">
                            @error('tahun_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Pendidikn Ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('pendidikan_ibu') is-invalid @enderror" name="pendidikan_ibu">
                                <option value="">--Pilih--</option>
                                @foreach($pendidikan as $item)
                                    <option value="{{$item}}" {{$item== old('pendidikan_ibu',$student->pendidikan_ibu) ? 'selected' : ''}}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pekerjaan Ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu">
                                <option value="">--Pilih--</option>
                                @foreach($pekerjaan as $item)
                                    <option value="{{$item}}" {{$item== old('pekerjaan_ibu',$student->pekerjaan_ibu) ? 'selected' : ''}}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('pekerjaan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Penghasilan Ibu: <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control @error('penghasilan_ibu') is-invalid @enderror" name="penghasilan_ibu">
                                <option value="">--Pilih--</option>
                                @foreach($penghasilan as $item)
                                    <option value="{{$item}}" {{$item== old('penghasilan_ibu',$student->penghasilan_ibu) ? 'selected' : ''}}>
                                        {{$item}}</option>
                                @endforeach
                            </select>
                            @error('penghasilan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="divider-text" style="color: red;font-size: medium">Alamat Rumah</div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-3">
                            <textarea name="alamat_pd" class="form-control @error('alamat_pd') is-invalid @enderror"
                                      rows="2" style="height: 100px">{{ $student->alamat_pd }}</textarea>
                            @error('alamat_pd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4">Jarak Rumah Ke Sekolah</label>
                            <input type="text" class="form-control @error('jarak')
                                is-invalid @enderror" name="jarak" value="{{$student->jarak===null ? old('jarak') : $student->jarak }}"
                                   placeholder="Satuan Km">
                            @error('jarak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4">Waktu</label>
                            <input type="text" class="form-control @error('waktu')
                                is-invalid @enderror" name="waktu" value="{{$student->waktu===null ? old('waktu') : $student->waktu }}"
                                   placeholder="Satuan Menit">
                            @error('waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Desa / Kelurahan : <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('desa_pd') is-invalid @enderror"
                                   name="desa_pd" value="{{$student->desa_pd===null ? old('desa_pd') : $student->desa_pd }}">
                            @error('desa_pd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Kecamatan : <span class="tx-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('kecamatan_pd') is-invalid @enderror"
                                   name="kecamatan_pd" value="{{$student->kecamatan_pd===null ? old('kecamatan_pd') : $student->kecamatan_pd }}">
                            @error('kecamatan_pd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('kota_pd') is-invalid @enderror"
                                   name="kota_pd" value="{{$student->kota_pd===null ? old('kota_pd') : $student->kota_pd }}">
                            @error('kota_pd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('provinsi_pd') is-invalid @enderror"
                                   name="provinsi_pd" value="{{$student->provinsi_pd===null ? old('provinsi_pd') : $student->provinsi_pd }}">
                            @error('provinsi_pd')
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
            <a href="{{route('editphoto', $student)}}" class="btn btn-primary {{$student->nokk==Null ? 'disabled':''}}">
                Selanjutnya <i data-feather="chevron-right"></i></a>
        </div>
    </div>
@endsection
