<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atk;

class BarangController extends Controller
{
    public function index(){
    	$atk = Atk::all();
    	return view('pages.list_barang', compact('atk'));
    }
}
