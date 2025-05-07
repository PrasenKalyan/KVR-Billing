<?php
require 'vendor/autoload.php';
include('config.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$tsname = $_GET['user'];

if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'accounts') || ($tsname == 'naiduys') || ($tsname == 'sumanthpotluri')) {
    $y = "select distinct quet_num,state,user from tgrequest_amnt where confirm='Pending' order by id desc";
} else {
    $y = "select distinct quet_num,state,user from tgrequest_amnt where confirm='Pending' and user='$tsname' order by id desc";
}

$sheet->mergeCells('A1:U1');
$sheet->getStyle("A1:U1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:U1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:U1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:U4');
$sheet->getStyle("A4:U4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:U4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$sheet->setCellValue('A4', 'TELANGANA REQUEST AMOUNT LIST');
$sheet->getStyle("A4:U4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
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
$sheet->setCellValue('K6', 'RO Amount');
$sheet->setCellValue('L6', 'Service Fee');
$sheet->setCellValue('M6', 'GST');
$sheet->setCellValue('N6', 'Total');
$sheet->setCellValue('O6', 'Advance');
$sheet->setCellValue('P6', 'Requested Amount');
$sheet->setCellValue('Q6', 'Balance');
$sheet->setCellValue('R6', 'GST Type');
$sheet->setCellValue('S6', 'GST Amount');
$sheet->setCellValue('T6', 'Whoom');
$sheet->setCellValue('U6', 'User');

$sheet->getStyle("A6:U6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');

$sheet->getColumnDimension('B')->setWidth(22);
$sheet->getColumnDimension('C')->setWidth(12);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(16);
$sheet->getColumnDimension('H')->setWidth(13);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(14);
$sheet->getColumnDimension('K')->setWidth(13);
$sheet->getColumnDimension('L')->setWidth(13);
$sheet->getColumnDimension('M')->setWidth(13);
$sheet->getColumnDimension('N')->setWidth(13);
$sheet->getColumnDimension('O')->setWidth(13);
$sheet->getColumnDimension('P')->setWidth(13);
$sheet->getColumnDimension('Q')->setWidth(18);
$sheet->getColumnDimension('R')->setWidth(18);
$sheet->getColumnDimension('S')->setWidth(18);
$sheet->getColumnDimension('T')->setWidth(18);
$sheet->getColumnDimension('U')->setWidth(22);

$sheet->getStyle("A6:U6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result = $db->query($y) or die(mysqli_error($link));
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    $qot = $row['quet_num'];
    $a = "select * from add_tgqot where quet_num='$qot'";
    $result1 = $db->query($a) or die(mysqli_error($link));
    $row2 = $result1->fetch_assoc();
    $str_code = $row2['store_code'];
    $ds = "select * from dpr where store_code='$str_code'";
    $result2 = $db->query($ds) or die(mysqli_error($link));
    $row1 = $result2->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($qot, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($str_code, 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['format_type'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row2['ro_no'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row2['ro_date'])), 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row2['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row2['tot_base'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row2['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row2['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row2['net'], 'UTF-8'));
    $ty5 = "select sum(approve_amnt) as samt from tgrequest_amnt where quet_num='$qot'";
    $result3 = $db->query($ty5) or die(mysqli_error($link));
    $row3 = $result3->fetch_assoc();
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row3['samt'], 'UTF-8'));
    $tyy = "select sum(req_amnt+gstamt) as rsamt from tgrequest_amnt where quet_num='$qot' and confirm='Pending'";
    $result3 = $db->query($tyy) or die(mysqli_error($link));
    $row4 = $result3->fetch_assoc();
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row4['rsamt'], 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row2['bal'], 'UTF-8'));

    $yt1 = "select gsttype,gstamt from tgrequest_amnt where quet_num='$qot'";
    $result5 = $db->query($yt1) or die(mysqli_error($link));
    $array1 = '';
    $array2 = '';
    while ($row5 = $result5->fetch_assoc()) {
        $at1 = $row5['gstamt'];
        $sc1 = $row5['gsttype'];
        $array1 .= $sc1 . ",";
        $array2 .= $at1 . ",";
    }
    $sheet->setCellValue('R' . $rowCount, (rtrim($array1, ',')));
    $sheet->setCellValue('S' . $rowCount, (rtrim($array2, ',')));

    $yt = "select req_amnt,gstamt,ac_det,req_date from tgrequest_amnt where quet_num='$qot'";
    $result4 = $db->query($yt) or die(mysqli_error($link));
    $array = '';
    while ($row4 = $result4->fetch_assoc()) {
        $at = $row4['req_amnt'] + $row4['gstamt'];
        $sc = $row4['ac_det'];
        $rdate = date('d-m-Y', strtotime($row4['req_date']));
        $array .= $sc . "-" . $at . "(" . $rdate . "),";
    }
    $sheet->setCellValue('T' . $rowCount, (rtrim($array, ',')));
    $sheet->setCellValue('U' . $rowCount, ($row['user']));

    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tgreqamountlist.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
