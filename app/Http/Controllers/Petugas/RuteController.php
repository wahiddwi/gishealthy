<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function rute()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();
        return view('admin.pemetaan.rute', compact('wilayah', 'kecamatan', 'kelurahan', 'laykes'));
    }
}
