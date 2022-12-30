<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
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

    public function index()
    {
        $setting = Setting::find(1);
        $sub = 'Setting';
        $main = 'Setting';
        return view('admin.setting.index', compact('setting', 'sub', 'main'));
    }

    public function update(SettingRequest $request, $setting)
    {
        $settings = Setting::find($setting);
        $settings->update([
            'jumlah_pendaftar'=>$request->jumlah_pendaftar,
            'biaya'=>$request->biaya,
        ]);
        return redirect()->route('setting')->with('success', 'Setting Berhasil');

    }

}
