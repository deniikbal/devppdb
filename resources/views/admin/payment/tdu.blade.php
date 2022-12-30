@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Verifikasi Pembayaran</h5>
            </div>
            @include('admin.payment.modal.addpayment')
            <div class="card-body">
                <table id="example2" class="table">
                    <thead class="table-danger">
                    <tr role="row">
                        <th>No</th>
                        <th>Id Pembayaran</th>
                        <th>Nama Calon</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nominal</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Verifikasi</th>
                        <th>Bukti Bayar</th>
                        <th>Verifikasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($payments as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</a></td>
                            <td>{{$item->id_bayar}}</td>
                            <td>{{$item->student['name']}}</td>
                            <td><span class="badge badge-{{$item->jenis_pembayaran=='tdu' ? 'danger' : 'primary'}}">
                                    {{\Illuminate\Support\Str::upper($item->jenis_pembayaran)}}</span></td>
                            <td>@currency($item->nominal)</td>
                            <td><span class="badge badge-{{$item->jenis_bayar=='cash' ? 'success' : 'warning'}}">
                                    {{\Illuminate\Support\Str::upper($item->jenis_bayar)}}</span></td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY')}}</td>
                            <td><span class="badge badge-{{$item->verifikasi==0 ? 'info':'dark'}}">
                                    {{$item->verifikasi==0 ? 'Belum Verifikasi':'Verifikasi'}}
                                </span></td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#viewsertifikat{{$item->id}}">
                                    <i data-feather="eye"></i>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#verifikasi{{$item->id}}">Verifikasi
                                <button type="button" class="btn btn-danger ml-1 btn-xs" data-toggle="modal"
                                        data-target="#delete{{$item->id}}">Delete
                            </td>
                        </tr>
                        @include('siswa.modal.viewbuktibayar')
                        @include('admin.payment.modal.verifikasipayment')
                        @include('admin.payment.modal.delete')

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
