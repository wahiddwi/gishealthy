<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Wilayah;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelurahanController extends Controller
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
        $kelurahan = Kelurahan::all();
        return view('admin.kelurahan.index', compact('wilayah', 'kecamatan', 'kelurahan'));
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
        $kelurahan = new Kelurahan();
        $kelurahan->nama = $request->nama;
        $kelurahan->id_wilayah = $request->id_wilayah;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->user_id = Auth::id();

        Toastr::success('Data Kelurahan berhasil di tambahkan', 'success');
        $kelurahan->save();

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
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $wilayah = Wilayah::all();
        return view('admin.kelurahan.edit', compact('kelurahan' , 'kecamatan', 'wilayah'));
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
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama = $request->nama;
        $kelurahan->id_wilayah = $request->id_wilayah;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('admin.kelurahan.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelurahan::where('id', $id)->delete();
        Toastr::success('Data Kelurahan berhasil di hapus', 'success');
        return redirect()->back();
    }
}
