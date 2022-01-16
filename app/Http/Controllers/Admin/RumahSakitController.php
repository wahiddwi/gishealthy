<?php

namespace App\Http\Controllers\Admin;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use App\Http\Controllers\Controller;
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
        return view('admin.master_data.data_rumahsakit', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
    }

    public function getrskelurahan()
    {

        //menampilkan jumlah rumah sakit berdasarkan kelurahan
        $data['rskelurahan'] = DB::table('rumah_sakit')
        ->select([
            'kelurahan.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        ->groupBy(['kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get()
        ;

        return view('admin.master_data.rumahsakitkelurahan', $data);

    }

    public function getrskecamatan()
    {
        $data['rskecamatan'] = DB::table('rumah_sakit')
        ->select([
            'kecamatan.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
        ->groupBy(['kecamatan.nama'])
        ->orderBy('id_kecamatan')
        ->get()
        ;

        return view('admin.master_data.rumahsakitkecamatan', $data);
    }

    public function getrskota()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        $data['rswilayah'] = DB::table('rumah_sakit')
        ->select([
            'wilayah.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
        ->groupBy(['wilayah.nama'])
        ->orderBy('id_wilayah')
        ->get()
        ;

        return view('admin.master_data.rumahsakitwilayah', $data);
    }

    public function downloadPDF()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();

        $pdf = PDF::loadView('admin.master_data.cetak_datars', compact('wilayah', 'kecamatan', 'kelurahan', 'laykes'))->setPaper('a4','landscape');
        return $pdf->download('data_rumahsakit.pdf');
    }

    public function downloadRsKelurahan()
    {
        //menampilkan jumlah rumah sakit berdasarkan kelurahan
        $rskelurahan = DB::table('rumah_sakit')
        ->select([
            'kelurahan.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        ->groupBy(['kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get();

        $pdf = PDF::loadView('admin.master_data.cetak_datarskelurahan', compact('rskelurahan'));
        return $pdf->download('data_rumahsakit_kelurahan.pdf');

    }

    public function downloadRsKecamatan()
    {
        $rskecamatan = DB::table('rumah_sakit')
        ->select([
            'kecamatan.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
        ->groupBy(['kecamatan.nama'])
        ->orderBy('id_kecamatan')
        ->get();

        $pdf = PDF::loadView('admin.master_data.cetak_datarskecamatan', compact('rskecamatan'));
        return $pdf->download('data_rumahsakit_kecamatan.pdf');
    }

    public function downloadRsKota()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        $rswilayah = DB::table('rumah_sakit')
        ->select([
            'wilayah.nama',
            'nama_rumahsakit',
            DB::raw('COUNT(*) as jumlah ')
        ])
        ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
        ->groupBy(['wilayah.nama'])
        ->orderBy('id_wilayah')
        ->get();
        
        $pdf = PDF::loadView('admin.master_data.cetak_datarskota', compact('rswilayah'));
        return $pdf->download('data_rumahsakit_kota.pdf');
    }

}
