<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
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
        $allData = DB::table('pasien')
        ->select(['pasien.*',
        DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
        DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
        DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
        ])
        ->get()
        ;
        return view('index', compact('allData', 'posts', 'user'));
    }

}
