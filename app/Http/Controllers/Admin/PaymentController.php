<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Test;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function du()
    {
        $main = 'Payment';
        $sub = 'Titipan Daftar Ulang';
        $payments = Payment::with('student')
            ->where('jenis_pembayaran', 'tdu')
            ->get();
        $totaldu = Payment::with('student')->where('jenis_pembayaran', 'tdu')
            ->sum('nominal');
        return view('admin.payment.du', compact('main', 'sub', 'payments', 'totaldu'));
    }

    public function tambahpembayaran()
    {
        $main = 'Payment';
        $sub = 'Tambah Pembayaran';
        $students = Student::all();

        return view('admin.payment.addpayment', compact('students', 'sub', 'main'));
    }

    public function storebayar(Request $request)
    {
        $idbayar = IdGenerator::generate(['table' => 'payments', 'field' => 'id_bayar', 'length' => 9, 'prefix' => 'INV-']);
        if ($request->file('bukti_bayar')) {
            $save = $request->file('bukti_bayar')->store('bukti_bayar');
        }
        $payment = Payment::create([
            'student_id' => $request->student_id,
            'id_bayar' => $idbayar,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'jenis_bayar' => $request->jenis_bayar,
            'bukti_bayar' => $save,
        ]);
        return redirect()->route('tdu')->with('success', 'Pembayaran berhasil Ditambah');
    }

    public function verifikasipayment(Request $request, $item)
    {
        $payment = Payment::find($item);
        $payment->update([
            'verifikasi' => 1,
        ]);

        $student = Student::find($request->studentid);
        $student->update([
            'verifikasi_bayar' => 1,
        ]);
        Test::create([
            'student_id' => $request->studentid,
        ]);
        return redirect()->back()->with('success', 'Verifikasi berhasil');
    }

    public function tp()
    {
        $payments = Payment::with('student')
            ->where('jenis_pembayaran', 'tp')
            ->get();
        $main = 'Payment';
        $sub = 'Titipan Pembayaran';
        return view('admin.payment.tp', compact('payments','main','sub'));

    }
    public function vp()
    {
        $main = 'Payment';
        $sub = 'Verifikasi Pembayaran';
        $payments = Payment::with('student')
            ->where('verifikasi', 0)
            ->get();
        $totaltdu = Payment::with('student')->where('jenis_pembayaran', 'tdu')->sum('nominal');


        return view('admin.payment.tdu', compact('main', 'sub', 'payments', 'totaltdu'));
    }

    public function allpayment()
    {
        $main = 'Payment';
        $sub = 'All Payment';
        $students = Student::with('payment')
            ->where('verifikasi_bayar', 1)
            ->get();
        $total = Payment::with('student')->sum('nominal');
        return view('admin.payment.allpayment', compact('main', 'sub',
            'students', 'total'));

    }
}
