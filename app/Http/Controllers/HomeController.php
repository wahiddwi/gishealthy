<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Pasien;
use App\Post;
use App\User;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {

    //     // return view('index', compact('data'));
    // }

    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $user = User::all();

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

        $allData = DB::table('pasien')
        ->select([
            DB::raw('COUNT(*) as total_kasus'),
            DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
            DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
            DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        ])
        ->get();

        return view('index', compact('allData', 'posts', 'user', 'total_kasus', 'total_sembuh', 'total_meninggal', 'total_positif'));
    }

}
