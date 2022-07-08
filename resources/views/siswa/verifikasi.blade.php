@extends('layouts.student.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">VERIFIKASI DATA CALON PENDAFTAR</li>
                </ol>
            </nav>

        </div>
    </div>

    @if($student->verifikasi==1)
        <div class="card card-body tx-white bg-success">
            <div class="media">
                <span class="tx-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle wd-60 ht-60"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
                <div class="media-body mg-l-20">
                    <h6 class="mg-b-10 tx-white tx-bold">Data siswa telah terverifikasi</h6>
                    <p class="tx-white-03 mg-b-0">Anda telah melakukan simpan permanen pada {{Carbon\Carbon::parse($student->updated_at)->IsoFormat('DD MMMM YYYY')}} {{Carbon\Carbon::parse($student->updated_at)->Format('H:i:s')}}.
                        Silahkan unduh bukti permanen.
                    </p>
                    <a href="{{route('printkartu',$student)}}" target="_blank" class="btn btn-danger
                    {{$student->verifikasi_bayar==0 ? 'disabled':''}}">Unduh Kartu Peserta</a>
                    <a href="{{route('printformulir',$student)}}" target="_blank" class="btn btn-dark
                    {{$student->verifikasi_bayar==0 ? 'disabled':''}}">Unduh Formulir</a>
                </div>
            </div><!-- media -->
        </div>
    @else
    <div class="card card-body tx-white bg-warning mb-2">
        <div class="media">
            <span class="tx-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle wd-60 ht-60">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
            </span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10 tx-white tx-bold">Data siswa belum terverifikasi</h6>
                <p class="tx-white-03 mg-b-0">Anda belum melakukan simpan permanen. Mohon memeriksa dan mengisikan data dengan
                    seksama dan pastikan data Anda sudah benar sebelum melakukan simpan permanen.</p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card card-body mg-t-10 mb-2 bg-light">
        <div class="media">
            <span class="tx-color-05"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle wd-60 ht-60"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Konfirmasi Akhir dan Simpan Permanen</h6>
                <p class="tx-color-03 mg-b-0"><strong>Periksa dengan seksama data Anda sebelum melakukan Simpan Permanen. Pastikan isian data sudah benar karena setelah dilakukan Simpan Permanen maka data tidak dapat diubah kembali.</strong> Jika masih
                    terdapat kesalahan lakukan perbaikan terlebih dahulu.
                    Pilih tombol <strong>Simpan Permanen</strong> jika sudah yakin. <br><br>
                </p>
            </div>
        </div>
    </div>
    @endif
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10 mb-2">
        <div class="card-header bg-danger text-white">
            Data Pribadi oke
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-sm-center">
                        @if($student->foto==null)
                            <img src="{{ asset('assets/img/pp.jpg') }}" style="width: 150px;height: 200px" class="img-thumbnail">
                        @else
                            <img src="{{asset('storage/'. $student->foto)}}" width="200" height="300" alt="Foto">
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item bg-lightblue">Nama Lengkap : {{$student->name}}</li>
                        <li class="list-group-item bg-lightblue">Jenis Kelamin : {{$student->jenis_kelamin}}</li>
                        <li class="list-group-item bg-lightblue">Tempat Lahir : {{$student->tempat}}</li>
                        <li class="list-group-item bg-lightblue">Tanggal Lahir : {{\Carbon\Carbon::parse($student->tanggal)->isoFormat('D MMMM Y')}}</li>
                        <li class="list-group-item bg-lightblue">NIK : {{$student->nik}}</li>
                        <li class="list-group-item bg-lightblue">Agama : {{\Illuminate\Support\Str::title($student->agama)}}</li>
                        <li class="list-group-item bg-lightblue">No HP : {{$student->nohp_siswa}}</li>

                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-group">
                        <li class="list-group-item bg-lightblue">Anak Ke : {{$student->anak_ke}}</li>
                        <li class="list-group-item bg-lightblue">Jumlah Saudara : {{$student->jumlah_saudara}}</li>
                        <li class="list-group-item bg-lightblue">Tinggi Badan : {{$student->tinggi_badan}}</li>
                        <li class="list-group-item bg-lightblue">Berat Badan : {{$student->berat_badan}}</li>
                        <li class="list-group-item bg-lightblue">Hoby : {{$student->hoby}}</li>
                        <li class="list-group-item bg-lightblue">Cita-cita : {{$student->cita}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10 mb-2">
        <div class="card-header text-white bg-danger">
            Riwayat Sekolah
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-9">
                        <ul class="list-group">
                            <li class="list-group-item bg-lightblue">NISN : {{$student->nisn}}</li>
                            <li class="list-group-item bg-lightblue">Asal Sekolah : {{$student->asal_sekolah}}</li>
                            <li class="list-group-item bg-lightblue">NPSN : {{$student->tinggi_badan}}</li>
                            <li class="list-group-item bg-lightblue">Provinsi : {{$student->berat_badan}}</li>
                            <li class="list-group-item bg-lightblue">Kabupaten : {{$student->hoby}}</li>
                            <li class="list-group-item bg-lightblue">Kecamatan : {{$student->cita}}</li>
                            <li class="list-group-item bg-lightblue">Desa : {{$student->cita}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10 mb-2">
        <div class="card-header text-white bg-danger">
            Data Orang Tua
        </div>
        <div class="card-body">
            <div class="container">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Kartu Keluarga: Oke</label>
                    <div class="col-sm-3">
                        <input id="name" class="form-control" value="{{$student->nokk}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Ayah:</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="namaayah"
                               value="{{$student->namaayah}}" type="text" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">NIK Ayah: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('nikayah') is-invalid @enderror" name="nikayah"
                               value="{{$student->nikayah}}" type="text" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Lahir Ayah: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->tahun_ayah}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Pendidikn Ayah: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->pendidikan_ayah}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan Ayah: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->pekerjaan_ayah}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Penghasilan Ayah: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->penghasilan_ayah}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->nama_ibu}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">NIK Ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->nik_ibu}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Lahir Ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->tahun_ibu}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Pendidikn Ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->pendidikan_ibu}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan Ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->pekerjaan_ibu}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Penghasilan Ibu: <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control @error('tahun_ayah') is-invalid @enderror" name="tahun_ayah"
                               value="{{$student->penghasilan_ibu}}" readonly>
                    </div>
                </div>
                <hr>
                <div class="divider-text" style="color: red;font-size: medium">Alamat Rumah</div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-3">
                            <textarea name="alamat_pd" class="form-control" readonly
                                      rows="2" style="height: 100px">{{ $student->alamat_pd }}</textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4">Jarak Rumah Ke Sekolah</label>
                        <input type="text" class="form-control @error('jarak')
                            is-invalid @enderror" name="jarak" value="{{$student->jarak}}" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4">Waktu</label>
                        <input type="text" readonly class="form-control" name="waktu" value="{{$student->waktu}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desa / Kelurahan : <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('desa_pd') is-invalid @enderror"
                               name="desa_pd" value="{{$student->desa_pd}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Kecamatan : <span class="tx-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('kecamatan_pd') is-invalid @enderror"
                               name="kecamatan_pd" value="{{$student->kecamatan_pd}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('kota_pd') is-invalid @enderror"
                               name="kota_pd" value="{{$student->kota_pd}}" readonly>
                    </div>
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('provinsi_pd') is-invalid @enderror"
                               name="provinsi_pd" value="{{$student->provinsi_pd}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10">
        <div class="card-header text-white bg-danger">
            Prestasi Siswa

        </div>
        <div class="card-body ">
            <div class="container">
                <table class="table">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" rowspan="1" colspan="1" style="width: 0px;" aria-label="No">No</th>
                        <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Nama Kegiatan: activate to sort column ascending">Nama
                            Kegiatan</th>
                        <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Jenis: activate to sort column ascending">Jenis</th>
                        <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Tingkat: activate to sort column ascending">Tingkat</th>
                        <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Tahun: activate to sort column ascending">Tahun</th>
                        <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Pencapaian: activate to sort column ascending">Pencapaian
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($prestasi as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</a></td>
                            <td>{{$item->nama_kegiatan}}</td>
                            <td>{{$item->jenis_kegiatan}}</td>
                            <td>{{$item->tingkat}}</td>
                            <td>{{$item->tahun}}</td>
                            <td>{{$item->hasil}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($student->verifikasi==1)

    @else
        <div class="card bd-0 bd-md-x bd-md-y mg-t-10">
            <div class="card-body ">
                <form method="post" action="{{route('confirm', $student)}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="verifikasi" value="1">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="pernyataan" class="custom-control-input" id="check-pernyataan" required>
                        <label class="custom-control-label tx-medium" for="check-pernyataan">Saya menyatakan bahwa data yang saya
                            isikan dalam borang ini adalah BENAR. Saya bersedia menerima sanksi pembatalan keikutsertaan pada tes AKADEMIK PPDB
                            SMA TELKOM BANDUNG apabila data yang saya isikan TIDAK BENAR.</label>
                    </div>
                    <div class="row justify-content-md-center mg-t-20">
                        <div class="col-md-6">
                            <a href="#modal-confirm" class="btn btn-lg btn-success btn-block" data-toggle="modal">Simpan Permanen</a>
                        </div>
                    </div>
                    <div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content tx-14">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="label-modal-confirm">Simpan Permanen</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="mg-b-0">Apakah Anda yakin akan melakukan simpan permanen? <span class="tx-danger">Pastikan
                                    data yang telah Anda isikan telah diperiksa dengan benar</span>.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary tx-13">Ya, simpan permanen</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @include('siswa.modal.addprestasi')
            <div class="card-footer d-flex justify-content-between">
                <a href="{{route('prestasi', $student)}}" class="btn btn-danger">
                    <i data-feather="chevron-left"></i> Sebelumnya</a>
            </div>
        </div>
    @endif
@endsection
