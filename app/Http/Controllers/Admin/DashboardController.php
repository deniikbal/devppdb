<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $data = ([
            'main'=>'Dashboard',
            'sub'=>'Dashboard',
            'jumlahsiswa'=>$student,
        ]);
        return view('admin.dashboard', $data);
    }
}
