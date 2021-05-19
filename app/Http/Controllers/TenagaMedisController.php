<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\TenagaMedis;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenagaMedisController extends Controller
{
    public function index()
    {
        $tenagamedis = TenagaMedis::all();
        $laykes = Laykes::all();
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('tenagamedis.index', compact('tenagamedis', 'laykes', 'wilayah', 'kecamatan', 'kelurahan'));
    }

    public function gettenagamediskota()
    {
        //menampilkan jumlah tenaga medis berdasarkan kotamadya
        $data['medis_kota'] = DB::table('tenaga_medis')
        ->select([
            'wilayah.nama',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['wilayah.nama'])
        ->orderBy('id_wilayah')
        ->get()
        ;
        return view('tenagamedis.datatenagamediskota', $data);
    }

    public function gettenagamediskecamatan()
    {
                //menampilkan jumlah tenaga medis berdasarkan kecamatan
                $data['medis_kecamatan'] = DB::table('tenaga_medis')
                ->select([
                    'kecamatan.nama as nama_kecamatan',
                    'wilayah.nama as nama_kota',
                    DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
                ])
                ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
                ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
                ->groupBy(['kecamatan.nama', 'wilayah.nama'])
                ->orderBy('id_kecamatan')
                ->get()
                ;
                // dd($data);
                return view('tenagamedis.mediskecamatan', $data );
    }

    public function getmediskelurahan()
    {
        //menampilkan jumlah tenaga medis berdasarkan kelurahan
        $data['medis_kelurahan'] = DB::table('tenaga_medis')
        ->select([
            'kelurahan.nama as nama_kelurahan',
            'kecamatan.nama as nama_kecamatan',
            'wilayah.nama as nama_kota',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'tenaga_medis.id_kelurahan')
        ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['kecamatan.nama', 'wilayah.nama', 'kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get()
        ;
        // dd($data);
        return view('tenagamedis.mediskelurahan', $data );
    }
}
