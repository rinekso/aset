<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DataTables;
use PDF;
use App\Subunit;
use App\Profile;
use App\Kegiatan;
use App\Kodekegiatan;
use App\Kodeasettetap;
use App\Kodebangunan;
use App\Kodebph;
use App\Kodejalirja;
use App\Kodekontruksi;
use App\Kodemesin;
use App\Kodetanah;
use App\Kodebelanja;
use App\Pengadaan;
use App\Kategori;
use App\Tanah;
use App\Mesin;
use App\Bangunan;
use App\Jalirja;
use App\Asettetap;
use App\Kontruksi;
use App\Bph;
use App\Bast;
use App\Kir;

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
        $subunit = Subunit::all();
        return view('subunit.input_kegiatan', compact('kodekeg', 'banyakkeg', 'subunit'));
    }

    public function storeKegiatan(Request $request){
        $this->validate($request, [
                'kode_kegiatan' => 'required',
                'nama_kegiatan' => 'required',
                'tahun' => 'required',
            ]);

        Kegiatan::insert([
            'nama_kegiatan' => $request->nama_kegiatan,
            'kode_kegiatan' => $request->kode_kegiatan,
            'kode' => $request->kode,
            'tahun' => $request->tahun,
            'pengguna' => $request->pengguna,
            'nip1' => $request->nip1,
            'jabatan1' => $request->jabatan1,
            'pptk' => $request->pptk,
            'nip2' => $request->nip2,
            'jabatan2' => $request->jabatan2,
            'pejabat' => $request->pejabat,
            'nip3' => $request->nip3,
            'jabatan3' => $request->jabatan3,
            'pengurus' => $request->pengurus,
            'nip4' => $request->nip4,
            'jabatan4' => $request->jabatan4,
            'user_id' => Auth::user()->nip,
        ]);

        if (Kegiatan::where('kode', $request->kode_kegiatan) != null) {
            Session::flash('flash_message', 'Data Berhasil Disimpan');
            return redirect('subunit/kegiatan/'.$request->kode);
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
        $kodebelanja = Kodebelanja::all();
        $kegiatan = Kegiatan::where('kode', $id)->first();

        return view('subunit/pengadaan', compact('kategori', 'kegiatan', 'kodebelanja'));
    
    }

    public function storePengadaan(Request $request){
        $this->validate($request, [
                'tgl_pengadaan' => 'required',
                'nama' => 'required',
                'jumlah' => 'required',
                'harga_satuan' => 'required',
                'satuan' => 'required',
                'kategori_id' => 'required',
            ]);
        $no_pengadaan = Pengadaan::count() + 1;

        Pengadaan::create([
            'id' => $no_pengadaan,
            'kode_belanja' => $request->kode_belanja,
            'tgl_pengadaan' => $request->tgl_pengadaan,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
            'kategori_id' => $request->kategori_id,
            'keterangan' => $request->keterangan,
            'status_unit' => '0',
            'status_bidang' => '0',
            'user_id' => Auth::user()->nip,
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        // Bast::firstOrCreate([
        //     'bast' => $request->no_bst,
        //     'kegiatan_id' => $request->kegiatan_id,
        // ]);

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('subunit/kegiatan/'.$request->kegiatan_id);
    }

    public function dataPengadaan($id){
        $pengadaan = Pengadaan::with('kategori')
                        ->where('kegiatan_id', '=',  $id)
                        ->select('pengadaan.*');

        return Datatables::of($pengadaan)
                ->addColumn('action', function ($pengadaan) {
                    if ($pengadaan->status_unit == 1 || $pengadaan->status_bidang == 1 || $pengadaan->status_unit == 3 || $pengadaan->status_bidang == 3) {
                        return '<button class="btn btn-warning btn-sm" disabled >Edit</button>';
                    } else {
                        return '<a class="btn btn-success btn-sm" href="'.url("subunit/edit-pengadaan/$pengadaan->id").'">Edit</a>';
                    }
                }) 
                ->make(true);
    }

    public function listKegiatan(){
        $kegiatan = Kegiatan::where('user_id', Auth::user()->nip)->first();
        return view('subunit.list_kegiatan');
    }

    public function dataKegiatan(){
        $kegiatan = DB::table('kegiatans as k')
                ->where('user_id', Auth::user()->nip)
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
            $kode = Kodetanah::all();
            $banyak = Tanah::count();
            return view('subunit.barang.input_tanah', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 2) {
            $kode = Kodemesin::all();
            $banyak = Mesin::count();
            return view('subunit.barang.input_mesin', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 3) {
            $kode = Kodebangunan::all();
            $banyak = Bangunan::count();
            return view('subunit.barang.input_bangunan', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 4) {
            $kode = Kodejalirja::all();
            $banyak = Jalirja::count();
            return view('subunit.barang.input_jalirja', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 5) {
            $kode = Kodeasettetap::all();
            $banyak = Asettetap::count();
            return view('subunit.barang.input_aset', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 6) {
            $kode = Kodekontruksi::all();
            $banyak = Kontruksi::count();
            return view('subunit.barang.input_kontruksi', compact('pengadaan', 'kode', 'banyak'));
        } elseif ($kategori == 7) {
            $kode = Kodebph::all();
            $banyak = Bph::count();
            return view('subunit.barang.input_bph', compact('pengadaan', 'kode', 'banyak'));
        }
    }

    public function storeBarang(Request $request){
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
                'kegiatan_id' => $request->kegiatan_id,
                
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
                'kegiatan_id' => $request->kegiatan_id,
            ]);

            Kir::create([
                'kode_barang' => $request->kode_barang,
                'kategori_id' => 2,
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
                'kegiatan_id' => $request->kegiatan_id,
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
                'kegiatan_id' => $request->kegiatan_id,
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
                'kegiatan_id' => $request->kegiatan_id,
            ]);

            Kir::create([
                'kode_barang' => $request->kode_barang,
                'kategori_id' => 5,
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
                'kegiatan_id' => $request->kegiatan_id,
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
                'kegiatan_id' => $request->kegiatan_id,
            ]);
        }

        Pengadaan::find($request->id)
            ->update([
                'status_unit' => 3, 
                'status_bidang' => 3,
            ]);      

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        return redirect('/subunit/barang-kegiatan/'.$request->kegiatan_id);
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

    public function uploadBeritaAcara(Request $request){
        $this->validate($request, [
            'foto_beritaacara' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kegiatan = Kegiatan::where('kode', $request->kode_kegiatan)->first();

        // foto bst
        $file_foto = $request->file('foto_beritaacara');
        $ba_name = "ba_".Auth::user()->nip."_".$kegiatan->kode.".".$file_foto->getClientOriginalExtension();
        $file_foto->move("images/kegiatan/", $ba_name);

        Kegiatan::where('kode', $request->kode_kegiatan)->update(['foto' => $ba_name]);

        Session::flash('flash_message', 'Foto berhasil diupload');
        return redirect()->back();
    }

    public function inputBarangKegiatan(){
        $kegiatan = Kegiatan::where('user_id', Auth::user()->nip)->first();
        return view('subunit.list_barang_kegiatan');
    }

    public function dataBarangKegiatan(){
        $kegiatan = DB::table('kegiatans as k')
                ->where('user_id',  Auth::user()->nip)
                ->select('k.*')
                ->get();

        return Datatables::of($kegiatan)
            ->addColumn('action', function ($kegiatan) {
                return '<a class="btn btn-success btn-sm" href="'.url("subunit/barang-kegiatan/$kegiatan->kode").'">Buka</a>';
            })           
            ->make(true);
    }

    public function barangKegiatan($id){

        $kegiatan = Kegiatan::where('kode', $id)->first();
        return view('subunit.barang_kegiatan', compact('kegiatan'));
    
    }

    public function dataBarangPengadaan($id){
        $pengadaan = Pengadaan::with('kategori')
                        ->where('kegiatan_id',  $id)
                        ->where('status_unit',  1)->orWhere('status_unit', 3)
                        ->where('status_bidang',  1)->orWhere('status_bidang', 3)
                        ->select('pengadaan.*');

        return Datatables::of($pengadaan)
                ->addColumn('action', function ($pengadaan) {
                    if ($pengadaan->status_bidang ==3) {
                        return '<font color="green">Inputted</font>';
                    } else {
                        return '<a class="btn btn-info btn-sm" href="'.url("subunit/formInputBarang/$pengadaan->id").'">Input</a>';
                    }
                })    
                ->make(true);
    }

    public function editPengadaan($id){
        $kategori = Kategori::all();
        $pengadaan = Pengadaan::where('id', $id)->first();

        // return $pengadaan->foto_bst;
        return view('subunit/edit-pengadaan', compact('kategori', 'pengadaan'));
    }

     public function updatePengadaan(Request $request){
        $this->validate($request, [
                'nama' => 'required',
                'jumlah' => 'required',
                'harga_satuan' => 'required',
                'satuan' => 'required',
                'kategori_id' => 'required',
                'no_bst' => 'required',
                'keterangan' => 'required',
            ]);
        $pengadaan = Pengadaan::where('id', $request->id)->first();
        // foto bst
        // $file_bst = $request->file('foto_bst');
        // $bst_name = $pengadaan->foto_bst;
        //$file_bst->move("images/bst/", $bst_name);

        Pengadaan::find($request->id)
        ->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
            'kategori_id' => $request->kategori_id,
            'no_bst' => $request->no_bst,
            'keterangan' => $request->keterangan,
            'status_unit' => '0',
            'status_bidang' => '0',
            'user_id' => Auth::user()->nip,
        ]);

        Session::flash('flash_message', 'Data Berhasil Disimpan');
        // return $pengadaan;
        return redirect('subunit/kegiatan/'.$pengadaan->kegiatan_id);
    }

    public function beritaAcara($id){
        $bast = Bast::where('kegiatan_id', $id)->get();
        $pengadaan = Pengadaan::where('kegiatan_id', $id)->get();
        $kegiatan_id = $id;

        return view('subunit.berita_acara', compact('bast', 'pengadaan', 'kegiatan_id'));
    }

    public function bast(Request $request){

        if ($request->bast != null) {
            $tes = (new WordController)->cetakBast($request);
            return $tes;
        } else {

            $tahun_sekarang = Carbon::now()->year;
            $tahun_kegiatan = Kegiatan::where('kode', $request->kegiatan_id)->first()->tahun;
            
            $bast = Bast::where('tahun', $tahun_kegiatan)->get();
            if ($bast->count() != 0) {
                $last_bast = Bast::where('tahun', $tahun_sekarang)->latest()->first()->bast;
                $last_bast = substr($last_bast, 4, 3);
            } else {
                $last_bast = 0;
            }
            $increment = sprintf("%03d", $last_bast + 1);
            $increment2 = sprintf("%03d", $last_bast + 2);

            $bast1 = "900/".$increment."/ASET/435.108/".$tahun_kegiatan;
            $bast2 = "900/".$increment2."/ASET/435.108/".$tahun_kegiatan;
            
            Bast::insert([
                [
                    'bast' => $bast1,
                    'kegiatan_id' => $request->kegiatan_id,
                    'tahun' => $tahun_kegiatan,
                ],
                [
                    'bast' => $bast2,
                    'kegiatan_id' => $request->kegiatan_id,
                    'tahun' => $tahun_kegiatan,
                ],
            ]);

            for ($i = 0 ; $i < count($request->barang); $i++) { 
                Pengadaan::find($request->barang[$i])
                    ->update([
                        'bast' => $bast1,
                        'bast2' => $bast2,
                    ]);
            }

            $tes = (new WordController)->tes($request);

            return $tes;

        }

    }

}
