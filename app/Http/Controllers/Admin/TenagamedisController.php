<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\TenagaMedis;
use App\Wilayah;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TenagamedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenagamedis = TenagaMedis::all();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $wilayah = Wilayah::all();
        $laykes = Laykes::all();
        return view('admin.tenagamedis.index', compact('tenagamedis', 'kelurahan', 'kecamatan', 'wilayah', 'laykes'));
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
        $tenagamedis = new TenagaMedis();
        $tenagamedis->jumlah_tenaga_medis = $request->jumlah_tenaga_medis;
        $tenagamedis->id_rumahsakit = $request->id_rumahsakit;
        $tenagamedis->id_kelurahan = $request->id_kelurahan;
        $tenagamedis->id_kecamatan = $request->id_kecamatan;
        $tenagamedis->id_wilayah = $request->id_wilayah;

        Toastr::success('Data Rumah Sakit berhasil di tambahkan', 'success');
        $tenagamedis->save();

        return redirect()->route('admin.tenagamedis.index');
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
        $tenagamedis = TenagaMedis::findOrFail($id);
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $wilayah = Wilayah::all();
        $laykes = Laykes::all();

        return view('admin.tenagamedis.edit', compact('tenagamedis', 'kelurahan', 'kecamatan', 'wilayah', 'laykes'));
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
        $tenagamedis = TenagaMedis::findOrFail($id);
        $tenagamedis->jumlah_tenaga_medis = $request->jumlah_tenaga_medis;
        $tenagamedis->id_kelurahan = $request->id_kelurahan;
        $tenagamedis->id_kecamatan = $request->id_kecamatan;
        $tenagamedis->id_wilayah = $request->id_wilayah;
        $tenagamedis->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('admin.tenagamedis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TenagaMedis::where('id', $id)->delete();
        Toastr::success('Data berhasil di hapus', 'success');
        return redirect()->back();
    }
}
