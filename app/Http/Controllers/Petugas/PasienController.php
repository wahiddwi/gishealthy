<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\InfoKamar;
use App\JenisKamar;
use App\Kamar;
use App\Kecamatan;
use App\Kelurahan;
use App\Laykes;
use App\Pasien;
use App\Wilayah;
use Barryvdh\DomPDF\PDF as BarryvdhPDF;
use PDF;
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
        $laykes = Laykes::all();
        $kamar = Kamar::all();

        return view('admin.pasien.index', compact('pasien', 'wilayah', 'kecamatan', 'kelurahan', 'laykes', 'kamar'));
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
        $laykes = Laykes::all();
        $kamar = Kamar::all();

        return view('admin.pasien.create', compact('wilayah', 'kecamatan', 'kelurahan', 'pasien', 'laykes', 'kamar'));
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
            'nik' => 'required|max:16',
            'id_wilayah' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'id_rumahsakit' => 'required',
            'id_kamar' => 'required',
            'nama_pasien' => 'required|max:40',
            'usia' => 'required|max:3',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required|max:13'

        ]);

        // dd($request->all());

        $pasien = new Pasien();
        $pasien->nik = $request->nik;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->usia = $request->usia;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->no_telpon = $request->no_telpon;
        $pasien->id_wilayah = $request->id_wilayah;
        $pasien->id_kecamatan = $request->id_kecamatan;
        $pasien->id_kelurahan = $request->id_kelurahan;
        $pasien->id_rumahsakit = $request->id_rumahsakit;
        $pasien->id_kamar = $request->id_kamar;

        $kamar = Kamar::findOrFail($request->id_kamar);
        $kamar->update([
            'status' => true
        ]);

        Toastr::success('Data Pasien Berhasil Ditambahkan', 'success');
        $pasien->save();
        return redirect()->route('petugas.pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);

        return view('admin.pasien.show', compact('pasien'));
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
        $laykes = Laykes::all();
        $kamar = Kamar::all();

        return view('admin.pasien.edit', compact('pasien', 'wilayah', 'kecamatan', 'kelurahan', 'laykes', 'kamar'));
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
        // $this->validate($request, [
        //     'nik' => 'required|max:16',
        //     'id_wilayah' => 'required',
        //     'id_kecamatan' => 'required',
        //     'id_kelurahan' => 'required',
        //     'id_rumahsakit' => 'required',
        //     'id_kamar' => 'required',
        //     'nama_pasien' => 'required|max:40',
        //     'usia' => 'required|max:3',
        //     'jenis_kelamin' => 'required',
        //     'status' => 'required',
        //     'alamat' => 'required',
        //     'no_telpon' => 'required|max:13',
        // ]);

        $pasien = Pasien::findOrFail($id);
        // $pasien->id = $request->id;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->usia = $request->usia;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        // $pasien->id_wilayah = $request->id_wilayah;
        // $pasien->id_kecamatan = $request->id_kecamatan;
        // $pasien->id_kelurahan = $request->id_kelurahan;
        $pasien->tanggal_keluar = $request->tanggal_keluar;

        $pasien->update();
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('petugas.pasien.index');
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

    public function getKamar($id)
    {
        echo json_encode(Kamar::where('id_rumahsakit', $id)->where('status', false)->get());
    }

    public function getKecamatan($id)
    {
        echo json_encode(Kecamatan::where('id_wilayah', $id)->get());
    }

    public function getKelurahan($id)
    {
        echo json_encode(Kelurahan::where('id_kecamatan', $id)->get());
    }

    public function pasienWilayah()
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

        // $data = Pasien::where('status', 'Sembuh')->where()->count();
            // dd($data);
        return view('admin.pasien.pasien_wilayah', $data);

    }

    public function pasienKecamatan()
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
        // return view('admin.pasien.pasien_kecamatan');
        return view('admin.pasien.pasien_kecamatan', $data);
    }

    public function pasienKelurahan()
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
        return view('admin.pasien.pasien_kelurahan', $data);
    }

    public function downloadDetailPDF($id)
    {
        $pasien = Pasien::findOrFail($id);

        $pdf = PDF::loadView('admin.pasien.cetak_detailPasien', compact('pasien'));
        return $pdf->stream();
    }

    public function downloadPDF()
    {
        $pasien = Pasien::all();
        $laykes = Laykes::all();
        $jenis_kamar = JenisKamar::all();
        $kamar = Kamar::all();

        $pdf = PDF::loadView('admin.pasien.cetak_datapasien', compact('pasien', 'laykes', 'jenis_kamar', 'kamar'));
        return $pdf->stream();
    }

        public function downloadPasienKecamatan()
    {
        $pasien_kecamatan = DB::table('pasien')
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

        $pdf = PDF::loadView('admin.pasien.cetak_datapasienkecamatan', compact('pasien_kecamatan'));
        // return $pdf->download('data_kasus-covid19-kecamatan.pdf');
        return $pdf->stream();
    }

        public function downloadPasienKelurahan()
    {
        $pasien_kelurahan = DB::table('pasien')
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

        $pdf = PDF::loadView('admin.pasien.cetak_datapasienkelurahan', compact('pasien_kelurahan'));
        // return $pdf->download('data_kasus-covid19-kelurahan.pdf');
        return $pdf->stream();
    }

    public function downloadPasienKota()
    {
        $pasien_wilayah = DB::table('pasien')
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

        $pdf = PDF::loadView('admin.pasien.cetak_datapasienkota', compact('pasien_wilayah'));
        // return $pdf->download('data_kasus-covid19-kelurahan.pdf');
        return $pdf->stream();
    }

}
