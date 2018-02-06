<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Pengadaan;

class UnitController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'unit']);

    }
    public function index()
    {
        return view('pages.unit_home');
    }
    public function listPengadaan(){
    	$pengadaan = Pengadaan::all();
    	return view('unit.list_pengadaan2', compact('pengadaan'));
    }

	public function getDataPengadaan(){
    	// $pengadaan = Pengadaan::query();
    	// return Datatables::of($pengadaan)->make(true);
    }    

    public function approve($id){
    	Pengadaan::find($id)->update(['status_unit' => 1]);
    	return redirect()->back();
    }
    public function tolak($id){
    	Pengadaan::find($id)->update(['status_unit' => 2]);
    	return redirect()->back();
    }
}
