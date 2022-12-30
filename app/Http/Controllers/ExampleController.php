<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {   $sub = 'Example test';
        $main = 'Example';
        return view('example', compact('sub','main'));
    }
}
