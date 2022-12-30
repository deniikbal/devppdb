<?php

namespace App\Http\Controllers;

use App\Jobs\SendWa;
use App\Models\User;
use Illuminate\Http\Request;

class WaController extends Controller
{
    public function index()
    {
        $user = User::find(178);
        SendWa::dispatch($user);
    }
}
