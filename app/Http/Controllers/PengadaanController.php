<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Pengadaan;
use App\Kategori;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();

        return view('pages/pengadaan', compact('kategori'));
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
                'nama' => 'required',
                'jumlah' => 'required',
                'harga_satuan' => 'required',
                // 'total' => 'required',
                'kategori_id' => 'required',
                'no_bst' => 'required',
                'keterangan' => 'required',
                'foto_bst' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $no_pengadaan = Pengadaan::count() + 1;

        // foto bst
        $file_bst = $request->file('foto_bst');
        $bst_name = "bst_".Auth::user()->id."_".$no_pengadaan.".".$file_bst->getClientOriginalExtension();
        $file_bst->move("images/bst/", $bst_name);

        Pengadaan::create([
            'id' => $no_pengadaan,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
            'kategori_id' => $request->kategori_id,
            'no_bst' => $request->no_bst,
            'foto_bst' => $bst_name,
            'keterangan' => $request->keterangan,
            'status_unit' => '0',
            'status_bidang' => '0',
            'user_id' => Auth::user()->id,
        ]);

        Session::flash('flash_message', 'Data Berhasil Disimpan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
