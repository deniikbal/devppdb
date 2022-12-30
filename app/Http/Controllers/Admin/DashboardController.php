<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Ppdb;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;
use PHPUnit\Util\Annotation\DocBlock;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $gender = Student::all()->countBy('jenis_kelamin');
        $daftar = Student::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();
        $data = ([
            'main'=>'Dashboard',
            'sub'=>'Dashboard',
            'jumlahsiswa'=>$student,
            'gender'=>$gender,
            'daftar'=>$daftar,
        ]);
        return view('admin.dashboard', $data);
    }

    public function export()
    {
        $students = Student::all()->sortBy('nodaftar');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', "No");
        $sheet->setCellValue('B1', "No Daftar");
        $sheet->setCellValue('C1', "Nama Lengkap");
        $sheet->setCellValue('D1', "Nama Ayah");
        $sheet->setCellValue('E1', "No HP Orang Tua");
        $sheet->setCellValue('F1', "No Hp Siswa");
        $sheet->setCellValue('G1', "Asal Sekolah");
        $sheet->setCellValue('H1', "Jenis Kelamin");
        $sheet->setCellValue('I1', "NISN");
        $sheet->setCellValue('J1', "NPSN Sekolah");
        $sheet->setCellValue('K1', "NIK");
        $sheet->setCellValue('L1', "NO KK");
        $sheet->setCellValue('M1', "Tempat Lahir");
        $sheet->setCellValue('N1', "Tanggal Lahir");
        $sheet->setCellValue('O1', "Agama");
        $sheet->setCellValue('P1', "Tempat Tinggal");
        $sheet->setCellValue('Q1', "Moda Transportasi");
        $sheet->setCellValue('R1', "Anak Ke-");
        $sheet->setCellValue('S1', "Alamat");
        $sheet->setCellValue('T1', "RT");
        $sheet->setCellValue('U1', "RW");
        $sheet->setCellValue('V1', "Desa");
        $sheet->setCellValue('W1', "Kecamatan");
        $sheet->setCellValue('X1', "Kabupaten");
        $sheet->setCellValue('Y1', "Provinsi");
        $sheet->setCellValue('Z1', "Nama Ayah");
        $sheet->setCellValue('AA1', "NIK Ayah");
        $sheet->setCellValue('AB1', "Tahun Lahir Ayah");
        $sheet->setCellValue('AC1', "Pendidikan Ayah");
        $sheet->setCellValue('AD1', "Pekerjaan Ayah");
        $sheet->setCellValue('AE1', "Penghasilan Ayah");
        $sheet->setCellValue('AF1', "Nama Ibu");
        $sheet->setCellValue('AG1', "NIK Ibu");
        $sheet->setCellValue('AH1', "Tahun Lahir Ibu");
        $sheet->setCellValue('AI1', "Pendidikan Ibu");
        $sheet->setCellValue('AJ1', "Pekerjaan Ibu");
        $sheet->setCellValue('AK1', "Penghasilan Ibu");
        $sheet->setCellValue('AL1', "Tinggi Badan");
        $sheet->setCellValue('AM1', "Berat Badan");
        $sheet->setCellValue('AN1', "Jarak");
        $sheet->setCellValue('AO1', "Waktu");
        $sheet->setCellValue('AP1', "Jumlah Saudara");
        $sheet->setCellValue('AQ1', "VALIDASI");
        $sheet->setCellValue('AR1', "CREATED_AT");

        $column = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $column, $column - 1);
            $sheet->setCellValue('B' . $column, $student->nodaftar);
            $sheet->setCellValue('C' . $column, $student->name);
            $sheet->setCellValue('D' . $column, $student->namaayah);
            $sheet->setCellValue('E' . $column, $student->nohp_ortu);
            $sheet->setCellValue('F' . $column, $student->nohp_siswa);
            $sheet->setCellValue('G' . $column, $student->asal_sekolah);
            $sheet->setCellValue('H' . $column, $student->jenis_kelamin);
            $sheet->setCellValue('I' . $column, $student->nisn);
            $sheet->setCellValue('J' . $column, $student->npsn_asal);
            $sheet->setCellValue('K' . $column, "'".$student->nik);
            $sheet->setCellValue('L' . $column, "'".$student->no_kk);
            $sheet->setCellValue('M' . $column, $student->tempat);
            $sheet->setCellValue('N' . $column, $student->tanggal_lahir);
            $sheet->setCellValue('O' . $column, $student->agama);
            $sheet->setCellValue('P' . $column, $student->tinggal);
            $sheet->setCellValue('Q' . $column, $student->mobil);
            $sheet->setCellValue('R' . $column, $student->anak_ke);
            $sheet->setCellValue('S' . $column, $student->alamat);
            $sheet->setCellValue('T' . $column, $student->rt);
            $sheet->setCellValue('U' . $column, $student->rw);
            $sheet->setCellValue('V' . $column, $student->desa_siswa);
            $sheet->setCellValue('W' . $column, $student->kec_siswa);
            $sheet->setCellValue('X' . $column, $student->kab_siswa);
            $sheet->setCellValue('Y' . $column, $student->prov_siswa);
            $sheet->setCellValue('Z' . $column, $student->nama_ayah);
            $sheet->setCellValue('AA' . $column, "'".$student->nik_ayah);
            $sheet->setCellValue('AB' . $column, $student->tahun_ayah);
            $sheet->setCellValue('AC' . $column, $student->pend_ayah);
            $sheet->setCellValue('AD' . $column, $student->pekerjaan_ayah);
            $sheet->setCellValue('AE' . $column, $student->penghasilan_ayah);
            $sheet->setCellValue('AF' . $column, $student->nama_ibu);
            $sheet->setCellValue('AG' . $column, "'".$student->nik_ibu);
            $sheet->setCellValue('AH' . $column, $student->tahun_ibu);
            $sheet->setCellValue('AI' . $column, $student->pend_ibu);
            $sheet->setCellValue('AJ' . $column, $student->pekerjaan_ibu);
            $sheet->setCellValue('AK' . $column, $student->penghasilan_ibu);
            $sheet->setCellValue('AL' . $column, $student->tinggi_badan);
            $sheet->setCellValue('AM' . $column, $student->berat_badan);
            $sheet->setCellValue('AN' . $column, $student->jarak);
            $sheet->setCellValue('AO' . $column, $student->waktu);
            $sheet->setCellValue('AP' . $column, $student->jumlah_saudara);
            $sheet->setCellValue('AQ' . $column, $student->verifikasi===1 ? 'Verifikasi':'Belum Verifikasi');
            $sheet->setCellValue('AR' . $column, \Carbon\Carbon::parse($student->created_at)->isoFormat('DD MMMM YYYY'));
            $column++;
        }
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
        $sheet->getColumnDimension('Q')->setAutoSize(true);
        $sheet->getColumnDimension('R')->setAutoSize(true);
        $sheet->getColumnDimension('S')->setAutoSize(true);
        $sheet->getColumnDimension('T')->setAutoSize(true);
        $sheet->getColumnDimension('U')->setAutoSize(true);
        $sheet->getColumnDimension('V')->setAutoSize(true);
        $sheet->getColumnDimension('W')->setAutoSize(true);
        $sheet->getColumnDimension('X')->setAutoSize(true);
        $sheet->getColumnDimension('Y')->setAutoSize(true);
        $sheet->getColumnDimension('Z')->setAutoSize(true);
        $sheet->getColumnDimension('AA')->setAutoSize(true);
        $sheet->getColumnDimension('AB')->setAutoSize(true);
        $sheet->getColumnDimension('AC')->setAutoSize(true);
        $sheet->getColumnDimension('AD')->setAutoSize(true);
        $sheet->getColumnDimension('AE')->setAutoSize(true);
        $sheet->getColumnDimension('AF')->setAutoSize(true);
        $sheet->getColumnDimension('AG')->setAutoSize(true);
        $sheet->getColumnDimension('AH')->setAutoSize(true);
        $sheet->getColumnDimension('AI')->setAutoSize(true);
        $sheet->getColumnDimension('AJ')->setAutoSize(true);
        $sheet->getColumnDimension('AK')->setAutoSize(true);
        $sheet->getColumnDimension('AL')->setAutoSize(true);
        $sheet->getColumnDimension('AM')->setAutoSize(true);
        $sheet->getColumnDimension('AN')->setAutoSize(true);
        $sheet->getColumnDimension('AO')->setAutoSize(true);
        $sheet->getColumnDimension('AP')->setAutoSize(true);
        $sheet->getColumnDimension('AQ')->setAutoSize(true);
        $sheet->getColumnDimension('AR')->setAutoSize(true);
        $sheet->getStyle('A1:AR1')->getFont()->setBold(true);
        $sheet->getStyle('A1:AR1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:AR1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $name = Auth::user()->name;
        $sheet->setTitle("Laporan Data Siswa");
        $filename = 'export_'.Carbon::now().'.xls';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename='.$filename); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

}
