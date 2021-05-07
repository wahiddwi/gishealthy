<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Wilayah;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('wilayah', 'kecamatan'));
    }
}
