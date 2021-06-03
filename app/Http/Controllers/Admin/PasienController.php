<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Pasien;
use App\Wilayah;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('admin.pasien.index', compact('pasien', 'wilayah', 'kecamatan', 'kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $pasien = Pasien::all();

        return view('admin.pasien.create', compact('wilayah', 'kecamatan', 'kelurahan', 'pasien'));
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
            'nama_pasien' => 'required|min:5|max:40',
            'usia' => 'required|max:3',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required'
        ]);

        $pasien = new Pasien();
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->usia = $request->usia;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->id_wilayah = $request->id_wilayah;
        $pasien->id_kecamatan = $request->id_kecamatan;
        $pasien->id_kelurahan = $request->id_kelurahan;

        Toastr::success('Data Pasien Berhasil Ditambahkan', 'success');
        $pasien->save();

        return redirect()->route('admin.pasien.index');
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
        $pasien = Pasien::findOrFail($id);
        $wilayah = Wilayah::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('admin.pasien.edit', compact('pasien', 'wilayah', 'kecamatan'
                    , 'kelurahan'));
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
            'nama_pasien' => 'required|min:5|max:40',
            'usia' => 'required|max:3',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required'
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->usia = $request->usia;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->id_wilayah = $request->id_wilayah;
        $pasien->id_kecamatan = $request->id_kecamatan;
        $pasien->id_kelurahan = $request->id_kelurahan;

        $pasien->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('admin.pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('id', $id)->delete();
        Toastr::success('Data berhasil dihapus', 'success');
        return redirect()->back();
    }

    public function getDataWilayah()
    {
        $data['pasien_wilayah'] = DB::table('pasien')
            ->select([
                'wilayah.nama as nama_wilayah',
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
                DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('wilayah', 'wilayah.id', '=', 'pasien.id_wilayah')
            ->groupBy(['wilayah.nama'])
            ->orderBy('id_wilayah')
            ->get();
        // dd($data);
        return view('admin.pasien.pasien_wilayah', $data);
    }


    public function getDataKecamatan()
    {
        $data['pasien_kecamatan'] = DB::table('pasien')
            ->select([
                'kecamatan.nama as nama_kecamatan',
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
                DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('kecamatan', 'kecamatan.id', '=', 'pasien.id_kecamatan')
            ->groupBy(['kecamatan.nama'])
            ->orderBy('id_kecamatan')
            ->get();
        // dd($data);
        return view('admin.pasien.pasien_kecamatan', $data);
    }


    public function getDatakelurahan()
    {
        $data['pasien_kelurahan'] = DB::table('pasien')
            ->select([
                'kelurahan.nama as nama_kelurahan',
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
                DB::raw('COUNT(status) as jumlah_pasien')
            ])
            ->join('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
            ->groupBy(['kelurahan.nama'])
            ->orderBy('id_kelurahan')
            ->get();
        // dd($data);
        return view('admin.pasien.pasien_kelurahan', $data);
    }


    public function getAllData()
    {
        $data['allData'] = DB::table('pasien')
            ->select([
                'pasien.*',
                DB::raw('COUNT(if(status="Sembuh", status, NULL)) as jumlah_sembuh'),
                DB::raw('COUNT(if(status="Meninggal", status, NULL)) as jumlah_meninggal'),
                DB::raw('COUNT(if(status="Positif", status, NULL)) as jumlah_positif'),
            ])
            ->get();
        return view('admin.pasien.alldata', $data);
    }
}
