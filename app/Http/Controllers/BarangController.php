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
use App\Kir;
use App\Koderuang;


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

    public function unit(){
        $tanah = Tanah::all();
        $mesin = Mesin::all();
        $bangunan = Bangunan::all();
        $jalirja = Jalirja::all();
        $kontruksi = Kontruksi::all();
        $aset = Asettetap::all();
        $bph = Bph::all();
        // return view('pages.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
        return view('unit.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
    }

    public function bidang(){
        $tanah = Tanah::all();
        $mesin = Mesin::all();
        $bangunan = Bangunan::all();
        $jalirja = Jalirja::all();
        $kontruksi = Kontruksi::all();
        $aset = Asettetap::all();
        $bph = Bph::all();
        // return view('pages.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
        return view('bidang.list_barang', compact('tanah', 'mesin', 'bangunan', 'jalirja', 'kontruksi', 'aset', 'bph'));
    }

    public function aset(){
        $mesin = Mesin::all();
        $aset = Asettetap::all();
        $kir = Kir::all();
        $koderuang = Koderuang::all();
        return view('bidang.list_aset', compact('mesin','aset', 'koderuang'));
    }

    public function dataTanah(){
        $tanah = Tanah::with('kegiatan')
                ->select('tanahs.*');

        return Datatables::of($tanah)->make(true);
    }

    public function dataMesin(){
        $mesin = Mesin::with('kegiatan', 'kir')
                ->select('mesins.*');

        return Datatables::of($mesin)
            ->addColumn('action', function ($mesin) {

                return '<a class="btn btn-info btn-xs" href="#kirPopup'.$mesin->kode_barang.'" onclick="lokasi();">Ubah Lokasi</a>
                        <div id="kirPopup'.$mesin->kode_barang.'" class="overlay">
                            <div class="popup">
                                <h4>Lokasi Penempatan <strong>'.$mesin->nama_barang.'</strong></h4>
                                <a class="close" href="#">&times;</a>
                                <div class="contentPopup">
                                    <form role="form" action="/bidang/store-lokasi-aset" method="POST" enctype="multipart/form-data">'.
                                        csrf_field()
                                        .'<div class="form-group">
                                            <label>Lokasi</label>
                                            <input name="id" value="'.$mesin->kegiatan_id.'" hidden>
                                            <input name="kode_barang" value="'.$mesin->kode_barang.'" hidden>
                                            <select class="form-control lokasi_id" name="lokasi_id">
                                            </select>      
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
            }) 
            ->make(true);
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
        $aset = Asettetap::with('kegiatan', 'kir')
                ->select('asettetaps.*');

        return Datatables::of($aset)
            ->addColumn('action', function ($aset) {
                return '<a class="btn btn-info btn-xs" href="#kirPopup'.$aset->kode_barang.'" onclick="lokasi();">Lokasi</a>
                        <div id="kirPopup'.$aset->kode_barang.'" class="overlay">
                            <div class="popup">
                                <h4>Lokasi Penempatan <strong>'.$aset->nama_barang.'</strong></h4>
                                <a class="close" href="#">&times;</a>
                                <div class="contentPopup">
                                    <form role="form" action="/bidang/store-lokasi-aset" method="POST" enctype="multipart/form-data">'.
                                        csrf_field()
                                        .'<div class="form-group">
                                            <label>Lokasi</label>
                                            <input name="id" value="'.$aset->kegiatan_id.'" hidden>
                                            <input name="kode_barang" value="'.$aset->kode_barang.'" hidden>
                                            <select class="form-control lokasi_id" name="lokasi_id">
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
            }) 
            ->make(true);
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
