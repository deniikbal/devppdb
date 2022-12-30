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
            $request->validate([
                'nominal'=>'required|integer',
                'jenis_pembayaran'=>'required',
                'bukti_bayar'=>'required|image',
                'tanggal'=>'required',
                'jenis_bayar'=>'required'
            ],
            [
                'nominal.required'=>'Wajib diisi nominal pembayaran',
                'jenis_pembayaran.required'=>'Wajib pilih dahulu',
                'nominal.integer'=>'Harus format angka, Jangan ada titik atau koma'
            ]);
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
