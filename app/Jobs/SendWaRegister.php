<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWaRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $data = [
            'api_key' => 'ExJ7Ra1wiYtGPU2lrUa3Cje7GBaYIm',
            'sender' => '6285155333252',
            'number' => "$user->nohp",
            'message' => "Terima kasih sudah membuat akun web PPDB SMA Telkom Bandung, berikut data pendaftaran: \n\nNama Lengkap : $user->name \nEmail :  $user->email \n\nTahap selanjutnya silahkan orang tua  $user->name segera menghubungi admin PPDB \n\nAdmin 1 : 081322299010 (Bu Nissa)\nAdmin 2 : 081398877234 (Bu Lilis)\nAdmin 3 : 082116497877 (Bu Ranti)\n\n*PANITIA PPDB SMA TELKOM BANDUNG*\n\n*Note : Untuk login di web silahkan menggunakan email dan pass yang sudah di buat.",
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.telkomschools.sch.id/send-message');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "<pre>";
            print_r($result);

    }
}
