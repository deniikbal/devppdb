<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $main = 'User';
        $sub = 'User Management';
        return view('siswa', compact('main', 'sub'));
    }
}
