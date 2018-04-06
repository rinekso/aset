<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Mesin;
use App\Asettetap;
use App\Koderuang;
use App\Kir;
use App\Unit;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function cetakKir(Request $request){

		$spreadsheet = new Spreadsheet();
		
		$spreadsheet->getDefaultStyle()
				    ->getFont()
				    ->setName('Arial Narrow')
				    ->setSize(9);

		$sheet = $spreadsheet->getActiveSheet();
		
		$sheet->getPageSetup()->setPaperSize('A5');
		$sheet->getPageMargins()->setTop(0.511);
		$sheet->getPageMargins()->setRight(0.196);
		$sheet->getPageMargins()->setLeft(0.196);
		$sheet->getPageMargins()->setBottom(0.511);



		$sheet->getColumnDimension('A')->setAutoSize(false)->setWidth(34/5);
		$sheet->getColumnDimension('B')->setAutoSize(false)->setWidth(180/5);
		$sheet->getColumnDimension('C')->setAutoSize(false)->setWidth(14/5);
		$sheet->getColumnDimension('D')->setAutoSize(false)->setWidth(89/5);
		$sheet->getColumnDimension('E')->setAutoSize(false)->setWidth(40/5);
		$sheet->getColumnDimension('F')->setAutoSize(false)->setWidth(77/5);
		$sheet->getColumnDimension('G')->setAutoSize(false)->setWidth(39/5);
		$sheet->getColumnDimension('H')->setAutoSize(false)->setWidth(78/5);
		$sheet->getColumnDimension('I')->setAutoSize(false)->setWidth(45/5);
		$sheet->getColumnDimension('J')->setAutoSize(false)->setWidth(50/5);
		$sheet->getColumnDimension('K')->setAutoSize(false)->setWidth(33/5);
		$sheet->getColumnDimension('L')->setAutoSize(false)->setWidth(33/5);
		$sheet->getColumnDimension('M')->setAutoSize(false)->setWidth(33/5);
		$sheet->getColumnDimension('N')->setAutoSize(false)->setWidth(55/5);
		// $sheet->getColumnDimension('A')->setAutoSize(false)->setWidth(34/5);
		// $sheet->getColumnDimension('B')->setAutoSize(false)->setWidth(26.71);
		// $sheet->getColumnDimension('C')->setAutoSize(false)->setWidth(3);
		// $sheet->getColumnDimension('D')->setAutoSize(false)->setWidth(13.71);
		// $sheet->getColumnDimension('E')->setAutoSize(false)->setWidth(6.71);
		// $sheet->getColumnDimension('F')->setAutoSize(false)->setWidth(12);
		// $sheet->getColumnDimension('G')->setAutoSize(false)->setWidth(6.57);
		// $sheet->getColumnDimension('H')->setAutoSize(false)->setWidth(12.14);
		// $sheet->getColumnDimension('I')->setAutoSize(false)->setWidth(7.43);
		// $sheet->getColumnDimension('J')->setAutoSize(false)->setWidth(8.14);
		// $sheet->getColumnDimension('K')->setAutoSize(false)->setWidth(5.71);
		// $sheet->getColumnDimension('L')->setAutoSize(false)->setWidth(5.71);
		// $sheet->getColumnDimension('M')->setAutoSize(false)->setWidth(5.71);
		// $sheet->getColumnDimension('N')->setAutoSize(false)->setWidth(8.86);


		$ruang = Koderuang::find($request->ruang);
		$unit_id = (int)$ruang->unit;
		$unit = Unit::find($unit_id)->nama_unit;

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
			->setCellValue('D5', $unit);

		$sheet->setCellValue('A6', 'ORGANISASI PERANGKAT DAERAH')
			->setCellValue('C6', ':')
			->setCellValue('D6', 'DINAS PARIWISATA KEBUDAYAAN PEMUDA DAN OLAH RAGA');

		$sheet->setCellValue('A7', 'RUANGAN')
			->setCellValue('C7', ':')
			->setCellValue('D7', $ruang->ruangan);


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


		$barissekarang = 14;

		for ($i = 0 ; $i < count($request->barang); $i++) {
			$row = $barissekarang + $i; 
			$mesin = Mesin::where('kode_barang', $request->barang[$i])->first();

			$sheet->setCellValue('A'.$row, $i+1)
				->setCellValue('B'.$row, $mesin->nama_barang)
				->mergeCells('C'.$row.':D'.$row)->setCellValue('C'.$row, $mesin->merk)
				->setCellValue('E'.$row, $mesin->ukuran)
				->setCellValue('F'.$row, $mesin->bahan)
				->setCellValue('G'.$row, $mesin->tahun_pembelian)
				->setCellValue('H'.$row, $mesin->kode_barang)
				->setCellValue('I'.$row, $mesin->jumlah)
				->setCellValue('J'.$row, $mesin->harga_satuan)
				->setCellValue('N'.$row, $mesin->keterangan);

			$sheet->getStyle('A'.$row)->getAlignment()->setHorizontal('center');

			$styleArray = [
			    'borders' => [
			        'left' => [
			            'borderStyle' => 'thin',
			        ],
			        'right' => [
			            'borderStyle' => 'thin',
			        ],
			        'vertical' => [
			            'borderStyle' => 'thin',
			        ],
			    ],
			];

			$sheet->getStyle('A'.$row.':N'.$row)->applyFromArray($styleArray);

		}
		$sheet->getStyle('A'.$row.':N'.$row)->getBorders()->getBottom()->setBorderStyle('thin');

		// tanggal
		$namaHari = [
		    0 => 'Minggu',
		    1 => 'Senin',
		    2 => 'Selasa',
		    3 => 'Rabu',
		    4 => 'Kamis',
		    5 => 'Jumat',
		    6 => 'Sabtu',
		];

		$namaBulan = [
		    1 => 'Januari',
		    2 => 'Februari',
		    3 => 'Maret',
		    4 => 'April',
		    5 => 'Mei',
		    6 => 'Juni',
		    7 => 'Juli',
		    8 => 'Agustus',
		    9 => 'September',
		    10 => 'Oktober',
		    11 => 'Nopember',
		    12 => 'Desember',
		];
    	$dayOfWeek = Carbon::now()->dayOfWeek;
    	$hari = $namaHari[$dayOfWeek];
    	$day = Carbon::now()->day;
    	$month = Carbon::now()->month;
    	$bulan = $namaBulan[$month];
    	$year = Carbon::now()->year;
    	// end tanggal

		$row = $row+4;
		$sheet->setCellValue('B'.$row, 'Mengetahui')
			->mergeCells('J'.$row.':N'.$row)->setCellValue('J'.$row, 'Sumenep, '.$day.' '.$bulan.' '.$year);
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+1;
		$sheet->setCellValue('B'.$row, 'Kepala Dinas Pariwisata Kebudayaan');
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+1;
		$sheet->setCellValue('B'.$row, 'Pemuda dan Olahraga')
			->mergeCells('J'.$row.':N'.$row)->setCellValue('J'.$row, 'Pengurus Barang Pengguna');			
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+1;
		$sheet->setCellValue('B'.$row, 'Kabupaten Sumenep');
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+3;
		$sheet->setCellValue('B'.$row, $request->pengguna)
			->mergeCells('J'.$row.':N'.$row)->setCellValue('J'.$row, $request->pengurus);			
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+1;
		$sheet->setCellValue('B'.$row, $request->jabatan1)
			->mergeCells('J'.$row.':N'.$row)->setCellValue('J'.$row, 'NIP: '.$request->jabatan4);			
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');

		$row = $row+1;
		$sheet->setCellValue('B'.$row, $request->nip1)
			->mergeCells('J'.$row.':N'.$row)->setCellValue('J'.$row, 'NIP: '.$request->nip4);			
		$sheet->getStyle('B'.$row.':N'.$row)->getAlignment()->setHorizontal('center');


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

    public function cetakKir2(Request $request){
    	return $request->barang[0];
    }
}
