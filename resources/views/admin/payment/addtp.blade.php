@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Titipan Pembayaran </h5>
                </div>
                <form action="{{route('storebayar')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="keterangan" value="Titipan Pembayaran">
                        <div class="col-sm-8">
                            <div class="form-group mb-1">
                                <label for="formGroupExampleInput" class="d-block">Nama Siswa</label>
                                <select class="form-control select2" name="student_id" required>
                                    <option label="Choose one"></option>
                                    @foreach($students as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput" class="d-block">Jenis Pembayaran</label>
                                <select class="form-control" name="jenis_pembayaran">
                                    <option value="">--Pilih--</option>
                                    <option value="tp">Titipan Pembayaran</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput" class="d-block">Nominal</label>
                                <input type="text" name="nominal" value="300000" class="form-control"
                                       placeholder="Rp.   " disabled>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2" class="d-block">Tanggal Bayar</label>
                                <input type="date" name="tanggal" class="form-control"
                                       placeholder="Enter your lastname">
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput" class="d-block">Jenis Bayar</label>
                                <select class="form-control" name="jenis_bayar">
                                    <option value="">--Pilih--</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="formGroupExampleInput2" class="d-block">Bukti Bayar</label>
                                <input type="file" class="form-control" name="bukti_bayar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{route('tp')}}" class="btn btn-danger btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
