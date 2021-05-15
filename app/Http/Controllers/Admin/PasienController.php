<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Pasien;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('admin.pasien.index', compact('pasien', 'wilayah', 'kecamatan', 'kelurahan'));
    }

    public function getDataWilayah()
    {
        $data['pasien_wilayah'] = DB::table('pasien')
            ->select(['wilayah.nama as nama_wilayah',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'pasien.id_wilayah')
            ->groupBy(['wilayah.nama'])
            ->orderBy('id_wilayah')
            ->get()
            ;
            // dd($data);
            return view('admin.pasien.pasien_wilayah', $data);
    }

    public function getDataKecamatan()
    {
        $data['pasien_kecamatan'] = DB::table('pasien')
            ->select(['kecamatan.nama as nama_kecamatan',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('kecamatan', 'kecamatan.id', '=', 'pasien.id_kecamatan')
            ->groupBy(['kecamatan.nama'])
            ->orderBy('id_kecamatan')
            ->get()
            ;
            // dd($data);
            return view('admin.pasien.pasien_kecamatan', $data);
    }

    public function getDatakelurahan()
    {
        $data['pasien_kelurahan'] = DB::table('pasien')
            ->select(['kelurahan.nama as nama_kelurahan',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
            ->groupBy(['kelurahan.nama'])
            ->orderBy('id_kelurahan')
            ->get()
            ;
            // dd($data);
            return view('admin.pasien.pasien_kelurahan', $data);
        }
        
        public function getAllData()
        {
        $data['allData'] = DB::table('pasien')
            ->select(['pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            ])
            ->get()
            ;
            return view('admin.pasien.alldata', $data);
    }
}
