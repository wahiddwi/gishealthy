<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
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
}
