<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Pengadaan;
use App\User;

class BidangController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'bidang']);

    }
    public function index()
    {
        return view('pages.bidang_home');
    }

    public function listPengadaan(){
    	$pengadaan = Pengadaan::all();
    	return view('bidang.list_pengadaan', compact('pengadaan'));
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
