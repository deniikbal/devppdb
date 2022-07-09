<?php

namespace App\Http\Controllers;

use App\Models\PdfKartu;
use App\Models\Prestasi;
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

    public function printkartu(Student $student)
    {
        $student = Student::find($student)->first();
        $image = asset('assets/img/logots.png');
        $pasfoto = asset('storage/'. $student->foto);

        $this->pdf->AddPage('P','a5');
        $this->pdf->Image($pasfoto,100,60,30,40);
        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'No Pendaftaran','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nodaftar,'0',1,'L');

        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'Nama Lengkap','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->name,'0',1,'L');

        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'NIK','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nik,'0',1,'L');

        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'Sekolah Asal','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->asal_sekolah,'0',1,'L');

        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'Alamat','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->alamat_pd,'0',1,'L');

        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(35,5,'No. Telepon','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(1,5,'','0',0,'L');
        $this->pdf->Cell(50,5,$student->nohp_siswa,'0',1,'L');

        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->MultiCell(125,5,'Saya tunduk dan patuh terhadap segala ketentuan dan peraturan TEST PPDB SMA TELKOM','0','L',false);

        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(38,5,'',0,0,'L');
        $this->pdf->Cell(50,5,'Tanda tangan',0,0,'C');

        $this->pdf->Ln(25);

        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(40,5,'',0,0,'L');
        $this->pdf->Cell(50,5,'('.$student->name.')',0,1,'C');

        $this->pdf->Line(11,150,137,150);

        $cetak = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $this->pdf->SetFont('Arial', 'I', 8);
        $this->pdf->Cell(20,5,'Dicetak Pada',0,0,'L');
        $this->pdf->Cell(5,5,':',0,0,'L');
        $this->pdf->Cell(40,5,$cetak,0,0,'L');

        $this->pdf->Ln(10);
        $this->pdf->SetFont('ZapfDingbats', 'B', 10);
        $this->pdf->Cell(5,5,4,0,0,'L');
        $this->pdf->SetFont('Arial', 'I', 7);
        $this->pdf->Cell(150,5,'Cetak formulir pendaftaran PPDB SMA TELKOM menggunakan kertas berukuran minimal A5',
            0,1,'L');
        $this->pdf->SetFont('ZapfDingbats', 'B', 10);
        $this->pdf->Cell(5,5,4,0,0,'L');
        $this->pdf->SetFont('Arial', 'I', 7);
        $this->pdf->Cell(150,5,'Jika terdapat kesalahan data silahkan perbaiki data terlebih dahulu, kemudian cetak kembali',
            0,1,'L');

        $this->pdf->SetFont('ZapfDingbats', 'B', 10);
        $this->pdf->Cell(5,5,4,0,0,'L');
        $this->pdf->SetFont('Arial', 'I', 7);
        $this->pdf->Cell(150,5,'Simpan baik-baik kartu peserta ini karena harus dibawa pada saat daftar ulang di SMA Telkom Bandung',
            0,1,'L');

        //$this->pdf->Output('D', 'Kartu Peserta'.$student->name.'.pdf');
        $this->pdf->Output();
        exit();

    }

}
