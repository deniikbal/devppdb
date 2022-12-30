@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="alert alert-solid alert-danger" role="alert">
                <h5 class="text-white">Total Saldo Pembayaran : @currency($total)</h5>
            </div>
            <div class="card-header d-flex justify-content-between">
                <h5>Daftar Ulang (DU)</h5>
                <a href="{{route('addtp')}}" class="btn btn-xs btn-primary"><i data-feather="plus-square"></i> Add
                    Pembayaran</a>
            </div>
            @include('admin.payment.modal.addpayment')
            <div class="card-body">
                <table id="example2" class="table">
                    <thead class="table-danger">
                    <tr role="row">
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>Nomor Daftar</th>
                        <th>Asal Sekolah</th>
                        <th>Send WA</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($students as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</a></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->nodaftar}}</td>
                            <td>{{$item->asal_sekolah}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#verifikasi{{$item->id}}">Verifikasi
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#viewpayment{{$item->id}}">View Payment
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                @foreach($students as $item)
                    @include('admin.payment.modal.viewpayment')
                @endforeach
            </div>
        </div>
    </div>
@endsection
