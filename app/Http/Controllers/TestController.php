<?php

namespace App\Http\Controllers;

use notify;

use Carbon\Carbon;
use App\Models\Pdf;
use App\Models\Test;
use App\Models\Setting;
use App\Models\Student;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            ->get()->sortBy('student.nodaftar');
        //dd($tests);
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
        $this->pdf->Cell(8,6,'NO','1',0,'C', true);
        $this->pdf->Cell(28,6,'GELOMBANG TES','1',0,'C', true);
        $this->pdf->Cell(55,6,'NAMA LENGKAP','1',0,'C', true);
        $this->pdf->Cell(45,6,'ASAL SEKOLAH ','1',0,'C', true);
        $this->pdf->Cell(30,6,'JENIS KELAMIN','1',0,'C', true);
        $this->pdf->Cell(30,6,'TANDA TANGAN','1',1,'C', true);
        $this->pdf->SetFont('Arial', '', 8);

        foreach ($student as $item){
            $this->pdf->Cell(8,12,$no++,'1',0,'C');
            $this->pdf->Cell(28,12,$setting->gelombang_test,'1',0,'C');
            $this->pdf->Cell(55,12,$item->name,'1',0,'L');
            //$this->pdf->MultiCell(35,5,$item->asal_sekolah,0,'L');
            $this->pdf->Cell(45,12,$item->asal_sekolah,'1',0,'L');
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

    public function generate($id)
    {
        $test = Test::find($id);
        $pass = Str::random(6);
        $test->update([
            'password'=>$pass,
        ]);
    return redirect()->route('pesertatest');
    }

    public function setgel(Request $request)
    {
        $setgel= Test::where('hasil', null)->get();
        foreach ($setgel as $set) {
            $test = Test::find($set->id);
            $test->update([
                'gelombang_test'=>$request->gelombang_test,
            ]);
        }
        return view('sukses');
    }

    public function downloadpass()
    {
        $download = Test::with('student')
        ->whereNotNull('password')
        ->where('hasil', null)
        ->get()
        ->sortBy('student.nodaftar');
        // dd($download);

        // $students = Student::all()->sortBy('nodaftar');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', "No");
        $sheet->setCellValue('B1', "Nama Lengkap");
        $sheet->setCellValue('C1', "Username");
        $sheet->setCellValue('D1', "Password");

        $column = 2;
        foreach ($download as $down) {
            $sheet->setCellValue('A' . $column, $column - 1);
            $sheet->setCellValue('B' . $column, $down->student->name);
            $sheet->setCellValue('C' . $column, $down->student->nodaftar);
            $sheet->setCellValue('D' . $column, $down->password);
            $column++;
        }
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getBorders();
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:D1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $sheet->setTitle("Laporan Data Siswa");
        $filename = 'export_'.Carbon::now().'.xls';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename='.$filename); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
