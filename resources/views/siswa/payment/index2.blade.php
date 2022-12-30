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
            <span class="tx-color-04">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
            </span>
            <div class="media-body mg-l-20">
                <h6 class="mg-b-10">Tambah Pembayaran</h6>
                <p class="tx-black mg-b-0">Silahkan menambahkan data pembayaran yang sudah dilakukan disertai dengan menguplod bukti pembayaran</p>
            </div>
        </div><!-- media -->
    </div>
    <div class="card bd-0 bd-md-x bd-md-y mg-t-10">
        <div class="card-header">
            Prestasi Siswa

        </div>
        <div class="card-body ">
            <div class="container">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#tambahbayar">
                        <i data-feather="plus-square"></i>Add Bayar
                    </button>
                </div>
            </div>
            <table id="example1" class="table">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" rowspan="1" colspan="1" style="width: 0px;" aria-label="No">No</th>
                    <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Nama Kegiatan: activate to sort column ascending">Id Pembayaran</th>
                    <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Jenis: activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Tingkat: activate to sort column ascending">Nominal</th>
                    <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Tahun: activate to sort column ascending">Jenis Pembayaran</th>
                    <th class="sorting" tabindex="0" aria-controls="prestasi-table" rowspan="1" colspan="1" style="width: 0px;" aria-label="Aksi: activate to sort column ascending">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($payment as $item)
                    <tr>
                        <td class="text-center">{{ $no++ }}</a></td>
                        <td>{{$item->order_id}}</td>
                        <td><span class="badge badge-{{$item->status=='pending'?'danger':'primary'}}">{{$item->status}}</span></td>
                        <td>{{$item->gross_amount}}</td>
                        <td>{{$item->payment_type}}</td>
                        <td>
                            <a href="{{route('checkout', $item)}}" class="btn btn-danger btn-sm">Bayar</a>
                            <form onclick="confirm('Yakin Mau Cek Pembayaran?')" style="display: inline-block" action="{{route('cekbayar', $item->id)}}" method="post">
                                @method('put')
                                @csrf
                                <button class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></button>
                            </form>
                        </td>
                    </tr>
                    @include('siswa.modal.addpayment')
                @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="tambahbayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addpayment', $student)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Pembayaran: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="jenis_bayar" required>
                                            <option value="">--Pilih--</option>
                                            <option value="tdu">Titipan Daftar Ulang</option>
                                            <option value="du">Daftar Ulang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nominal: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="nominal">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <form action="{{route('editbayar', $student)}}" id="submit_form" method="post">
            @csrf
            <input type="hidden" name="json" id="json_callback">
        </form>


        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-CqGqrjaolSRsf7c7"></script>
        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{$snapToken}}', {
                    onSuccess: function(result){
                        send_response_to_form(result);
                    },
                    onPending: function(result){
                        send_response_to_form(result);
                    },
                    onError: function(result){
                        send_response_to_form(result);
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
            function send_response_to_form(result){
                document.getElementById('json_callback').value = JSON.stringify(result);
                $('#submit_form').submit();
            }
        </script>
@endsection
