<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RumahSakitController extends Controller
{
    public function data_rumahsakit()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();
        return view('master_data.data_rumahsakit', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
    }

    public function getrskecamatan()
    {
        // $rskecamatan = DB::table('rumah_sakit')
        // ->select([
        //     'kecamatan.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
        // ->groupBy(['kecamatan.nama'])
        // ->orderBy('id_kecamatan')
        // ->get()
        // ;
        $data = Kecamatan::whereHas('laykes')->get();
            // dd($rskecamatan);
        return view('master_data.rumahsakitkecamatan', compact('data'));
    }

    public function getrskelurahan()
    {

        //menampilkan jumlah rumah sakit berdasarkan kelurahan
        // $rskelurahan = DB::table('rumah_sakit')
        // ->select([
        //     'kelurahan.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        // ->groupBy(['kelurahan.nama'])
        // ->orderBy('id_kelurahan')
        // ->get()
        // ;

        $data = Kelurahan::whereHas('laykes')->get();

        return view('master_data.rumahsakitkelurahan', compact('data'));

        // return view('master_data.rumahsakitkelurahan', compact('rskelurahan'));

    }

    public function getrskota()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        // $rswilayah = DB::table('rumah_sakit')
        // ->select([
        //     'wilayah.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
        // ->groupBy(['wilayah.nama'])
        // ->orderBy('id_wilayah')
        // ->get()
        // ;

        $data = Wilayah::whereHas('laykes')->get();

        return view('master_data.rumahsakitwilayah', compact('data'));

        // return view('master_data.rumahsakitwilayah', compact('rswilayah'));
    }

    public function downloadPDF()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();

        $pdf = PDF::loadView('master_data.download_datars', compact('wilayah', 'kecamatan', 'kelurahan', 'laykes'));
        // return $pdf->download('data_rumahsakit.pdf');
        return $pdf->stream();
    }

    public function downloadRsKecamatan()
    {
        // $rskecamatan = DB::table('rumah_sakit')
        // ->select([
        //     'kecamatan.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
        // ->groupBy(['kecamatan.nama'])
        // ->orderBy('id_kecamatan')
        // ->get();

        $data = Kecamatan::whereHas('laykes')->get();

        $pdf = PDF::loadView('master_data.download_rskecamatan', compact('data'));
        // return $pdf->download('data_rumahsakit-kecamatan.pdf');
        return $pdf->stream();
    }

    public function downloadRsKelurahan()
    {
        // $rskelurahan = DB::table('rumah_sakit')
        // ->select([
        //     'kelurahan.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        // ->groupBy(['kelurahan.nama'])
        // ->orderBy('id_kelurahan')
        // ->get();

        $data = Kelurahan::whereHas('laykes')->get();


        $pdf = PDF::loadView('master_data.download_rskelurahan', compact('data'));
        // return $pdf->download('data_rumahsakit-kelurahan.pdf');
        return $pdf->stream();
    }

    public function downloadRsWilayah()
    {
        // $rswilayah = DB::table('rumah_sakit')
        // ->select([
        //     'wilayah.nama',
        //     'nama_rumahsakit',
        //     DB::raw('COUNT(*) as jumlah ')
        // ])
        // ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
        // ->groupBy(['wilayah.nama'])
        // ->orderBy('id_wilayah')
        // ->get();

        $data = Wilayah::whereHas('laykes')->get();

        $pdf = PDF::loadView('master_data.download_rswilayah', compact('data'));
        // return $pdf->download('data_rumahsakit-Kotamadya.pdf');
        return $pdf->stream();
    }
}
