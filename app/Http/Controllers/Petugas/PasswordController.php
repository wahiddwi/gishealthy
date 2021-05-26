<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function Password()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.changePassword', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|max:25|confirmed'
        ]);

        //cek password lama
        $oldPass = Auth::user()->password;
        if (Hash::check($request->old_password, $oldPass)) {
            // cek password lama tidak boleh sama dengan password baru
            if (!Hash::check($request->password, $oldPass)) {
                # code...
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
    
                //logout
                Auth::logout();
                return redirect()->back();

            } else {
                # jika password lama sama dengan password baru
                Toastr::error('Password lama tidak boleh sama dengan password baru');
                return redirect()->back();
            }
        }else {
            //jika password lama salah
            Toastr::error('Masukkan password lama anda dengan benar');
            return redirect()->back();
        }
    }
}
