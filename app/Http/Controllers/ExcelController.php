<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    public function cetakKir(){

		$spreadsheet = new Spreadsheet();
		
		$spreadsheet->getDefaultStyle()
				    ->getFont()
				    ->setName('Arial')
				    ->setSize(9);

		$sheet = $spreadsheet->getActiveSheet();
		
		$sheet->getPageMargins()->setTop(0.511);
		$sheet->getPageMargins()->setRight(0.196);
		$sheet->getPageMargins()->setLeft(0.196);
		$sheet->getPageMargins()->setBottom(0.511);



		$sheet->getColumnDimension('A')->setWidth(34/7);
		$sheet->getColumnDimension('B')->setWidth(180/7);
		$sheet->getColumnDimension('C')->setWidth(14/7);
		$sheet->getColumnDimension('D')->setWidth(89/7);
		$sheet->getColumnDimension('E')->setWidth(40/7);
		$sheet->getColumnDimension('F')->setWidth(77/7);
		$sheet->getColumnDimension('G')->setWidth(39/7);
		$sheet->getColumnDimension('H')->setWidth(78/7);
		$sheet->getColumnDimension('I')->setWidth(45/7);
		$sheet->getColumnDimension('J')->setWidth(50/7);
		$sheet->getColumnDimension('K')->setWidth(33/7);
		$sheet->getColumnDimension('L')->setWidth(33/7);
		$sheet->getColumnDimension('M')->setWidth(33/7);
		$sheet->getColumnDimension('N')->setWidth(55/7);



		$sheet->mergeCells('A1:N1')
			->setCellValue('A1', 'KARTU INVENTARIS RUANGAN (KIR)');
		
		$sheet->getStyle('A1')->getFont()->setBold(true)->setName('Arial')
				    ->setSize(11);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

		$sheet->setCellValue('A3', 'KAB')
			->setCellValue('C3', ':')
			->setCellValue('D3', 'SUMENEP');

		$sheet->setCellValue('A4', 'PROPINSI')
			->setCellValue('C4', ':')
			->setCellValue('D4', 'JAWA TIMUR');

		$sheet->setCellValue('A5', 'UNIT')
			->setCellValue('C5', ':')
			->setCellValue('D5', '................................');

		$sheet->setCellValue('A6', 'ORGANISASI PERANGKAT DAERAH')
			->setCellValue('C6', ':')
			->setCellValue('D6', 'DINAS PARIWISATA KEBUDAYAAN PEMUDA DAN OLAH RAGA');

		$sheet->setCellValue('A7', 'RUANGAN')
			->setCellValue('C7', ':')
			->setCellValue('D7', '.................................');


		// table
		$sheet->getStyle('A9:N12')->getAlignment()->setWrapText(true)->setVertical('center')->setHorizontal('center');
		
		$sheet->mergeCells('A9:A12')
			->setCellValue('A9', 'No urut');

		$sheet->mergeCells('B9:B12')
			->setCellValue('B9', 'Nama Barang/Jenis Barang');

		$sheet->mergeCells('C9:D12')
			->setCellValue('C9', 'Merk/Model');		

		$sheet->mergeCells('E9:E12')
			->setCellValue('E9', 'Ukuran');

		$sheet->mergeCells('F9:F12')
			->setCellValue('F9', 'Bahan');

		$sheet->mergeCells('G9:G12')
			->setCellValue('G9', 'Tahun Beli');

		$sheet->mergeCells('H9:H12')
			->setCellValue('H9', 'No Kode Barang');

		$sheet->mergeCells('I9:I12')
			->setCellValue('I9', 'Jumlah Brg/Reg');

		$sheet->mergeCells('J9:J12')
			->setCellValue('J9', 'Harga Beli/Pe rolehan');

		$sheet->mergeCells('K9:M9')
			->setCellValue('K9', 'Keadaan Barang');

		$sheet->mergeCells('K10:K11')
			->setCellValue('K10', 'Baik')
			->setCellValue('K12', '(B)');

		$sheet->mergeCells('L10:L11')
			->setCellValue('L10', 'Kurang Baik')
			->setCellValue('L12', '(KB)');

		$sheet->mergeCells('M10:M11')
			->setCellValue('M10', 'Rusak Berat')
			->setCellValue('M12', '(RB)');

		$sheet->mergeCells('N9:N12')
			->setCellValue('N9', 'Ket. Mutasi dll');


		$sheet->getStyle('A13:N13')->getFont()->setBold(true);
		$sheet->getStyle('A13:N13')->getAlignment()->setHorizontal('center');
		$sheet->setCellValue('A13', '1')
			->setCellValue('B13', '2')
			->setCellValue('E13', '4')
			->setCellValue('F13', '5')
			->setCellValue('G13', '6')
			->setCellValue('H13', '7')
			->setCellValue('I13', '8')
			->setCellValue('J13', '9')
			->setCellValue('K13', '10')
			->setCellValue('L13', '11')
			->setCellValue('M13', '12')
			->setCellValue('N13', '13');
		
		$sheet->mergeCells('C13:D13')
			->setCellValue('C13', '3');	


		$styleArray = [
		    'borders' => [
		        'top' => [
		            'borderStyle' => 'thin',
		        ],
		        'bottom' => [
		            'borderStyle' => 'thin',
		        ],
		        'left' => [
		            'borderStyle' => 'thin',
		        ],
		        'right' => [
		            'borderStyle' => 'thin',
		        ],
		        'inside' => [
		            'borderStyle' => 'thin',
		        ],
		    ],
		];

		$sheet->getStyle('A9:N13')->applyFromArray($styleArray);



		$writer = new Xlsx($spreadsheet);
		$writer->save(storage_path('kir.xlsx'));

		return response()->download(storage_path('kir.xlsx'));
    }
}
