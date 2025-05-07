<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');
$name = $_GET['user'];

if (($name == 'admin') || ($name == 'durgarao') || ($name == 'accounts')) {
    $y = "select * from tgrequest_amnt where gsttype='With GST'";
} else {
    $y = "select * from tgrequest_amnt where gsttype='With GST' and user='$tsname' ";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:L1');
$sheet->getStyle("A1:L1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:L1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:L1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:L4');
$sheet->getStyle("A4:L4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:L4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA  QUOTATION  GST FILES LIST');
$sheet->getStyle("A4:L4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'State');
$sheet->setCellValue('C6', 'Quotation No');
$sheet->setCellValue('D6', 'Store Code');
$sheet->setCellValue('E6', 'Store Name');
$sheet->setCellValue('F6', 'Coordinator Name');
$sheet->setCellValue('G6', 'Supervisor');
$sheet->setCellValue('H6', 'Amount');
$sheet->setCellValue('I6', 'To Whom');
$sheet->setCellValue('J6', 'Transfer Date');
$sheet->setCellValue('K6', 'Status');
$sheet->setCellValue('L6', 'User');

$sheet->getStyle("A6:L6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A6:L6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;
while ($row = $result->fetch_assoc()) {
    $q = $row['quet_num'];
    $amt = $row['req_amnt'] + $row['gstamt'];
    $state = 'TG';
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($state, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($q, 'UTF-8'));

    $r = "select * from add_tgqot where quet_num='$q'";
    $result2 = $db->query($r) or die(mysqli_error($db));
    $row2 = $result2->fetch_assoc();
    $scode = $row2['store_code'];

    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($scode, 'UTF-8'));

    $ds = "select * from dpr where store_code='$scode'";
    $result1 = $db->query($ds) or die(mysqli_error($db));
    $row1 = $result1->fetch_assoc();

    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($amt, 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['ac_det'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper(date('d.m.Y', strtotime($row['transfer_date'])), 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row['gstatus'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tggstlist.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
