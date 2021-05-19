<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $data['allData'] = DB::table('pasien')
            ->select([
                DB::raw('COUNT(*) as total_kasus'),
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            ])
            ->get();
            // dd($data);
        return view('admin.dashboard', $data);
    }

    public function chart(Request $request)
    {
        $chart = DB::table('pasien')
                ->select([
                    DB::raw('COUNT(*) as jumlah'),
                    DB::raw('DATE(created_at) as tanggal')
                    ])
                    ->groupBy('tanggal')
                    ->get()
                    ;
                    // dd($chart);
                    // return view('admin.dashboard', $chart);
    }
}
