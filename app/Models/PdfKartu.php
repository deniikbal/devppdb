<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;

class PdfKartu extends Fpdf
{
    public function Header()
    {
        $image = asset('assets/img/logots.png');
        $this->SetFont('Arial', '', 10);
        $this->Image($image,8,8,-950);
        $this->Cell('150','5', 'YAYASAN PENDIDIKAN TELKOM',0,1,'C');
        $this->SetFont('Arial', '', 18);
        $this->Cell('150','7', 'SMA TELKOM BANDUNG',0,1,'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell('150','5', 'TERAKREDITASI : A (Unggul)',0,1,'C');
        $this->Cell('150','5', 'SK. BAN SM NOMOR : 1442/BAN-SM/SK/2019',0,1,'C');
        $this->SetFont('Arial', '', 8);
        $this->Cell('150','5', 'Jalan Radio Palasari Kecamatan Dayeuhkolot Kabupaten Bandung',0,1,'C');
        $this->Line(10,40,140,40);
        $this->Ln(8);

    }

    public function Footer()
    {
        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(136,137,136);
        $this->SetY(195,5);
        $this->Cell(0,5,'PPDB SMA TELKOM - Halaman : '. $this->PageNo(),
            0,0,'C',true);
    }
}
