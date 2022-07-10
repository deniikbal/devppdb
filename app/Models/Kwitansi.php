<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Fpdf
{
    function Header()
    {
        //Put the watermark
        $this->SetFont('Arial','B',50);
        $this->SetTextColor(255,192,203);
        $image = asset('assets/img/logosma.png');
        $this->SetFont('Arial', '', 12);
        $this->Image($image,75,60,50);
    }

//    function RotatedText($x, $y, $txt, $angle)
//    {
//        //Text rotated around its origin
//        $this->Rotate($angle,$x,$y);
//        $this->Text($x,$y,$txt);
//        $this->Rotate(0);
//    }
}
