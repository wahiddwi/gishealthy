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
            // 'wilayah' => $this->Pemetaan->wilayahalldata(),
            // 'kecamatan' => $this->Pemetaan->kecamatanalldata(),
            // 'kelurahan' => $this->Pemetaan->kelurahanalldata(),
            // 'rumahsakit' => $this->Pemetaan->rumahsakitalldata(),
            'laykes' => Laykes::all(),
            'wilayah' => Wilayah::all(),
            'kecamatan' => Kecamatan::all(),
            'kelurahan' =>Kelurahan::all(),
        ];
        // dd($data);
        return view('admin.pemetaan.index', $data);
    }
}
