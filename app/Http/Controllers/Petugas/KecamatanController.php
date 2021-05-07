<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Wilayah;
use Brian2694\Toastr\Facades\Toastr;
use PDF;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        return view('admin.kecamatan.index', compact('wilayah', 'kecamatan'));
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
        $kecamatan = new Kecamatan();
        $kecamatan->nama = $request->nama;
        $kecamatan->id_wilayah = $request->id_wilayah;

        Toastr::success('Data Kecamatan berhasil di tambahkan', 'success');
        $kecamatan->save();

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
        $kecamatan = Kecamatan::findOrFail($id);
        $wilayah = Wilayah::all();
        return view('admin.kecamatan.edit', compact('kecamatan', 'wilayah'));
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->nama = $request->nama;
        $kecamatan->id_wilayah = $request->id_wilayah;
        $kecamatan->update();

        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('petugas.kecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kecamatan::where('id', $id)->delete();
        Toastr::success('Data Kecamatan berhasil di hapus', 'success');
        return redirect()->back();
    }

    public function downloadPDF()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $pdf = PDF::loadView('admin.kecamatan.download_kecamatan', compact('wilayah', 'kecamatan'));
        return $pdf->download('data_kecamatan.pdf');
    }
}
