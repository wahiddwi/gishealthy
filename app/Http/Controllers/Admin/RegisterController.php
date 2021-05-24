<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 3,
            'password' => bcrypt($request->password),
        ]);
        Toastr::success('Petugas berhasil ditambahkan', 'success');
        return redirect()->route('admin.dashboard');
    }
}
