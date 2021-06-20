<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\TenagaMedis;
use App\Wilayah;
use Barryvdh\DomPDF\Facade as PDF;
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
            ->get();
        return view('tenagamedis.mediskota', $data);
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
            ->get();
        // dd($data);
        return view('tenagamedis.mediskecamatan', $data);
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
            ->get();
        // dd($data);
        return view('tenagamedis.mediskelurahan', $data);
    }

    public function downloadPDF()
    {
        $tenagamedis = TenagaMedis::all();
        $laykes = Laykes::all();

        $pdf = PDF::loadView('tenagamedis.download_datatenagamedis', compact('tenagamedis', 'laykes'));
        return $pdf->download('data_tenagamedis.pdf');
    }

    public function downloadTenagaMedisKec()
    {
        //menampilkan jumlah tenaga medis berdasarkan kecamatan
        $medis_kecamatan = DB::table('tenaga_medis')
            ->select([
                'kecamatan.nama as nama_kecamatan',
                'wilayah.nama as nama_kota',
                DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
            ])
            ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
            ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
            ->groupBy(['kecamatan.nama', 'wilayah.nama'])
            ->orderBy('id_kecamatan')
            ->get();

        $pdf = PDF::loadView('tenagamedis.download_mediskecamatan', compact('medis_kecamatan'));
        return $pdf->download('data_tenagamedis_kecamatan.pdf');
    }

    public function downloadTenagaMedisKel()
    {
        //menampilkan jumlah tenaga medis berdasarkan kelurahan
        $medis_kelurahan = DB::table('tenaga_medis')
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
            ->get();

        $pdf = PDF::loadView('tenagamedis.download_mediskelurahan', compact('medis_kelurahan'));
        return $pdf->download('data_tenagamedis_kelurahan.pdf');
    }

    public function downloadTenagaMedisKota()
    {
        //menampilkan jumlah tenaga medis berdasarkan kotamadya
        $medis_kota = DB::table('tenaga_medis')
            ->select([
                'wilayah.nama',
                DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
            ->groupBy(['wilayah.nama'])
            ->orderBy('id_wilayah')
            ->get();


        $pdf = PDF::loadView('tenagamedis.download_mediskota', compact('medis_kota'));
        return $pdf->download('data_tenagamedis_kota.pdf');
    }
}
