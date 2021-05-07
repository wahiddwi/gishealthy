<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Wilayah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('kelurahan.index', compact('wilayah', 'kecamatan', 'kelurahan'));
    }
}
