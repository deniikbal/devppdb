<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Riskihajar\Terbilang\Terbilang;

class PrintKwitansiController extends Controller
{
    protected $pdf;

    public function __construct(Kwitansi $pdf)
    {
        $this->pdf = $pdf;
    }
    public function kwitansi($item)
    {
        $bayar = Payment::find($item);
        //dd($bayar);
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->AddPage('L', [215,100]);

        //$this->pdf->SetMargins(20,0,);
        $this->pdf->Cell(190,2,'KWITANSI PEMBAYARAN','0',0,'C');
        $this->pdf->Ln(8);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(40,5,'No Invoice','0',0,'L');
        $this->pdf->Cell(8,5,':','0',0,'L');
        $this->pdf->Cell(70,5,$bayar->id_bayar,'0',0,'L');
        $this->pdf->Cell(45,5,'Tanggal Pembayaran','0',0,'L');
        $this->pdf->Cell(5,5,':','0',0,'L');
        $this->pdf->Cell(90,5,$bayar->created_at->isoFormat('D MMMM Y'),'0',0,'L');
        $this->pdf->Ln(10);
        $this->pdf->Cell(40,5,'Terima Dari','0',0,'L');
        $this->pdf->Cell(8,5,':','0',0,'L');
        $this->pdf->Cell(130,5,$bayar->student->name .' '. '('. $bayar->student->nodaftar .')','0',0,'L');
        $this->pdf->Ln(6);
        $this->pdf->Cell(40,5,'Terbilang','0',0,'L');
        $this->pdf->Cell(8,5,':','0',0,'L');
        $this->pdf->Cell(130,5,Str::title(\Riskihajar\Terbilang\Facades\Terbilang::make($bayar->nominal,' rupiah')),'0',0,'L');
        $this->pdf->Ln(6);
        $this->pdf->Cell(40,5,'Untuk Pembayaran','0',0,'L');
        $this->pdf->Cell(8,5,':','0',0,'L');
        $this->pdf->Cell(130,5,$bayar->keterangan,'0',0,'L');
        $this->pdf->Ln(13);
        $this->pdf->Cell(40,10,'Rp. '. $bayar->nominal,'1',0,'C');
        $this->pdf->Cell(100,5,'','0',0,'L');
        $this->pdf->Cell(40,5,'Bandung, '.' '. $bayar->updated_at->isoformat('D MMMM Y'),'0',0,'L');
        $this->pdf->Ln(20);
        $this->pdf->Cell(40,5,'','0',0,'C');
        $this->pdf->Cell(100,5,'','0',0,'L');
        $this->pdf->Cell(40,5,'Panitia PPDB SMATEL','0',0,'L');


        $this->pdf->Output();

        exit;


    }
}
