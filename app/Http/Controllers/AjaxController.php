<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesin;

class AjaxController extends Controller
{
    public function ruang($id){
    	if($id==0){
    		$mesin = Mesin::all();
    	} else {
    		$mesin = Mesin::where('lokasi_id', $id)->get();
    	}

    	return $mesin;

    }
}
