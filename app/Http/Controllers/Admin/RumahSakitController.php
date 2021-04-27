<?php

namespace App\Http\Controllers\Admin;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use App\Http\Controllers\Controller;
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

    public function pemetaan_rs()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $laykes = Laykes::all();
        return view('admin.pemetaan.index', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
    }

    // SELECT id_kelurahan, nama_rumahsakit, nama FROM rumah_sakit JOIN kelurahan ON (kelurahan.id = rumah_sakit.id_kelurahan) ORDER BY (id_kelurahan)

    public function getrskelurahan()
    {
        //menampilkan rumah sakit berdasarkan kelurahan
        // $rskelurahan = DB::table('rumah_sakit')
        //                 ->select('id_kelurahan', 'nama_rumahsakit')
        //                 ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        //                 ->get();

        // menampilkan rumah sakit yang berada di id kelurahan 5
            // $rskelurahan = DB::table('rumah_sakit')
            //                 ->join('kelurahan', function ($join){
            //                 $join->on('kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
            //                 ->where('kelurahan.id', '=', 5);
            //                 })
            //                 ->get();

        //menampilkan jumlah rumah sakit yang id_kelurahan 1
        // $rskelurahan5 = DB::table('rumah_sakit')
        // ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan')
        // ->where('kelurahan.id', '=', 5  )
        //                 ->count('nama_rumahsakit');

        // $kelurahan5 = DB::table('kelurahan')
        // ->select('nama')
        // ->where('id', '=', 5)
        // ->orderBy('id')
        // ->get();
        // return view('admin.master_data.rumahsakitkelurahan', compact('rskelurahan5', 'kelurahan5'));

        // $rskelurahan = DB::table('rumah_sakit')
        //                 ->select(DB::raw('count(*) as jumlah_rumah_sakit, nama_rumahsakit'))
        //                 ->where('kelurahan.id', '=', 5  )
        //                 ->join('kelurahan', 'kelurahan.id', '=', 'rumah_sakit.id_kelurahan');
        
        // dd($kelurahan, $rskelurahan);

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
        //menampilkan jumlah rumah sakit yang id_kecamatan =3 
        // $rskecamatan3 = DB::table('rumah_sakit')
        // ->join('kecamatan', 'kecamatan.id', '=', 'rumah_sakit.id_kecamatan')
        // ->where('kecamatan.id', '=', 3  )
        //                 ->count('nama_rumahsakit');
        //menampilkan nama kecamatan yang id_kecamatan = 3
        // $kecamatan3 = DB::table('kecamatan')
        // ->select('nama')
        // ->where('id', '=', 3)
        // ->orderBy('id')
        // ->get();
        // return view('admin.master_data.rumahsakitkecamatan', compact('rskecamatan3', 'kecamatan3'));

        //menampilkan jumlah rumah sakit berdasarkan kecamatan
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
}
