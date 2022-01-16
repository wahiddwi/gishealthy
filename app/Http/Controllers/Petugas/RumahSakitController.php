<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
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
        return view('admin.master_data.data_rumahsakit', compact(
            'wilayah',
            'kecamatan',
            'kelurahan',
            'laykes'
        ));
    }

    public function getrskelurahan()
    {

        //menampilkan jumlah rumah sakit berdasarkan kelurahan

        $data = Kelurahan::whereHas('laykes')->get();

        return view('admin.master_data.rumahsakitkelurahan', compact('data'));
    }

    public function getrskecamatan()
    {
        $data = Kecamatan::whereHas('laykes')->get();

        return view('admin.master_data.rumahsakitkecamatan', compact('data'));
    }

    public function getrskota()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        $data = Wilayah::whereHas('laykes')->get();

        return view('admin.master_data.rumahsakitwilayah', compact('data'));
    }

    public function downloadPDF()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();

        $pdf = PDF::loadView('admin.master_data.cetak_datars', compact('wilayah', 'kecamatan', 'kelurahan', 'laykes'))->setPaper('a4', 'landscape');
        // $pdf = PDF::loadView('admin.master_data.cetak_datars', ['wilayah' => $wilayah, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'laykes => $laykes'])->setPaper('a4', 'landscape');
        // return $pdf->download('data_rumahsakit.pdf');
        return $pdf->stream();
    }

    public function downloadRsKelurahan()
    {
        //menampilkan jumlah rumah sakit berdasarkan kelurahan
        // $rskelurahan = DB::table('rumah_sakit')
        //     ->select([
        //         'kelurahan.nama',
        //         'nama_rumahsakit',
        //         DB::raw('COUNT(*) as jumlah ')
        //     ])
        //     ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        //     ->groupBy(['kelurahan.nama'])
        //     ->orderBy('id_kelurahan')
        //     ->get();
        $data = Kelurahan::whereHas('laykes')->get();

        $pdf = PDF::loadView('admin.master_data.cetak_datarskelurahan', ['data' => $data]);
        // return $pdf->download('data_rumahsakit_kelurahan.pdf');
        return $pdf->stream();
    }

    public function downloadRsKecamatan()
    {
        $data = Kecamatan::whereHas('laykes')->get();

        $pdf = PDF::loadView('admin.master_data.cetak_datarskecamatan', ['data' => $data]);
        // return $pdf->download('data_rumahsakit_kecamatan.pdf');
        return $pdf->stream();
    }

    public function downloadRsKota()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        // $rswilayah = DB::table('rumah_sakit')
        //     ->select([
        //         'wilayah.nama',
        //         'nama_rumahsakit',
        //         DB::raw('COUNT(*) as jumlah ')
        //     ])
        //     ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
        //     ->groupBy(['wilayah.nama'])
        //     ->orderBy('id_wilayah')
        //     ->get();
        $data = Wilayah::whereHas('laykes')->get();

        $pdf = PDF::loadView('admin.master_data.cetak_datarskota', ['data' =>$data]);
        // return $pdf->download('data_rumahsakit_kota.pdf');
        return $pdf->stream();
    }

    public function detailRS()
    {
        //menampilkan jumlah rumah sakit berdasarkan Kota madya
        $detailRs = DB::table('rumah_sakit')
            ->select([
                'wilayah.nama',
                'nama_rumahsakit',
                DB::raw('COUNT(*) as jumlah ')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'rumah_sakit.id_wilayah')
            ->groupBy(['wilayah.nama', 'nama_rumahsakit'])
            ->orderBy('id_wilayah')
            ->get();
        // dd($detailRs);
        return view('admin.master_data.rumahsakitwilayah', compact('detailRs'));
    }


}
