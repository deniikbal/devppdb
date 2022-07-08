<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $main = 'User';
        $sub = 'User Management';
        $users = User::all();
        return  view('admin.users.index', compact('main', 'sub', 'users'));
    }

    public function destroy($user)
    {
        $users = User::find($user);
        $users->delete();
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }

    public function create(CreateUserRequest $request)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return redirect()->back()->with('success', 'User Berhasil dibuat');
    }

    public function update(Request $request, $user)
    {
        $user = User::find($user);
        if ($request->file('avatar')){
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $save=$request->file('avatar')->store('avatar');
        }
        $user->update([
            'avatar'=>$save,
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return redirect()->back()->with('success', 'User Berhasil di Update');
    }
}
