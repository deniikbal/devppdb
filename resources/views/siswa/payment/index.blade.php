@extends('layouts.student.main')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ADD PEMBAYARAN</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="card card-body mg-t-10 mb-2" style="background: #F5C6CB">
            <div class="media">
            <span class="tx-color-05">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </span>
                <div class="media-body mg-l-20">
                    <h6 class="mg-b-10">Tambah Pembayaran</h6>
                    <p class="tx-black mg-b-0">Silahkan menambahkan data pembayaran yang sudah dilakukan disertai dengan menguplod bukti pembayaran</p>
                </div>
            </div><!-- media -->
        </div>
        <div class="card bd-0 bd-md-x bd-md-y mg-t-10">
            <div class="card-header bg-danger text-white text-2xl">
                Tambah Pembayaran
            </div>
            <div class="card-body ">
                <div class="container">
                    <div class="d-flex justify-content-end mb-3">

                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#tambahbayar">
                            <i data-feather="plus-square"></i> Add Bayar
                        </button>

                    </div>
                </div>
                <table id="example2" class="table">
                    <thead class="table-danger">
                    <tr role="row">
                        <th >No</th>
                        <th >Id Pembayaran</th>
                        <th >Pembayaran</th>
                        <th >Nominal</th>
                        <th >Tanggal</th>
                        <th >Jenis Bayar</th>
                        <th >Bukti Bayar</th>
                        {{-- <th >Kwitansi</th> --}}
                        <th >Verifikasi</th>
                        <th >Send WhatsApp</th>
                        <th >Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($payment as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</a></td>
                            <td>{{$item->id_bayar}}</td>
                            <td>
                                <span class="badge badge-{{$item->jenis_pembayaran=='tdu'?'danger':'primary'}}">{{\Illuminate\Support\Str::upper($item->jenis_pembayaran)}}</span><br>
                                <span class="badge badge-info">{{$item->keterangan}}</span>
                            </td>
                            <td>@currency($item->nominal)</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y')}}</td>
                            <td>{{\Illuminate\Support\Str::upper($item->jenis_bayar)}}</td>
                            <td><button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#viewsertifikat{{$item->id}}">
                                    <i data-feather="eye"></i></button>
                            </td>
                            {{-- <td>
                                <a href="{{route('kwitansi',$item->id)}}" class="badge badge-danger">Kwitansi</a>
                            </td> --}}
                            <td>
                                @if($item->verifikasi==0)
                                    <span class="badge badge-warning">Belum Verifikasi</span>
                                @else
                                    <span class="badge badge-success">Verifikasi</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#sendwa{{$item->id}}">Send Wa</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editbayar{{$item->id}}">
                                    <i data-feather="edit"></i>Edit</button>
                                <form onclick="confirm('Yakin Mau Menghapus Pembayaran?')" style="display: inline-block" action="{{route('hapusbayar', $item->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i data-feather="trash-2"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @include('siswa.modal.viewbuktibayar')
                        @include('siswa.modal.editbayar')
                        @include('siswa.modal.sendwa')

                    @endforeach
                    </tbody>
                    @include('siswa.modal.addpayment')
                </table>

            </div>

            <form action="{{route('editbayar', $student)}}" id="submit_form" method="post">
                @csrf
                <input type="hidden" name="json" id="json_callback">
            </form>
    </div>
    </div>
@endsection
