<?php

namespace App\Jobs;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $student;

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
        $data = [
            'api_key' => 'ExJ7Ra1wiYtGPU2lrUa3Cje7GBaYIm',
            'sender' => '6285155333252',
            'number' => "$student->nohp_ortu",
            'message' => "Terima kasih sudah membuat akun web PPDB SMA Telkom Bandung, berikut data pendaftaran: \n\nNama Lengkap : $student->name \nNo Daftar :  $student->nodaftar \nAsal Sekolah : $student->asal_sekolah \n\nTahap selanjutnya silahkan orang tua  $user->name segera menghubungi admin PPDB \n\nAdmin 1 : 081322299010 (Bu Nissa)\nAdmin 2 : 081398877234 (Bu Lilis)\nAdmin 3 : 082116497877 (Bu Ranti)\n\n*PANITIA PPDB SMA TELKOM BANDUNG*\n\n*Note : Untuk login di web silahkan menggunakan email dan pass yang sudah di buat.",
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


//        $url = "https://chat-api.ypt.or.id/send-message/key=smabandung";
//        $data_array = [
//            'number'  => $student->nohp_ortu,
//            'message' => "Pendaftaran Siswa $student->name, no daftar : $student->nodaftar"];
//        $data = http_build_query($data_array);
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//        $resp = curl_exec($ch);
//        if ($e = curl_error($ch)) {
//            echo $e;
//        } else {
//            $decoded = json_decode($resp);
//        }
//        curl_close($ch);
    }
}
