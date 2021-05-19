<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use Illuminate\Http\Request;

class PemetaanController extends Controller
{
    public function pemetaan()
    {
        $data = [
            'laykes' => Laykes::all(),
            'wilayah' => Wilayah::all(),
            'kecamatan' => Kecamatan::all(),
            'kelurahan' =>Kelurahan::all(),
        ];
        return view('pemetaan.index', $data);
    }

    public function rute()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();
        return view('pemetaan.rute', compact('wilayah', 'kecamatan', 'kelurahan', 'laykes'));
    }
}
