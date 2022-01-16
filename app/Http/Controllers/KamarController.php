<?php

namespace App\Http\Controllers;

use App\JenisKamar;
use App\Kamar;
use App\Laykes;
use PDF;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $laykes = Laykes::all();
        $jenis_kamar = JenisKamar::all();
        $kamar = Kamar::all();
        return view('kamar.index', compact('laykes', 'jenis_kamar', 'kamar'));
    }

    public function jumlahKamar()
    {
        $jmlKamar = Kamar::where('status', false)->get();
        dd($jmlKamar);
    }

    public function downloadPDF()
    {
        $laykes = Laykes::all();
        $kamar = Kamar::all();

        $pdf = PDF::loadView('kamar.cetak_dataKamar', compact('kamar', 'laykes'));
        return $pdf->stream();
    }
}
