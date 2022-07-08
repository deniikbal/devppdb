<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setgel(Request $request)
    {
        //dd($request->gelombang_test);
        $setting = Setting::find(1);
        $setting->update([
            'gelombang_test'=>$request->gelombang_test,
        ]);
        return redirect()->route('pesertatest')->with('success', 'Setting Gelombang Berhasil');

    }

}
