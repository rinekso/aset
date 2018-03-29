<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Pengadaan;
use App\Bast;

class WordController extends Controller
{
    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}

    public function cetakBast(Request $request){

    	// Creating the new document...
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		/* Note: any element you append to a document must reside inside of a Section. */

		// Adding an empty Section to the document...
		$section = $phpWord->addSection(
			array('marginLeft' => 1200, 'marginRight' => 800, 'marginTop' => 600)
		);

		$this->header($section, $request);
		$this->page1($section, $request);

		$section->addPageBreak();

		$this->page2($section, $request);
		


		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(storage_path('berita_acara.docx'));

		return response()->download(storage_path('berita_acara.docx'));

    }

    public function header($section, $request){
    	$header = $section->addHeader();

		$table = $header->addTable();
		$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
		$cellRowContinue = array('vMerge' => 'continue');
		$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);

		$fontStyle['name'] = 'Times New Roman';
		$fontStyle['size'] = 20;

		$table->addRow();
		$cellimg = $table->addCell(1300, $cellRowSpan);
		$cellimg->addImage('images/logo_sumenep.png', array('width' => 55, 'height' => 70));
		$table->addCell(8700)
			->addText("PEMERINTAH KABUPATEN SUMENEP", 
				array('name' => 'Arial', 'size' => 12), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		
		$table->addRow();
		$table->addCell(null, $cellRowContinue);
		$table->addCell()
			->addText("SKPD: ......................................................",
				array('name' => 'Arial', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table->addRow();
		$table->addCell(null, $cellRowContinue);
		$table->addCell()
			->addText("Jl. Dr. Soetomo No. 5 Telp. 0328 - 667148, Fax. 0328 - 672617",
				array('name' => 'Arial', 'size' => 12), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table->addRow();
		$table->addCell(null, $cellRowContinue);
		$table->addCell()
			->addText("SUMENEP",
				array('name' => 'Arial', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table->addRow();
		$table->addCell(null, $cellRowContinue);
		$table->addCell()
			->addText("Kode Pos 69416",
				array('name' => 'Arial', 'size' => 10, 'italic' => true), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));
    }

    public function page1($section, $request){
    	$judul = $section->addText("BERITA ACARA PENERIMAAN BARANG",
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceBefore' => 50, 'spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$nomor = $section->addText("Nomor ".$request->bast,
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true,), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$kode = Bast::where('bast', $request->bast)->first()->kegiatan_id;
		$kegiatan = Kegiatan::where('kode', $kode)->first();
		$nama_kegiatan = $kegiatan->nama_kegiatan;
		$nama = $kegiatan->user->name;
		$seksi = $kegiatan->profile->subunit->nama_subunit;

		$text1 = $section->addText(
				    'Pada hari ini, .................. tanggal ......................... bulan ........................ tahun ............................., kami yang bertanda tangan di bawah ini :',
				    null,
				    array('spaceBefore' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);

		$table_nama = $section->addTable(
							array('cellMarginLeft' => 70, 'cellMarginRight' => 70));
		$table_nama->addRow();
		$table_nama->addCell(2500)
			->addText("Nama", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 630)));
		$table_nama->addCell()
			->addText(":", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$table_nama->addCell()
			->addText("Bambang", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));

		$table_nama->addRow();
		$table_nama->addCell(2500)
			->addText("NIP", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 630)));
		$table_nama->addCell()
			->addText(":", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$table_nama->addCell()
			->addText("138716481649189", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));

		$table_nama->addRow();
		$table_nama->addCell(2500)
			->addText("Jabatan", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 630)));
		$table_nama->addCell()
			->addText(":", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$table_nama->addCell()
			->addText("Pejabat Penatausahaan Pengguna Barang", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));

		$text2 = $section->addText(
				    'Telah menerima barang dalam keadaan baik dan lengkap untuk perluan kegiatan '.$nama_kegiatan.'  kode rekening xxxx.xxx.xxx.xx.xx.xx berupa :',
				    null,
				    array('keepNext' => true, 'indentation' => array('firstLine' => 700))
				);

		$table_nama->addRow();
		$table_nama->addCell(2500)
			->addText("Alamat", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 630)));
		$table_nama->addCell()
			->addText(":", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$table_nama->addCell()
			->addText("..........................................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80));

		$text2 = $section->addText(
				    'Telah menerima barang dalam keadaan baik dan lengkap untuk perluan kegiatan '.$nama_kegiatan.'  kode rekening xxxx.xxx.xxx.xx.xx.xx berupa :',
				    null,
				    array('keepNext' => true, 'indentation' => array('firstLine' => 700))
				);


		$table_pengadaan = $section->addTable(
							array('cellMarginLeft' => 70, 'cellMarginRight' => 70, 'borderSize' => 6, 'align' => 'center'));
		$table_pengadaan->addRow();
		$table_pengadaan->addCell(null)
			->addText("No", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Nama Barang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Volume", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Satuan", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Harga Satuan (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Total Harga (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$pengadaan = Pengadaan::where('kegiatan_id', $kode)->get();

		$total = 0;
		for ($i = 0 ; $i < count($request->barang); $i++) { 
			$data = Pengadaan::where('id', $request->barang[$i])->first();

			$table_pengadaan->addRow();
			$table_pengadaan->addCell(null)
				->addText($i+1, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->nama, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->jumlah, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->harga_satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));

			$table_pengadaan->addCell(null)
				->addText($data->total, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));

			$total = $total + $data->total;
		}

		$table_pengadaan->addRow();
		$table_pengadaan->addCell(null, array('gridSpan' => 5))
			->addText("Jumlah", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null, array('gridSpan' => 5))
			->addText('Rp '.$total, 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));



		$text3 = $section->addText(
				    'terbilang : '.$this->terbilang($total).' rupiah',
				    null,
				    array('spaceBefore' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);		
		$text4 = $section->addText(
				    'Demikian untuk menjadi maklum dan mohon petunjuk. Atas kebijaksanaannya kami sampaikan terima kasih.',
				    null,
				    array('spaceBefore' => 300, 'spaceAfter' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);

		$table_ttd = $section->addTable(
			array('cellMarginLeft' => 70, 'cellMarginRight' => 70, 'align' => 'center'));

		$table_ttd->addRow();
		$table_ttd->addCell(5000)
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addCell(5000)
			->addText("Sumenep, Maret 2018", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("Yang menyerahkan,", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("Yang menerima,", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("Mengetahui / Menyetujui", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceBefore' => 300, 'spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("PA / KPA", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    }

    public function page2($section, $request){
    	$judul = $section->addText("BERITA ACARA PENYERAHAN / PENERIMAAN BARANG",
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceBefore' => 50, 'spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$nomor = $section->addText("Nomor ".$request->bast,
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true,), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$kode = Bast::where('bast', $request->bast)->first()->kegiatan_id;
		$kegiatan = Kegiatan::where('kode', $kode)->first();
		$nama_kegiatan = $kegiatan->nama_kegiatan;
		$nama = $kegiatan->user->name;
		$seksi = $kegiatan->profile->subunit->nama_subunit;

		$text1 = $section->addText(
				    'Telah terima barang dari Pengurus Barang Pengguna '.$nama.' untuk keperluan kegiatan '.$nama_kegiatan.' kode rekening xx.xxx.xxxx.xxx pada seksi '.$seksi.'',
				    null,
				    array('spaceBefore' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);

		$text2 = $section->addText(
				    'Adapun barang yang diterima antara lain:',
				    null,
				    array('keepNext' => true, 'indentation' => array('firstLine' => 700))
				);


		$table_pengadaan = $section->addTable(
							array('cellMarginLeft' => 70, 'cellMarginRight' => 70, 'borderSize' => 6, 'align' => 'center'));
		$table_pengadaan->addRow();
		$table_pengadaan->addCell(null)
			->addText("No", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Nama Barang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Volume", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Satuan", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Harga Satuan (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Total Harga (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$pengadaan = Pengadaan::where('kegiatan_id', $kode)->get();

		$total = 0;
		for ($i = 0 ; $i < count($request->barang); $i++) { 
			$data = Pengadaan::where('id', $request->barang[$i])->first();

			$table_pengadaan->addRow();
			$table_pengadaan->addCell(null)
				->addText($i+1, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->nama, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->jumlah, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->harga_satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));

			$table_pengadaan->addCell(null)
				->addText($data->total, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));

			$total = $total + $data->total;
		}

		$table_pengadaan->addRow();
		$table_pengadaan->addCell(null, array('gridSpan' => 5))
			->addText("Jumlah", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null, array('gridSpan' => 5))
			->addText('Rp '.$total, 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));



		$text3 = $section->addText(
				    'terbilang : '.$this->terbilang($total).' rupiah',
				    null,
				    array('spaceBefore' => 80, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);		
		$text4 = $section->addText(
				    'Demikian Bertia Acara Penyerahan / Penerimaan Barang ini dibuat dan ditamdatangani untuk dipergunakan seperlunya.',
				    null,
				    array('spaceBefore' => 300, 'spaceAfter' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700), 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH)
				);

		$table_ttd = $section->addTable(
			array('cellMarginLeft' => 70, 'cellMarginRight' => 70, 'align' => 'center'));

		$table_ttd->addRow();
		$table_ttd->addCell(5000)
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addCell(5000)
			->addText("Sumenep, Maret 2018", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("Yang menyerahkan,", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("Yang menerima,", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell()
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$table_ttd->addCell()
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("Mengetahui / Menyetujui", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceBefore' => 300, 'spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("PA / KPA", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 500, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("Nama Terang", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_ttd->addRow();
		$table_ttd->addCell(10000, array('gridSpan' => 2))
			->addText("NIP ............................................", 
				array('name' => 'Times New Roman', 'size' => 12), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    }
}