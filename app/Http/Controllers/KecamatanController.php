<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Wilayah;
use PDF;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('wilayah', 'kecamatan'));
    }

    public function downloadPDF()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();

        $pdf = PDF::loadView('kecamatan.download_kecamatan', compact('wilayah', 'kecamatan'));
        return $pdf->download('data_kecamatan.pdf');
    }
}
