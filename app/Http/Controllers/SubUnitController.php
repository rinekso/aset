<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pengadaan;
use App\ATK;
use App\Elektronika;

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

    public function inputBarang(){
        $pengadaan = Pengadaan::where([
                        ['user_id', '=', Auth::user()->id],
                        ['status_unit', '=', '1'],
                        ['status_bidang', '=', '1'],
                    ])->get();

        return view('subunit.input_barang', compact('pengadaan'));
    }

    public function formInputBarang($id){
        $kategori = Pengadaan::find($id)->kategori_id;
        $pengadaan = Pengadaan::find($id);
        if ($kategori == 1) {
            return view('subunit.barang.input_atk', compact('pengadaan'));
        } elseif ($kategori == 2) {
            return view('subunit.barang.input_eletro', compact('pengadaan'));
        } elseif ($kategori == 3) {
            return view('subunit.barang.input_mesin', compact('pengadaan'));
        } elseif ($kategori == 4) {
            return view('subunit.barang.input_meuble', compact('pengadaan'));
        } elseif ($kategori == 5) {
            return view('subunit.barang.input_tanah', compact('pengadaan'));
        }
    }

    public function storeBarang(Request $request)
    {
        if ($request->kategori_id == 1) {
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'merk' => 'required',
                    'satuan' => 'required',
                    'jenis_barang' => 'required',
                ]);
        }


        ATK::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->total,
            'jenis_barang' => $request->jenis_barang,
            'keterangan' => $request->keterangan,
            'stok' => $request->jumlah,
        ]);

        Pengadaan::find($request->id)
            ->update([
                'status_unit' => 3, 
                'status_bidang' => 3,
            ]);      

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('/subunit/inputBarang');
    }
}
