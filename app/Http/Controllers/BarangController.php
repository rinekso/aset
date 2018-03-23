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
        $tanah = Tanah::with('kegiatan')
                ->select('tanahs.*');

        return Datatables::of($tanah)->make(true);
    }

    public function dataMesin(){
        $mesin = Mesin::with('kegiatan')
                ->select('mesins.*');

        return Datatables::of($mesin)->make(true);
    }

    public function dataBangunan(){
        $bangunan = Bangunan::with('kegiatan')
                ->select('bangunans.*');

        return Datatables::of($bangunan)->make(true);
    }

    public function dataJalirja(){
        $jalirja = Jalirja::with('kegiatan')
                ->select('jalirjas.*');

        return Datatables::of($jalirja)->make(true);
    }

    public function dataAset(){
        $aset = Asettetap::with('kegiatan')
                ->select('asettetaps.*');

        return Datatables::of($aset)->make(true);
    }

    public function dataKontruksi(){
        $kontruksi = Kontruksi::with('kegiatan')
                ->select('kontruksis.*');

        return Datatables::of($kontruksi)->make(true);
    }

    public function dataBph(){
        $bph = Bph::with('kegiatan')
                ->select('bphs.*');

        return Datatables::of($bph)->make(true);
    }

}
