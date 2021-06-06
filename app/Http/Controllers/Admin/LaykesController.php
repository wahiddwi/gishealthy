<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Wilayah;
use PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaykesController extends Controller
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
        $laykes = Laykes::all();
        return view('admin.laykes.index', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laykes = Laykes::all();
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('admin.laykes.create', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_rumahsakit' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'jumlah_kamar' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'id_wilayah' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required'
        ]);
        $laykes = new Laykes();
        $laykes->nama_rumahsakit = $request->nama_rumahsakit;
        $laykes->alamat = $request->alamat;
        $laykes->no_telpon = $request->no_telpon;
        $laykes->jumlah_kamar = $request->jumlah_kamar;
        $laykes->latitude = $request->latitude;
        $laykes->longitude = $request->longitude;
        $laykes->id_wilayah = $request->id_wilayah;
        $laykes->id_kecamatan = $request->id_kecamatan;
        $laykes->id_kelurahan = $request->id_kelurahan;
        $laykes->user_id = Auth::id();

        Toastr::success('Data Rumah Sakit berhasil di tambahkan', 'success');
        $laykes->save();

        return redirect()->route('admin.laykes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laykes = Laykes::findOrFail($id);

        return view('admin.laykes.show', compact('laykes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $laykes = Laykes::findOrFail($id);
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('admin.laykes.edit', compact(
            'wilayah', 'kecamatan', 'kelurahan', 'laykes'
        ));
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
        $this->validate($request, [
            'nama_rumahsakit' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'jumlah_kamar' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'id_wilayah' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required'
        ]);

        $laykes = Laykes::findOrFail($id);
        $laykes->nama_rumahsakit = $request->nama_rumahsakit;
        $laykes->id_wilayah = $request->id_wilayah;
        $laykes->id_kecamatan = $request->id_kecamatan;
        $laykes->id_kelurahan = $request->id_kelurahan;
        $laykes->latitude = $request->latitude;
        $laykes->longitude = $request->longitude;
        $laykes->alamat = $request->alamat;
        $laykes->no_telpon =    $request->no_telpon;
        $laykes->jumlah_kamar = $request->jumlah_kamar;

        $laykes->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('admin.laykes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laykes::where('id', $id)->delete();
        Toastr::success('Data berhasil dihapus', 'success');
        return redirect()->back();
    }

    public function downloadPDF($id)
    {
        $laykes = Laykes::findOrFail($id);

        $pdf = PDF::loadView('admin.pemetaan.cetak_detailrs', compact('laykes'));
        return $pdf->download('detail_rumahsakit.pdf');
    }

}
