<?php
include '../../connect.php';
include '../../funkcije.php';
require '../../../PhpSpreadSheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$order_by = " uk_zahtjeva ";
	$order_type = " DESC ";
	$ponaslov1 = " Sortirano po polju ukupno";
	$ponaslov2 = " opadajuce";

	if(isset($_GET['polje_sort']) && is_numeric($_GET['polje_sort']) ){
		$polje_sort = $_GET['polje_sort'];
		switch ($polje_sort) {
			case '1':
				$order_by = " br_probl ";
				$ponaslov1 = " Sortirano po polju broj problema";
				break;
			case '2':
				$order_by = " br_podrska ";
				$ponaslov1 = " Sortirano po polju broj zahtjeva za podrsku";
				break;
			case '3':
				$order_by = " uk_zahtjeva ";
				$ponaslov1 = " Sortirano po polju ukupno";
				break;
			default:
				break;
		}
	}
	if(isset($_GET['tip_sort']) && is_numeric($_GET['tip_sort']) ){
		$tip_sort = $_GET['tip_sort'];
		switch ($tip_sort) {
			case '1':
				$order_type = " ASC ";
				$ponaslov2 = " rastuce";
				break;
			case '2':
				$order_type = " DESC ";
				$ponaslov2 = " opadajuce";
				break;
			default:
				break;
		}
	}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Izvjestaj o potkategorijama');
$spreadsheet->getActiveSheet()->mergeCells("A1:D1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(22);
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->setCellValue('A2', "$ponaslov1 $ponaslov2");
$spreadsheet->getActiveSheet()->mergeCells("A2:D2");
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$spreadsheet->getActiveSheet()->setCellValue('A4', "Potkategorija");
$spreadsheet->getActiveSheet()->setCellValue('B4', "Podrska");
$spreadsheet->getActiveSheet()->setCellValue('C4', "Problem");
$spreadsheet->getActiveSheet()->setCellValue('D4', "Ukupno");
$spreadsheet->getActiveSheet()->getStyle('A4:D4')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle("A4:D4")->getFont()->getColor()->setRGB('FFFFFF');
$spreadsheet->getActiveSheet()->getStyle("A4:D4")->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('000000');

$styleArray = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$sql = "SELECT 
			pk.id as id,
		    pk.naziv as naziv,
		    (select count(*) from zahtjev where potkategorija_id = pk.id) as uk_zahtjeva,
		    (select count(*) from zahtjev where potkategorija_id = pk.id and kategorija_id = 1) as br_podrska,
		    (select count(*) from zahtjev where potkategorija_id = pk.id and kategorija_id = 2) as br_probl
			FROM potkategorija pk
			ORDER BY $order_by $order_type
			";
$res = mysqli_query($dbconn, $sql);
$start = 5;
$ukupno_podr = 0;
$ukupno_probl = 0;
$ukupno_zaht = 0;
while($row = mysqli_fetch_assoc($res)){
    $naziv = $row['naziv'];
    $uk_zahtjeva = $row['uk_zahtjeva'];
    $br_podrska = $row['br_podrska'];
    $br_probl = $row['br_probl'];
    $spreadsheet->getActiveSheet()->setCellValue("A$start", $naziv);
    $spreadsheet->getActiveSheet()->setCellValue("B$start", $br_podrska);
    $spreadsheet->getActiveSheet()->setCellValue("C$start", $br_probl);
    $spreadsheet->getActiveSheet()->setCellValue("D$start", $uk_zahtjeva);
    $spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('DCDCDC');
    $ukupno_podr += $br_podrska;
    $ukupno_probl += $br_probl;
    $ukupno_zaht += $uk_zahtjeva;
    $start++;
}
$start++;
$spreadsheet->getActiveSheet()->setCellValue("A$start", 'Ukupno');
$spreadsheet->getActiveSheet()->setCellValue("B$start", $ukupno_podr);
$spreadsheet->getActiveSheet()->setCellValue("C$start", $ukupno_probl);
$spreadsheet->getActiveSheet()->setCellValue("D$start", $ukupno_zaht);
$spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->getFont()->getColor()->setRGB('FF7F50');
$spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('DCDCDC');
$spreadsheet->getActiveSheet()->getStyle("A$start:D$start")->getFont()->setBold(true);

$styleArray = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
    ],
];
    
$spreadsheet->getActiveSheet()->getStyle('A4:D7')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle('A4:D4')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle('A9:D9')->applyFromArray($styleArray);


$spreadsheet->setActiveSheetIndex(0);

$filename = 'izvjestaj';

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
$writer->save('php://output');
die();