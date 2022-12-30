<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Whatsapp;
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
    public $tries = 3;
    public $timeout = 120;

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
        $wa = $user->notifwa + 1;

        $whatsapp = Whatsapp::where('ket','reguser')->first();
        $data = [
            'api_key' => 'kXahnNSSmnh8VgBFH7cCVl9yWBHLeK',
            'sender' => "$whatsapp->sender",
            'number' => "$user->nohp",
            'message' => "*Acount User Berhasil Dibuat* \n\nNama User : $user->name \nEmail : $user->email \nPassword : $user->password_plain
            \n *PANITIA PPDB 2023*",
            'footer' => '*PPDB SMA TELKOM BANDUNG*',
            'template1' => 'url|Login|http://ppdb.smatelkombandung.sch.id/login', //REQUIRED ( template minimal 1 )
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.ypt.or.id/send-template');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_ENCODING,'');
        curl_setopt($curl, CURLOPT_MAXREDIRS,10);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);

        $user->update([
            'notifwa'=>$wa,
        ]);



    }
}
