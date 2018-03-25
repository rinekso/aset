<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DataTables;
use App\User;
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
                        
                        if($pengadaan->kategori_id == 2 || $pengadaan->kategori_id == 5) {
                            return '<a class="btn btn-info btn-xs" href="#kirPopup'.$pengadaan->id.'">KIR</a>
                            <a href="'.url("bidang/tolak/$pengadaan->id").'" class="btn btn-danger btn-xs" style="margin-top:2px">Decline</a>
                            <div id="kirPopup'.$pengadaan->id.'" class="overlay">
                                <div class="popup">
                                    <h4>Lokasi Penempatan <strong>'.$pengadaan->nama.'</strong></h4>
                                    <a class="close" href="#">&times;</a>
                                    <div class="contentPopup">
                                        <form role="form" action="/bidang/store-lokasi" method="POST" enctype="multipart/form-data">'.
                                            csrf_field()
                                            .'<div class="form-group">
                                                <label>Lokasi</label>
                                                <input name="id" value="'.$pengadaan->id.'" hidden>
                                                <input type="text" class="form-control" name="lokasi_kir" value="'.$pengadaan->lokasi_kir.'">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ';
                        } else{
                            return '<a href="'.url("bidang/tolak/$pengadaan->id").'" class="btn btn-danger btn-xs" style="margin-top:2px">Decline</a>';
                        }

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

    public function getUsers(){
        return view('bidang.list-users');

    }

    public function dataUserSubunit(){
        
        $user = User::with('profile.subunit', 'profile.unit')
            ->where('role', 1)
            ->select('users.*');

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                if ($user->status == 1) {
                    return '<a class="btn btn-danger btn-sm" href="'.url("bidang/nonaktif/$user->nip").'">Nonaktifkan</a>';
                } else {
                    return '<a class="btn btn-success btn-sm" href="'.url("bidang/aktif/$user->nip").'">Aktifkan</a>';
                }
            }) 
            ->make(true);
    }

    public function dataUserUnit(){
        $user = User::with('profile.unit')
            ->where('role', 2)
            ->select('users.*');

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                if ($user->status == 1) {
                    return '<a class="btn btn-danger btn-sm" href="'.url("bidang/nonaktif/$user->nip").'">Nonaktifkan</a>';
                } else {
                    return '<a class="btn btn-success btn-sm" href="'.url("bidang/aktif/$user->nip").'">Aktifkan</a>';
                }
            }) 
            ->make(true);
    }

    public function aktif($id){

        User::where('nip', $id)->update(['status' => 1]);
        return redirect('bidang/list-users');

    }

    public function nonaktif($id){

        User::where('nip', $id)->update(['status' => 2]);
        return redirect('bidang/list-users');

    }

    public function storeLokasi(Request $request){
        Pengadaan::find($request->id)
            ->update(['lokasi_kir' => $request->lokasi_kir]);

        $kegiatan = Pengadaan::find($request->id)->kegiatan_id;

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('bidang/kegiatan/'.$kegiatan);
    }
}
