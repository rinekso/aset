<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atk;
use App\Elektronika;
use App\Mesin;
use App\Meuble;
use App\Tanah;

class BarangController extends Controller
{
    public function index(){
    	$atk = Atk::all();
    	$elektro = Elektronika::all();
    	$mesin = Mesin::all();
    	$meuble = Meuble::all();
    	$tanah = Tanah::all();
    	return view('pages.list_barang', compact('atk', 'elektro', 'mesin', 'meuble', 'tanah'));
    }
}
