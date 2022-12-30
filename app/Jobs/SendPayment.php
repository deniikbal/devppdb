<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use App\Models\Whatsapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $payment;
    public $tries = 3;
    public $timeout = 120;

    public function __construct(Payment $payment)
    {
        $this->payment=$payment;
    }

    public function handle()
    {
        $payment = $this->payment;
        $student = Student::find($payment->student_id);
        $whatsapp = Whatsapp::where('ket','reguser')->first();
        $user = User::where('id', $student->user_id)->first();
        $url = url('storage/'.$payment->bukti_bayar);
        $data = [
            'api_key' => 'kXahnNSSmnh8VgBFH7cCVl9yWBHLeK',
            'sender' => '6281322299010',
            'number' => $user->nohp,
            'message' => "*Pembayaran Administrasi*
            \n*Nama*: $student->name\n*No Daftar*: $student->nodaftar\n*Nominal* : Rp. $payment->nominal\n*Id Bayar* : $payment->id_bayar\n*Jenis Pembayaran* : $payment->jenis_pembayaran \n*Bayar* : $payment->jenis_bayar \n*Keterangan*: $payment->keterangan",
            //'url' => "https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools.png",
            'url' => $url,
            'type' => 'image',
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.ypt.or.id/send-media');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);
    }
}
