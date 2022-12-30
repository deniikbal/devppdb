<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;

class Form extends Fpdf
{
    public function Header()
    {
        $image = asset('assets/img/logots.png');
        $this->SetFont('Arial', '', 12);
        $this->Image($image,5,5,-750);
        $this->Cell('190','5', 'YAYASAN PENDIDIKAN TELKOM',0,1,'C');
        $this->SetFont('Arial', '', 20);
        $this->Cell('190','7', 'SMA TELKOM BANDUNG',0,1,'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell('190','5', 'TERAKREDITASI : A (Unggul)',0,1,'C');
        $this->Cell('190','5', 'SK. BAN SM NOMOR : 1442/BAN-SM/SK/2019',0,1,'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell('190','5', 'Jalan Radio Palasari Telp. (022) 5229478 Kecamatan Dayeuhkolot Kabupaten Bandung',0,1,'C');
        $this->Line(10,40,200,40);
        $this->Ln(8);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell('190','6', 'SMA TELKOM BANDUNG',0,1,'C');
        $this->Cell('190','6', 'GELOMBANG 3 TAHAP 5',0,1,'C');
        $this->Cell('190','6', 'TAHUN AJARAN 2022/2023',0,1,'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(136,137,136);
        $this->Cell(10,6,'NO','1',0,'C', true);
        $this->Cell(38,6,'GELOMBANG TES','1',0,'C', true);
        $this->Cell(50,6,'NAMA LENGKAP','1',0,'C', true);
        $this->Cell(32,6,'ASAL SEKOLAH ','1',0,'C', true);
        $this->Cell(30,6,'JENIS KELAMIN','1',0,'C', true);
        $this->Cell(30,6,'TANDA TANGAN','1',1,'C', true);
    }

    public function Footer()
    {
        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(136,137,136);
        $this->SetY(280,5);
        $this->Cell(0,5,'PPDB SMA TELKOM - Halaman : '. $this->PageNo(),
            0,0,'C',true);
    }
}
