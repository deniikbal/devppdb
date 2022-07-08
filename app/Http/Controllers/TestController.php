<?php

namespace App\Http\Controllers;

use App\Models\Pdf;

use App\Models\Setting;
use App\Models\Student;
use App\Models\Test;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{
    protected $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function index()
    {
        $setting = Setting::find(1);
        $tests = Test::with('student')
            ->where('hasil',null)
            ->get();
        $sub = 'Peserta Test';
        $main = 'Test';
        return view('admin.test.index', compact('sub', 'main', 'setting','tests'));
    }

    public function lulustest()
    {   $setting = Setting::find(1);
        $tests = Test::with('student')->where('hasil',1)->get();
        $sub = 'Peserta Test';
        $main = 'Test';
        return view('admin.test.lulustest', compact('sub', 'main','tests','setting'));
    }

    public function tdklulustest()
    {
        $tests = Test::with('student')
            ->where('hasil',0)
            ->get();
        $sub = 'Peserta Test';
        $main = 'Test';
        return view('admin.test.tdklulustest', compact('sub', 'main','tests'));
    }

    public function lulus(Request $request, $item)
    {
        $setting = Setting::find(1);
        $test = Test::find($item);
        $test->update([
            'hasil'=>1,
            'gelombang_test'=>$setting->gelombang_test,
        ]);
        return redirect()->back()->with('success', 'Verifikasi berhasil');
    }

    public function tdklulus(Request $request, $item)
    {
        $setting = Setting::find(1);
        $test = Test::find($item);
        $test->update([
            'hasil'=>0,
            'gelombang_test'=>$setting->gelombang_test,
        ]);
        return redirect()->back()->with('success', 'Verifikasi berhasil');
    }

    public function mundur()
    {
        $mundur = Test::with('student')
            ->where('hasil',3)
            ->get();
        $sub = 'Peserta Mengundurkan Diri';
        $main = 'Test';
        return view('admin.test.mundur', compact('mundur', 'sub', 'main'));
    }


    public function print()
    {

        $setting = Setting::find(1);
        $student = Student::with('payment')
            ->where('verifikasi_bayar', 1)
            ->get();
        $this->pdf->AddPage();
        $no = 1;
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell('190','6', 'SMA TELKOM BANDUNG',0,1,'C');
        $this->pdf->Cell('190','6', $setting->gelombang_test ,0,1,'C');
        $this->pdf->Cell('190','6', 'TAHUN AJARAN 2022/2023',0,1,'C');
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->SetFillColor(136,137,136);
        $this->pdf->Cell(10,6,'NO','1',0,'C', true);
        $this->pdf->Cell(38,6,'GELOMBANG TES','1',0,'C', true);
        $this->pdf->Cell(50,6,'NAMA LENGKAP','1',0,'C', true);
        $this->pdf->Cell(32,6,'ASAL SEKOLAH ','1',0,'C', true);
        $this->pdf->Cell(30,6,'JENIS KELAMIN','1',0,'C', true);
        $this->pdf->Cell(30,6,'TANDA TANGAN','1',1,'C', true);
        $this->pdf->SetFont('Arial', '', 8);

        foreach ($student as $item){
            $this->pdf->Cell(10,12,$no++,'1',0,'C');
            $this->pdf->Cell(38,12,$setting->gelombang_test,'1',0,'C');
            $this->pdf->Cell(50,12,$item->name,'1',0,'L');
            $this->pdf->Cell(32,12,$item->asal_sekolah,'1',0,'C');
            $this->pdf->Cell(30,12,Str::title($item->jenis_kelamin),'1',0,'C');
            $this->pdf->Cell(30,12,'','1',1,'C');
        }
        $this->pdf->Output();
        exit;

    }

    public function delete($item)
    {
        $test = Test::find($item);
        $test->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
