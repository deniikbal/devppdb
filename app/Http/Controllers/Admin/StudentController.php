<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdataRequestProfile;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $main = 'Semua Calon Siswa';
        $sub = 'Calon Siswa';
        $student = User::whereHas('student')->get()->sortBy('student.id');
        $schools = School::all();
        return view('admin.student.indexold', compact('main', 'sub', 'student', 'schools'));
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

    public function editsekolah(Request $request, $id)
    {
        $sekolah = Student::find($id);
        $sekolah->update([
            'asal_sekolah'=>$request->asal_sekolah,
        ]);
        return redirect()->back()->with('success', 'Sekolah Berhasil Di Edit');
    }

    public function edithpsiswa(Request $request, $id)
    {
        $sekolah = Student::find($id);
        $sekolah->update([
            'nohp_siswa' => $request->nohp_siswa,
        ]);
        return redirect()->back()->with('success', 'Sekolah Berhasil Di Edit');
    }

    public function editstudent(Request $request, Student $student)
    {
        $sub = 'Edit Student';
        $main = 'Student';
        $siswa = new Student();
        $jenis_kelamin = $siswa->jenis_kelamin();
        $agama = $siswa->agama();
        $hoby = $siswa->hoby();
        $cita = $siswa->cita();
        return view('admin.student.editstudent',
            compact('sub', 'main', 'student', 'jenis_kelamin', 'agama', 'hoby', 'cita'));
    }

    public function studentupdate(UpdataRequestProfile $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->to('/studentall')->with('success', 'Data ' . $request->name . ' Berhasil diupdate');
    }


}
