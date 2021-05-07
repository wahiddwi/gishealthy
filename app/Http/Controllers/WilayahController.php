<?php

namespace App\Http\Controllers;

use App\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        return view('wilayah.index', compact('wilayah'));
    }
}
