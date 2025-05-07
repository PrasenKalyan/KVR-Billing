<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');
$tsname = $_GET['user'];

if (($tsname == 'admin') or ($tsname == 'durgarao') or ($tsname == 'accounts') or ($tsname == 'tgbilling')) {
    $y = "select * from tgqot_bill where status='Un Paid'";
} else {
    $y = "select * from tgqot_bill where status='Un Paid' and user='$tsname'";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:W1');
$sheet->getStyle("A1:W1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:W1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:W1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:W4');
$sheet->getStyle("A4:W4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:W4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA PAYPEMENT PENDING LIST');
$sheet->getStyle("A4:W4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Inv Number');
$sheet->setCellValue('C6', 'Qut Num');
$sheet->setCellValue('D6', 'Inv Date');
$sheet->setCellValue('E6', 'Inv Sub Date');
$sheet->setCellValue('F6', 'Serv Period');
$sheet->setCellValue('G6', 'Inv Sub Mon');
$sheet->setCellValue('H6', 'State');
$sheet->setCellValue('I6', 'Fomate');
$sheet->setCellValue('J6', 'Gst 28%');
$sheet->setCellValue('K6', 'Gst 18%');
$sheet->setCellValue('L6', 'Gst 12%');
$sheet->setCellValue('M6', 'Gst 5%');
$sheet->setCellValue('N6', 'Gst 0%');
$sheet->setCellValue('O6', 'Total Base');
$sheet->setCellValue('P6', 'Gst(28%) Amt');
$sheet->setCellValue('Q6', 'Gst(18%) Amt');
$sheet->setCellValue('R6', 'Gst(12%) Amt');
$sheet->setCellValue('S6', 'Gst(5%) Amt');
$sheet->setCellValue('T6', 'Gst(0%) Amt');
$sheet->setCellValue('U6', 'Total Gst');
$sheet->setCellValue('V6', 'Total Amount');
$sheet->setCellValue('W6', 'User');

$sheet->getStyle("A6:W6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');

$sheet->getStyle("A6:W6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['inv_num'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($scode = $row['quet_num'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_date'])), 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_sub_date'])), 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row['speriod'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_sub_date'])), 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper('TG', 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['ftype'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($gst28 = $row['gst28'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($gst18 = $row['gst18'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($gst12 = $row['gst12'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($gst5 = $row['gst5'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($gst0 = $row['gst0'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($tbase = $row['tbase'], 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($g28 = ($gst28 * 28) / 100, 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($g18 = ($gst18 * 18) / 100, 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($g12 = ($gst12 * 12) / 100, 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($g5 = ($gst5 * 5) / 100, 'UTF-8'));
    $sheet->setCellValue('T' . $rowCount, mb_strtoupper($g0 = ($gst0 * 0) / 100, 'UTF-8'));
    $sheet->setCellValue('U' . $rowCount, mb_strtoupper($gtot = $g28 + $g18 + $g12 + $g5 + $g0, 'UTF-8'));
    $sheet->setCellValue('V' . $rowCount, mb_strtoupper($tbase + $gtot, 'UTF-8'));
    $sheet->setCellValue('W' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tgpaymentpending.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
