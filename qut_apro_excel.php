<?php 
include_once('config.php'); 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$tsname = $_GET['user'];
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

if (($tsname == 'admin') || ($tsname == 'durgarao')) {
    $y = "SELECT * FROM " . $qottable . "  where status='Ro Required'  ORDER BY id desc";
} else {
    $y = "SELECT * FROM " . $qottable . "  where status='Ro Required' and ses='$tsname'  ORDER BY id desc";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:N1');
$sheet->getStyle("A1:N1")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:N1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'KVR BEST');
$sheet->getStyle("A1:N1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:N4');
$sheet->getStyle("A4:N4")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:N4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', $state . ' QUOTATION LIST');
$sheet->getStyle("A4:N4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Store Code');
$sheet->setCellValue('D6', 'Store Name');
$sheet->setCellValue('E6', 'Coordinator Name');
$sheet->setCellValue('F6', 'Supervisor');
$sheet->setCellValue('G6', 'City');
$sheet->setCellValue('H6', 'Date');
$sheet->setCellValue('I6', 'Ro Amount');
$sheet->setCellValue('J6', 'Service Amount');
$sheet->setCellValue('K6', 'Gst Amount');
$sheet->setCellValue('L6', 'Total Amount');
$sheet->setCellValue('M6', 'Status');
$sheet->setCellValue('N6', 'user');
$sheet->getStyle("A6:N6")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A6:N6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($link));
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['quet_num'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($scode = $row['store_code'], 'UTF-8'));

    $ds = "select * from dpr where store_code='$scode'";
    $result1 = $db->query($ds) or die(mysqli_error($link));
    $row1 = $result1->fetch_assoc();

    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['city'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_date'])), 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['tot_base'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['net'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row['status'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row['ses'], 'UTF-8'));
    $rowCount++;
    $i++;
}

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="' . $state . '-rorequired.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

$objWriter = new Xlsx($spreadsheet);
$objWriter->save('php://output');
?>
