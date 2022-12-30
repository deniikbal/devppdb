@extends('layouts.student.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ADD PRESTASI</li>
                </ol>
            </nav>

        </div>
    </div>

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
            <span class="tx-color-05">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
            </span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Tambah Prestasi</h6>
                <p class="tx-black mg-b-0">Anda diperkenankan untuk mengisi hingga 3 prestasi. Hanya isikan prestasi yang menurut Anda merupakan yang terbaik.
                </p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10 shadow-sm">
        <div class="card-header bg-danger text-white">
            Prestasi Siswa
        </div>
        <div class="card-body ">
            <div class="container">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal"  {{$count===3 ? 'disabled':''}}>
                        <i data-feather="plus-square"></i> Add Prestasi
                    </button>
                </div>
                <table id="example2" class="table">
                    <thead class="table-danger">
                        <tr role="row">
                            <th >No</th>
                            <th >Nama Kegiatan</th>
                            <th >Jenis</th>
                            <th >Tingkat</th>
                            <th >Tahun</th>
                            <th >Pencapaian</th>
                            <th >Sertifikat</th>
                            <th >Aksi</th>
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
                            <td><button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#viewsertifikat{{$item->id}}">
                                    <i data-feather="eye"></i>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#prestasi{{$item->id}}">
                                    <i data-feather="edit"></i> Edit
                                </button>
                                <form onclick="confirm('Yakin Mau dihapus?')" style="display: inline-block" action="{{route('deleteprestasi', $item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                <button class="btn btn-danger btn-sm"><i data-feather="trash-2"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @include('siswa.modal.editprestasi')
                        @include('siswa.modal.viewsertifikat')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('siswa.modal.addprestasi')
        <div class="card-footer d-flex justify-content-between">
            <a href="{{route('editphoto', $student)}}" class="btn btn-danger">
                <i data-feather="chevron-left"></i> Sebelumnya</a>
            <a href="{{route('editcard', $student)}}" class="btn btn-primary">
                Selanjutnya <i data-feather="chevron-right"></i></a>
        </div>
    </div>
@endsection
