<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Student;
use Carbon\Carbon;
Use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PDF;
use Codedge\Fpdf\Fpdf\Fpdf;

class PrintController extends Controller
{


    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function printkartu(Student $student)
    {
        $student = Student::find($student)->first();
        $image = asset('assets/img/logots.png');
        $pasfoto = asset('storage/'. $student->foto);

        $this->fpdf->AddPage('P','a5');
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Image($image,5,5,-900);
        $this->fpdf->Cell(20,8,'',0,0,'L');
        $this->fpdf->Cell(120,8,'PPDB SMA TELKOM 2023',0,1,'L');
        $this->fpdf->Cell(20,8,'',0,0,'L');
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'https://ppdb.smatelkombandung.sch.id',0,1,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->Line(10,35,137,35);
        $this->fpdf->Ln('18');
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(128,5,'Kartu Peserta Test PPDB SMA TELKOM Tahun 2022',0,1,'C');

        $this->fpdf->Image($pasfoto,100,60,30,40);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'No Pendaftaran','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->nodaftar,'0',1,'L');

        $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'Nama Lengkap','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->name,'0',1,'L');

        $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'NIK','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->nik,'0',1,'L');

        $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'Sekolah Asal','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->asal_sekolah,'0',1,'L');

        $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'Alamat','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->alamat_pd,'0',1,'L');

        $this->fpdf->Ln(2);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(35,5,'No. Telepon','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->nohp_siswa,'0',1,'L');

        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(125,5,'Saya tunduk dan patuh terhadap segala ketentuan dan peraturan TEST PPDB SMA TELKOM','0','L',false);

        $this->fpdf->Cell(40,5,'',0,0,'L');
        $this->fpdf->Cell(38,5,'',0,0,'L');
        $this->fpdf->Cell(50,5,'Tanda tangan',0,0,'C');

        $this->fpdf->Ln(25);

        $this->fpdf->Cell(40,5,'',0,0,'L');
        $this->fpdf->Cell(40,5,'',0,0,'L');
        $this->fpdf->Cell(50,5,'('.$student->name.')',0,1,'C');

        $this->fpdf->Line(11,150,137,150);

        $cetak = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->Cell(20,5,'Dicetak Pada',0,0,'L');
        $this->fpdf->Cell(5,5,':',0,0,'L');
        $this->fpdf->Cell(40,5,$cetak,0,0,'L');

        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('ZapfDingbats', 'B', 10);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 7);
        $this->fpdf->Cell(150,5,'Cetak formulir pendaftaran PPDB SMA TELKOM menggunakan kertas berukuran minimal A5',
            0,1,'L');
        $this->fpdf->SetFont('ZapfDingbats', 'B', 10);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 7);
        $this->fpdf->Cell(150,5,'Jika terdapat kesalahan data silahkan perbaiki data terlebih dahulu, kemudian cetak kembali',
            0,1,'L');

