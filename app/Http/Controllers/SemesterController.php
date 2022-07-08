<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequestSemester;
use App\Models\semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'semesters' => Semester::all(),
            'main'=>'User',
            'sub'=>'User Management',
        ];
        return view ('admin.semester.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'main'=>'Add Semester',
            'sub'=>'Semester',
        ];
        return view('admin.semester.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequestSemester $request)
    {
        //dd($request->all());
        Semester::create($request->validated());
        return redirect()->route('semesters.index')->with('status', 'Data Semester berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(semester $semester)
    {
        $main='Add Semester';
        $sub='Semester';
        return view('admin.semester.show', compact('main','sub', 'semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(semester $semester)
    {
        $main='Add Semester';
        $sub='Semester';
        return view('admin.semester.show', compact('main','sub', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(AddRequestSemester $request, semester $semester)
    {
        $semester->update($request->validated());
        return redirect()->route('semesters.index')->with('update', 'Data Semester berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(semester $semester)
    {
        $semester->delete();
        return redirect()->route('semesters.index')->with('delete', 'Data Semester berhasil dihapus!!');
    }
}
