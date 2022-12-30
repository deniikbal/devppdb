<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        $sub = 'Data Sekolah';
        $main = 'Sekolah';
        return view('admin.school.index', compact('schools','sub','main'));
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|min:8',
            'npsn'=>'required|size:8',
            'desa' =>'required',
            'kecamatan'=>'required',
            'kabupaten'=>'required',
            'provinsi'=>'required'
        ]);
        School::create($validate);
        return redirect()->back()->with('success', 'Data Sekolah berhasil ditambah');
    }

    public function destroy($id)
    {
        School::find($id)->delete();
        return redirect()->back()->with('success', 'Data Sekolah berhasil hapus');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'=>'required|min:8',
            'npsn'=>'required|size:8',
            'desa' =>'required',
            'kecamatan'=>'required',
            'kabupaten'=>'required',
            'provinsi'=>'required'
        ]);
        School::find($id)->update($validate);
        return redirect()->back()->with('success', 'Data Sekolah berhasil diupdate');

    }
}
