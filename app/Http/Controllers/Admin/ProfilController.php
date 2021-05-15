<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = User::all();
        $role = Role::all();
        return view('admin.user.profile', compact('user', 'role'));
    }
}
