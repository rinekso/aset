<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanah;
use App\Mesin;
use App\Bangunan;
use App\Jalirja;
use App\Kontruksi;
use App\Asettetap;
use App\Bph;


class BarangController extends Controller
{
    public function index(){
    	$tanah = Tanah::all();
    	$mesin = Mesin::all();
    	$bangunan = Bangunan::all();
    	$jalirja = Jalirja::all();
    	$kontruksi = Kontruksi::all();
    	$aset = Asettetap::all();
    	$bph = Bph::all();
    	return view('pages.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
    }

    public function dataTanah(){
        $pengadaan = DB::table('pengadaan as p')
                ->select('p.*')
                ->get();

        return Datatables::of($pengadaan)->make(true);
    }

}
