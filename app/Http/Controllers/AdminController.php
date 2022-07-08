<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = ([
            'main'=>'Dashboard',
            'sub'=>'Dashboard',
        ]);
        return view('admin.index', $data);
    }
}
