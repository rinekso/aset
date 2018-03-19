<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DataTables;
use App\Pengadaan;
use App\Tanah;
use App\Mesin;
use App\Bangunan;
use App\Jalirja;
use App\Asettetap;
use App\Kontruksi;
use App\Bph;

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

    public function dataPengadaan(){
        $pengadaan = DB::table('pengadaan as p')
                ->select('p.*')
                ->get();

        return Datatables::of($pengadaan)->make(true);
    }

    public function listPengadaan(){
        // $pengadaan = Pengadaan::where('user_id', Auth::user()->id)->get();
        
        // return view('subunit.list_pengadaan', compact('pengadaan'));
        return view('subunit.list');
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
            return view('subunit.barang.input_tanah', compact('pengadaan'));
        } elseif ($kategori == 2) {
            return view('subunit.barang.input_mesin', compact('pengadaan'));
        } elseif ($kategori == 3) {
            return view('subunit.barang.input_bangunan', compact('pengadaan'));
        } elseif ($kategori == 4) {
            return view('subunit.barang.input_jalirja', compact('pengadaan'));
        } elseif ($kategori == 5) {
            return view('subunit.barang.input_aset', compact('pengadaan'));
        } elseif ($kategori == 6) {
            return view('subunit.barang.input_kontruksi', compact('pengadaan'));
        } elseif ($kategori == 7) {
            return view('subunit.barang.input_bph', compact('pengadaan'));
        }
    }

    public function storeBarang(Request $request)
    {
        if ($request->kategori_id == 1) {
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'nama_barang' => 'required',
                    'no_reg' => 'required',
                    'luas' => 'required',
                    'tahun_pengadaan' => 'required',    
                    'lokasi' => 'required',
                    'hak' => 'required',
                    'no_sertifikat' => 'required',
                    'tgl_sertifikat' => 'required',
                    'penggunaan' => 'required',
                    'asalusul' => 'required',
                    'harga' => 'required',
                ]);
            Tanah::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'no_reg' => $request->no_reg,
                'luas' => $request->luas,
                'tahun_pengadaan' => $request->tahun_pengadaan,
                'lokasi' => $request->lokasi,
                'hak' => $request->hak,
                'no_sertifikat' => $request->no_sertifikat,
                'tgl_sertifikat' => $request->tgl_sertifikat,
                'penggunaan' => $request->penggunaan,
                'asalusul' => $request->asalusul,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
                
            ]);
        } elseif ($request->kategori_id == 2) {
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'nama_barang' => 'required',
                    'no_reg' => 'required',
                    'merk' => 'required',
                    'ukuran' => 'required',    
                    'bahan' => 'required',
                    'tahun_pembelian' => 'required',
                    'asalusul' => 'required',
                    'jumlah' => 'required',
                    'harga_satuan' => 'required',
                    'total' => 'required',
                ]);
            Mesin::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'no_reg' => $request->no_reg,
                'merk' => $request->merk,
                'ukuran' => $request->ukuran,
                'bahan' => $request->bahan,
                'tahun_pembelian' => $request->tahun_pembelian,
                'no_pabrik' => $request->no_pabrik,
                'no_mesin' => $request->no_mesin,
                'no_rangka' => $request->no_rangka,
                'no_polisi' => $request->no_polisi,
                'no_bpkb' => $request->no_bpkb,
                'asalusul' => $request->asalusul,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total' => $request->total,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);

        } elseif ($request->kategori_id == 3) {
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'no_reg' => 'required',
                    'nama_barang' => 'required',
                    'luas' => 'required',
                    'lokasi' => 'required',
                    'no_dokumen' => 'required',
                    'tgl_dokumen' => 'required',
                    'harga' => 'required',
                ]);
            Bangunan::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'no_reg' => $request->no_reg,
                'kondisi_bangunan' => $request->kondisi,
                'bertingkat' => $request->bertingkat,
                'beton' => $request->beton,
                'luas' => $request->luas,
                'lokasi' => $request->lokasi,
                'no_dokumen' => $request->no_dokumen,
                'tgl_dokumen' => $request->tgl_dokumen,
                'no_polisi' => $request->no_polisi,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);

        } elseif ($request->kategori_id == 4) {
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'no_reg' => 'required',
                    'nama_barang' => 'required',
                    'kontruksi' => 'required',
                    'panjang' => 'required',
                    'lebar' => 'required',
                    'luas' => 'required',
                    'lokasi' => 'required',
                    'no_dokumen' => 'required',
                    'tgl_dokumen' => 'required',
                    'penggunaan' => 'required',
                    'asalusul' => 'required',
                    'harga' => 'required',
                ]);
            Jalirja::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'no_reg' => $request->no_reg,
                'kontruksi' => $request->kontruksi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'luas' => $request->luas,
                'lokasi' => $request->lokasi,
                'no_dokumen' => $request->no_dokumen,
                'tgl_dokumen' => $request->tgl_dokumen,
                'penggunaan' => $request->penggunaan,
                'asalusul' => $request->asalusul,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);

        } elseif ($request->kategori_id == 5) {  
            
            $this->validate($request, [
                    'kode_barang' => 'required',
                    'no_reg' => 'required',
                    'nama_barang' => 'required',
                    'jumlah' => 'required',
                    'harga_satuan' => 'required',
                    'total' => 'required',
                    'asalusul' => 'required',
                ]);
            Asettetap::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'no_reg' => $request->no_reg,
                'judul' => $request->judul,
                'spesifikasi' => $request->spesifikasi,
                'asal_daerah' => $request->asal_daerah,
                'pencipta' => $request->pencipta,
                'bahan' => $request->bahan,
                'jenis' => $request->jenis,
                'ukuran' => $request->ukuran,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total' => $request->total,
                'tahun_cetak' => $request->tahun_cetak,
                'asalusul' => $request->asalusul,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);
        } elseif ($request->kategori_id == 6) {  
            $this->validate($request, [
                    'nama_barang' => 'required',
                    'luas' => 'required',
                    'lokasi' => 'required',
                    'tgl_dokumen' => 'required',
                    'no_dokumen' => 'required',
                    'tgl_mulai' => 'required',
                    'nilai_kontrak' => 'required',
                ]);
            Kontruksi::create([
                'nama_barang' => $request->nama_barang,
                'bangunan' => $request->bangunan,
                'bertingkat' => $request->bertingkat,
                'beton' => $request->beton,
                'luas' => $request->luas,
                'lokasi' => $request->lokasi,
                'tgl_dokumen' => $request->tgl_dokumen,
                'no_dokumen' => $request->no_dokumen,
                'tgl_mulai' => $request->tgl_mulai,
                'status_tanah' => $request->status_tanah,
                'kode_tanah' => $request->kode_tanah,
                'nilai_kontrak' => $request->nilai_kontrak,
                'asalusul' => $request->asalusul,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);
        } elseif ($request->kategori_id == 7) {  
            $this->validate($request, [
                    'nama_barang' => 'required',
                    'kode_barang' => 'required',
                    'no_reg' => 'required',
                    'merk' => 'required',
                    'jumlah' => 'required',
                    'harga_satuan' => 'required',
                    'total' => 'required',
                    'nama_barang' => 'required',
                    
                ]);
            Bph::create([
                'nama_barang' => $request->nama_barang,
                'kode_barang' => $request->kode_barang,
                'no_reg' => $request->no_reg,
                'merk' => $request->merk,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total' => $request->total,
                'keterangan' => $request->keterangan,
                'user_id' => Auth::user()->id,
            ]);
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
