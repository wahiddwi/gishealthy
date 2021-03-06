<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Pemetaan;
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
        return view('admin.pemetaan.index', $data);
    }
}
