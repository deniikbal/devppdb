<?php

namespace App\Jobs;

use App\Models\Student;
use App\Models\Whatsapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRegisStudent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $student;
    public $tries = 3;
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $student = $this->student;
        $notifwa = $student->notifwa + 1;
        $whatsapp = Whatsapp::where('ket','reguser')->first();
        $data = [
            'api_key' => 'kXahnNSSmnh8VgBFH7cCVl9yWBHLeK',
            'sender' => "$whatsapp->sender",
            'number' => "$student->nohp_ortu",
            'message' => "*Pendaftaran Calon Siswa Berhasil* \n\n*Nama Lengkap* : $student->name \n*No Daftar* : $student->nodaftar \n*Jenis Kelamin* : $student->jenis_kelamin \n*Kecamatan Domisili* : $student->kecamatan_pd \n*Asal Sekolah* : $student->asal_sekolah \n*No HP* : $student->nohp_siswa
            \n\n$whatsapp->message",
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($curl, CURLOPT_URL, 'https://wa.ypt.or.id/send-message');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_ENCODING,'');
        curl_setopt($curl, CURLOPT_MAXREDIRS,10);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);

        $student->update([
            'notifwa'=>$notifwa,
        ]);
    }
}
