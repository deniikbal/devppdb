<?php

namespace App\Http\Controllers;

use App\Jobs\SendRegisStudent;
use App\Jobs\SendWaRegister;
use App\Models\Student;
use App\Models\User;
use App\Models\Whatsapp;
use App\Http\Requests\StoreWhatsappRequest;
use App\Http\Requests\UpdateWhatsappRequest;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = 'Setting WA';
        $main = 'Whatsapp';
        $whatsapps = Whatsapp::all();
        return view('admin.whatsapp.index',compact('sub', 'main', 'whatsapps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWhatsappRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhatsappRequest $request)
    {
        Whatsapp::create($request->validated());
        return redirect()->route('whatsapp.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function show(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWhatsappRequest  $request
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhatsappRequest $request, Whatsapp $whatsapp)
    {
        $whatsapp->update($request->validated());
        return redirect()->route('whatsapp.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatsapp $whatsapp)
    {
     Whatsapp::find($whatsapp->id)->delete();
     return redirect()->route('whatsapp.index')->with('success', 'Data berhasil dihapus');
    }

    public function sendnotifwa($id)
    {
        $student = Student::find($id);
        SendRegisStudent::dispatch($student);
        return redirect()->route('student.index')->with('success', 'WA Berhasil di kirim');
    }

    public function sendwauser($id)
    {
        $user = User::find($id);
        SendWaRegister::dispatch($user);
        return redirect()->route('users')->with('success', 'WA Berhasil di kirim');

    }
}
