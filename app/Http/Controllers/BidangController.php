<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DataTables;
use App\Profile;
use App\Kegiatan;
use App\Kodekegiatan;
use App\Pengadaan;
use App\Kategori;
use App\Tanah;
use App\Mesin;
use App\Bangunan;
use App\Jalirja;
use App\Asettetap;
use App\Kontruksi;
use App\Bph;

class BidangController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'bidang']);

    }
    public function index()
    {
        
        $nip = Auth::user()->nip;
        $profile = Profile::where('nip', $nip)->first();
        return view('bidang.home', compact('profile'));
    }

    
    public function listKegiatan(){
        return view('bidang.list_kegiatan');
    }

    public function dataKegiatan(){
        $kegiatan = Kegiatan::with('user')
                ->select('kegiatans.*');

        return Datatables::of($kegiatan)
            ->addColumn('action', function ($kegiatan) {
                return '<a class="btn btn-success btn-sm" href="'.url("bidang/kegiatan/$kegiatan->kode").'">Buka</a>';
            })           
            ->make(true);
    }

    public function kegiatanPengadaan($id){

        $kegiatan = Kegiatan::where('kode', $id)->first();
        return view('bidang.kegiatan_pengadaan', compact('kegiatan'));
    
    }

    public function dataPengadaan($id){
        $pengadaan = Pengadaan::with('kategori')
                        ->where('kegiatan_id', '=',  $id)
                        ->select('pengadaan.*');

        return Datatables::of($pengadaan)
                ->addColumn('action', function($pengadaan){
                    if($pengadaan->status_bidang == 0) {
                        return '<a href="'.url("bidang/approve/$pengadaan->id").'" class="btn btn-success btn-xs">Approve</a><a href="'.url("bidang/tolak/$pengadaan->id").'" class="btn btn-danger btn-xs" style="margin-top:2px">Decline</a>';
                    } else if($pengadaan->status_bidang == 1) {
                        return '<a href="'.url("bidang/tolak/$pengadaan->id").'" class="btn btn-danger btn-xs" style="margin-top:2px">Decline</a>';
                    } else if($pengadaan->status_bidang == 2) {
                        return '<a href="'.url("bidang/approve/$pengadaan->id").'" class="btn btn-success btn-xs">Approve</a>';
                    }
                })
                ->make(true);
    }

    public function approve($id){
    	Pengadaan::find($id)->update(['status_bidang' => 1]);
    	return redirect()->back();
    }
    public function tolak($id){
    	Pengadaan::find($id)->update(['status_bidang' => 2]);
    	return redirect()->back();
    }
}
