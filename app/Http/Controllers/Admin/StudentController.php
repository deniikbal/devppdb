<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $main = 'Calon Siswa';
        $sub = 'Calon Siswa';
        $student = Student::all();
        return view('admin.student.index', compact('main','sub','student'));
    }

    public function terverifikasi()
    {
        $main = 'Calon Siswa';
        $sub = 'Verifikasi';
        $verifikasi = Student::where('verifikasi', 1)->get();
        dd($verifikasi);
        return view('admin.student.verifikasi', compact('main','sub','verifikasi'));
    }

    public function belumverifikasi()
    {
        $main = 'Calon Siswa';
        $sub = 'Belum Verifikasi';
        $blmverifikasi = Student::where('verifikasi', 0)->get();
        return view('admin.student.belumverifikasi', compact('main','sub','blmverifikasi'));
    }

    public function abort()
    {
        return abort(403,'Anda tidak punya akses');
    }



}
