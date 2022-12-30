@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Data Siswa Belum Verifikasi
            </div>
            <div class="card-body">
                <table id="example2" class="table">
                    <thead class="table-danger">
                    <tr>
                        <th class="wd-7p">No.</th>
                        <th class="wd-25p">Nama Siswa</th>
                        <th class="wd-15p">Jenis Kelamin</th>
                        <th class="wd-15p">Nomor Daftar</th>
                        <th class="wd-20p">Asal Sekolah</th>
                        <th class="wd-15p">Status Akun</th>
                        <th class="wd-15p">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($blmverifikasi as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{\Illuminate\Support\Str::title($item->name)}}</td>
                            <td>{{\Illuminate\Support\Str::title($item->jenis_kelamin)}}</td>
                            <td>{{$item->nodaftar}}</td>
                            <td>{{\Illuminate\Support\Str::upper($item->asal_sekolah)}}</td>
                            <td>
                                @if($item->verifikasi==1)
                                    <span class="badge badge-success">Verifikasi</span>
                                @else
                                    <span class="badge badge-danger">Belum Verifikasi</span>
                                @endif
                            </td>
                            <td>
                                @if($item->verifikasi==1)
                                    <a href="{{route('printformulir',$item->id)}}" target="_blank"
                                       class="btn btn-sm btn-danger">
                                        <i data-feather="eye"></i> View</a>
                                @else
                                    <a href="{{route('abort')}}" target="_blank" class="btn btn-sm btn-primary">
                                        <i data-feather="eye"></i> View</a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
