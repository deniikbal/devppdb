@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                Data Semua Pendaftar
                <a href="{{route('export')}}" class="btn btn-danger"><i data-feather="download"></i> Export</a>
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
                        <th class="wd-20p">Domisili</th>
                        <th class="wd-20p">No HP</th>
                        <th class="wd-20p">Email dan Pass</th>
                        <th class="wd-20p">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($student as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{\Illuminate\Support\Str::title($item->student->name)}}<br>
                                @if($item->student['verifikasi']==1)
                                    <span class="badge badge-success">Verifikasi</span>
                                @else
                                    <span class="badge badge-danger">Belum Verifikasi</span>
                                @endif
                            </td>
                            <td>{{\Illuminate\Support\Str::title($item->student['jenis_kelamin'])}}</td>
                            <td>{{$item->student['nodaftar']}}</td>
                            <td><a type="button" class="badge badge-info text-white" data-toggle="modal"
                                   data-target="#editsekolah{{$item->student['id']}}">
                                    {{\Illuminate\Support\Str::upper($item->student['asal_sekolah'])}}
                                </a>
                            </td>
                            <td> Kec : {{$item->student['kecamatan_pd']}}<br>
                                Kab : {{$item->student['kota_pd']}}
                            </td>
                            <td> Ortu : <a class="badge badge-primary text-white">
                                    {{\Illuminate\Support\Str::upper($item->student['nohp_ortu'])}}
                                </a><br>
                                Siswa : <a type="button" class="badge badge-warning text-white" data-toggle="modal"
                                           data-target="#editsiswa{{$item->student['id']}}">
                                    {{\Illuminate\Support\Str::upper($item->student['nohp_siswa'])}}
                                </a>
                            </td>
                            <td>
                                {{ $item->email }}<br>
                                {{ $item->password_plain }}
                            </td>
                            <td class="text-center">
                                @if($item->student['verifikasi']==1)
                                    <a href="{{route('printformulir',$item->student['id'])}}" target="_blank"
                                       class="btn btn-sm btn-danger">
                                        <i data-feather="eye"></i> View</a>
                                @else
                                    <a href="{{route('abort')}}" target="_blank" class="btn btn-sm btn-primary">
                                        <i data-feather="eye"></i> View</a>
                                @endif
                                <form onclick="confirm('Yakin Mau Mengirim Notif WA?')" style="display: inline-block"
                                      action="{{route('sendnotifwa', $item->student['id'])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success btn-sm"><i data-feather="trash-2"></i>Send WA <span
                                            class="badge badge-pill badge-danger">{{$item->student['notifwa']}}</span></button>
                                </form>

                            </td>
                        </tr>
                        @include('admin.student.modal.editsekolah')
                        @include('admin.student.modal.editsiswa')
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection