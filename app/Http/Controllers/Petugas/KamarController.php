<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\JenisKamar;
use App\Kamar;
use App\Laykes;
use PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laykes = Laykes::all();
        $jenis_kamar = JenisKamar::all();
        $kamar = Kamar::all();
        return view('admin.kamar.index', compact('laykes', 'jenis_kamar', 'kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kamar = new Kamar();
        $kamar->no_kamar = $request->no_kamar;
        $kamar->id_rumahsakit = $request->id_rumahsakit;
        $kamar->id_jeniskamar = $request->id_jeniskamar;
        $kamar->status = $request->status;

        Toastr::success('Data berhasil di tambahkan', 'success');
        $kamar->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $laykes = Laykes::all();
        $jenis_kamar = JenisKamar::all();

        return view('admin.kamar.edit', compact('kamar', 'laykes', 'jenis_kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->no_kamar = $request->no_kamar;
        $kamar->id_rumahsakit = $request->id_rumahsakit;
        $kamar->id_jeniskamar = $request->id_jeniskamar;
        $kamar->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('petugas.kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamar::where('id', $id)->delete();
        Toastr::success('Data berhasil di hapus', 'success');
        return redirect()->back();
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

        $pdf = PDF::loadView('admin.master_data.cetak_dataKamar', compact('kamar', 'laykes'));
        return $pdf->stream();
    }
}
