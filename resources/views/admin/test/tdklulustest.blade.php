@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Peserta Lulus Test</h5>
                    {{--                    <div>--}}
                    {{--                        <a href="{{route('print')}}" class="btn btn-danger btn-sm"><i data-feather="printer"></i> Print</a>--}}
                    {{--                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"--}}
                    {{--                                data-target="#setgelombang">--}}
                    {{--                            <i data-feather="plus-square"></i>Set Gelombang--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}
                </div>

                <div class="card-body">
                    <table id="example2" class="table">
                        <thead class="table-danger">
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Kode Daftar</th>
                            <th>Asal Sekolah</th>
                            <th>Gelombang Test</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Test</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($tests as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->student->nodaftar}}</td>
                                <td>{{$item->gelombang_test}}</td>
                                <td>{{{$item->student->name}}}</td>
                                <td>{{$item->student->asal_sekolah}}</td>
                                <td>{{\Illuminate\Support\Str::title($item->student->jenis_kelamin)}}</td>
                                <td>
                                    @if($item->hasil==null)
                                        <span class="badge badge-danger">Belum Test</span>
                                    @elseif($item->hasil==1)
                                        <span class="badge badge-success">Lulus</span>
                                    @else
                                        <span class="badge badge-info">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->hasil==null)
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#lulus{{$item->id}}">
                                            Lulus
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#tdklulus{{$item->id}}">
                                            Tidak Lulus
                                        </button>
                                    @elseif($item->hasil==0)
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#lulus{{$item->id}}">
                                            Lulus
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#tdklulus{{$item->id}}">
                                            Tidak Lulus
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @include('admin.test.modal.lulus')
                            @include('admin.test.modal.tdklulus')
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">

                </div>
            </div>

        </div>
    </div>

@endsection
