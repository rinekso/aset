<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pengadaan;
use App\ATK;
use App\Elektronika;
use App\Mesin;
use App\Tanah;

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
            return view('subunit.barang.input_elektro', compact('pengadaan'));
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
        } elseif ($request->kategori_id == 2) {
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'merk' => 'required',
                    'spesifikasi' => 'required',
                    'no_seri' => 'required',
                    'satuan' => 'required',
                    'jenis_barang' => 'required',
                ]);
            Elektronika::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'merk' => $request->merk,
                'spesifikasi' => $request->spesifikasi,
                'no_seri' => $request->no_seri,
                'jumlah' => $request->jumlah,
                'satuan' => $request->satuan,
                'harga_satuan' => $request->harga_satuan,
                'total' => $request->total,
                'jenis_barang' => $request->jenis_barang,
                'keterangan' => $request->keterangan,
                'stok' => $request->jumlah,
            ]);

        } elseif ($request->kategori_id == 3) {
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'merk' => 'required',
                    'type' => 'required',
                    'ukuran' => 'required',
                    'bahan' => 'required',
                    'no_pabrik' => 'required',
                    'no_rangka' => 'required',
                    'no_mesin' => 'required',
                    'lokasi' => 'required',
                ]);
            Mesin::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'merk' => $request->merk,
                'type' => $request->type,
                'ukuran' => $request->ukuran,
                'bahan' => $request->bahan,
                'no_pabrik' => $request->no_pabrik,
                'no_rangka' => $request->no_rangka,
                'no_mesin' => $request->no_mesin,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total' => $request->total,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan,
            ]);


        } elseif ($request->kategori_id == 4) {
            # code...
        } elseif ($request->kategori_id == 5) {
            # code...
        }



        Pengadaan::find($request->id)
            ->update([
                'status_unit' => 3, 
                'status_bidang' => 3,
            ]);      

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('/subunit/inputBarang');
    }
}
