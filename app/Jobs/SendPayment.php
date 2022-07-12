<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Student;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment=$payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $payment = $this->payment;
        $student = Student::find($payment->student_id);
        $whatsapp = Whatsapp::where('ket','reguser')->first();
        $data = [
            'api_key' => "$whatsapp->apikey",
            'sender' => "$whatsapp->sender",
            'number' => "$student->nohp_ortu",
            'message' => "Nama Siswa : $student->name \nNo Daftar: $student->nodaftar
            \nNominal : Rp. $payment->nominal \nId Bayar : $payment->id_bayar
            \nJenis Pembayaran : $payment->jenis_pembayaran, \nBayar : $payment->jenis_bayar \n\n$whatsapp->message",
            'url' => "https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools-bundar-1024x1024.png",
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.telkomschools.sch.id/send-media');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);
    }
}
