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
        $whatsapp = Whatsapp::where('ket','reguser')->first();
        $data = [
            'api_key' => "$whatsapp->apikey",
            'sender' => "$whatsapp->sender",
            'number' => "$user->nohp",
            'message' => "Terimakasih sudah mendaftar di WEB PPDB SMA TELKOM BANDUNG
            \n*Nama Lengkap* : $user->name \n*Email* : $user->email \n*Password* : $user->password_plain \n
            \n$whatsapp->message",
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
