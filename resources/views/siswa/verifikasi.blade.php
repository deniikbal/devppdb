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
                    <a href="{{route('printkartu',$student->id)}}" target="_blank" class="btn btn-danger
                    {{$student->verifikasi_bayar==0 ? 'disabled':''}}">Unduh Kartu Peserta</a>
                    <a href="{{route('printformulir',$student->id)}}" target="_blank" class="btn btn-dark
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

    <div class="mt-3">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Riwayat Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Orang Tua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#alamat" role="tab" aria-controls="alamat" aria-selected="false">Alamat Rumah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#prestasi" role="tab" aria-controls="prestasi" aria-selected="false">Prestasi</a>
            </li>
        </ul>
        <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item bg-lightblue">NISN : {{$student->nisn}}</li>
                                    <li class="list-group-item bg-lightblue">Asal Sekolah : {{$student->asal_sekolah}}</li>
                                    <li class="list-group-item bg-lightblue">NPSN : {{$student->npsn}}</li>
                                    <li class="list-group-item bg-lightblue">Provinsi : {{$student->provinsi_sekolah}}</li>
                                    <li class="list-group-item bg-lightblue">Kabupaten : {{$student->kabupaten_sekolah}}</li>
                                    <li class="list-group-item bg-lightblue">Kecamatan : {{$student->kecamatan_sekolah}}</li>
                                    <li class="list-group-item bg-lightblue">Desa : {{$student->desa_sekolah}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <li class="list-group-item bg-lightblue">No Kartu Keluarga : {{$student->nokk}}</li>
                                <li class="list-group-item bg-lightblue">Nama Ayah : {{$student->namaayah}}</li>
                                <li class="list-group-item bg-lightblue">NIK Ayah : {{$student->nikayah}}</li>
                                <li class="list-group-item bg-lightblue">Tahun Lahir Ayah : {{$student->tahun_ayah}}</li>
                                <li class="list-group-item bg-lightblue">Pendidikan Ayah : {{$student->pendidikan_ayah}}</li>
                                <li class="list-group-item bg-lightblue">Pekerjaan Ayah : {{$student->pekerjaan_ayah}}</li>
                                <li class="list-group-item bg-lightblue">Penghasilan Ayah : {{$student->penghasilan_ayah}}</li>

                            </div>
                            <div class="col-sm-6">
                                <ul class="list-group">

                                    <li class="list-group-item bg-lightblue">Nama Ibu : {{$student->nama_ibu}}</li>
                                    <li class="list-group-item bg-lightblue">NIK Ibu : {{$student->nik_ibu}}</li>
                                    <li class="list-group-item bg-lightblue">Tahun Lahir Ibu : {{$student->tahun_ibu}}</li>
                                    <li class="list-group-item bg-lightblue">Pendidikan Ibu : {{$student->pendidikan_ibu}}</li>
                                    <li class="list-group-item bg-lightblue">Pekerjaan Ibu : {{$student->pekerjaan_ibu}}</li>
                                    <li class="list-group-item bg-lightblue">Penghasilan Ibu : {{$student->penghasilan_ibu}}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-sm-6">
                        <li class="list-group-item bg-lightblue">Alamat : {{$student->alamat_pd}}</li>
                        <li class="list-group-item bg-lightblue">Jarak: {{$student->jarak}} Km<br> Waktu: {{$student->waktu}} Menit
                        </li>
                        <li class="list-group-item bg-lightblue">Desa : {{$student->desa_pd}}</li>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-group">

                            <li class="list-group-item bg-lightblue">Kecamatan : {{$student->kecamatan_pd}}</li>
                            <li class="list-group-item bg-lightblue">Kabupaten : {{$student->kota_pd}}</li>
                            <li class="list-group-item bg-lightblue">Provinsi : {{$student->provinsi_pd}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="prestasi" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card-body ">
                    <div class="container">
                        <table class="table">
                            <thead class="bg-danger text-white">
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
