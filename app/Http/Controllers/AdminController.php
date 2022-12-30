<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $student = Student::groupBy('jenis_kelamin')->get();
        //dd($student);
        $data = ([
            'main' => 'Dashboard Oke',
            'sub' => 'Dashboard',
        ]);
        return view('admin.index', $data);
    }
}
