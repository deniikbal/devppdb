<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdataRequestProfile;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $students = Student::all()->count();
        dd($students);
        return view('school.index', compact('students'));
    }
}
