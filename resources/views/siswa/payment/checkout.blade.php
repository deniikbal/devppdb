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

    <div class="card bd-0 bd-md-x bd-md-y mg-t-10">
        <div class="card-body ">
            <div class="container">
                <style type="text/css">
                    .tg  {border-collapse:collapse;border-color:#bbb;border-spacing:0;}
                    .tg td{background-color:#E0FFEB;border-color:#bbb;border-style:solid;border-width:1px;color:#594F4F;
                        font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg th{background-color:#9DE0AD;border-color:#bbb;border-style:solid;border-width:1px;color:#493F3F;
                        font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                    .tg .tg-km2t{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:top}
                    .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
                </style>
                <table class="tg" style="undefined;table-layout: fixed; width: 393px">
                    <colgroup>
                        <col style="width: 147px">
                        <col style="width: 25px">
                        <col style="width: 221px">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="tg-km2t">Nama Calon Siswa</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{$payment->student->name}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">No Daftar</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{$payment->student->nodaftar}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">Email</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{\Illuminate\Support\Facades\Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">No Handphone</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{\Illuminate\Support\Facades\Auth::user()->nohp}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">Id Pembayaran</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{$payment->order_id}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">Nominal Bayar</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{$payment->gross_amount}}</td>
                    </tr>
                    <tr>
                        <td class="tg-km2t">Jenis Pembayaran</td>
                        <td class="tg-zv4m">:</td>
                        <td class="tg-zv4m">{{$payment->jenis_bayar}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" id="pay-button">
                        <i data-feather="plus-square"></i>Add Bayar
                    </button>
                </div>
            </div>
        </div>
        </div>

    <form action="{{route('editbayar', $payment->id)}}" id="submit_form" method="post">
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
