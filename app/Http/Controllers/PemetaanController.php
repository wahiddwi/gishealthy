<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function covid19wilayah()
    {
        $data['covid19'] = DB::table('pasien')
            ->select(['wilayah.nama as nama_wilayah', 
            // 'kecamatan.nama as nama_kecamatan',
            // 'kelurahan.nama as nama_kelurahan',
            DB::raw('COUNT(*) as total_kasus'),
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'pasien.id_wilayah')
            // ->join('kecamatan', 'kecamatan.id', '=', 'pasien.id_kecamatan')
            // ->join('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
            ->groupBy(['nama_wilayah'])
            ->orderByDesc('nama_wilayah')
            ->get()
            ->toJson()
            ;
            dd($data);
            // return view('pemetaan.covid19', $data);
    }

    public function detail($id)
    {
        $laykes = Laykes::findOrFail($id);
        return view('pemetaan.detail', compact('laykes'));
    }
}
