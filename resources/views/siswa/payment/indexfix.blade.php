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
                Tambah Pembayaran
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
                <table id="example2" class="table">
                    <thead>
                    <tr role="row">
                        <th >No</th>
                        <th >Id Pembayaran</th>
                        <th >Pembayaran</th>
                        <th >Tanggal</th>
                        <th >Jenis Bayar</th>
                        <th >Bukti Bayar</th>
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
                            <td><span class="badge badge-{{$item->jenis_pembayaran=='tdu'?'danger':'primary'}}">{{\Illuminate\Support\Str::upper($item->jenis_pembayaran)}}</span></td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{\Illuminate\Support\Str::upper($item->jenis_bayar)}}</td>
                            <td><button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#viewsertifikat{{$item->id}}">
                                    <i data-feather="eye"></i></button>
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
                                <form action="{{route('addpayment', $student)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Jenis Pembayaran: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="jenis_pembayaran" required>
                                                <option value="">--Pilih--</option>
                                                <option value="tdu">Titipan Daftar Ulang</option>
                                                <option value="du">Daftar Ulang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Nominal: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nominal">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Tanggal Bayar: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" name="tanggal">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Jenis Bayar: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="jenis_bayar" required>
                                                <option value="">--Pilih--</option>
                                                <option value="transfer">Transfer</option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Bukti Bayar: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="bukti_bayar">
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
    </div>
@endsection
