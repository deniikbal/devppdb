@extends('layouts.student.main')
@section('content')
    <div class="container">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DAFTAR SISWA BARU</li>
                </ol>
            </nav>
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                    <div>
                        <h5 class="mg-b-0 tx-color-02 tx-spacing--1 mt-3">Welcome,</h5>
                        <h3>{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                    </div>
                </div>
                <div class="alert alert-solid alert-secondary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>Selamat datang di web PPDB SMA TELKOM BANDUNG Tahun Ajaran 2023-2024,
                        Berikut Langkah-langkah pendaftaran Calon Siswa <strong>SMA TELKOM BANDUNG</strong></p>
                    <ol>
                        <li>Klik tombol Tambah Siswa Baru
                            @if($count==0)
                                <button type="button" class="btn btn-sm pd-x-15 btn-primary btn-xs btn-uppercase mg-l-5" data-toggle="modal" data-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file wd-10 mg-r-5">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg>
                                    Daftar Siswa Baru
                                </button>
                            @else
                                <button type="button" class="btn btn-sm pd-x-15 btn-warning btn-xs btn-uppercase mg-l-5" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file wd-10 mg-r-5">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg>
                                    Daftar Siswa Baru
                                </button>
                            @endif
                            Isi dengan nama calon siswa yang akan didaftarkan.
                        </li>
                        <li>Isi data siswa dengan mengklik <diV class="badge badge-danger"> Verifikasi Data Siswa dan Sekolah</diV>, harap di isi data siswa dengan
                            data sebenar-benarnya dan jika sudah terisi semua klik simpan permananen diakhir mengisi.
                        </li>
                        <li>Klik tombol <div class="badge badge-primary">Pembayaran Biaya Pendidikan</div>, upload bukti transfernya.</li>
                        <li>Jika pembayaran sudah diverifikasi Download file <div class="badge badge-dark">Kartu Peserta dan Kartu Formulir</div>
                        </li>
                    </ol>
                </div>
                <div class="row row-sm">
                    @foreach($students as $student)
                        <div class="col-sm-8 col-lg-4">
                            <div class="card card-body border-danger shadow-lg">
                                <h6 class="card-title mb-0">
                                    @if($student->verifikasi==1)
                                        <a href="{{route('verifikasisiswa', $student)}}" class="stretched-link text-black text-decoration-none">
                                            Verifikasi Data Siswa dan Sekolah</a>
                                    @else
                                        <a href="{{route('students.edit', $student)}}" class="stretched-link text-black text-decoration-none">
                                            Verifikasi Data Siswa dan Sekolah</a>
                                    @endif
                                </h6>
                                <table class="tg" style="undefined;table-layout: fixed; width: 300px">
                                    <colgroup>
                                        <col style="width: 131px">
                                        <col style="width: 25px">
                                        <col style="width: 127px">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="tg-0lax">Nama Siswa</td>
                                        <td class="tg-0lax">:</td>
                                        <td class="tg-0lax">{{$student->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="tg-0lax">No Pendaftaran</td>
                                        <td class="tg-0lax">:</td>
                                        <td class="tg-0lax">{{$student->nodaftar}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="col-sm-8 col-lg-4">
                            <div class="card card-body border-danger shadow-lg">
                                <h6 class="card-title mb-0">
                                    <a href="{{route('payments', $student)}}" class="stretched-link text-black text-decoration-none">
                                        Pembayaran Biaya Pendidikan</a>

                                </h6>
                                <table class="tg" style="undefined;table-layout: fixed; width: 300px">
                                    <colgroup>
                                        <col style="width: 131px">
                                        <col style="width: 25px">
                                        <col style="width: 127px">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="tg-0lax">Nama Siswa</td>
                                        <td class="tg-0lax">:</td>
                                        <td class="tg-0lax">{{$student->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="tg-0lax">No Pendaftaran</td>
                                        <td class="tg-0lax">:</td>
                                        <td class="tg-0lax">{{$student->nodaftar}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    @include('siswa.modal.createstudent')
@endsection
