@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                <h5>Data Peserta Test</h5>
                    <div>
                    <a href="{{route('print')}}" class="btn btn-danger btn-sm">Print</a>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#setgelombang">
                            Set Gelombang
                        </button>
                        <a class="btn btn-sm btn-info" href="{{ route('downloadpass') }}">Download Pass</a>
                    </div>
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
                            <th>Hasil Test</th>
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
                            <td>{{$item->student->name}}</td>
                            <td>
                                {{$item->student->nodaftar}}<br>
                                @if ($item->password==null)
                                    @include('admin.test.modal.generate')
                                    <span type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#generate{{ $item->id }}">********</span>
                                    @include('admin.test.modal.generate')
                                @else
                                <span class="badge badge-primary">{{ Str::upper($item->password) }}</span>
                                @endif
                            </td>
                            <td>{{$item->student->asal_sekolah}}</td>
                            <td>{{$item->gelombang_test}}</td>
                            <td>{{\Illuminate\Support\Str::title($item->student->jenis_kelamin)}}</td>
{{--                            <td>--}}
{{--                                @if($item->hasil==null)--}}
{{--                                    <span class="badge badge-danger">Belum Test</span>--}}
{{--                                @elseif($item->hasil==1)--}}
{{--                                <span class="badge badge-success">Lulus</span>--}}
{{--                                @else--}}
{{--                                    <span class="badge badge-info">Tidak Lulus</span>--}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td>
                                @if($item->hasil==null)
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#lulus{{$item->id}}">
                                                <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#tdklulus{{$item->id}}">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                @elseif($item->hasil==0)
                                    <button type="button" class="btn btn-primary btn-sm" style="display: inline-block" data-toggle="modal"
                                            data-target="#lulus{{$item->id}}">
                                        Lulus
                                    </button>
                                @else
                                <button type="button" class="btn btn-primary btn-sm" style="display: inline-block" data-toggle="modal"
                                        data-target="#tdklulus{{$item->id}}">
                                    Tidak Lulus
                                </button>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('printkartu',$item->student_id)}}"
                                        target="_blank" class="btn btn-warning btn-sm">
                                        <i class="fas fa-arrow-circle-down"></i> Card
                                    </a>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#delete{{$item->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                            @include('admin.test.modal.lulus')
                            @include('admin.test.modal.tdklulus')
                            @include('admin.test.modal.delete')
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @include('admin.test.modal.setgelombang')
                <div class="card-footer">

                </div>
        </div>

        </div>
    </div>

@endsection
