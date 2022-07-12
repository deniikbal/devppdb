<?php

namespace App\Http\Controllers;

use App\Jobs\SendPayment;
use App\Models\Payment;
use App\Models\Prestasi;
use App\Models\Student;
use App\Models\Whatsapp;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index(Student $student,Request $request)
    {
        $payment = Payment::where('student_id', $student->id)->get();
        $count = count($payment);
        //dd($count);
        $title = 'Halaman Pembayaran';
        return view('siswa.payment.index', compact('title','payment','student','count'));
    }

    public function create(Request $request, Student $student)
    {
        $idbayar = IdGenerator::generate(['table' => 'payments', 'field'=>'id_bayar', 'length' => 9, 'prefix' =>'INV-']);
        if ($request->file('bukti_bayar')){
            $save=$request->file('bukti_bayar')->store('bukti_bayar');
        }
        //dd($request->keterangan);
        $student = Student::find($student->id);
        $count = Payment::where('student_id',$student->id)->count();
        if($count==0){
            $payment = Payment::create([
                'student_id'=> $student->id,
                'id_bayar' => $idbayar,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'nominal' => 300000,
                'tanggal' => $request->tanggal,
                'jenis_bayar' => $request->jenis_bayar,
                'bukti_bayar' => $save,
                'keterangan' => "Titipan Pembayaran",
            ]);
        }else{
            $payment = Payment::create([
                'student_id'=> $student->id,
                'id_bayar' => $idbayar,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'nominal' => $request->nominal,
                'tanggal' => $request->tanggal,
                'jenis_bayar' => $request->jenis_bayar,
                'bukti_bayar' => $save,
                'keterangan' => $request->keterangan,
            ]);
        }
        //$payment = $this->payment;
        //$student = Student::find($payment->student_id);
//        $whatsapp = Whatsapp::where('ket','reguser')->first();
//        //dd($whatsapp);
//        $data = [
//            'api_key' => "$whatsapp->apikey",
//            'sender' => "$whatsapp->sender",
//            'number' => "$student->nohp_ortu",
//            'message' => "Nama Siswa : $student->name \nNo Daftar: $student->nodaftar
//            \nNominal : Rp. $payment->nominal \nId Bayar : $payment->id_bayar
//            \nJenis Pembayaran : $payment->jenis_pembayaran, \nBayar : $payment->jenis_bayar \n\n$whatsapp->message",
//            'url' => "https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools-bundar-1024x1024.png",
//        ];
//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data) );
//        curl_setopt($curl, CURLOPT_URL, 'https://wa.telkomschools.sch.id/send-media');
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//        $result = curl_exec($curl);
//        curl_close($curl);
//        echo "<pre>";
//        print_r($result);

        SendPayment::dispatch($payment);
        return redirect()->back()->with('success', 'Pembayaran berhasil Ditambah');
    }
    public function update(Request $request, $payment)
    {

        $json = json_decode($request->get('json'));
        $data = ([
            'status'=>$json->transaction_status,
            'payment_type'=>$json->payment_type,
            'status_message'=>$json->status_message,
            'pdf_url'=>$json->pdf_url,
        ]);
        $payments = Payment::all()->find($payment);
        $payments->update($data);
        return redirect()->route('payments', $payments->student_id)
            ->with('success', 'Prestasi berhasil Dihapus');
    }

    public function hapusbayar($item)
    {
        $payment = Payment::find($item);
        Storage::delete($payment->bukti_bayar);
        $payment->delete();
        return redirect()->back()->with('success', 'Pembayaran berhasil Dihapus');

    }

    public function updatebayar(Request $request, $id)
    {
        if ($request->file('bukti_bayar')){
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $save=$request->file('bukti_bayar')->store('bukti_bayar');
            $prestasi = Payment::find($id);
            $prestasi->update([
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'nominal' => $request->nominal,
                'tanggal' => $request->tanggal,
                'jenis_bayar' => $request->jenis_bayar,
                'bukti_bayar' => $save,
            ]);
        }elseif ($request->file('bukti_bayar')==null){
            $prestasi = Payment::find($id);
            $prestasi->update([
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'nominal' => $request->nominal,
                'tanggal' => $request->tanggal,
                'jenis_bayar' => $request->jenis_bayar,
            ]);
        }
        return redirect()->back()->with('success', 'Pembayaran Berhasil Di Update');
    }

    public function verifikasipayment(Request $request, $item)
    {
        //d($item);
        $payment = Payment::find($item);
        $payment->update([
            'verifikasi'=>$request->verifikasi
            ]);
        $studentid = $payment->student_id;
        $student = Student::find($studentid);
        $student->update([
            'verifikasi_bayar'=>$request->verifikasi
        ]);
        return redirect()->back()->with('success', 'Pembayaran Berhasil Di Verifikasi');


    }

    public function sendwa($item)
    {
        $payment = Payment::find($item);
        $data = [
            'id_bayar' => $payment->id_bayar,
            'jenis_pembayaran' => $payment->jenis_pembayaran,
            'nominal' => $payment->nominal,
            'tanggal' => $payment->tanggal,
            'jenis_bayar' => $payment->jenis_bayar,
            'bukti_bayar' => $payment->bukti_bayar,
            'keterangan' => $payment->keterangan,
        ];
        SendPayment::dispatch($payment);
        return redirect()->back()->with('success', 'Whatsapps Berhasil di Kirim');
    }


}
