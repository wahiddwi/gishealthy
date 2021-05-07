<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemetaan extends Model
{
    public function rumahsakitalldata()
    {
        return DB::table('rumah_sakit')
                ->select('rumah_sakit.*', 'wilayah.nama as nama_wilayah', 'kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan')
                ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
                ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
                ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
                ->get();
    }

    public function wilayahalldata()
    {
        return DB::table('wilayah')
                ->get();
    }

    public function kecamatanalldata()
    {
        return DB::table('kecamatan')
        ->select('kecamatan.*', 'wilayah.nama')
        ->join('wilayah', 'wilayah.id', '=', 'kecamatan.id_wilayah')
        ->get();
    }

    public function kelurahanalldata()
    {
        return DB::table('kelurahan')
        ->select('kelurahan.*', 'wilayah.nama as nama_wilayah', 'kecamatan.nama as nama_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'kelurahan.id_wilayah')
        ->join('kecamatan', 'kecamatan.id', '=', 'kelurahan.id_kecamatan')
        ->get();
    }
}
