<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DataTables;
use PDF;
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

class SubUnitController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'subunit']);

    }
    public function index()
    {
        $nip = Auth::user()->nip;
        $profile = Profile::where('nip', $nip)->first();
        return view('subunit.home', compact('profile'));
    }

    public function inputKegiatan(){
        $kodekeg = Kodekegiatan::all();
        $banyakkeg = str_pad(Kegiatan::count()+1, 4, 0, STR_PAD_LEFT);
        return view('subunit.input_kegiatan', compact('kodekeg', 'banyakkeg'));
    }

    public function storeKegiatan(Request $request){
        $this->validate($request, [
                'kode_kegiatan' => 'required',
                'nama_kegiatan' => 'required',
            ]);

        Kegiatan::insert([
            'kode' => $request->kode_kegiatan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'user_id' => Auth::user()->nip,
        ]);

        if (Kegiatan::where('kode', $request->kode_kegiatan) != null) {
            Session::flash('flash_message', 'Data Berhasil Disimpan');
            return redirect('subunit/kegiatan/'.$request->kode_kegiatan);
        } else {
            return redirect('subunit/input-kegiatan');
        }
    }

    public function kegiatanPengadaan($id){

        $kegiatan = Kegiatan::where('kode', $id)->first();
        return view('subunit.kegiatan_pengadaan', compact('kegiatan'));
    
    }

    public function pengadaan($id){
    
        $kategori = Kategori::all();
        $kegiatan = Kegiatan::where('kode', $id)->first();

        return view('subunit/pengadaan', compact('kategori', 'kegiatan'));
    
    }

    public function storePengadaan(Request $request){
        $this->validate($request, [
                'nama' => 'required',
                'jumlah' => 'required',
                'harga_satuan' => 'required',
                'kategori_id' => 'required',
                'no_bst' => 'required',
                'keterangan' => 'required',
                'foto_bst' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $no_pengadaan = Pengadaan::count() + 1;

        // foto bst
        $file_bst = $request->file('foto_bst');
        $bst_name = "bst_".Auth::user()->nip."_".$no_pengadaan.".".$file_bst->getClientOriginalExtension();
        $file_bst->move("images/bst/", $bst_name);

        Pengadaan::create([
            'id' => $no_pengadaan,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
            'kategori_id' => $request->kategori_id,
            'no_bst' => $request->no_bst,
            'foto_bst' => $bst_name,
            'keterangan' => $request->keterangan,
            'status_unit' => '0',
            'status_bidang' => '0',
            'user_id' => Auth::user()->nip,
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('subunit/kegiatan/'.$request->kegiatan_id);
    }

    public function dataPengadaan($id){
        // $pengadaan = DB::table('pengadaan as p')
        //         ->where('kegiatan_id', '=',  $id)
        //         ->select('p.*')
        //         ->get();
        $pengadaan = Pengadaan::with('kategori')
                        ->where('kegiatan_id', '=',  $id)
                        ->select('pengadaan.*');

        return Datatables::of($pengadaan)
                // ->addColumn('status', function($pengadaan){
                //     if($pengadaan->status_unit == 0)
                //         return '<font color="orange">Belum dikonfirmasi</font>';
                // })
                ->make(true);
    }

    public function listKegiatan(){
        $kegiatan = Kegiatan::where('user_id', Auth::user()->nip)->first();
        return view('subunit.list_kegiatan');
    }

    public function dataKegiatan(){
        $kegiatan = DB::table('kegiatans as k')
                ->where('user_id', '=',  Auth::user()->nip)
                ->select('k.*')
                ->get();

        return Datatables::of($kegiatan)
            ->addColumn('action', function ($kegiatan) {
                return '<a class="btn btn-success btn-sm" href="'.url("subunit/kegiatan/$kegiatan->kode").'">Buka</a>';
            })           
            ->make(true);
    }

    public function inputBarang(){
        $pengadaan = Pengadaan::where([
                        ['user_id', '=', Auth::user()->nip],
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
                'user_id' => Auth::user()->nip,
                
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
                'user_id' => Auth::user()->nip,
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
                'user_id' => Auth::user()->nip,
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
                'user_id' => Auth::user()->nip,
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
                'user_id' => Auth::user()->nip,
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
                'user_id' => Auth::user()->nip,
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
                'user_id' => Auth::user()->nip,
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

    public function pdfPengadaan(Request $request){
        $kegiatan = Kegiatan::where('kode', $request->kode_kegiatan)->first();
        $pengadaan = Pengadaan::where('kegiatan_id', $request->kode_kegiatan)->get();

        $pdf = PDF::loadView('subunit.pdfview', compact('kegiatan', 'pengadaan'))
            ->setPaper('a4');
        // $pdf->download('pdfview.pdf');
        return $pdf->stream('pdfview.pdf');
        // return view('subunit.pdfview', compact('kegiatan', 'pengadaan'));
    }
}
