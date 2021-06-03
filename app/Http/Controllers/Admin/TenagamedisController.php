<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\TenagaMedis;
use App\Wilayah;
use PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
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
        $this->validate($request, [
            'jumlah_tenaga_medis' => 'required',
            'id_rumahsakit' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id_wilayah' => 'required'
        ]);
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
        $this->validate($request, [
            'jumlah_tenaga_medis' => 'required',
            'id_rumahsakit' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id_wilayah' => 'required'
        ]);
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

    public function gettenagamediskota()
    {
        //menampilkan jumlah tenaga medis berdasarkan kotamadya
        $data['medis_kota'] = DB::table('tenaga_medis')
        ->select([
            'wilayah.nama',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['wilayah.nama'])
        ->orderBy('id_wilayah')
        ->get()
        ;
        return view('admin.tenagamedis.datatenagamediskota', $data);
    }

    public function gettenagamediskecamatan()
    {
        //menampilkan jumlah tenaga medis berdasarkan kecamatan
        $data['medis_kecamatan'] = DB::table('tenaga_medis')
        ->select([
            'kecamatan.nama as nama_kecamatan',
            'wilayah.nama as nama_kota',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['kecamatan.nama', 'wilayah.nama'])
        ->orderBy('id_kecamatan')
        ->get()
        ;
        // dd($data);
        return view('admin.tenagamedis.mediskecamatan', $data );
    }

    public function getmediskelurahan()
    {
        //menampilkan jumlah tenaga medis berdasarkan kelurahan
        $data['medis_kelurahan'] = DB::table('tenaga_medis')
        ->select([
            'kelurahan.nama as nama_kelurahan',
            'kecamatan.nama as nama_kecamatan',
            'wilayah.nama as nama_kota',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'tenaga_medis.id_kelurahan')
        ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['kecamatan.nama', 'wilayah.nama', 'kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get()
        ;
        // dd($data);
        return view('admin.tenagamedis.mediskelurahan', $data );
    }

    public function downloadPDF()
    {
        $tenagamedis = TenagaMedis::all();
        $laykes = Laykes::all();

        $pdf = PDF::loadView('admin.tenagamedis.download_datatenagamedis', compact('tenagamedis', 'laykes'));
        return $pdf->download('data_tenagamedis.pdf');
    }

    public function downloadMedisKota()
    {
        // $tenagamedis = TenagaMedis::all();
        // $laykes = Laykes::all();
        $medis_kota = DB::table('tenaga_medis')
        ->select([
            'wilayah.nama',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['wilayah.nama'])
        ->orderBy('id_wilayah')
        ->get();

        $pdf = PDF::loadView('admin.tenagamedis.download_mediskota', compact('medis_kota'));
        return $pdf->download('data_tenagamedis_kota.pdf');
    }

    public function downloadMedisKecamatan()
    {
        //menampilkan jumlah tenaga medis berdasarkan kecamatan
        $medis_kecamatan = DB::table('tenaga_medis')
        ->select([
            'kecamatan.nama as nama_kecamatan',
            'wilayah.nama as nama_kota',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['kecamatan.nama', 'wilayah.nama'])
        ->orderBy('id_kecamatan')
        ->get()
        ;

        $pdf = PDF::loadView('admin.tenagamedis.download_mediskecamatan', compact('medis_kecamatan'));
        return $pdf->download('data_tenagamedis_kecamatan.pdf');
    }

    public function downloadMedisKelurahan()
    {
        //menampilkan jumlah tenaga medis berdasarkan kelurahan
        $medis_kelurahan = DB::table('tenaga_medis')
        ->select([
            'kelurahan.nama as nama_kelurahan',
            'kecamatan.nama as nama_kecamatan',
            'wilayah.nama as nama_kota',
            DB::raw('SUM(jumlah_tenaga_medis) as jumlah_tenaga_medis ')
        ])
        ->join('kelurahan', 'kelurahan.id', '=', 'tenaga_medis.id_kelurahan')
        ->join('kecamatan', 'kecamatan.id', '=', 'tenaga_medis.id_kecamatan')
        ->join('wilayah', 'wilayah.id', '=', 'tenaga_medis.id_wilayah')
        ->groupBy(['kecamatan.nama', 'wilayah.nama', 'kelurahan.nama'])
        ->orderBy('id_kelurahan')
        ->get();

        $pdf = PDF::loadView('admin.tenagamedis.download_mediskelurahan', compact('medis_kelurahan'));
        return $pdf->download('data_tenagamedis_kelurahan.pdf');
    }
}
