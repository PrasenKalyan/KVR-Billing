<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');
$tsname = $_GET['user'];

$y = "select * from tgpayment";

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:AH1');
$sheet->getStyle("A1:AH1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:AH1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:AH1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:AH4');
$sheet->getStyle("A4:AH4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:AH4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA PAYPEMENT RECEIVED LIST');
$sheet->getStyle("A4:AH4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Inv Number');
$sheet->setCellValue('C6', 'Inv Date');
$sheet->setCellValue('D6', 'Inv Sub Date');
$sheet->setCellValue('E6', 'Serv Period');
$sheet->setCellValue('F6', 'Inv Sub Mon');
$sheet->setCellValue('G6', 'State');
$sheet->setCellValue('H6', 'Fomate');
$sheet->setCellValue('I6', 'Gst 28%');
$sheet->setCellValue('J6', 'Gst 18%');
$sheet->setCellValue('K6', 'Gst 12%');
$sheet->setCellValue('L6', 'Gst 5%');
$sheet->setCellValue('M6', 'Gst 0%');
$sheet->setCellValue('N6', 'Total Base');
$sheet->setCellValue('O6', 'Gst(28%) Amt');
$sheet->setCellValue('P6', 'Gst(18%) Amt');
$sheet->setCellValue('Q6', 'Gst(12%) Amt');
$sheet->setCellValue('R6', 'Gst(5%) Amt');
$sheet->setCellValue('S6', 'Gst(0%) Amt');
$sheet->setCellValue('T6', 'Total Gst');
$sheet->setCellValue('U6', 'Total Amount');
$sheet->setCellValue('V6', 'Tds');
$sheet->setCellValue('W6', 'Doc No1');
$sheet->setCellValue('X6', 'Rec Date1');
$sheet->setCellValue('Y6', 'Rec Month1');
$sheet->setCellValue('Z6', 'Total Amt Rec1');
$sheet->setCellValue('AA6', 'Doc No2');
$sheet->setCellValue('AB6', 'Rec Date2');
$sheet->setCellValue('AC6', 'Rec Month2');
$sheet->setCellValue('AD6', 'Total Amt Rec2');
$sheet->setCellValue('AE6', 'Outstanding');
$sheet->setCellValue('AF6', 'Ageing');
$sheet->setCellValue('AG6', 'Remarks');
$sheet->setCellValue('AH6', 'User');

$sheet->getStyle("A6:AH6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');

$sheet->getStyle("A6:AH6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;
while ($row = $result->fetch_assoc()) {
    $q = $row['inv_no'];
    $yu = "select inv_date,inv_sub_date,speriod,ftype,sum(gst28) as gst28,sum(gst18) as gst18,sum(gst12) as gst12,sum(gst5) as gst5,sum(gst5) as gst5,sum(tbase) as tbase from tgqot_bill where inv_num='$q'";
    $result1 = $db->query($yu) or die(mysqli_error($db));
    $row1 = $result1->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($q, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($inv = $row1['inv_date'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['inv_sub_date'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['speriod'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper(date('M', strtotime($row1['inv_sub_date'])), 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper('TG', 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row1['ftype'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($gst28 = $row1['gst28'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($gst18 = $row1['gst18'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($gst12 = $row1['gst12'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($gst5 = $row1['gst5'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($gst0 = $row1['gst0'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($tbase = $row1['tbase'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($g28 = ($gst28 * 28) / 100, 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($g18 = ($gst18 * 18) / 100, 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($g12 = ($gst12 * 12) / 100, 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($g5 = ($gst5 * 5) / 100, 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($g0 = ($gst0 * 0) / 100, 'UTF-8'));
    $sheet->setCellValue('T' . $rowCount, mb_strtoupper($gtot = $g28 + $g18 + $g12 + $g5 + $g0, 'UTF-8'));
    $sheet->setCellValue('U' . $rowCount, mb_strtoupper($tbase + $gtot, 'UTF-8'));
    $sheet->setCellValue('V' . $rowCount, mb_strtoupper($row['tds'], 'UTF-8'));
    $sheet->setCellValue('W' . $rowCount, mb_strtoupper($row['document_num'], 'UTF-8'));
    $sheet->setCellValue('X' . $rowCount, mb_strtoupper($row['recevied_date'], 'UTF-8'));
    $sheet->setCellValue('Y' . $rowCount, mb_strtoupper(date('M', strtotime($row['recevied_date'])), 'UTF-8'));
    $sheet->setCellValue('Z' . $rowCount, mb_strtoupper($recd = $row['recevied_amnt'], 'UTF-8'));
    $sheet->setCellValue('AA' . $rowCount, mb_strtoupper($row['document_num1'], 'UTF-8'));
    $sheet->setCellValue('AB' . $rowCount, mb_strtoupper($row['recevied_date1'], 'UTF-8'));
    $sheet->setCellValue('AC' . $rowCount, mb_strtoupper(date('M', strtotime($row['recevied_date1'])), 'UTF-8'));
    $sheet->setCellValue('AD' . $rowCount, mb_strtoupper($row['recevied_amnt1'], 'UTF-8'));
    $sheet->setCellValue('AE' . $rowCount, mb_strtoupper($row['outstanding'], 'UTF-8'));

    $amtdate = strtotime($recd);
    $amtdate1 = strtotime($inv);
    $ddate = ($amtdate - $amtdate1) / 60 / 60 / 24;
    $dts = 1;
    $dm = $ddate + $dts;

    $sheet->setCellValue('AF' . $rowCount, mb_strtoupper($dm, 'UTF-8'));
    $sheet->setCellValue('AG' . $rowCount, mb_strtoupper($row['remarks'], 'UTF-8'));
    $sheet->setCellValue('AH' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tgpaymentreceived.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
