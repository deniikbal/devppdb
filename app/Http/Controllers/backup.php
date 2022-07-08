$student = Student::all();
function header(){

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
//Garis
$this->fpdf->Line(10,40,200,40);
$this->fpdf->Ln(8);
$this->fpdf->SetFont('Arial', 'B', 14);
$this->fpdf->Cell('190','6', 'SMA TELKOM BANDUNG',0,1,'C');
$this->fpdf->Cell('190','6', 'GELOMBANG 3 TAHAP 5',0,1,'C');
$this->fpdf->Cell('190','6', 'TAHUN AJARAN 2022/2023',0,1,'C');
}

function Footer()
{

}


$this->fpdf->AliasNbPages();
$this->fpdf->AddPage('P','Letter');
//KOP

//TABEL

$this->fpdf->Output();
