<?php

namespace App\Http\Controllers;

use App\Models\PdfKartu;
use App\Models\Test;
use App\Models\Student;
use App\Models\Pdf;
use Carbon\Carbon;
Use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Codedge\fpdf\fpdf\fpdf;

class PrintController extends Controller
{

    protected $pdf;

    public function __construct(PdfKartu $pdf)
    {
        $this->pdf = $pdf;
    }

    public function printkartu(Student $id)
    {
        $student = Student::find($id->id);
        $test = Test::where('student_id', $student->id)->first();
        $image = asset('assets/img/logots.png');
        $pasfoto = asset('storage/'. $student->foto);
        $this->pdf->AddPage('P','a5');

        $this->pdf->Image($pasfoto,110,55,30,40);
        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,5,'No Pendaftaran','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nodaftar,'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,5,'No Pendaftaran','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->MultiCell(60,5,$student->name,'0','L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'Tempat Lahir','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->tempat,'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'Tanggal Lahir','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,\Carbon\Carbon::parse($student->tanggal)->isoFormat('D MMMM Y'),'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'NIK','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nik,'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'Sekolah Asal','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->MultiCell(60,5,$student->asal_sekolah,0,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'No. Telepon','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nohp_siswa,'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'Username Test','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nodaftar,'0',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,3,'Password Test','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        if($test->password==null){
            $this->pdf->Cell(50,5,'','0',1,'L',true);
        }else{
            $this->pdf->Cell(50,5,Str::upper($test->password),'0',1,'L');
        }


        $this->pdf->Ln(10);

        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(38,5,'',0,0,'L');
        $this->pdf->Cell(50,5,'Tanda tangan',0,0,'C');

        $this->pdf->Ln(20);

        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(50,5,'('.$student->name.')',0,1,'C');



        $this->pdf->Ln(8);

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,12,'Test CBT','1',0,'L');
        $this->pdf->Cell(50,12,'','1',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,12,'Wawancara','1',0,'L');
        $this->pdf->Cell(50,12,'','1',1,'L');

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(32,12,'Test Tahfidz','1',0,'L');
        $this->pdf->Cell(50,12,'','1',1,'L');

        $this->pdf->Ln('5');

        $cetak = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $this->pdf->SetFont('Arial', 'I', 8);
        $this->pdf->Cell(20,5,'Dicetak Pada',0,0,'L');
        $this->pdf->Cell(5,5,':',0,0,'L');
        $this->pdf->Cell(40,5,$cetak,0,0,'L');

        //$this->pdf->Output('D', 'Kartu Peserta '.$student->name.'.pdf');
        $this->pdf->Output();
        exit();

    }

}
