<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWa implements ShouldQueue
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
        $data = [
            'api_key' => 'kXahnNSSmnh8VgBFH7cCVl9yWBHLeK',
            'sender' => '6285155333252',
            'number' => '085722676819',
            'message' => 'Selamat Anda Sudah Lolos',
            'footer' => '*PPDB SMA TELKOM BANDUNG*',
            'image' => 'https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools.png', //OPTIONAL
            'template1' => 'url|Login|http://ppdb.smatelkombandung.sch.id/login', //REQUIRED ( template minimal 1 )
            'template2' => 'call|Call me|085155333252', //REQUIRED ( template minimal 1 )
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.ypt.or.id/send-template');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);

    }
}
