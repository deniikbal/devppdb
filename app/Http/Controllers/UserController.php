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
        $users = User::with('student')->get();
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
            'password_plain'=>$request->password,
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

        if($request->avatar==null){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'role'=>$request->role,
            ]);
        }else{
            $user->update([
                'avatar'=>$save,
                'name' => $request->name,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'role'=>$request->role,
            ]);
        }
        return redirect()->back()->with('success', 'User '.$request->name.' Berhasil di Update');
    }

    public function changepass(Request $request, $user)
    {
        $user = User::find($user);
        $user->update([
            'password' => Hash::make($request->password),
            'password_plain' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Password Berhasil di Update');
    }
}
