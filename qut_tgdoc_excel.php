<?php
require 'vendor/autoload.php';
include('config.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$tsname = $_GET['user'];

if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'accounts') || ($tsname == 'tgbilling') || ($tsname == 'naiduys') || ($tsname == 'sumanthpotluri')) {
    $y = "SELECT distinct quet_num,user FROM `tgrequest_amnt` where  status='Amount Transferred' and bill_status='' or docr_status='Cancel'";
} else {
    $y = "SELECT  quet_num,user FROM `tgrequest_amnt` where  status='Amount Transferred'  and bill_status=''   and user='$tsname'  or docr_status='Cancel'";
}

$sheet->mergeCells('A1:R1');
$sheet->getStyle("A1:R1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:R1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:R1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:R4');
$sheet->getStyle("A4:R4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:R4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA DOCUMENT REQUIRED LIST');
$sheet->getStyle("A4:R4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Supervisor');
$sheet->setCellValue('D6', 'Coordinator');
$sheet->setCellValue('E6', 'Store Name');
$sheet->setCellValue('F6', 'Store Code');
$sheet->setCellValue('G6', 'Store Type');
$sheet->setCellValue('H6', 'Ro Num');
$sheet->setCellValue('I6', 'Ro Date');
$sheet->setCellValue('J6', 'Fault Description');
$sheet->setCellValue('K6', 'Ro Amount');
$sheet->setCellValue('L6', 'Service Fee');
$sheet->setCellValue('M6', 'Gst Amount');
$sheet->setCellValue('N6', 'Total Amount');
$sheet->setCellValue('O6', 'Whom To be Invest');
$sheet->setCellValue('P6', 'Transfer Amount');
$sheet->setCellValue('Q6', 'Amount Transferred Date');
$sheet->setCellValue('R6', 'User');
$sheet->getStyle("A6:R6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getColumnDimension('B')->setWidth(19);
$sheet->getColumnDimension('C')->setWidth(16);
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getColumnDimension('E')->setWidth(23);
$sheet->getColumnDimension('F')->setWidth(10);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(22);
$sheet->getColumnDimension('K')->setWidth(12);
$sheet->getColumnDimension('L')->setWidth(12);
$sheet->getColumnDimension('M')->setWidth(13);
$sheet->getColumnDimension('N')->setWidth(13);
$sheet->getColumnDimension('O')->setWidth(13);
$sheet->getColumnDimension('P')->setWidth(13);
$sheet->getColumnDimension('Q')->setWidth(22);
$sheet->getColumnDimension('R')->setWidth(22);
$sheet->getStyle("A6:R6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result = $db->query($y) or die(mysqli_error($link));
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    $qtno = $row['quet_num'];
    $a = "select store_code,ro_no,ro_date,falt_desc,id,tot_base,tot_ser,tot_gst,net from add_tgqot where quet_num='$qtno'";
    $result1 = $db->query($a) or die(mysqli_error($link));
    $row1 = $result1->fetch_assoc();
    $str_code = $row1['store_code'];
    $ds = "select * from dpr where store_code='$str_code'";
    $result2 = $db->query($ds) or die(mysqli_error($link));
    $row2 = $result2->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($qtno, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row2['superwisor'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row2['coordinator'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row2['store_name'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($str_code, 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row2['format_type'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row1['ro_no'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row1['ro_date'])), 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row1['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row1['tot_base'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row1['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row1['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row1['net'], 'UTF-8'));
    $ac = $row['ac_det'];
    $yt = "select approve_amnt,ac_det,transfer_date from tgrequest_amnt where quet_num='$qtno' and  confirm='Yes'";
    $result4 = $db->query($yt) or die(mysqli_error($link));
    $array = '';
    while ($row4 = $result4->fetch_assoc()) {
        $at = $row4['approve_amnt'];
        $sc = $row4['ac_det'];
        $rdate = date('d-m-Y', strtotime($row4['transfer_date']));
        $array .= $sc . "-" . $at . "(" . $rdate . "),";
    }
    $sheet->setCellValue('O' . $rowCount, $array);
    $a10 = "select sum(approve_amnt) as req_amnt from tgrequest_amnt where quet_num='$qtno' and  confirm='Yes' ";
    $result10 = $db->query($a10) or die(mysqli_error($link));
    $row3 = $result10->fetch_assoc();
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row3['req_amnt'], 'UTF-8'));
    $a11 = "select transfer_date from tgrequest_amnt where quet_num='$qtno' and  confirm='Yes' order by id desc limit 1 ";
    $result11 = $db->query($a11) or die(mysqli_error($link));
    $row4 = $result11->fetch_assoc();
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row4['transfer_date'], 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$dt = date('d-m-Y');
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tgdocument' . $dt . '.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
