<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\JenisKamar;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class JenisKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kamar = JenisKamar::all();
        return view('admin.jenis_kamar.index', compact('jenis_kamar'));
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
            'jenis_kamar' => 'required',
        ]);
        JenisKamar::create($request->all());
        Toastr::success('Data berhasil ditambah', 'success');
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
        $jenis_kamar = JenisKamar::findOrFail($id);
        return view('admin.jenis_kamar.edit', compact('jenis_kamar'));
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
            'jenis_kamar' => 'required'
        ]);

        $jenis_kamar = [
            'jenis_kamar' => $request->jenis_kamar
        ];

        JenisKamar::whereId($id)->update($jenis_kamar);
        Toastr::success('Data berhasil diubah', 'success');
        return redirect()->route('petugas.jenis_kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_kamar = JenisKamar::findorfail($id);
        $jenis_kamar->delete();
        Toastr::success('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
