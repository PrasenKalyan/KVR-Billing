<?php 
include_once('config.php'); 
require 'vendor/autoload.php';
require_once __DIR__ .'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$state = $_GET['state'];
if ($state == 'AP') {
    $qottable = 'add_qot';
} elseif ($state == 'TG') {
    $qottable = 'add_tgqot';
} elseif ($state == 'TN') {
    $qottable = 'add_tngqot';
} elseif ($state == 'KL') {
    $qottable = 'add_klqot';
} elseif ($state == 'KN') {
    $qottable = 'add_knqot';
} elseif ($state == 'OD') {
    $qottable = 'add_odqot';
}

$sql = "select * from " . $qottable . "  where status='Ro Required'";

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:H1');
$sheet->getStyle("A1:H1")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:H1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'KVR BEST');
$sheet->getStyle("A1:H1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:H4');
$sheet->getStyle("A4:H4")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:H4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', $state . ' QUOTATION LIST');
$sheet->getStyle("A4:H4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'PO Type');
$sheet->setCellValue('D6', 'PO Number');
$sheet->setCellValue('E6', 'Quotation Date');
$sheet->setCellValue('F6', 'RO Number');
$sheet->setCellValue('G6', 'RO Date');
$sheet->setCellValue('H6', 'PO Date');

$sheet->getStyle("A6:H6")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A6:H6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($sql) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;
while ($row1 = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row1['quet_num'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row1['po_type'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['po_no'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1[''], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['ro_no'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['ro_date'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['po_date'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$objWriter = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="' . $state . '-BulkRO.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter->save('php://output');
?>
