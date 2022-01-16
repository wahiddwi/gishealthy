<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Pasien;
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
            'kelurahan' => Kelurahan::all(),
        ];
        return view('admin.pemetaan.index', $data);
    }

    public function covid()
    {
        $covid = [
            'laykes' => Laykes::all(),
            'wilayah' => Wilayah::all(),
            'kecamatan' => Kecamatan::all(),
            'kelurahan' => Kelurahan::all(),
            'pasien' => Pasien::all(),
        ];
        return view('admin.pemetaan.pemetaanCovid', $covid);
    }

    public function getDataWilayah()
    {
        $data['pasien_wilayah'] = DB::table('pasien')
            ->select([
                'wilayah.nama as nama_wilayah',
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
                DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'pasien.id_wilayah')
            ->groupBy(['wilayah.nama'])
            ->orderBy('id_wilayah')
            ->get();
        dd($data);
        return view('admin.pasien.pasien_wilayah', $data);
    }
}
