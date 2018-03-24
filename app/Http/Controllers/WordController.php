<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Pengadaan;

class WordController extends Controller
{
    public function exportWord(Request $request){
    	// Creating the new document...
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		/* Note: any element you append to a document must reside inside of a Section. */

		// Adding an empty Section to the document...
		$section = $phpWord->addSection(
			array('marginLeft' => 1200, 'marginRight' => 800, 'marginTop' => 600)
		);

		// header
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
		$table->addCell()
			->addText("PEMERINTAH KABUPATEN SUMENEP", 
				array('name' => 'Arial', 'size' => 12), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		
		$table->addRow();
		$table->addCell(null, $cellRowContinue);
		$table->addCell()
			->addText("DINAS PARIWISATA KEBUDAYAAN PEMUDA DAN OLAH RAGA",
				array('name' => 'Arial', 'size' => 14, 'bold' => true), 
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
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));


		$judul = $section->addText("BERITA ACARA PENGADAAN BARANG",
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single'), 
				array('spaceBefore' => 500, 'spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$kegiatan = Kegiatan::where('kode', $request->kode)->first();
		$kodekeg = $kegiatan->kode_kegiatan;

		$nomor = $section->addText("Nomor ".$kodekeg,
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true,), 
				array('spaceAfter' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$text1 = $section->addText(
				    'Pada hari ini .............  tanggal ............ bulan .............. tahun ........... pukul ..........., yang bertanda tangan di bawah ini:',
				    null,
				    array('spaceBefore' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700))
				);
		
		$datadiri = $section->addTable(array('cellMarginLeft' => 400));
		
		$datadiri->addRow();
		$datadiri->addCell(null)
			->addText("Nama", 
				array('name' => 'Time New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$datadiri->addCell()
			->addText(":",
				array('name' => 'Time New Roman', 'size' => 12));
		$datadiri->addCell()
			->addText($kegiatan->user->name, 
				array('name' => 'Time New Roman', 'size' => 12, 'bold' => true));

		$datadiri->addRow();
		$datadiri->addCell(null)
			->addText("NIP", 
				array('name' => 'Time New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$datadiri->addCell()
			->addText(":",
				array('name' => 'Time New Roman', 'size' => 12));
		$datadiri->addCell()
			->addText($kegiatan->user_id, 
				array('name' => 'Time New Roman', 'size' => 12, 'bold' => true));

		$datadiri->addRow();
		$datadiri->addCell(null)
			->addText("Jabatan", 
				array('name' => 'Time New Roman', 'size' => 12), 
				array('spaceAfter' => 80));
		$datadiri->addCell()
			->addText(":",
				array('name' => 'Time New Roman', 'size' => 12));
		$datadiri->addCell()
			->addText($kegiatan->profile->role->role. ' '.$kegiatan->profile->subunit->nama_subunit, 
				array('name' => 'Time New Roman', 'size' => 12, 'bold' => true));


		$text2 = $section->addText(
				    'Dalam rangka diadakannya kegiatan '.$kegiatan->nama_kegiatan.', maka akan lakukan pengadaan barang berupa:',
				    null,
				    array('keepNext' => true, 'indentation' => array('firstLine' => 700))
				);


		$table_pengadaan = $section->addTable(
							array('cellMargin' => 100, 'borderSize' => 6));
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
			->addText("Jumlah", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Harga Satuan (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Total (Rp)", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("Kategori", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$table_pengadaan->addCell(null)
			->addText("No BST", 
				array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), 
				array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$pengadaan = Pengadaan::where('kegiatan_id', $request->kode)->get();

		foreach ($pengadaan as $key => $data) { 
			$table_pengadaan->addRow();
			$table_pengadaan->addCell(null)
				->addText(++$key, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->nama, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->jumlah.' '.$data->satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->harga_satuan, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->total, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->kategori->nama_kategori, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			$table_pengadaan->addCell(null)
				->addText($data->no_bst, 
					array('name' => 'Times New Roman', 'size' => 12), 
					array('spaceAfter' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));	
		}


		$text2 = $section->addText(
				    'Demikian Berita Pengadaan Barang ini dibuat dan ditandatangani untuk dipergunakan sebagaimana mestinya.',
				    null,
				    array('spaceBefore' => 300, 'keepNext' => true, 'indentation' => array('firstLine' => 700))
				);		

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(storage_path($kegiatan->nama_kegiatan.'.docx'));

		return response()->download(storage_path($kegiatan->nama_kegiatan.'.docx'));
		// return $pengadaan->count();


    }
}