        $this->fpdf->SetFont('ZapfDingbats', 'B', 10);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 7);
        $this->fpdf->Cell(150,5,'Simpan baik-baik kartu peserta ini karena harus dibawa pada saat daftar ulang di SMA Telkom Bandung',
            0,1,'L');

        $this->fpdf->SetAutoPageBreak(true,5);

        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->SetFillColor(136,137,136);
        $this->fpdf->SetY(200,5);
        $this->fpdf->Cell(0,5,'PPDB SMA TELKOM - Halaman : '. $this->fpdf->PageNo(),
            0,0,'C',true);

        $this->fpdf->Output('D', 'Kartu Peserta'.$student->name.'.pdf');
        exit();

    }
    public function printformulir(Student $student)
    {

        $student = Student::find($student)->first();

        $tgllahir = Carbon::parse($student->tanggal)->isoFormat('D MMMM Y');

        $image = asset('assets/img/logots.png');
        $pasfoto = asset('storage/'. $student->foto);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->AddPage('P', 'a4');
        $this->fpdf->SetCreator($student->name);
        $this->fpdf->SetMargins(10, 10,10);
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->Image($image,5,5,-800);
        $this->fpdf->Cell(25,10,'',0,0,'L');
        $this->fpdf->Cell(120,10,'PPDB SMA TELKOM 2023',0,1,'L');
        $this->fpdf->Cell(25,10,'',0,0,'L');
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(30,5,'https://ppdb.smatelkombandung.sch.id',0,1,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->Line(10,35,200,35);
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->Cell(190,7,'Formulir Pendaftaran PPDB Tahun 2023','0',0,'C');
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190,7,'Data Pribadi Pendaftar','0',1,'L');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Ln(5);
        $this->fpdf->Image($pasfoto,140,60,40,60);
        $this->fpdf->Cell(55,5,'No Pendaftaran','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,$student->nodaftar,'0',1,'L');

        $this->fpdf->Cell(55,5,'Nama Lengkap','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->name),'0',1,'L');

        $this->fpdf->Cell(55,5,'Jenis Kelamin','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->jenis_kelamin),'0',1,'L');

        $this->fpdf->Cell(55,5,'Tempat, Tanggal Lahir','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->tempat).', '. $tgllahir,'0',1,'L');

        $this->fpdf->Cell(55,5,'NIK','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'3273175007040004','0',1,'L');

        $this->fpdf->Cell(55,5,'Agama','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->agama),'0',1,'L');

        $this->fpdf->Cell(55,5,'No Hp','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'085722676819','0',1,'L');

        $this->fpdf->Cell(55,5,'Anak Ke','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1','0',1,'L');

        $this->fpdf->Cell(55,5,'Jumlah Saudara','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1','0',1,'L');

        $this->fpdf->Cell(55,5,'Tinggi Badan','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'170','0',1,'L');

        $this->fpdf->Cell(55,5,'Berat Badan','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'60','0',1,'L');

        $this->fpdf->Cell(55,5,'Hobby','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->hoby),'0',1,'L');

        $this->fpdf->Cell(55,5,'Cita-cita','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->cita),'0',1,'L');

        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190,7,'Data Riwayat Sekolah','0',1,'L');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Ln(3);
        $this->fpdf->Cell(55,5,'NISN','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::title($student->nisn),'0',1,'L');

        $this->fpdf->Cell(55,5,'Asal Sekolah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,Str::Upper($student->asal_sekolah),'0',1,'L');

        $this->fpdf->Cell(55,5,'NPSN Asal Sekolah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'20228479','0',1,'L');

        $this->fpdf->Cell(55,5,'Provinsi SMP/MTs','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Jawa Barat','0',1,'L');

        $this->fpdf->Cell(55,5,'Kabupaten SMP/MTs','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Majalengka','0',1,'L');

        $this->fpdf->Cell(55,5,'Kecamatan SMP/MTs','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Bantarujeg','0',1,'L');

        $this->fpdf->Cell(55,5,'Desa / Kelurahan SMP/MTs','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Wadowetan','0',1,'L');

        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190,7,'Data Orang Tua','0',1,'L');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Ln(3);

        $this->fpdf->Cell(55,5,'No Kartu Keluarga','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1234567890123456','0',1,'L');

        $this->fpdf->Cell(55,5,'Nama Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Deni Muhamad Ikbal','0',1,'L');

        $this->fpdf->Cell(55,5,'NIK Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1234567890123456','0',1,'L');

        $this->fpdf->Cell(55,5,'Tahun Lahir Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1987','0',1,'L');

        $this->fpdf->Cell(55,5,'Pendidikan Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'SMP Sederajat','0',1,'L');

        $this->fpdf->Cell(55,5,'Pekerjaan Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Karyawan Swasta','0',1,'L');

        $this->fpdf->Cell(55,5,'Penghasilan Ayah Ayah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Rp. 500,000 - Rp. 999,999','0',1,'L');

        $this->fpdf->Ln(5);

        $this->fpdf->Cell(55,5,'Nama Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Deni Muhamad Ikbal','0',1,'L');

        $this->fpdf->Cell(55,5,'NIK Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1234567890123456','0',1,'L');

        $this->fpdf->Cell(55,5,'Tahun Lahir Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'1987','0',1,'L');

        $this->fpdf->Cell(55,5,'Pendidikan Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'SMP Sederajat','0',1,'L');

        $this->fpdf->Cell(55,5,'Pekerjaan Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Karyawan Swasta','0',1,'L');

        $this->fpdf->Cell(55,5,'Penghasilan Ibu','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Rp. 500,000 - Rp. 999,999','0',1,'L');

        $this->fpdf->SetAutoPageBreak(true,5);

        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->SetFillColor(136,137,136);
        $this->fpdf->SetY(280,5);
        $this->fpdf->Cell(0,5,'PPDB SMA TELKOM - Halaman : '. $this->fpdf->PageNo(),
            0,0,'C',true);


        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->AddPage('P', 'a4');
        $this->fpdf->SetMargins(10, 10,10);
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->Image($image,5,5,-800);
        $this->fpdf->Cell(25,10,'',0,0,'L');
        $this->fpdf->Cell(120,10,'PPDB SMA TELKOM 2023',0,1,'L');
        $this->fpdf->Cell(25,10,'',0,0,'L');
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell(30,5,'https://ppdb.smatelkombandung.sch.id',0,1,'L');
        $this->fpdf->Ln(0);
        $this->fpdf->Line(10,35,200,35);

        $this->fpdf->Ln(17);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190,7,'Data Alamat Rumah Orang Tua','0',1,'L');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Ln(3);

        $this->fpdf->Cell(55,5,'Alamat','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Dsn. Cidomas RT 10 RW 06','0',1,'L');

        $this->fpdf->Cell(55,5,'Jarak Rumah Ke Sekolah','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'10 Km','0',1,'L');

        $this->fpdf->Cell(55,5,'Waktu Tempuh','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'20 Menit','0',1,'L');

        $this->fpdf->Cell(55,5,'Desa / Kelurahan','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Wadowetan','0',1,'L');

        $this->fpdf->Cell(55,5,'Kecamatan','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Bantarujeg','0',1,'L');

        $this->fpdf->Cell(55,5,'Kabupaten','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Majalengka','0',1,'L');

        $this->fpdf->Cell(55,5,'Provinsi','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(1,5,'','0',0,'L');
        $this->fpdf->Cell(50,5,'Jawa Barat','0',1,'L');

        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190,7,'Data Prestasi Pendaftar','0',1,'L');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Ln(3);

        $this->fpdf->SetFillColor(228,38,44);
        $this->fpdf->Cell(10,6,'No','1',0,'C', true);
        $this->fpdf->Cell(60,6,'Nama Kegiatan','1',0,'C', true);
        $this->fpdf->Cell(25,6,'Jenis','1',0,'C', true);
        $this->fpdf->Cell(30,6,'Tingkat','1',0,'C', true);
        $this->fpdf->Cell(20,6,'Tahun','1',0,'C', true);
        $this->fpdf->Cell(30,6,'Pencapaian','1',1,'C', true);

        $prestasi = Prestasi::where('student_id', $student->id)->get();

        $no = 1;
        foreach ($prestasi as $item){
            $this->fpdf->Cell(10,6,$no++,'1',0,'C');
            $this->fpdf->Cell(60,6,$item->nama_kegiatan,'1',0,'L');
            $this->fpdf->Cell(25,6,$item->jenis_kegiatan,'1',0,'C');
            $this->fpdf->Cell(30,6,$item->tingkat,'1',0,'C');
            $this->fpdf->Cell(20,6,$item->tahun,'1',0,'C');
            $this->fpdf->Cell(30,6,$item->hasil,'1',1,'C');
        }
        //dd($prestasi);

        $cetak = Carbon::now()->isoFormat('dddd, D MMMM Y');


        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->Cell(20,5,'Dicetak pada','0',0,'L');
        $this->fpdf->Cell(5,5,':','0',0,'L');
        $this->fpdf->Cell(50,5,$cetak,'0',0,'L');


        $this->fpdf->Ln(30);
        $this->fpdf->SetFont('ZapfDingbats', 'B', 12);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->Cell(150,5,'Cetak formulir pendaftaran PPDB SMA TELKOM menggunakan kertas berukuran minimal A4',
            0,1,'L');
        $this->fpdf->SetFont('ZapfDingbats', 'B', 12);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->MultiCell(180,5,'Kartu peserta PPDB SMA TELKOM diberikan kepada pendaftar sebagai tanda bukti bahwa siswa yang bersangkutan telah melengkapi berkas-berkas pendaftaran',
            0,1,false);
        $this->fpdf->SetFont('ZapfDingbats', 'B', 12);
        $this->fpdf->Cell(5,5,4,0,0,'L');
        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->Cell(150,5,'Jika terdapat kesalahan data silahkan perbaiki data terlebih dahulu, kemudian cetak kembali',
            0,1,'L');






        $this->fpdf->SetAutoPageBreak(true,5);

        $this->fpdf->SetFont('Arial', 'I', 8);
        $this->fpdf->SetFillColor(136,137,136);
        $this->fpdf->SetY(280,5);
        $this->fpdf->Cell(0,5,'PPDB SMA TELKOM - Halaman : '. $this->fpdf->PageNo(),
            0,0,'C',true);

        $this->fpdf->Output('D','Formulir Peserta-'.$student->name.'.pdf');

        exit;



    }
}
