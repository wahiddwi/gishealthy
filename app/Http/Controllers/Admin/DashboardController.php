<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {

        for ($i = 1; $i < 13; $i++) {

            $total_data_kasus[] = Pasien::whereMonth('created_at', $i)->count();
            $total_data_sembuh[] = Pasien::whereMonth('created_at', $i)->where('status', "Sembuh")->count();
            $total_data_meninggal[] = Pasien::whereMonth('created_at', $i)->where('status', "Meninggal")->count();
            $total_data_positif[] = Pasien::whereMonth('created_at', $i)->where('status', "Positif")->count();
        
        }

        $total_kasus = json_encode($total_data_kasus);
        $total_sembuh = json_encode($total_data_sembuh);
        $total_meninggal = json_encode($total_data_meninggal);
        $total_positif = json_encode($total_data_positif);


        // dd($total_data_kasus);




        $allData = DB::table('pasien')
            ->select([
                DB::raw('COUNT(*) as total_kasus'),
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            ])
            ->get();
        // $total_kasus = DB::table('pasien')
        //     ->select([
        //         DB::raw('COUNT(*) as total_kasus'),
        //         DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        //         DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        //         DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        //         DB::raw('DATE(created_at) as tanggal')
        //     ])
        //     ->groupBy('tanggal')
        //     ->get();
        // $sembuh = DB::table('pasien')
        //     ->select([
        //         DB::raw('COUNT(*) as total_kasus'),
        //         DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        //         DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        //         DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        //         DB::raw('DATE(created_at) as tanggal')
        //     ])
        //     ->groupBy('tanggal')
        //     ->get();
        // $meninggal = DB::table('pasien')
        //     ->select([
        //         DB::raw('COUNT(*) as total_kasus'),
        //         DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        //         DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        //         DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        //         DB::raw('DATE(created_at) as tanggal')
        //     ])
        //     ->groupBy('tanggal')
        //     ->get();
        // $positif = DB::table('pasien')
        //     ->select([
        //         DB::raw('COUNT(*) as total_kasus'),
        //         DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        //         DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        //         DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        //         DB::raw('DATE(created_at) as tanggal')
        //     ])
        //     ->groupBy('tanggal')
        //     ->get();
        // $tanggal = DB::table('pasien')
        //     ->select([
        //         DB::raw('COUNT(*) as total_kasus'),
        //         DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        //         DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        //         DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        //         DB::raw('DATE(created_at) as tanggal')
        //     ])
        //     ->groupBy('tanggal')
        //     ->get();
        // dd($tanggal);
        return view('admin.dashboard', compact('allData', 'total_kasus', 'total_sembuh', 'total_meninggal', 'total_positif'));
    }
}
