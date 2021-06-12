<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Pasien;
use App\Wilayah;
use PDF;
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

        return view('pasien.index', compact('pasien', 'wilayah', 'kecamatan', 'kelurahan'));
    }

    public function PasienWilayah()
    {
        $pasien_wilayah = DB::table('pasien')
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
    // dd($data);
    return view('pasien.pasien_wilayah', compact('pasien_wilayah'));
    }

    public function PasienKecamatan()
    {
        $pasien_kecamatan = DB::table('pasien')
        ->select([
            'kecamatan.nama as nama_kecamatan',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'pasien.id_kecamatan')
        ->groupBy(['kecamatan.nama'])
        ->orderBy('id_kecamatan')
        ->get();
    // dd($data);
    return view('pasien.pasien_kecamatan', compact('pasien_kecamatan'));
    }

    public function PasienKelurahan()
    {
        $pasien_kelurahan = DB::table('pasien')
            ->select([
                'kelurahan.nama as nama_kelurahan',
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
                DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
            ->groupBy(['kelurahan.nama'])
            ->orderBy('id_kelurahan')
            ->get();
        // dd($data);
        return view('pasien.pasien_kelurahan', compact('pasien_kelurahan'));
    }

    public function downloadPDF()
    {
        $pasien = Pasien::all();
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        $pdf = PDF::loadView('pasien.cetak_datapasien', compact('wilayah', 'kecamatan', 'kelurahan', 'pasien'));
        return $pdf->download('data_pasien.pdf');
    }

    public function downloadPasienKota()
    {
        $pasien_wilayah = DB::table('pasien')
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

        $pdf = PDF::loadView('pasien.cetak_datapasienkota', compact('pasien_wilayah'));
        return $pdf->download('data_kasus-covid19-kota.pdf');
    }

    public function downloadPasienKecamatan()
    {
        $pasien_kecamatan = DB::table('pasien')
        ->select([
            'kecamatan.nama as nama_kecamatan',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'pasien.id_kecamatan')
        ->groupBy(['kecamatan.nama'])
        ->orderBy('id_kecamatan')
        ->get();

        $pdf = PDF::loadView('pasien.cetak_datapasienkecamatan', compact('pasien_kecamatan'));
        return $pdf->download('data_kasus-covid19-kecamatan.pdf');
    }

    public function downloadPasienKelurahan()
    {
        $pasien_kelurahan = DB::table('pasien')
        ->select([
            'kelurahan.nama as nama_kelurahan',
            'pasien.*',
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            DB::raw('COUNT(status) as jumlah_pasien')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
        ->groupBy(['kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get();

        $pdf = PDF::loadView('pasien.cetak_datapasienkelurahan', compact('pasien_kelurahan'));
        return $pdf->download('data_kasus-covid19-kelurahan.pdf');

    }
}
