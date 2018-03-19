<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DataTables;
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
    	// return view('pages.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
        return view('pages.list_barang2', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
    }

    public function dataTanah(){
        $tanah = DB::table('tanahs as t')
                ->select('t.*')
                ->get();

        return Datatables::of($tanah)->make(true);
    }

}
