<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengadaan;

class SubUnitController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'subunit']);

    }
    public function index()
    {
        return view('pages.subunit_home');
    }

    public function listPengadaan(){
        $pengadaan = Pengadaan::where('user_id', Auth::user()->id)->get();
    	return view('subunit.list_pengadaan', compact('pengadaan'));
    }
}
