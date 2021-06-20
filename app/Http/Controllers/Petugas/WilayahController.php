<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Wilayah;
use Brian2694\Toastr\Facades\Toastr;
use PDF;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = Wilayah::all();
        return view('admin.wilayah.index', compact('wilayah'));
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
            'nama' => 'required'
        ]);
        Wilayah::create($request->all());
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
        $wilayah = Wilayah::findOrFail($id);
        return view('admin.wilayah.edit', compact('wilayah'));
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
            'nama' => 'required'
        ]);

        $data_wilayah = [
            'nama' => $request->nama
        ];

        Wilayah::whereId($id)->update($data_wilayah);
        Toastr::success('Data Wilayah berhasil diubah', 'success');
        return redirect()->route('petugas.wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::findorfail($id);
        $wilayah->delete();
        Toastr::success('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
